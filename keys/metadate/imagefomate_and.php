<?php
switch($extencion){
    case "bmp":
        imagebmp($img_destino, $ruta);
        break;
    case "gif":
        imagegif($img_destino, $ruta);
        break;
    case "png":
        imagepng($img_destino, $ruta);
        break;
    case "xbm":
        imagexbm($img_destino, $ruta);
        break;
    case "jpeg":
        imagejpeg($img_destino, $ruta);
        break;
    case "jpg":
        imagejpeg($img_destino, $ruta);
        break;
    case "webp":
        imagewebp($img_destino, $ruta);
        break;

}
