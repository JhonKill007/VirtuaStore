<?php
switch($extencion){
    case "bmp":
        $img_origin = imagecreatefrombmp($ruta);
        break;
    case "gif":
        $img_origin = imagecreatefromgif($ruta);
        break;
    case "png":
        $img_origin = imagecreatefrompng($ruta);
        break;
    case "xbm":
        $img_origin = imagecreatefromxbm($ruta);
        break;
    case "jpeg":
        $img_origin = imagecreatefromjpeg($ruta);
        break;
    case "jpg":
        $img_origin = imagecreatefromjpeg($ruta);
        break;
    case "webp":
        $img_origin = imagecreatefromwebp($ruta);
        break;

}
