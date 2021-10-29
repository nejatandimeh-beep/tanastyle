<!DOCTYPE html>
<html lang="en">
<head>
    <title>Classic Header. Megamenu 5 column | Unify - Responsive Website Template</title>

    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- favicon -->
    <link rel="shortcut icon" href="../../../favicon.ico">

    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700">

    <!-- CSS Global Compulsory -->
    <link rel="stylesheet" href="../../../assets/vendor/bootstrap/bootstrap.min.css">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="../../../assets/vendor/icon-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../../assets/vendor/icon-line-pro/style.css">
    <link rel="stylesheet" href="../../../assets/vendor/icon-hs/style.css">

    <link rel="stylesheet" href="../../../assets/vendor/hamburgers/hamburgers.min.css">

    <link rel="stylesheet" href="../../../assets/vendor/slick-carousel/slick/slick.css">
    <link rel="stylesheet" href="../../../assets/vendor/dzsparallaxer/dzsparallaxer.css">
    <link rel="stylesheet" href="../../../assets/vendor/dzsparallaxer/dzsscroller/scroller.css">
    <link rel="stylesheet" href="../../../assets/vendor/dzsparallaxer/advancedscroller/plugin.css">
    <link rel="stylesheet" href="../../../assets/vendor/fancybox/jquery.fancybox.css">
    <link rel="stylesheet" href="../../../assets/vendor/animate.css">
    <link rel="stylesheet" href="../../../assets/vendor/hs-megamenu/src/hs.megamenu.css">

    <!-- CSS Unify -->
    <link rel="stylesheet" href="../../../assets/css/unify.css">

    <!-- CSS Customization -->
    <link rel="stylesheet" href="../../../assets/css/custom.css">
</head>

<body>
    <label class="customerCropper" for="upload_image" style="cursor: pointer">
        <span class="customLink">تنظیم تصویر حساب کاربری</span>
        <input type="file" name="image" id="upload_image" class="image"
               style="display: none">
        <input type="text" id="imageUrl" name="imageUrl"
               style="display: none">
    </label>
<form action="file-echo2.php" method="post" enctype="multipart/form-data">
    <input type="file" name="myfile"><br>
    <input type="submit" value="Upload File to Server">
</form>
<div class="progress">
    <div class="bar"></div >
    <div class="percent">0%</div >
</div>

<!-- JS Global Compulsory -->
<script src="../../../assets/vendor/jquery/jquery.min.js"></script>
<script src="../../../assets/vendor/jquery-migrate/jquery-migrate.min.js"></script>
<script src="../../../assets/vendor/tether.min.js"></script>
<script src="../../../assets/vendor/bootstrap/bootstrap.min.js"></script>

<!-- JS Implementing Plugins -->
<script src="../../../assets/vendor/masonry/dist/masonry.pkgd.min.js"></script>
<script src="../../../assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
<script src="../../../assets/vendor/slick-carousel/slick/slick.js"></script>
<script src="../../../assets/vendor/fancybox/jquery.fancybox.min.js"></script>
<script src="../../../assets/vendor/dzsparallaxer/dzsparallaxer.js"></script>
<script src="../../../assets/vendor/dzsparallaxer/dzsscroller/scroller.js"></script>
<script src="../../../assets/vendor/dzsparallaxer/advancedscroller/plugin.js"></script>
<script src="../../../assets/vendor/hs-megamenu/src/hs.megamenu.js"></script>

<!-- JS Unify -->
<script src="../../../assets/js/hs.core.js"></script>
<script src="../../../assets/js/components/hs.header.js"></script>
<script src="../../../assets/js/helpers/hs.hamburgers.js"></script>
<script src="../../../assets/js/components/hs.popup.js"></script>
<script src="../../../assets/js/components/hs.carousel.js"></script>

<!-- JS Custom -->
<script src="../../../assets/js/custom.js"></script>

<!-- JS Plugins Init. -->
<script>
    $(function() {

        var bar = $('.bar');
        var percent = $('.percent');
        var status = $('#status');

        $('form').ajaxForm({
            beforeSend: function() {
                status.empty();
                var percentVal = '0%';
                bar.width(percentVal);
                percent.html(percentVal);
            },
            uploadProgress: function(event, position, total, percentComplete) {
                var percentVal = percentComplete + '%';
                bar.width(percentVal);
                percent.html(percentVal);
            },
            complete: function(xhr) {
                status.html(xhr.responseText);
            }
        });
    });
</script>
</body>
</html>
