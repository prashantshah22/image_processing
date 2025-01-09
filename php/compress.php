<?php
$cmp_ratio=$_POST['c_ratio'];
$file=$_FILES['c_file'];
$upload_image=$file['tmp_name'];
$type=$file['type'];
$rand=rand(1,99999999999999);
switch ($type) {
    case 'image/jpeg':
        $image = imagecreatefromjpeg($upload_image);
        $o_width=imagesx($image);
        $o_height=imagesy($image);
        $canvas=imagecreatetruecolor($o_width,$o_height);
        imagecopyresampled($canvas,$image,0,0,0,0,$o_width,$o_height,$o_width,$o_height);
        if(imagejpeg($canvas,"../img/".$rand.".jpeg",$cmp_ratio)){
            echo $rand.".jpeg";
        }
        imagedestroy($image);
        break;
    case 'image/png':
        $image = imagecreatefrompng($upload_image);
        $o_width=imagesx($image);
        $o_height=imagesy($image);
        $canvas=imagecreatetruecolor($o_width,$o_height);
        imagecopyresampled($canvas,$image,0,0,0,0,$o_width,$o_height,$o_width,$o_height);
        if(imagepng($canvas,"../img/".$rand.".png",$cmp_ratio)){
            echo $rand.".png";
        }
        imagedestroy($image);
        break;
    case 'image/gif':
        $image = imagecreatefromgif($upload_image);
        $o_width=imagesx($image);
        $o_height=imagesy($image);
        $canvas=imagecreatetruecolor($o_width,$o_height);
        imagecopyresampled($canvas,$image,0,0,0,0,$o_width,$o_height,$o_width,$o_height);
        if(imagegif($canvas,"../img/".$rand.".gif",$cmp_ratio)){
            echo $rand.".gif";
        }
        imagedestroy($image);
        break;
        case 'image/bmp':
            $image = imagecreatefrombmp($upload_image);
            $o_width=imagesx($image);
            $o_height=imagesy($image);
            $canvas=imagecreatetruecolor($o_width,$o_height);
            imagecopyresampled($canvas,$image,0,0,0,0,$o_width,$o_height,$o_width,$o_height);
            if(imagebmp($canvas,"../img/".$rand.".bmp",$cmp_ratio)){
                echo $rand.".bmp";
            }
            imagedestroy($image);
            break;
            case 'image/webp':
                $image = imagecreatefromwebp($upload_image);
                $o_width=imagesx($image);
                $o_height=imagesy($image);
                $canvas=imagecreatetruecolor($o_width,$o_height);
                imagecopyresampled($canvas,$image,0,0,0,0,$o_width,$o_height,$o_width,$o_height);
                if(imagewebp($canvas,"../img/".$rand.".webp",$cmp_ratio)){
                    echo $rand.".webp";
                }
                imagedestroy($image);
                break;
    default:
        echo "Unsupported image type.";
        exit;
}
?>
