<?php
session_start();
$_id_ = $_GET['id'];
$_id_product = $_GET['id_product'];

if (isset($_SESSION['ID_ADMIN'])) {
    if (!empty($_id_product) && !empty($_id_)) {
        require("conection.php");
        if ($conn) {
            $DELETE = "DELETE FROM sizeporproducto WHERE id_sizeporproducto = $_id_";
            $resultado = mysqli_query($conn, $DELETE);
            if ($resultado) {
                header("Location: ../update?id_articulo=$_id_product");
            } else {
                echo "<script>
                    alert('No se Elimino');
                    window.location='../update?id_articulo=$_id_product';
                    </script>";
            }
        } else {
            echo "la connecion fallo";
        }
    } else {
        echo "<script>
        alert('TODos los datos son obligatorios');
        window.location='../update?id_articulo=$_id_product';
        </script>";
    }
} else {
    header("Location:../login");
}
