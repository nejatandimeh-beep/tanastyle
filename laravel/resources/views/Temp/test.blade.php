let $modal = $('#modal'),
image = document.getElementById('sample_image'),
cropper, inputID, inputIdFinshed = [], counter = 0, file_upload, file_type,
folderName = createFolderName(),
uploadUrl = (window.location.pathname.includes('/Add-Product-Upload')) ? '/Add-Product-Upload-Image' : '/Add-Other-Product-Upload-Image';

// مقدار پوشه
$('#folderName2').val(folderName);

// انتخاب فایل
$('input[id^="pic"]').on('mousedown', function () {
$(this).val(null);
});

$('input[id^="pic"]').on('change', function (event) {
inputID = $(this).attr('id').replace(/[^0-9]/gi, '');
$('#fileShow' + inputID).removeClass('g-color-red');

let files = event.target.files,
done = function (url) {
image.src = url;
$modal.modal('show');
};

if (files && files.length > 0) {
let reader = new FileReader();
reader.onload = function () {
done(reader.result);
};
reader.readAsDataURL(files[0]);
file_type = files[0].type;
}
});

// وقتی مودال باز شد
$modal.on('shown.bs.modal', function () {
cropper = new Cropper(image, {
aspectRatio: 4 / 5,
viewMode: 1,
responsive: true,
autoCropArea: 1,
zoomable: true,
movable: true,
cropBoxResizable: false,
cropBoxMovable: false,
dragMode: 'move'
});
$(document.body).addClass('me-position-fix');
$(document.body).removeClass('me-position-normally');
});

// وقتی مودال بسته شد
$modal.on('hidden.bs.modal', function () {
cropper.destroy();
cropper = null;
document.getElementById("img-file-label" + inputID).scrollIntoView();
});

// ابزارهای کنترل
$('#zoomIn').on('click', () => cropper.zoom(0.1));
$('#zoomOut').on('click', () => cropper.zoom(-0.1));
$('#rotateLeft').on('click', () => cropper.rotate(-90));
$('#rotateRight').on('click', () => cropper.rotate(90));
$('#reset').on('click', () => cropper.reset());

// برش و آپلود
$('#crop').on('click', function () {
let canvas = cropper.getCroppedCanvas({
width: 1080,
height: 1350
});

canvas.toBlob(function (blob) {
let url = URL.createObjectURL(blob),
reader = new FileReader();
reader.readAsDataURL(blob);
reader.onloadend = function () {
$modal.modal('hide');

let type = file_type.split('/'),
form = new FormData();
file_upload = new File([blob], "pic." + type[1]);
form.append('imageUrl', file_upload);
form.append('imgNumber', inputID);
form.append('folderName', folderName);

$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
}
});

$.ajax({
url: uploadUrl,
data: form,
processData: false,
contentType: false,
type: 'POST',
beforeSend: function () {
$('#fileShow' + inputID).addClass('d-none');
$('#uploadingIcon' + inputID).removeClass('d-none');
$('#uploadingText' + inputID).removeClass('d-none d-inline-block').addClass('d-inline-block');
$('#errorIcon' + inputID).addClass('d-none');
$('#errorText' + inputID).addClass('d-none');
$('#check' + inputID).addClass('d-none');
},
success: function (data) {
inputIdFinshed[counter] = data;
counter++;
},
error: function () {
$('#uploadingIcon' + inputID).addClass('d-none');
$('#uploadingText' + inputID).addClass('d-none').removeClass('d-inline-block');
$('#errorIcon' + inputID).removeClass('d-none');
$('#errorText' + inputID).removeClass('d-none');
},
}).done(function () {
for (let i = 0; i < inputIdFinshed.length; i++) {
$('#uploadingIcon' + inputIdFinshed[i]).addClass('d-none');
$('#img-file-label' + inputIdFinshed[i]).removeClass('g-color-red');
addPathCheckMark('pic' + inputIdFinshed[i], 'fileShow' + inputIdFinshed[i], 'check' + inputIdFinshed[i]);
$('#uploadingText' + inputIdFinshed[i]).addClass('d-none').removeClass('d-inline-block');
$('#fileShow' + inputIdFinshed[i]).removeClass('d-none');
}
});
};
});
});


$(document.body).addClass('me-position-normally');
$(document.body).removeClass('me-position-fix');
