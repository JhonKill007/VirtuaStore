<?php

$email = $_POST['email'];


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



            include "metadate/mcript.php";
            $dato = $email_identity;
            $date = time() + 86400;


            $dato_encriptado = $encriptar($dato);
            $date_encryp = $encriptar($date);



            $asunto = "Restablecer Contraseña";
            $mensaje = "<!DOCTYPE html>
            <html lang='es'>
            
            <head>
                <meta charset='UTF-8'>
                <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Restablecer contraseña</title>
            </head>
            
            <body>
                <div style='border-style:solid;border-width:thin;border-color:#dadce0;border-radius:8px;padding:40px 20px' align='center'>
                    <img style='width: 74px;height: 74px;margin: auto;' src='https://aycoro.com/img/Icon.jpg' alt='Aycoro'>
                    <div style='font-family:" . $lettle_type . ",Roboto,RobotoDraft,Helvetica,Arial,sans-serif;border-bottom:thin solid #dadce0;color:rgba(0,0,0,0.87);line-height:32px;padding-bottom:24px;text-align:center;word-break:break-word'>
                        <div style='font-size:24px;'>" . $name_identity . "</div>
                        <table align='center' style='margin-top:8px'>
                            <tbody>
                                <tr style='line-height:normal'>
                                    <td align='right' style='padding-right:8px'><img width='20' height='20' style='width:20px;height:20px;vertical-align:sub;border-radius:50%' src='https://aycoro.com/' alt=' class='CToWUd'></td>
                                    <td><a style='font-family:" . $lettle_type . ",Roboto,RobotoDraft,Helvetica,Arial,sans-serif;color:rgba(0,0,0,0.87);font-size:14px;line-height:20px'>" . $email_identity . "</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div style='font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:14px;color:rgba(0,0,0,0.87);line-height:20px;padding-top:20px;text-align:center'>Haz solicitado restablecer tu contraseña,
                        al parecer has perdido tu contraseña, te hemos enviado este correo para que puedas restablecerla. Si no has sido tú, no es necesario que hagas nada. De lo contrario, restablece tu acceso.<div style='padding-top:32px;text-align:center'>
                            <a style='font-family:" . $lettle_type . ",Roboto,RobotoDraft,Helvetica,Arial,sans-serif;line-height:16px;color:#ffffff;font-weight:400;text-decoration:none;font-size:14px;display:inline-block;padding:10px 24px;background-color:#4184f3;border-radius:5px;min-width:90px' href='http://aycoro.com/rest?fditer=" . $dato_encriptado . "&hfdar=" . $date_encryp . "'>Restablecer contraseña</a>
                        </div>
                    </div>
                </div>
            </body>
            
            </html>";


            $header = "From: Aycoro <no-reply@aycoro.com>" . "\r\n";
            $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $header .= "Reply-To: NoReplay@aycoro.com" . "\r\n";
            $header .= "X-Mailer: PHP/" . phpversion();
            $mail = mail($email_identity, $asunto, $mensaje, $header);
            if ($mail == 1) {
                echo "success";
                echo "<script>
                alert('Email enviado');
                window.location='../resetpass';
                </script>";
            } else {
                echo "<script>
                alert('No se pudo enviar el Email');
                window.location='../resetpass';
                </script>";
            }
        } else {
            echo "<script>
                alert('El Email ingresado no coincide con ninguna cuenta');
                window.location='../resetpass';
                </script>";
        }
    } else {
        echo "<script>
                alert('Fallo la coneccion');
                window.location='../resetpass';
                </script>";
    }
} else {
    echo "<script>
                alert('Debes introducir un correo valido');
                window.location='../resetpass';
                </script>";
}
