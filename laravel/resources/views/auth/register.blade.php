@extends('Layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-6">
                <div class="card shadow-lg border-0 rounded-3">
                    <h5 class="card-header text-center g-bg-primary text-white py-3">
                        ثبت نام در سایت
                    </h5>

                    <div class="card-body p-4">
                        <form method="POST" action="{{ route('register') }}" novalidate>
                            @csrf
                            <input type="hidden" value="{{ Session::get('mobile') }}" name="mobile">

                            {{-- رمز عبور --}}
                            <div class="mb-3">
                                <label for="password" class="form-label fw-bold h5">رمز عبور</label>
                                <div class="input-group">
                                    <input style="height: auto"
                                        type="password"
                                        id="password"
                                        name="password"
                                        class="form-control @error('password') is-invalid @enderror g-py-8 g-brd-gray-light-v3"
                                        required
                                        autocomplete="off"
                                        placeholder="رمز عبور خود را وارد کنید">
                                    <button style="border-radius: 0;" type="button" class="btn btn-outline-secondary g-brd-gray-light-v3 g-ml-5" id="togglePassword">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                </div>
                                @error('password')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- راهنمای رمز عبور --}}
                            <div id="passwordRules" class="mb-3 small text-muted">
                                <p class="mb-1 fw-bold">رمز عبور باید شامل موارد زیر باشد:</p>
                                <ul class="list-unstyled">
                                    <li id="rule-length" class="text-danger">حداقل 8 کاراکتر</li>
                                    <li id="rule-number" class="text-danger">حداقل یک عدد</li>
                                    <li id="rule-uppercase" class="text-danger">حداقل یک حرف بزرگ</li>
                                    <li id="rule-lowercase" class="text-danger">حداقل یک حرف کوچک</li>
                                    <li id="rule-special" class="text-danger">حداقل یک کاراکتر خاص (!@#$%^&*)</li>
                                </ul>
                                <div class="progress" style="height: 8px;">
                                    <div id="passwordStrength" class="progress-bar bg-danger" style="width: 0%;"></div>
                                </div>
                            </div>

                            {{-- تکرار رمز --}}
                            <div class="mb-3 position-relative">
                                <label for="password-confirm" class="form-label fw-bold h5">تکرار رمز عبور</label>
                                <div class="input-group">
                                    <input style="height: auto; border-radius: 0"
                                           type="password"
                                           id="password-confirm"
                                           name="password_confirmation"
                                           class="form-control g-py-8 g-brd-gray-light-v3"
                                           required
                                           autocomplete="off"
                                           placeholder="تکرار رمز عبور">
                                    <button type="button" class="btn btn-outline-secondary g-brd-gray-light-v3 g-ml-5" id="togglePasswordConfirm">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                </div>
                            </div>

                            {{-- دکمه ثبت --}}
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg" id="save">
                                    ثبت نام
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- اسکریپت بررسی رمز عبور --}}
    <script>
        const passwordInput = document.getElementById("password");
        const togglePassword = document.getElementById("togglePassword");
        const strengthBar = document.getElementById("passwordStrength");
        const passwordConfirmInput = document.getElementById("password-confirm");
        const togglePasswordConfirm = document.getElementById("togglePasswordConfirm");

        const rules = {
            length: document.getElementById("rule-length"),
            number: document.getElementById("rule-number"),
            uppercase: document.getElementById("rule-uppercase"),
            lowercase: document.getElementById("rule-lowercase"),
            special: document.getElementById("rule-special"),
        };

        passwordInput.addEventListener("input", function () {
            const val = passwordInput.value;
            let strength = 0;

            // قوانین
            if (val.length >= 8) { rules.length.classList.replace("text-danger", "text-success"); strength++; }
            else { rules.length.classList.replace("text-success", "text-danger"); }

            if (/[0-9]/.test(val)) { rules.number.classList.replace("text-danger", "text-success"); strength++; }
            else { rules.number.classList.replace("text-success", "text-danger"); }

            if (/[A-Z]/.test(val)) { rules.uppercase.classList.replace("text-danger", "text-success"); strength++; }
            else { rules.uppercase.classList.replace("text-success", "text-danger"); }

            if (/[a-z]/.test(val)) { rules.lowercase.classList.replace("text-danger", "text-success"); strength++; }
            else { rules.lowercase.classList.replace("text-success", "text-danger"); }

            if (/[\W_]/.test(val)) { rules.special.classList.replace("text-danger", "text-success"); strength++; }
            else { rules.special.classList.replace("text-success", "text-danger"); }

            // قدرت رمز
            const percent = (strength / 5) * 100;
            strengthBar.style.width = percent + "%";
            strengthBar.className = "progress-bar";
            if (percent < 40) strengthBar.classList.add("bg-danger");
            else if (percent < 80) strengthBar.classList.add("bg-warning");
            else strengthBar.classList.add("bg-success");
        });

        // نمایش/مخفی کردن رمز
        togglePassword.addEventListener("click", () => {
            const type = passwordInput.type === "password" ? "text" : "password";
            passwordInput.type = type;

            togglePassword.innerHTML = type === "password"
                ? '<i class="fa fa-eye"></i>'
                : '<i class="fa fa-eye-slash"></i>';
        });

        togglePasswordConfirm.addEventListener("click", () => {
            const type = passwordConfirmInput.type === "password" ? "text" : "password";
            passwordConfirmInput.type = type;

            togglePasswordConfirm.innerHTML =
                type === "password"
                    ? '<i class="fa fa-eye"></i>'
                    : '<i class="fa fa-eye-slash"></i>';
        });

    </script>
@endsection
