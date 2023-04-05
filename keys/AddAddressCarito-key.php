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

if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    if (!empty($pais) || !empty($nombre) || !empty($apellido) || !empty($calle) || !empty($numero) || !empty($cp) || !empty($city) || !empty($estado) || !empty($telefono)) {
        require("conection.php");
        if ($conn) {
            $INSERT = "INSERT INTO configuracion (pais,nombre,apellido,calle,numero,codigo_postal,ciudad,estado,telefono,id_registro,predeterminada)values('$pais','$nombre','$apellido','$calle','$numero','$cp','$city','$estado','$telefono','$id',1)";
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
    function getMACAddress(){
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
   


    if (!empty($pais) || !empty($nombre) || !empty($apellido) || !empty($calle) || !empty($numero) || !empty($cp) || !empty($city) || !empty($estado) || !empty($telefono)) {
        require("conection.php");
        if ($conn) {
            $INSERT = "INSERT INTO configuracion (pais,nombre,apellido,calle,numero,codigo_postal,ciudad,estado,telefono,id_registro,predeterminada)values('$pais','$nombre','$apellido','$calle','$numero','$cp','$city','$estado','$telefono','$IpGuest',1)";
          
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
    
}
