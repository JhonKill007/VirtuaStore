<?php

$email = $_POST['email'];

session_start();
if (isset($_SESSION['ID_ADMIN'])) {

    if (!empty($email)) {
        $eso =  require('conection.php');
        if ($eso) {
            $SELECT = "SELECT * from registro where email='$email'";
            $resultado = mysqli_query($conn, $SELECT);

            if ($resultado->num_rows == 1) {
                $identity = $resultado->fetch_array();
                $id_identity = $identity['id_registro'];
                $name_identity = $identity['nombre'];
                $email_identity = $identity['email'];
                $lettle_type = "Google Sans";

                $asunto = "Order Sent";
                $mensaje = "<!DOCTYPE html>
            <html lang='es'>
            
            <head>
                <meta charset='UTF-8'>
                <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Order sent</title>
            </head>
            
            <body>
                <div style='border-style:solid;border-width:thin;border-color:#dadce0;border-radius:8px;padding:40px 20px;color:rgba(225,225,225,225);background-color: rgba(0,0,0,0.87);' align='center'>
                    <img style='width: 74px;height: 74px;margin: auto;' src='https://freefiree.es/assets/images/logo.png' alt='Aycoro'>
                    <div style='font-family:" . $lettle_type . ",Roboto,RobotoDraft,Helvetica,Arial,sans-serif;border-bottom:thin solid #dadce0;color:#ffffff;line-height:32px;padding-bottom:24px;text-align:center;word-break:break-word'>
                        <div style='font-size:24px;'>" . $name_identity . "</div>
                    </div>
                    <div style='font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:14px;color:#ffffff;line-height:20px;padding-top:20px;text-align:center'>
                        Hello, Thank you for your purchase, your order has already been sent to the address you chose as determined.
                    </div>
                </div>
            </body>
            
            </html>";


                $header = "From: Pretty Perfect Collection <no-reply@prettyperfectcollection.com>" . "\r\n";
                $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $header .= "Reply-To: NoReplay@prettyperfectcollection.com" . "\r\n";
                $header .= "X-Mailer: PHP/" . phpversion();
                $mail = mail($email_identity, $asunto, $mensaje, $header);
                if ($mail == 1) {
                    echo "<script>
                alert('Email enviado');
                window.location='../pending';
                </script>";
                } else {
                    echo "<script>
                alert('No se pudo enviar el Email');
                window.location='../pending';
                </script>";
                }
            } else {
                echo "<script>
                alert('El Email ingresado no coincide con ninguna cuenta');
                window.location='../pending';
                </script>";
            }
        } else {
            echo "<script>
                alert('Fallo la coneccion');
                window.location='../pending';
                </script>";
        }
    } else {
        echo "<script>
                alert('Debes introducir un correo valido');
                window.location='../pending';
                </script>";
    }
} else {
    header("Location:../login");
}
