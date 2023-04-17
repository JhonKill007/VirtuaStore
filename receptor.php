<?php


session_start();
if (isset($_SESSION['id'])) {
    $Iduser = $_SESSION['id'];
}else{
    function getMACAddress()
    {
        $output = exec('getmac');
        $matches = array();
        $pattern = '/([0-9A-Fa-f]{2}[:-]){5}([0-9A-Fa-f]{2})/';
        if (preg_match_all($pattern, $output, $matches)) {
            return $matches[0][0];
        }
        return null;
    }
    $ResultIp = getMACAddress();
    $IpGuest = str_replace('-', '', $ResultIp);
    $Iduser=$IpGuest;
}

// Para cambiar al entorno de producción usar: www.paypal.com
$paypal_hostname = 'www.sandbox.paypal.com';

// El token lo obtenemos en las opciones de nuestra cuenta Paypal cuando activamos PDT
$pdt_identity_token = 'iB3_UdBEssuQjpqLkcr1j_c-uC_BfNbLDcpGEBTsOiQbrw6JBPU0rJ0aSIu';

$tx = $_GET['tx'];

$query = "cmd=_notify-synch&tx=$tx&at=$pdt_identity_token";

$request = curl_init();
// Establecemos las opciones necesarias para realizar la solicitud a paypal
curl_setopt($request, CURLOPT_URL, "https://$paypal_hostname/cgi-bin/webscr");
curl_setopt($request, CURLOPT_POST, TRUE);
curl_setopt($request, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($request, CURLOPT_POSTFIELDS, $query);

// Opciones recomendadas especialmente en entornos de producción
curl_setopt($request, CURLOPT_SSL_VERIFYPEER, TRUE);
// Si tu servidor no incluye los certificados verisign predeterminados debes establecer
// la ruta del certificado verisign cacert.pem, lo puedes descargar en: https://curl.se/docs/caextract.html
//curl_setopt($request, CURLOPT_CAINFO, __DIR__ . '\cacert.pem');
curl_setopt($request, CURLOPT_SSL_VERIFYHOST, 2);
curl_setopt($request, CURLOPT_HTTPHEADER, array("Host: $paypal_hostname"));

// Ejecutamos la solicitud
$response = curl_exec($request);
curl_close($request);

if (!$response) {
    //HTTP ERROR
    echo "Error";
    return;
}

// Dividimos $response por líneas
$lines = explode("\n", trim($response));
$keyarray = array();

// Validamos la respuesta
if (strcmp($lines[0], "SUCCESS") == 0) {
    for ($i = 1; $i < count($lines); $i++) {
        $temp = explode("=", $lines[$i], 2);
        $keyarray[urldecode($temp[0])] = urldecode($temp[1]);
    }

    // Verificamos que el estado de pago esté Completado
    // Comprobamos que txn_id no ha sido procesado previamente
    // Verificamos que el importe de pago y la moneda de pago sean correctos

    // En el siguiente enlace puedes encontrar una lista completa de Variables IPN y PDT.
    // https://developer.paypal.com/docs/api-basics/notifications/ipn/IPNandPDTVariables/



    $mc_gross = $keyarray['mc_gross'];
    $payment_status = $keyarray['payment_status'];
    $quantity = $keyarray['quantity'];
    $item_name = $keyarray['item_name'];

    $payer_id = $keyarray['payer_id'];

    $tax = $keyarray['tax'];
    $payment_date = $keyarray['payment_date'];
    $mc_fee = $keyarray['mc_fee'];
    $payer_email = $keyarray['payer_email'];
    $txn_id = $keyarray['txn_id'];
    $mc_currency = $keyarray['mc_currency'];
    $shipping = $keyarray['shipping'];


    require("keys/conection.php");
    if ($conn) {
        $INSERT = " INSERT INTO paypalreturn
        (
        monto,
        currency,
        payer_id,
        payment_date,
        fee,
        payer_email,
        transaccion_id,
        shipping_cost,
        payment_status,
        id_user)
        VALUES($mc_gross,'$mc_currency','$payer_id','$payment_date',$mc_fee,'$payer_email','$txn_id',$shipping,'$payment_status','$Iduser')";

        $resultado = mysqli_query($conn, $INSERT);
    } else {
        echo "la connecion fallo";
    }


    if ($payment_status == "Completed") {

        require("keys/conection.php");
        if (isset($_SESSION['id'])) {
            if ($conn) {
                $SelectCar = "SELECT* FROM car where user_id= $Iduser and comprado=0";
                $resultado = mysqli_query($conn, $SelectCar);

                if ($resultado) {
                    while ($com = $resultado->fetch_array()) {
                        $productoId = $com['producto_id'];
                        $size = $com['size'];
                        $color = $com['color'];
                        $cantidadS = $com['cantidadSelected'];
                        $idCar = $com['id_car'];


                        $insertToVentas = "INSERT INTO ventas (user_id, producto_id, createdate,size,color,cantidadSelected,enviado,fecha_comprado)values($Iduser,$productoId,NOW(),'$size','$color',$cantidadS,0,now())";
                        $resultado2 = mysqli_query($conn, $insertToVentas);
                        if ($resultado2) {


                            $selectProducto = "SELECT cantidad from productos  where id_producto= $productoId";
                            $cantidad = mysqli_query($conn, $selectProducto);
                            $cantidadV = $cantidad->fetch_array();
                            $cantidavenidadelabd = $cantidadV['cantidad'];

                            if ($cantidad) {
                                $nuevoStock = $cantidavenidadelabd - $cantidadS;
                                $updateProduct = "UPDATE productos set cantidad =$nuevoStock where id_producto= $productoId";
                                $resultUpdate = mysqli_query($conn, $updateProduct);
                                if ($resultUpdate) {


                                    $deleteFromCar = "UPDATE car set comprado =1 where id_car= $idCar";
                                    $resultDelete = mysqli_query($conn, $deleteFromCar);
                                    if ($resultDelete) {
                                    }
                                }
                            }
                        }
                    }
                }
            }
        } else {
            if (isset($_COOKIE['producto'])) {
                foreach ($_COOKIE['producto'] as $name => $value) {
                    $name = htmlspecialchars($name);
                    $value = htmlspecialchars($value);

                    $variable = explode("|", $value);
                   


                    $insertToVentas = "INSERT INTO ventas (user_id, producto_id, createdate,size,color,cantidadSelected,enviado,fecha_comprado)values('$Iduser',$variable[0],NOW(),'$variable[2]','$variable[3]',$variable[1],0,now())";
                    $resultado2 = mysqli_query($conn, $insertToVentas);
                    if ($resultado2) {


                        $selectProducto = "SELECT cantidad from productos  where id_producto=$variable[0] ";
                        $cantidad = mysqli_query($conn, $selectProducto);
                        $cantidadV = $cantidad->fetch_array();
                        $cantidavenidadelabd = $cantidadV['cantidad'];

                        if ($cantidad) {
                            $nuevoStock = $cantidavenidadelabd - $variable[1];
                            $updateProduct = "UPDATE productos set cantidad =$nuevoStock where id_producto=$variable[0]";
                            $resultUpdate = mysqli_query($conn, $updateProduct);
                            if ($resultUpdate) {
                            }
                        }
                    }
                    setcookie("producto[".$name."]","",time()-1,);
                }
                

            }
        }
        header("Location: car?rtn=processed");
    } else {
        echo "<h1>¡El pago no fue completado</h1>";
    }


    return;
} else if (strcmp($lines[0], "FAIL") == 0) {
    // Registramos datos para realizar una investigación
    echo "FAIL";
    return;
}
