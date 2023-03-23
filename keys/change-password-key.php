<?php
$id_per = $_POST['id_per'];
$actual = $_POST['actual'];
$nueva = $_POST['nueva'];
$confirm = $_POST['confirm'];

$datachange = "";


session_start();
if (isset($_SESSION['id'])) {
    if (!empty($id_per) || !empty($actual) || !empty($nueva) || !empty($confirm)) {
        $eso =  require('conection.php');
        if ($eso) {
            $SELECT = "SELECT * FROM registro WHERE id_registro = $id_per";
            $resultado = mysqli_query($conn, $SELECT);
            if ($resultado) {
                $dt = $resultado->fetch_array();
                if (password_verify($actual, $dt['password'])) {
                    if ($nueva == $confirm) {
                        $script_password = password_hash($nueva, PASSWORD_DEFAULT);
                        $script_password_old = password_hash($actual, PASSWORD_DEFAULT);

                        $UPDATE = "UPDATE registro SET password ='$script_password' Where id_registro='$id_per'";
                        $resultado = mysqli_query($conn, $UPDATE);
                        if ($resultado) {
                            header("Location:../index");
                        }
                    } else {
                        $datachange .= "La Contraseña nueva y la confirmacion no coinsiden.";
                        echo $datachange;
                    }
                } else {
                    $datachange .= "La Contraseña actual es Incorrecta.";
                    echo $datachange;
                }
            } else {
                $datachange .= "El query esta fallando" . $id_per;
                echo $datachange;
            }
        } else {
            echo "fallo la coneccion";
        }
    } else {
        $datachange .= "Complete todos los campos.";
        echo $datachange;
    }
} else {
    header("Location:../login");
}
