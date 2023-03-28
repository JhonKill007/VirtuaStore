<?php
session_start();
$_id_configuracion = $_POST['id_configuracion'];

if (isset($_SESSION['id'])) {
    if (!empty($_id_configuracion)) {
        require("conection.php");
        if ($conn) {
            $DELETE = "DELETE FROM configuracion WHERE id_configuracion = $_id_configuracion";
            $resultado = mysqli_query($conn, $DELETE);
            if ($resultado) {
                header("Location: ../settings");
            } else {
                // echo "<script>
                //     alert('No se Elimino');
                //     window.location='../settings';
                //     </script>";
                header("Location: ../settings");
            }
        } else {
            // echo "la connecion fallo";
            header("Location: ../settings");
        }
    } else {
        // echo "todos los datos son OBLIGATORIOS";
        header("Location: ../settings.php");
    }
} else {
    header("Location:../login");
}
