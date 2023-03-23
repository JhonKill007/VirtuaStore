<?php

$clave  = 'Como usar las funciones para encriptar y desencriptar, Una cadena, muy, muy larga para mejorar la encriptacion';
$method = 'aes-256-cbc';

$iv1 = base64_decode("C9fBxl1EWtYTL1/M8jfstw==");





$encriptar = function ($valor) use ($method, $clave, $iv1) {
    return openssl_encrypt($valor, $method, $clave, false, $iv1);
};

$desencriptar = function ($valor) use ($method, $clave, $iv1) {
    $encrypted_data = base64_decode($valor);
    return openssl_decrypt($valor, $method, $clave, false, $iv1);
};

