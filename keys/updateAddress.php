<?php
session_start();
$origen = $_POST['_origen'];
$_id_configuracion = $_POST['id_configuracion'];
$pais = $_POST['pais'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$calle = $_POST['calle'];
$numero = $_POST['numero'];
$cp = $_POST['cp'];
$city = $_POST['city'];
$estado = $_POST['estado'];
$telefono = $_POST['telefono'];
$default = isset($_POST['default']) ? 1 : 0;





if (isset($_SESSION['id'])) {
    if (!empty($pais) || !empty($nombre) || !empty($apellido) || !empty($calle) || !empty($numero) || !empty($cp) || !empty($city) || !empty($estado) || !empty($telefono)) {
        require("conection.php");
        if ($conn) {
            $UPDATE = "UPDATE configuracion SET pais = '$pais', nombre = '$nombre', apellido = '$apellido', calle = '$calle', numero = '$numero', codigo_postal = '$cp', ciudad = '$city', estado = '$estado', telefono = '$telefono' , predeterminada=$default WHERE id_configuracion = '$_id_configuracion'";
            $resultado = mysqli_query($conn, $UPDATE);
            if ($resultado) {
                if($origen == 1){
                    header("Location: ../settings");
                }
                if($origen == 2){
                    header("Location: ../address");
                }
            } else {
                echo "<script>
                    alert('No se Guardo');
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
