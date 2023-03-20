<?php
session_start();
$_id_configuracion = $_POST['id_configuracion'];

if (isset($_SESSION['id'])) {
    if (!empty($IdUser)) {
        require("conection.php");
        if ($conn) {
            $DELETE = "DELETE FROM configuracion WHERE id_configuracion = $_id_configuracion";
            $resultado = mysqli_query($conn, $DELETE);
            if ($resultado) {
                header("Location: ../settings");
            } else {
                echo "<script>
                    alert('No se Elimino');
                    window.location='../setting';
                    </script>";
            }
        } else {
            echo "la connecion fallo";
        }
    } else {
        echo "todos los datos son OBLIGATORIOS";
        header("Location: ../settins.php");
    }
} else {
    header("Location:../login");
}
