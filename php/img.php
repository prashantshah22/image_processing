<?php
$width=$_POST['width'];
$height=$_POST['height'];
$format=$_POST['format'];
$r=$_POST['red'];
$b=$_POST['blue'];
$g=$_POST['green'];

$raw=imagecreate($width,$height);
imagecolorallocate($raw,$r,$g,$b);
$ran=rand(1,5000000000);

if(imagejpeg($raw,"../img/".$ran.".".$format)){
    echo $ran.".".$format;
}
imagedestroy($raw);

?>
