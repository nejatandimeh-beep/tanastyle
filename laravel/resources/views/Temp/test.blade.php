<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Upload HEIC</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        #preview { max-width: 400px; margin-top: 20px; display:block; }
        #uploadBtn { margin-top: 10px; padding:5px 15px; }
    </style>
</head>
<body>

<h2>آپلود و کراپ HEIC</h2>
<input type="file" id="fileInput" accept="image/*">
<img id="preview" alt="پیش‌نمایش">

<button id="uploadBtn">ارسال</button>

<script>
    let cropper;
    let fileToUpload;

    document.getElementById('fileInput').addEventListener('change', async function(e){
        const file = e.target.files[0];
        if (!file) return;

        fileToUpload = file;

        // تبدیل HEIC به JPG در مرورگر
        if(file.type === "image/heic" || file.name.toLowerCase().endsWith(".heic")){
            try {
                const convertedBlob = await window.heic2any({
                    blob: file,
                    toType: "image/jpeg",
                    quality: 0.9
                });
                fileToUpload = new File([convertedBlob], file.name.replace(/\.heic$/i, ".jpg"), { type: "image/jpeg" });
            } catch(err){
                console.error("خطا در تبدیل HEIC:", err);
                alert("خطا در تبدیل HEIC به JPG");
                return;
            }
        }

        const url = URL.createObjectURL(fileToUpload);
        const preview = document.getElementById('preview');
        preview.src = url;

        if(cropper) cropper.destroy();
        cropper = new window.Cropper(preview, { aspectRatio: 1, viewMode: 1 });
    });

    document.getElementById('uploadBtn').addEventListener('click', async function(){
        if(!fileToUpload) return alert("ابتدا یک تصویر انتخاب کنید!");

        const canvas = cropper.getCroppedCanvas();
        canvas.toBlob(async function(blob){
            const formData = new FormData();
            const croppedFile = new File([blob], fileToUpload.name, { type: 'image/jpeg' });
            formData.append('file', croppedFile);

            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            formData.append('_token', token);

            try {
                const res = await fetch("{{ route('upload') }}", {
                    method: 'POST',
                    body: formData
                });
                const data = await res.json();
                alert("آپلود موفق! مسیر فایل: " + data.path);
            } catch(err){
                console.error(err);
                alert("خطا در آپلود فایل!");
            }
        }, 'image/jpeg');
    });
</script>

</body>
</html>
