@extends('Layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card shadow-lg border-0 rounded-4">

                    {{-- Header --}}
                    <h5 class="card-header g-bg-primary text-white text-center py-3 rounded-top-4">
                        تأیید کد ارسال‌شده
                    </h5>

                    <div class="card-body p-4 text-center">
                        <form id="verifyForm" autocomplete="off">
                            @csrf

                            {{-- OTP inputs --}}
                            <label class="form-label fw-bold mb-3 d-block">
                                کد ۶ رقمی را وارد کنید
                            </label>

                            <div class="d-flex justify-content-between code-input-container mb-3" style="gap:.5rem">
                                @for($i=1;$i<=6;$i++)
                                    <input type="text"
                                           inputmode="numeric"
                                           maxlength="1"
                                           class="form-control text-center code-input"
                                           style="width:52px;height:60px;font-size:26px;font-weight:700;">
                                @endfor
                            </div>

                            <input type="hidden" id="finalCode" name="verifyCode">

                            {{-- Timer --}}
                            <div class="mt-4">
                                <div class="progress" style="height:10px;border-radius:10px;">
                                    <div id="progressBar"
                                         class="progress-bar g-bg-primary"
                                         style="width:100%;transition:width 1s linear;"></div>
                                </div>

                                <div class="mt-2">
                                    <span id="timeText" class="fw-bold text-muted">02:00</span>
                                </div>

                                <button type="button"
                                        id="resendBtn"
                                        class="btn btn-outline-primary fw-bold mt-3 px-4 py-2 rounded-pill d-none">
                                    ارسال مجدد کد
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Toast --}}
    <div class="position-fixed top-0 end-0 p-3" style="z-index:1100">
        <div id="toastContainer"></div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {

            const inputs = [...document.querySelectorAll('.code-input')];
            const finalCode = document.getElementById('finalCode');
            const resendBtn = document.getElementById('resendBtn');
            const progressBar = document.getElementById('progressBar');
            const timeText = document.getElementById('timeText');
            const toastContainer = document.getElementById('toastContainer');

            const VERIFY_URL = @json(route('verifyMobile'));
            const RESEND_URL = @json(route('resendVerifyCode'));
            const CSRF = document.querySelector('meta[name="csrf-token"]').content;

            const TOTAL = 120;
            const STORAGE_KEY = 'vendor_otp_timer';

            let remaining = TOTAL;
            let timer = null;
            let verifying = false;

            /* ---------------- Helpers ---------------- */
            const showToast = (msg, type='danger') => {
                const t = document.createElement('div');
                t.className = `toast show text-white bg-${type} mb-2`;
                t.innerHTML = `<div class="toast-body">${msg}</div>`;
                toastContainer.appendChild(t);
                setTimeout(()=>t.remove(), 4000);
            };

            const getCode = () => inputs.map(i=>i.value).join('');

            /* ---------------- Inputs ---------------- */
            inputs.forEach((input, i) => {

                input.addEventListener('input', () => {
                    input.value = input.value.replace(/\D/g,'');
                    if(input.value && inputs[i+1]) inputs[i+1].focus();
                    finalCode.value = getCode();
                    if(finalCode.value.length === 6 && !verifying) verify(finalCode.value);
                });

                input.addEventListener('keydown', e => {
                    if(e.key === 'Backspace' && !input.value && inputs[i-1]) {
                        inputs[i-1].focus();
                    }
                });

                input.addEventListener('paste', e => {
                    e.preventDefault();
                    const p = e.clipboardData.getData('text').replace(/\D/g,'').slice(0,6);
                    [...p].forEach((d,idx)=> inputs[idx].value=d);
                    finalCode.value = getCode();
                    if(finalCode.value.length === 6) verify(finalCode.value);
                });
            });

            /* ---------------- Verify ---------------- */
            function verify(code){
                verifying = true;
                fetch(VERIFY_URL,{
                    method:'POST',
                    headers:{
                        'Content-Type':'application/json',
                        'Accept':'application/json',
                        'X-CSRF-TOKEN':CSRF
                    },
                    body:JSON.stringify({verifyCode:code})
                })
                    .then(r=>r.json())
                    .then(d=>{
                        if(d.success){
                            window.location.href = d.redirect;
                        }else{
                            showToast(d.message || 'کد اشتباه است');
                            inputs.forEach(i=>i.value='');
                            inputs[0].focus();
                        }
                    })
                    .catch(()=>showToast('خطا در ارتباط با سرور'))
                    .finally(()=>verifying=false);
            }

            /* ---------------- Timer with persistence ---------------- */
            function startTimer(){
                const saved = localStorage.getItem(STORAGE_KEY);
                remaining = saved ? Math.max(0, Math.floor((saved - Date.now())/1000)) : TOTAL;

                if(!saved){
                    localStorage.setItem(STORAGE_KEY, Date.now() + TOTAL*1000);
                }

                timer = setInterval(()=>{
                    const m = String(Math.floor(remaining/60)).padStart(2,'0');
                    const s = String(remaining%60).padStart(2,'0');
                    timeText.textContent = `${m}:${s}`;
                    progressBar.style.width = (remaining/TOTAL*100)+'%';

                    if(--remaining < 0){
                        clearInterval(timer);
                        resendBtn.classList.remove('d-none');
                        progressBar.classList.add('bg-danger');
                    }
                },1000);
            }

            /* ---------------- Resend ---------------- */
            resendBtn.addEventListener('click', ()=>{
                resendBtn.classList.add('d-none');
                localStorage.removeItem(STORAGE_KEY);
                fetch(RESEND_URL,{
                    method:'POST',
                    headers:{
                        'X-CSRF-TOKEN':CSRF,
                        'Accept':'application/json'
                    }
                }).then(()=>{
                    showToast('کد جدید ارسال شد','success');
                    inputs.forEach(i=>i.value='');
                    inputs[0].focus();
                    startTimer();
                });
            });

            startTimer();
        });
    </script>
@endsection
