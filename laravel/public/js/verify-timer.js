document.addEventListener("DOMContentLoaded", function () {

    /* ===============================================
       عناصر صفحه
    =============================================== */
    const inputs = Array.from(document.querySelectorAll(".code-input"));
    const hiddenOTP = document.getElementById("otp_autofill");
    const finalHidden = document.getElementById("finalCode");

    const toastContainer = document.getElementById("toastContainer");
    const progressBar = document.getElementById("progressBar");
    const timeText = document.getElementById("timeText");
    const resendBtn = document.getElementById("resendBtn");

    const VERIFY_URL = window.VERIFY_URL;
    const RESEND_URL = window.RESEND_URL;
    const CSRF = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') ?? '';
    const TOTAL = 120;

    let timerInterval = null;
    let isVerifying = false;

    /* ===============================================
       توابع کمکی
    =============================================== */
    function showToast(msg, type = "danger") {
        const box = document.createElement("div");
        box.className = `toast align-items-center text-white bg-${type} border-0 show mb-2`;
        box.innerHTML = `
            <div class="d-flex">
                <div class="toast-body">${msg}</div>
                <button class="btn-close btn-close-white me-2 m-auto"></button>
            </div>`;
        toastContainer.appendChild(box);
        setTimeout(() => box.remove(), 4000);
    }

    function getFullCode() {
        return inputs.map(i => i.value.trim()).join('').slice(0,6);
    }

    function fillInputsFromString(code) {
        code = code.replace(/\D/g,'').slice(0,6);
        for (let i = 0; i < inputs.length; i++) {
            inputs[i].value = code[i] || '';
        }
        finalHidden.value = code;
        hiddenOTP.value = code;
    }

    function clearInputs() {
        inputs.forEach(i => i.value = '');
        hiddenOTP.value = '';
        finalHidden.value = '';
        inputs[0].focus();
    }

    /* ===============================================
       ارسال کد به سرور
    =============================================== */
    function attemptVerify(code) {
        if (isVerifying) return;

        isVerifying = true;
        inputs.forEach(i => i.disabled = true);

        fetch(VERIFY_URL, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json",
                "X-CSRF-TOKEN": CSRF
            },
            body: JSON.stringify({ verifyCode: code })
        })
            .then(r => r.json().then(j => ({ok:r.ok, json:j})))
            .then(({ok, json}) => {
                if (!ok || !json.success) throw new Error(json.message || "کد اشتباه است");

                window.location.href = json.redirect ?? window.location.href;
            })
            .catch(err => {
                showToast(err.message, "danger");
                clearInputs();
            })
            .finally(() => {
                isVerifying = false;
                inputs.forEach(i => i.disabled = false);
            });
    }

    /* ===============================================
       مدیریت تایپ در باکس‌ها
    =============================================== */
    inputs.forEach((inp, idx) => {
        inp.addEventListener("input", function () {
            this.value = this.value.replace(/\D/g, '').slice(0,1);
            if (this.value && idx < 5) inputs[idx+1].focus();
            const code = getFullCode();
            finalHidden.value = code;
            hiddenOTP.value = code;

            if (code.length === 6) attemptVerify(code);
        });

        inp.addEventListener("keydown", function (e) {
            if (e.key === "Backspace" && !this.value && idx > 0) inputs[idx-1].focus();
        });

        inp.addEventListener("paste", function (e) {
            e.preventDefault();
            let t = (e.clipboardData || window.clipboardData).getData("text");
            t = t.replace(/\D/g, '').slice(0,6);
            fillInputsFromString(t);
            if (t.length === 6) attemptVerify(t);
        });
    });

    /* ===============================================
       Autofill iOS — گوش دادن به hidden
    =============================================== */
    hiddenOTP.addEventListener("input", function () {
        const code = this.value.replace(/\D/g,'').slice(0,6);
        fillInputsFromString(code);
        if (code.length === 6) attemptVerify(code);
    });

    /* ===============================================
       Web OTP API — Chrome Android
    =============================================== */
    if ("OTPCredential" in window) {
        const ac = new AbortController();
        setTimeout(() => ac.abort(), 60000);

        navigator.credentials.get({
            otp: { transport: ["sms"] },
            signal: ac.signal
        }).then(otp => {
            if (otp && otp.code) {
                fillInputsFromString(otp.code);
                attemptVerify(otp.code);
            }
        }).catch(() => {});
    }

    /* ===============================================
       تایمر
    =============================================== */
    function startTimer() {
        clearInterval(timerInterval);

        const now = Math.floor(Date.now()/1000);
        let expire = localStorage.getItem("verify_expire");

        if (!expire || window.INPUT_MOBILE !== localStorage.getItem("verify_mobile")) {
            expire = now + TOTAL;
            localStorage.setItem("verify_mobile", window.INPUT_MOBILE);
            localStorage.setItem("verify_expire", expire);
        }

        function tick() {
            const remain = expire - Math.floor(Date.now()/1000);

            if (remain <= 0) {
                clearInterval(timerInterval);
                timeText.textContent = "00:00";
                progressBar.style.width = "0%";
                resendBtn.classList.remove("d-none");
                return;
            }

            const m = String(Math.floor(remain/60)).padStart(2,'0');
            const s = String(remain%60).padStart(2,'0');
            timeText.textContent = `${m}:${s}`;

            progressBar.style.width = (remain / TOTAL) * 100 + "%";
        }

        tick();
        timerInterval = setInterval(tick, 1000);
    }

    startTimer();

    /* ===============================================
       ارسال مجدد
    =============================================== */
    resendBtn.addEventListener("click", function () {
        resendBtn.classList.add("d-none");

        fetch(RESEND_URL, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json",
                "X-CSRF-TOKEN": CSRF
            }
        }).finally(() => {
            localStorage.setItem("verify_expire", Math.floor(Date.now()/1000) + TOTAL);
            startTimer();
            clearInputs();
            showToast("کد جدید ارسال شد", "success");
        });
    });

});
