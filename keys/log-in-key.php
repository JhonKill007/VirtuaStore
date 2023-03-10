<?php

$email = $_POST['email'];
$password = $_POST['password'];


if (!empty($email) || !empty($password)) {

    $eso =  require('conection.php');
    if ($eso) {
        $SELECT = "SELECT * from registro where email='$email'";
        $resultado = mysqli_query($conn, $SELECT);

        if ($resultado->num_rows == 1) {
            $log = $resultado->fetch_array();
            if (password_verify($password, $log['password'])) {
                if ($log['role'] == "ADMIN") {
                    $id = $log['id_registro'];
                    session_start();
                    $_SESSION['ID_ADMIN'] = $id;
                    header("Location: ../index");
                } 
                if ($log['role'] == "USER") {
                    $id = $log['id_registro'];
                    session_start();
                    $_SESSION['id'] = $id;
                    header("Location: ../index");
                }
            } else {
                echo "<script>
                alert('La contraseña es incorrecta');
                window.location='../login';
                </script>";
            }
        } else {
            echo "<script>
            alert('El email es incorrecto');
            window.location='../login';
            </script>";
        }
    } else {
        echo "la coneccionn de la base de  datos fallo";
    }
} else {
    echo "todos los datos son OBLIGATORIOS";
    die();
}
