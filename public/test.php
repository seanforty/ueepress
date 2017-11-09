<?php
print_r($_FILES);
move_uploaded_file($_FILES["img"]["tmp_name"],"img/".$_FILES["img"]["name"]);
$img = $_FILES["img"];
$img_path = "img/".$img["name"];
echo zoomInPic($img,$img_path);

//生成图片缩略图  
function zoomInPic($img,$img_path,$width=100,$height=100)
{
    switch($img["type"])  
    {
        case 'image/jpeg':
            $src = @imagecreatefromjpeg($img_path);
            break;
        case 'image/gif':
            $src = @imagecreatefromgif($img_path);
            break;
        case 'image/png':
            $src = @imagecreatefrompng($img_path);
            break;
        case 'image/wbmp':
            $src = @imagecreatefromwbmp($img_path);
        default:
            return false;
    }
    
    if(!$src){
        return false;
    }

    //获取上传图片的宽和高  
    $src_w = imagesx($src);  
    $src_h = imagesy($src);  
    //生成缩略图  
    //在属性里定义缩略图的宽和高，并将原图按照比例缩放  
    //缩放算法是: 新宽/原宽 = 新高/原高,这样就能等比例缩放了.....  
    if($src_w > $src_h) 
    { 
        $new_w = $width; 
        $new_h = ceil(($width/$src_w)*$src_h);
    }else{ 
        $new_h = $height; 
        $new_w = ceil(($height/$src_h)*$src_w);
    }

    $paint = imagecreatetruecolor($new_w, $new_h);  
    if(@imagecopyresampled($paint, $src, 0,0,0,0, $new_w, $new_h, $src_w, $src_h)){
        return false;
    }

    //在原图上保存缩略图
    $output = "";
    switch($img["type"])  
    {
        case 'image/jpeg':
            $output = imagejpeg($paint, $img_path.".100x100.jpg");
            break;
        case 'image/gif':
            $output = imagegif($paint,  $img_path.".100x100.jpg");
            break;
        case 'image/png':
            $output = imagepng($paint,  $img_path.".100x100.jpg");
            break;
        case 'image/wbmp':
            $output = imagewbmp($paint,  $img_path.".100x100.jpg");
            break;
    }
    //释放资源  
    imagedestroy($paint);
    return $output;
}

