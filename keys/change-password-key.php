<?php
$id_per = $_POST['id_per'];
$actual = $_POST['actual'];
$nueva = $_POST['nueva'];
$confirm = $_POST['confirm'];

$datachange = "";

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
                        $INSERT = "INSERT INTO edits (campo,new,old,id_user,date_edit)values('Password','$script_password','$script_password_old','$id_per',NOW())";
                        $resultado = mysqli_query($conn, $INSERT);
                        if ($resultado) {
                            echo "success";
                        }
                    }
                } else {
                    $datachange .= "<div class='error-txt  error'>La Contraseña nueva y la confirmacion no coinsiden.</div>";
                    echo $datachange;
                }
            } else {
                $datachange .= "<div class='error-txt  error'>La Contraseña actual es Incorrecta</div>";
                echo $datachange;
            }
        } else {
            $datachange .= "<div class='error-txt  error'>El query esta fallando".$id_per.".</div>";
            echo $datachange;
        }
    } else {
        echo "fallo la coneccion";
    }
} else {
    $datachange .= "<div class='error-txt  error'>Complete todos los campos.</div>";
    echo $datachange;
}
