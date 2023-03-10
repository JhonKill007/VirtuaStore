<?php
session_start();
$pais = $_POST['pais'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$calle = $_POST['calle'];
$numero = $_POST['numero'];
$cp = $_POST['cp'];
$city = $_POST['city'];
$estado = $_POST['estado'];
$telefono = $_POST['telefono'];

if (isset($_SESSION['ID_ADMIN'])) {
    if (!empty($pais) || !empty($nombre) || !empty($apellido) || !empty($calle) || !empty($numero) || !empty($cp) || !empty($city) || !empty($estado) || !empty($telefono)) {
        require("conection.php");
        if ($conn) {
            $UPDATE = "UPDATE configuracion SET pais = '$pais', nombre = '$nombre', apellido = '$apellido', calle = '$calle', numero = '$numero', codigo_postal = '$cp', ciudad = '$city', estado = '$estado', telefono = '$telefono' WHERE id_registro = 3";
            $resultado = mysqli_query($conn, $UPDATE);
            if ($resultado) {
                header("Location: ../index");
            } else {
                echo "<script>
                    alert('No se Elimino');
                   
                    </script>";
            }
        } else {
            echo "la connecion fallo";
        }
    } else {
        echo "todos los datos son OBLIGATORIOS";
        header("Location: ../users");
    }
} else {
    header("Location:../login");
}
