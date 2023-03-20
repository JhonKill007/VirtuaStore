<?php
session_start();
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$numero = $_POST['numero'];
$email = $_POST['email'];



// $pais = $_POST['pais'];
// $nombre = $_POST['nombre'];
// $apellido = $_POST['apellido'];
// $calle = $_POST['calle'];
// $numero = $_POST['numero'];
// $cp = $_POST['cp'];
// $city = $_POST['city'];
// $estado = $_POST['estado'];
// $telefono = $_POST['telefono'];


// $script_password = password_hash($password, PASSWORD_DEFAULT);

if (!empty($nombre) || !empty($apellido) || !empty($numero) || !empty($email)) {
    $eso =  require('conection.php');
    if ($eso) {
        $UPDATE = "UPDATE registro SET nombre = '$nombre',apellido = '$apellido',numero = '$numero',email = '$email' where id_registro = '$id'";
        $resultado = mysqli_query($conn, $UPDATE);
        if ($resultado) {
            header("Location:../index");
        } else {
            echo "NO SE GUARDO EL REGISTRO";
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





