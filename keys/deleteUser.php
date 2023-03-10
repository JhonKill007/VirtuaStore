<?php
session_start();
$IdUser = $_POST['user_id'];

if (isset($_SESSION['ID_ADMIN'])) {
    if (!empty($IdUser)) {
        require("conection.php");
        if ($conn) {
            $DELETE = "DELETE FROM registro WHERE id_registro = $IdUser";
            $resultado = mysqli_query($conn, $DELETE);
            if ($resultado) {
                header("Location: ../users.php");
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
        header("Location: ../users.php");
    }
} else {
    header("Location:../login.php");
}