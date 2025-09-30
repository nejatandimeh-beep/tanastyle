@extends('Layouts.app')
@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card shadow-lg border-0 rounded-3">

                    {{-- عنوان --}}
                    <h5 class="card-header g-bg-primary text-white text-center py-3">تأیید کد ارسال‌شده</h5>

                    <div class="card-body p-4 text-center">
                        <form id="verifyForm" action="{{ route('verifyMobile') }}" method="POST" autocomplete="off">
                            @csrf

                            {{-- ورودی ۶ رقمی --}}
                            <div class="mb-2">
                                <label class="form-label fw-bold mb-3 d-block">کد 6 رقمی را وارد کنید</label>

                                <div class="d-flex justify-content-between code-input-container" style="gap: .5rem;">
                                    @for ($i = 1; $i <= 6; $i++)
                                        <input
                                            type="text"
                                            inputmode="numeric"
                                            pattern="\d*"
                                            maxlength="1"
                                            class="form-control text-center fs-1 code-input"
                                            style="width: 50px; height: 58px; font-weight:700; font-size: 30px; outline-color: #72c02c; border-radius: 10px"
                                            aria-label="digit-{{ $i }}"
                                        >
                                    @endfor
                                </div>
                            </div>

                            {{-- تایمر و progress --}}
                            <div class="mt-4">
                                <div class="progress" style="height:12px; border-radius:10px;">
                                    <div id="progressBar" class="progress-bar g-bg-primary" role="progressbar"
                                         style="width:100%; transition: width 1s linear;"></div>
                                </div>
                                <div class="mt-2">
                                    <span id="timeText" class="fw-bold text-muted">02:00</span>
                                </div>
                                <button id="resendBtn" class="btn btn-outline-primary mt-3 fw-bold px-4 py-2 rounded-pill d-none">
                                    ارسال مجدد کد
                                </button>
                            </div>

                            {{-- hidden fallback --}}
                            <input type="hidden" id="finalCode" name="verifyCode" value="">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Toast container --}}
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 1100; width: 100%;">
        <div id="toastContainer"></div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {

            const inputs = Array.from(document.querySelectorAll(".code-input"));
            const finalCodeHidden = document.getElementById("finalCode");
            const container = document.querySelector(".code-input-container");
            const toastContainer = document.getElementById("toastContainer");
            const progressBar = document.getElementById("progressBar");
            const timeText = document.getElementById("timeText");
            const resendBtn = document.getElementById("resendBtn");
            const TOTAL = 120;
            let timerInterval = null;
            let isVerifying = false;

            const VERIFY_URL = @json(route('verifyMobile'));
            const RESEND_URL = @json(route('resendVerifyCode'));
            const CSRF = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') ?? '';

            // --- توابع کمکی ---
            function getCode() { return inputs.map(i => i.value.trim()).join(''); }
            function clearInputs() { inputs.forEach(i=>{i.value=''; i.classList.remove('is-invalid'); }); inputs[0].focus(); }
            function clearToast() { toastContainer.innerHTML = ''; }

            function showToast(msg, type='danger') {
                const toast = document.createElement('div');
                toast.className = `toast align-items-center text-white bg-${type} border-0 show mb-2`;
                toast.setAttribute('role','alert');
                toast.innerHTML = `<div style="
" class="d-flex"><div class="toast-body">${msg}</div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button></div>`;
                toastContainer.appendChild(toast);
                setTimeout(()=> toast.remove(), 4000);
            }

            function handleFailure(msg){
                showToast(msg,'danger');
                container.classList.add('shake');
                setTimeout(()=>container.classList.remove('shake'),600);
                inputs.forEach(i=>i.classList.add('is-invalid'));
                setTimeout(()=> clearInputs(),400);
            }

            // --- مدیریت paste ---
            inputs.forEach((input, idx)=>{
                input.addEventListener('paste', function(e){
                    e.preventDefault();
                    let paste = (e.clipboardData||window.clipboardData).getData('text').replace(/\D/g,'').slice(0,6);
                    for(let i=0;i<paste.length;i++){ inputs[i].value=paste[i]; }
                    const code = getCode();
                    if(code.length===6){ attemptVerify(code); } else { inputs.find(i=>!i.value).focus(); }
                });
            });

            // --- ورود ارقام و حرکت فوکوس ---
            inputs.forEach((input,index)=>{
                input.addEventListener('input',function(){
                    this.value = this.value.replace(/\D/g,'').slice(0,1);
                    if(this.value && index<inputs.length-1) inputs[index+1].focus();
                    const code=getCode();
                    finalCodeHidden.value=code;
                    if(code.length===6 && !isVerifying) attemptVerify(code);
                });
                input.addEventListener('keydown',function(e){
                    if(e.key==='Backspace' && !this.value && index>0) inputs[index-1].focus();
                    if(e.key.length===1 && /\D/.test(e.key)) e.preventDefault();
                });
            });

            // --- تایید کد با AJAX ---
            function attemptVerify(code){
                clearToast();
                isVerifying = true;
                inputs.forEach(i => i.setAttribute('disabled','disabled'));

                fetch(VERIFY_URL, {
                    method:'POST',
                    headers:{
                        'Content-Type':'application/json',
                        'Accept':'application/json',
                        'X-CSRF-TOKEN': CSRF
                    },
                    body: JSON.stringify({ verifyCode: code })
                })
                    .then(async res => {
                        const data = await res.json().catch(()=>({}));
                        if(res.ok) return data;
                        throw Object.assign(new Error(data.message || 'خطا'), { payload: data, status: res.status });
                    })
                    .then(json => {
                        if(json.success){
                            if(json.redirect) {
                                window.location.href = json.redirect;
                            } else {
                                window.location.reload();
                            }
                        } else {
                            handleFailure(json.message || 'کد اشتباه است');
                        }
                    })
                    .catch(err => {
                        const payload = err.payload || {};
                        handleFailure(payload.message || err.message);
                    })
                    .finally(() => {
                        isVerifying = false;
                        inputs.forEach(i => i.removeAttribute('disabled'));
                    });
            }

            // --- تایمر با localStorage ---
            function startTimer(){
                clearInterval(timerInterval);

                let expireTime = localStorage.getItem("verify_expire");
                const now = Math.floor(Date.now()/1000);

                if(!expireTime || now >= expireTime){
                    expireTime = now + TOTAL; // از نو شروع کن
                    localStorage.setItem("verify_expire", expireTime);
                } else {
                    expireTime = parseInt(expireTime);
                }

                function updateTimer(){
                    const remain = expireTime - Math.floor(Date.now()/1000);
                    if(remain <= 0){
                        clearInterval(timerInterval);
                        timeText.textContent = "00:00";
                        progressBar.style.width='0%';
                        progressBar.classList.remove('bg-primary');
                        progressBar.classList.add('bg-danger');
                        resendBtn.classList.remove('d-none');
                        return;
                    }

                    const mins = String(Math.floor(remain/60)).padStart(2,'0');
                    const secs = String(remain%60).padStart(2,'0');
                    timeText.textContent=`${mins}:${secs}`;
                    progressBar.style.width=(remain/TOTAL*100)+'%';
                }

                updateTimer();
                timerInterval = setInterval(updateTimer,1000);
            }

            startTimer();

            // --- ارسال مجدد کد ---
            resendBtn.addEventListener('click',function(e){
                e.preventDefault();
                resendBtn.classList.add('d-none'); // 👈 بعد از کلیک دوباره مخفی بشه
                fetch(RESEND_URL,{
                    method:'POST',
                    headers:{
                        'Content-Type':'application/json',
                        'Accept':'application/json',
                        'X-CSRF-TOKEN': CSRF
                    },
                    body: JSON.stringify({})
                }).then(r=>r.json())
                    .then(data=>{
                        localStorage.setItem("verify_expire", Math.floor(Date.now()/1000) + TOTAL);
                        startTimer();
                        clearInputs();
                        showToast('کد جدید ارسال شد','success');
                    })
                    .catch(()=>{
                        localStorage.setItem("verify_expire", Math.floor(Date.now()/1000) + TOTAL);
                        startTimer();
                        clearInputs();
                        showToast('کد جدید ارسال شد','success');
                    });
            });
        });
    </script>

@endsection
