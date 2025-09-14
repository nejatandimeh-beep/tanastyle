const CACHE_NAME = "my-app-cache-v1";

// فایل‌هایی که می‌خوای کش بشن
const ASSETS = [
    "/",
];

// آدرس‌هایی که نباید کش بشن (session و APIها)
const noCachePaths = [
    "/login/seller",
    "/logout/seller",
    "/register/seller",
    "/register/seller-UploadImage",
    "/check-seller-mobile",
    "/verify-seller-mobile",
    "/login/seller",
    "/register/seller/accept",
    "/sendEmail",
    "/requestMobile",
    "/reset-seller-password",
    "/reset",
    "/Seller-Panel",
    "/Seller",
    "/request-customer-mobile",
    "/Login-Mode",
    "/check-customer-mobile",
    "reset-password",
    "/Customer-Product",
    "/Customer-Cart",
    "/login/admin",
    "/logout/admin",
    "/register/admin",
    "/login/admin",
    "/register/admin",
    "/change-admin-password",
    "/requestEmail",
    "/sendEmail",
    "/reset",
    "/login/seller-login-Mode",
    "/Seller-Register-Request",
    "/Seller-Delete-Request",
    "/Confirmation",
];

// نصب Service Worker → فایل‌های ثابت کش میشن
self.addEventListener("install", (event) => {
    self.skipWaiting(); // سریع فعال بشه
    event.waitUntil(
        caches.open(CACHE_NAME).then((cache) => {
            return cache.addAll(ASSETS);
        })
    );
});

// فعال‌سازی → کش قدیمی پاک بشه
self.addEventListener("activate", (event) => {
    clients.claim();
    event.waitUntil(
        caches.keys().then((keys) => {
            return Promise.all(
                keys.filter((key) => key !== CACHE_NAME)
                    .map((key) => caches.delete(key))
            );
        })
    );
});

// هندل درخواست‌ها
self.addEventListener("fetch", (event) => {
    const url = new URL(event.request.url);

    // 🔴 اگر مسیر جزو noCache بود → مستقیم از سرور
    if (noCachePaths.some(path => url.pathname.startsWith(path))) {
        event.respondWith(fetch(event.request));
        return;
    }

    // 🟢 برای فایل‌های استاتیک → network-first (اول شبکه، بعد کش)
    event.respondWith(
        fetch(event.request)
            .then((networkResponse) => {
                // فقط GET رو کش کن
                if (event.request.method === "GET") {
                    caches.open(CACHE_NAME).then((cache) => {
                        cache.put(event.request, networkResponse.clone());
                    });
                }
                return networkResponse;
            })
            .catch(() => {
                // اگه شبکه قطع بود → از کش برگردون
                return caches.match(event.request);
            })
    );
});
