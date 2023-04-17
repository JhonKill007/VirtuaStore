<?php
session_start();

$pais = $_POST['pais'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$calle = $_POST['calle'];
$numero = $_POST['numero'];
$cp = $_POST['cp'];
$email = $_POST['email'];
$city = $_POST['city'];
$estado = $_POST['estado'];
$role = 'Guest';

if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    if (!empty($pais) || !empty($nombre) || !empty($apellido) || !empty($calle) || !empty($numero) || !empty($cp) || !empty($city) || !empty($estado)) {
        require("conection.php");
        if ($conn) {
            $INSERT = "INSERT INTO configuracion (pais,nombre,apellido,calle,numero,codigo_postal,ciudad,estado,telefono,id_registro,predeterminada)values('$pais','$nombre','$apellido','$calle','$numero','$cp','$city','$estado','','$id',1)";
            $resultado = mysqli_query($conn, $INSERT);
            if ($resultado) {
                header("Location: ../car");
            } else {
                // echo "<script>
                //     alert('No se agrego el registro');

                //     </script>";
                header("Location: ../index");
            }
        } else {
            // echo "la connecion fallo";
            header("Location: ../index");
        }
    } else {
        echo "todos los datos son OBLIGATORIOS";
        header("Location: ../index");
    }
} else {
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



    if (!empty($pais) || !empty($nombre) || !empty($apellido) || !empty($calle) || !empty($numero) || !empty($cp) || !empty($city) || !empty($estado)) {
        require("conection.php");
        if ($conn) {
            $INSERT = "INSERT INTO configuracion (pais,nombre,apellido,calle,numero,codigo_postal,ciudad,estado,telefono,id_registro,predeterminada)values('$pais','$nombre','$apellido','$calle','$numero','$cp','$city','$estado','','$IpGuest',1)";
            // setcookie("address", $IpGuest, time() + 360000, "/VirtuaStore");
            $resultado = mysqli_query($conn, $INSERT);
            if ($resultado) {
                $SELECT = "SELECT * from registro where IP ='$addressC'";
                $resultado = mysqli_query($conn, $SELECT);
                if ($resultado->num_rows == 0) {
                    $INSERT = "INSERT INTO registro (nombre,apellido,numero,email,password,birthday,genero,role,IP)values('$nombre','$apellido','','$email','','','','$role','$IpGuest')";
                    $resultado = mysqli_query($conn, $INSERT);
                    if ($resultado) {
                        header("Location: ../car");
                    }
                } else {
                    header("Location: ../car");
                }
            } else {
                // echo "<script>
                //     alert('No se agrego el registro');

                //     </script>";
                header("Location: ../index");
            }
        } else {
            // echo "la connecion fallo";
            header("Location: ../index");
        }
    } else {
        echo "todos los datos son OBLIGATORIOS";
        header("Location: ../index");
    }
}
