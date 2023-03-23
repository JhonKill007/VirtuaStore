<?php
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$numero = $_POST['numero'];
$email = $_POST['email'];
$password = $_POST['password'];
$day = $_POST['day'];
$month = $_POST['month'];
$year = $_POST['year'];
$genero = $_POST['genero'];
$role = $_POST['role'];
$birthday = $year . "/" . $month . "/" . $day;

// echo $nombre;
// echo $apellido;
// echo $numero;
// echo $email;
// echo $password;
// echo $day;
// echo $month;
// echo $year;
// echo $genero;
// echo $role;
// echo $birthday;


$script_password = password_hash($password, PASSWORD_DEFAULT);

if (!empty($nombre) || !empty($apellido) || !empty($numero) || !empty($email) || !empty($password) || !empty($day) || !empty($month) || !empty($year) || !empty($genero) || !empty($role)) {
    $eso =  require('conection.php');
    if ($eso) {
        $SELECT = "SELECT * FROM registro WHERE email = '$email'";
        $resultado = mysqli_query($conn, $SELECT);
        if ($resultado->num_rows == 0) {


            $INSERT = "INSERT INTO registro (nombre,apellido,numero,email,password,birthday,genero,role)values('$nombre','$apellido','$numero','$email','$script_password','$birthday','$genero','$role')";
            $resultado = mysqli_query($conn, $INSERT);
            if ($resultado) {
                echo "REGISTRADO";
                $SELECT = "SELECT * FROM registro WHERE email = '$email'";
                $resultado = mysqli_query($conn, $SELECT);
                if ($resultado) {


                    $identity = $resultado->fetch_array();
                    $id_identity = $identity['id_registro'];
                    $name_identity = $identity['nombre'];
                    $email_identity = $identity['email'];
                    $lettle_type = "Google Sans";


                    $asunto = "Wellcome to Pretty Perfect Collection";
                    $mensaje = "<!DOCTYPE html>
                    <html lang='en'>
                    
                    <head>
                        <meta charset='UTF-8'>
                        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                        <title>Wellcome to Pretty Perfect Collection</title>
                    </head>
                    
                    <body>
                        <div style='border-style:solid;border-width:thin;border-color:#dadce0;border-radius:8px;padding:40px 20px;color:rgba(225,225,225,225);background-color: rgba(0,0,0,0.87);' align='center'>
                            <img style='width: 74px;height: 74px;margin: auto;' src='https://freefiree.es/assets/images/logo.png' alt='PrettyPerfectCollection'>
                            <div style='font-family:" . $lettle_type . ",Roboto,RobotoDraft,Helvetica,Arial,sans-serif;border-bottom:thin solid #dadce0;color:#ffffff;line-height:32px;padding-bottom:24px;text-align:center;word-break:break-word'>
                                <div style='font-size:24px;'>Wellcome " . $name_identity . "</div>
                            </div>
                            <div style='font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:14px;line-height:20px;padding-top:20px;text-align:center'>Thank you for registering in our virtual store, we hope you have the best shopping experience, we are exciting to share our products with you.<div style='padding-top:32px;text-align:center'>
                                    <a style='font-family:" . $lettle_type . ",Roboto,RobotoDraft,Helvetica,Arial,sans-serif;line-height:16px;color:#ffffff;font-weight:400;text-decoration:none;font-size:14px;display:inline-block;padding:10px 24px;background-color:#4184f3;border-radius:5px;min-width:90px' href='https://freefiree.es'>Buy Now</a>
                                </div>
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
                        if ($identity['role'] == "ADMIN") {
                            header("Location: ../users");
                        }
                        if ($identity['role'] == "USER") {
                            $id = $identity['id_registro'];
                            session_start();
                            $_SESSION['id'] = $id;
                            header("Location: ../index");
                        }
                    } else {
                        echo "<script>
                            alert('No se pudo enviar el Email');
                            window.location='../signup';
                            </script>";
                    }
                } else {
                    echo "NO HAY REGISTRO";
                }
            } else {
                echo "NO SE GUARDO EL REGISTRO";
            }
        } else {
            echo "<script>
                alert('El email ya esta registrado');
                window.location='../signup';
                </script>";
        }
    } else {
        echo "fallo la coneccion";
    }
} else {
    echo "<script>
    alert('Debe llenar todos los campos');
    window.location='../login';
    </script>";
}
