// back-guard.js  (یا کپی در انتهای صفحه)
(function () {
    // تنظیمات
    const PUSH_COUNT = 50; // تعداد state که به history اضافه می‌کنیم (می‌تونی 20..100 تنظیم کنی)
    const STATE_KEY = 'noBackGuard'; // شناسه برای stateهای ما

    // 1) اضافه کردن چند state به history برای "پر کردن" عقب
    try {
        // فقط اگر history API موجود باشه
        if (history && history.pushState) {
            for (let i = 0; i < PUSH_COUNT; i++) {
                // استفاده از یک شیء مشخص برای شناسایی stateهای ما
                history.pushState({ [STATE_KEY]: true, idx: i }, "", location.href);
            }
        }
    } catch (err) {
        // اگر مرورگر اجازه نداد، از فیلتر عبور کن
        console.warn('back-guard: pushState failed', err);
    }

    // 2) وقتی popstate رخ داد — فوراً state را برگردان (جلوگیری از عقب رفتن)
    window.addEventListener('popstate', function (e) {
        // اگر state ما بود یا حتی اگر نبود — همیشه مجدد pushState کن
        // (این تضمین می‌کند که pointer تاریخچه همیشه در انتها بماند)
        try {
            // یک pushState فوری انجام بده تا user نتونه عقب بره
            history.pushState({ [STATE_KEY]: true }, "", location.href);
        } catch (err) {
            // ignore
        }
    }, { passive: true });

    // 3) جلوگیری از تغییر hash که ممکنه history حرکت بده
    window.addEventListener('hashchange', function (e) {
        try {
            // برگردون hash به همان مقدار فعلی (در عمل نادیده بگیر)
            location.hash = '';
        } catch (err) {}
    });

    // 4) جلوگیری از میانبرهای صفحه‌کلید برای بازگشت
    window.addEventListener('keydown', function (e) {
        // مواردی که می‌خواهیم مسدود کنیم:
        // - Backspace (وقتی فوکوس در input نیست)
        // - Alt + ArrowLeft (Windows)
        // - Meta(Cmd) + ArrowLeft (Mac)
        // - Alt + ArrowRight / Meta + ArrowRight ممکنه برای forward باشند (می‌تونیم اجازه بدیم یا مسدود کنیم)
        try {
            const tag = (e.target && e.target.tagName) ? e.target.tagName.toLowerCase() : null;
            const isEditable = e.target && (e.target.isContentEditable || tag === 'input' || tag === 'textarea' || e.target.closest && e.target.closest('[contenteditable="true"]'));

            // Backspace
            if (e.key === 'Backspace' && !isEditable) {
                e.preventDefault();
                e.stopPropagation();
                return;
            }

            // Alt + ArrowLeft  OR Meta + ArrowLeft
            if ((e.altKey && e.key === 'ArrowLeft') || (e.metaKey && e.key === 'ArrowLeft') || (e.ctrlKey && e.key === 'ArrowLeft')) {
                e.preventDefault();
                e.stopPropagation();
                return;
            }
        } catch (err) {}
    }, { passive: false });

    // 5) امن‌سازی دکمه‌های مربوطه در صفحه: addProduct و backButton و sellerMenu
    function safeQuery(id) {
        try { return document.getElementById(id); } catch (e) { return null; }
    }

    const addProductBtn = safeQuery('addProduct');
    const backButton = safeQuery('backButton');
    const sellerMenu = safeQuery('sellerMenu');

    if (addProductBtn) {
        addProductBtn.addEventListener('click', function (ev) {
            ev.preventDefault();
            ev.stopPropagation();
            // باز کردن منوی همبرگری با click (یا dispatchEvent اگر لازم است)
            if (sellerMenu) {
                try { sellerMenu.click(); } catch (err) { sellerMenu.dispatchEvent(new Event('click', { bubbles: true })); }
            }
        });
    }

    // backButton اختصاصی: حتماً از referrer استفاده کن (مستقیم آدرس بده)
    if (backButton) {
        backButton.addEventListener('click', function (ev) {
            ev.preventDefault();
            ev.stopPropagation();
            // رفتن به رفرِر واقعی — این کار از دست ما خارج نیست و تاریخچه را نمی‌شکند
            const ref = document.referrer;
            if (ref && ref !== '') {
                window.location.href = ref;
            } else {
                // fallback منطقی
                window.location.href = '/';
            }
        });
    }

    // 6) محافظت در مقابل gestureهای موبایل (touch back)
    // بعضی مرورگرها gestureها را با popstate پوشش می‌دهند — ما قبلاً popstate را کنترل کردیم.
    // در iOS/Safari ممکنه gesture خیلی قوی باشه؛ با PUSH_COUNT بزرگ (مثلاً 50) کاربر باید چندین بار gesture بده تا رد بشود.

    // 7) لاگ debug اختیاری — هنگام توسعه می‌تونی روشنش کنی
    // console.log('back-guard initialized. PUSH_COUNT=', PUSH_COUNT);

})();
