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

$default = isset($_POST['default']) ? 1 : 0;


if ($origen == 3) {
    $email = $_POST['email'];
}

if (isset($_POST['telefono'])) {
    $telefono = $_POST['telefono'];
} else {
    $telefono = "";
}


if (!empty($pais) || !empty($nombre) || !empty($apellido) || !empty($calle) || !empty($numero) || !empty($cp) || !empty($city) || !empty($estado) || !empty($telefono)) {
    require("conection.php");
    if ($conn) {
        $UPDATE = "UPDATE configuracion SET pais = '$pais', nombre = '$nombre', apellido = '$apellido', calle = '$calle', numero = '$numero', codigo_postal = '$cp', ciudad = '$city', estado = '$estado', telefono = '$telefono' , predeterminada=$default WHERE id_configuracion = '$_id_configuracion'";
        $resultado = mysqli_query($conn, $UPDATE);
        if ($resultado) {
            if ($origen == 1) {
                header("Location: ../settings");
            }
            if ($origen == 2) {
                header("Location: ../address");
            }
            if ($origen == 3) {
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

                $UPDATE = "UPDATE registro SET nombre = '$nombre',apellido = '$apellido',email = '$email' where IP = '$IpGuest' AND role = 'Guest'";
                $resultado = mysqli_query($conn, $UPDATE);
                header("Location: ../car");
            }
        } else {
            header("Location: ../");
        }
    } else {
        header("Location: ../");
    }
} else {
    // echo "todos los datos son OBLIGATORIOS";
    header("Location: ../");
}
