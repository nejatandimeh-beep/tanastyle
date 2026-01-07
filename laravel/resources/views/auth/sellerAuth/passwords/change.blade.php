@extends('Layouts.appSeller')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-6">
                <div class="card shadow-lg border-0 rounded-3">
                    <h5 class="card-header text-center g-bg-primary text-white py-3">
                        تغییر رمز عبور فروشنده
                    </h5>

                    <div class="card-body p-4" style="direction: rtl">

                        {{-- ارورها --}}
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger py-2">{{ $error }}</div>
                        @endforeach

                        <form method="POST" action="{{ route('changeSellerPassword') }}" novalidate>
                            @csrf

                            {{-- رمز عبور فعلی --}}
                            <div class="mb-3">
                                <label class="form-label fw-bold h6">رمز عبور فعلی</label>
                                <div style="direction: ltr;" class="input-group">
                                    <input type="password"
                                           id="current-password"
                                           name="current_password"
                                           class="form-control g-py-8 g-brd-gray-light-v3 text-left"
                                           autocomplete="off"
                                           required>
                                    <button type="button"
                                            class="btn btn-outline-secondary g-brd-gray-light-v3"
                                            id="toggleCurrentPassword">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                </div>
                            </div>

                            {{-- رمز عبور جدید --}}
                            <div class="mb-3">
                                <label class="form-label fw-bold h6">رمز عبور جدید</label>
                                <div style="direction: ltr;" class="input-group">
                                    <input type="password"
                                           id="password"
                                           name="password"
                                           class="form-control g-py-8 g-brd-gray-light-v3 text-left"
                                           autocomplete="off"
                                           required>
                                    <button type="button"
                                            class="btn btn-outline-secondary g-brd-gray-light-v3"
                                            id="togglePassword">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                </div>
                            </div>

                            {{-- قوانین رمز عبور --}}
                            <div id="passwordRules" class="mb-3 small text-muted">
                                <p class="mb-1 fw-bold">رمز عبور باید شامل موارد زیر باشد:</p>
                                <ul class="list-unstyled mb-2">
                                    <li id="rule-length" class="text-danger">حداقل 8 کاراکتر</li>
                                    <li id="rule-number" class="text-danger">حداقل یک عدد</li>
                                    <li id="rule-uppercase" class="text-danger">حداقل یک حرف بزرگ</li>
                                    <li id="rule-lowercase" class="text-danger">حداقل یک حرف کوچک</li>
                                    <li id="rule-special" class="text-danger">حداقل یک کاراکتر خاص (!@#$%^&*)</li>
                                </ul>

                                <div class="progress" style="height: 8px;">
                                    <div id="passwordStrength"
                                         class="progress-bar bg-danger"
                                         style="width: 0%;"></div>
                                </div>
                            </div>

                            {{-- تکرار رمز --}}
                            <div style="direction: ltr;" class="mb-4">
                                <label class="form-label fw-bold h6">تکرار رمز عبور</label>
                                <div class="input-group">
                                    <input type="password"
                                           id="password-confirm"
                                           name="password_confirmation"
                                           class="form-control g-py-8 g-brd-gray-light-v3 text-left"
                                           autocomplete="off"
                                           required>
                                    <button type="button"
                                            class="btn btn-outline-secondary g-brd-gray-light-v3"
                                            id="togglePasswordConfirm">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                </div>
                            </div>

                            {{-- دکمه --}}
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    اعمال تغییرات
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- اسکریپت‌ها (کاملاً ایزوله و امن) --}}
    <script>
        document.addEventListener("DOMContentLoaded", function () {

            const passwordInput = document.getElementById("password");
            const passwordConfirmInput = document.getElementById("password-confirm");

            const rules = {
                length: document.getElementById("rule-length"),
                number: document.getElementById("rule-number"),
                uppercase: document.getElementById("rule-uppercase"),
                lowercase: document.getElementById("rule-lowercase"),
                special: document.getElementById("rule-special"),
            };

            const strengthBar = document.getElementById("passwordStrength");

            passwordInput.addEventListener("input", function () {
                const val = passwordInput.value;
                let strength = 0;

                if (val.length >= 8) {
                    rules.length.classList.replace("text-danger", "text-success");
                    strength++;
                } else rules.length.classList.replace("text-success", "text-danger");

                if (/[0-9]/.test(val)) {
                    rules.number.classList.replace("text-danger", "text-success");
                    strength++;
                } else rules.number.classList.replace("text-success", "text-danger");

                if (/[A-Z]/.test(val)) {
                    rules.uppercase.classList.replace("text-danger", "text-success");
                    strength++;
                } else rules.uppercase.classList.replace("text-success", "text-danger");

                if (/[a-z]/.test(val)) {
                    rules.lowercase.classList.replace("text-danger", "text-success");
                    strength++;
                } else rules.lowercase.classList.replace("text-success", "text-danger");

                if (/[\W_]/.test(val)) {
                    rules.special.classList.replace("text-danger", "text-success");
                    strength++;
                } else rules.special.classList.replace("text-success", "text-danger");

                const percent = (strength / 5) * 100;
                strengthBar.style.width = percent + "%";
                strengthBar.className = "progress-bar";

                if (percent < 40) strengthBar.classList.add("bg-danger");
                else if (percent < 80) strengthBar.classList.add("bg-warning");
                else strengthBar.classList.add("bg-success");
            });

            function toggle(btnId, inputId) {
                const btn = document.getElementById(btnId);
                const input = document.getElementById(inputId);

                btn.addEventListener("click", function () {
                    const isPass = input.type === "password";
                    input.type = isPass ? "text" : "password";
                    btn.innerHTML = isPass
                        ? '<i class="fa fa-eye-slash"></i>'
                        : '<i class="fa fa-eye"></i>';
                });
            }

            toggle("toggleCurrentPassword", "current-password");
            toggle("togglePassword", "password");
            toggle("togglePasswordConfirm", "password-confirm");

        });
    </script>
@endsection
