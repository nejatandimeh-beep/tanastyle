const CACHE_NAME = "mevan-cache-v1";

// فایل‌های استاتیک برای کش (می‌توانید فایل‌های CSS/JS/IMG خود را اضافه کنید)
const URLS_TO_CACHE = [
    "/",
];

// --- نصب SW ---
self.addEventListener("install", event => {
    event.waitUntil(
        caches.open(CACHE_NAME).then(cache => cache.addAll(URLS_TO_CACHE))
    );
    self.skipWaiting(); // جایگزینی فوری SW جدید
});

// --- فعال‌سازی SW ---
self.addEventListener("activate", event => {
    event.waitUntil(
        caches.keys().then(keys =>
            Promise.all(
                keys.map(key => {
                    if (key !== CACHE_NAME) return caches.delete(key);
                })
            )
        )
    );
    clients.claim(); // همه تب‌ها فوراً SW جدید را استفاده کنند
});

// --- مدیریت درخواست‌ها ---
self.addEventListener("fetch", event => {
    const url = event.request.url;

    // مسیرهایی که نباید کش شوند
    const noCacheUrls = [
        "/request-customer-mobile/register",
        "/Login-Mode",
        "/check-customer-mobile",
        "/verify-customer-mobile",
        "/reset-password",
        "/request-customer-mobile/",
        "/verify"
    ];

    if (noCacheUrls.some(path => url.includes(path))) {
        // مستقیم از شبکه پاسخ بده، کش نکن
        event.respondWith(fetch(event.request));
        return;
    }

    // بقیه درخواست‌ها → cache first, then network
    event.respondWith(
        caches.match(event.request).then(response => {
            return (
                response ||
                fetch(event.request).then(fetchResponse => {
                    return caches.open(CACHE_NAME).then(cache => {
                        cache.put(event.request, fetchResponse.clone());
                        return fetchResponse;
                    });
                })
            );
        })
    );
});
