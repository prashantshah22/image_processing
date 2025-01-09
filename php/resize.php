<?php
$width=$_POST['resize_width'];
$height=$_POST['resize_height'];
$file=$_FILES['file'];
$upload_image=$file['tmp_name'];
$type=$file['type'];
$rand=rand(1,99999999999999);
switch ($type) {
    case 'image/jpeg':
        $image = imagecreatefromjpeg($upload_image);
        $o_width=imagesx($image);
        $o_height=imagesy($image);
        $canvas=imagecreatetruecolor($width,$height);
        imagecopyresampled($canvas,$image,0,0,0,0,$width,$height,$o_width,$o_height);
        if(imagejpeg($canvas,"../img/".$rand.".jpeg")){
            echo $rand.".jpeg";
        }
        imagedestroy($image);
        break;
    case 'image/png':
        $image = imagecreatefrompng($upload_image);
        $o_width=imagesx($image);
        $o_height=imagesy($image);
        $canvas=imagecreatetruecolor($width,$height);
        imagecopyresampled($canvas,$image,0,0,0,0,$width,$height,$o_width,$o_height);
        if(imagepng($canvas,"../img/".$rand.".png")){
            echo $rand.".png";
        }
        imagedestroy($image);
        break;
    case 'image/gif':
        $image = imagecreatefromgif($upload_image);
        $o_width=imagesx($image);
        $o_height=imagesy($image);
        $canvas=imagecreatetruecolor($width,$height);
        imagecopyresampled($canvas,$image,0,0,0,0,$width,$height,$o_width,$o_height);
        if(imagegif($canvas,"../img/".$rand.".gif")){
            echo $rand.".gif";
        }
        imagedestroy($image);
        break;
        case 'image/bmp':
            $image = imagecreatefrombmp($upload_image);
            $o_width=imagesx($image);
            $o_height=imagesy($image);
            $canvas=imagecreatetruecolor($width,$height);
            imagecopyresampled($canvas,$image,0,0,0,0,$width,$height,$o_width,$o_height);
            if(imagebmp($canvas,"../img/".$rand.".bmp")){
                echo $rand.".bmp";
            }
            imagedestroy($image);
            break;
            case 'image/webp':
                $image = imagecreatefromwebp($upload_image);
                $o_width=imagesx($image);
                $o_height=imagesy($image);
                $canvas=imagecreatetruecolor($width,$height);
                imagecopyresampled($canvas,$image,0,0,0,0,$width,$height,$o_width,$o_height);
                if(imagewebp($canvas,"../img/".$rand.".webp")){
                    echo $rand.".webp";
                }
                imagedestroy($image);
                break;
    default:
        echo "Unsupported image type.";
        exit;
}
?>
