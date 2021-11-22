// Upload Images
$imgNumber = $request->get('imgNumber');
$image = $request->get('imageUrl'.$imgNumber);
$folderName = $request->get('folderName');
$path = 'img/imagesTemp/products/'  . $folderName;
File::makeDirectory($path, 0777, true, true);
// Get Size Qty For Loop Steps
$image_parts = explode(";base64,", $image);
$image_base64 = base64_decode($image_parts[1]);
$imageFullPath = $path . '/pic' . (int)($imgNumber+1) . '.jpg';
file_put_contents($imageFullPath, $image_base64);


list($width, $height) = getimagesize($image);
$newWidth = 250;
$newHeight = 250;
$thumb = imagecreatetruecolor($newWidth, $newHeight);
$source=imagecreatefrompng($image);
imagecopyresized($thumb, $source, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
imagepng($thumb,$path . '/sample' . (int)($imgNumber+1)  . '.png');
imagedestroy($thumb);
imagedestroy($source);
return $imgNumber;
