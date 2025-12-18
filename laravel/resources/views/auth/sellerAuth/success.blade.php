@include('Layouts.BaseCssLink')
@include('Layouts.CustomerNavigation')
@include('Layouts.CustomerFooter')
@include('Layouts.BaseJsLink')
@include('Layouts.BaseJsFunction')
@include('Layouts.CustomerJsFunctions')

@yield('BaseCssLink')
</head>
@yield('CustomerNavigation')
<div class="container g-my-40">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <h5 class="card-header text-right">ثبت نام در سامانه فروش</h5>

                <svg id="checkMark" class="checkmark"
                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                    <circle class="checkmark__circle" cx="26" cy="26" r="25"
                            fill="none"/>
                    <path class="checkmark__check" fill="none"
                          d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
                </svg>

                <div style="direction: rtl;" class="g-mb-60">
                    <h3 class="g-color-primary text-center">با تشکر از ثبت نام شما در سامانه فروش میوان</h3>
                    <h6 class="text-center">درخواست شما در صف بررسی قرار گرفت. در صورت تایید اطلاعات، نتیجه را
                        از طریق پیامک اطلاع رسانی خواهیم نمود.</h6>
                </div>
            </div>
        </div>
    </div>
</div>
@yield('CustomerFooter')
@yield('BaseJsLinks')
</body>
<script>
    function showLoader() {
        const loader = document.getElementById('global-loader');
        if (loader) loader.style.display = 'flex';
    }

    function hideLoader() {
        const loader = document.getElementById('global-loader');
        if (loader) {
            loader.style.opacity = "0";
            setTimeout(() => loader.style.display = 'none', 100);
        }
    }

    // --- 1) بستن Loader بعد از load یا حداکثر 6 ثانیه ---
    window.addEventListener("load", () => hideLoader());
    setTimeout(hideLoader, 6000);

    // --- 2) مدیریت Loader روی درخواست‌ها ---
    (function () {
        let activeRequests = 0;
        const originalFetch = window.fetch;

        window.fetch = async function (...args) {
            if (activeRequests === 0) showLoader();
            activeRequests++;

            try {
                const response = await originalFetch.apply(this, args);
                return response;
            } catch (err) {
                throw err;
            } finally {
                activeRequests--;
                if (activeRequests <= 0) hideLoader();
            }
        };
    })();

    document.getElementById('backButton').addEventListener('click', function () {
        if (document.referrer) {
            window.history.back();
        } else {
            window.location.href = '/';
        }
    });
</script>
@yield('BaseJsFunction')
