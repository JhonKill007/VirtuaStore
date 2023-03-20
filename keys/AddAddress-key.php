<?php
session_start();
$id = $_SESSION['id'];
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
    if (!empty($pais) || !empty($nombre) || !empty($apellido) || !empty($calle) || !empty($numero) || !empty($cp) || !empty($city) || !empty($estado) || !empty($telefono)) {
        require("conection.php");
        if ($conn) {
            $INSERT = "INSERT INTO configuracion (pais,nombre,apellido,calle,numero,codigo_postal,ciudad,estado,telefono,id_registro)values('$pais','$nombre','$apellido','$calle','$numero','$cp','$city','$estado','$telefono','$id')";
            $resultado = mysqli_query($conn, $INSERT);
            if ($resultado) {
                header("Location: ../settings");
            } else {
                echo "<script>
                    alert('No se agrego el registro');
                   
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
