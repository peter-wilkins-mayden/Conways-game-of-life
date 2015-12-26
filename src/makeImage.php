<?php
include_once "src/conway.php";
header ('Content-Type: image/png');
$im = @imagecreatetruecolor(120, 120)
or die('Cannot Initialize new GD image stream');
$color = imagecolorallocate($im, 233, 14, 91);

imagepng($im);
imagedestroy($im);
?>
