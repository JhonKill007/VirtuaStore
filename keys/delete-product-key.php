<?php
session_start();
$_id_product = $_GET['id_product'];

if (isset($_SESSION['ID_ADMIN'])) {
    if (!empty($_id_product)) {
        require("conection.php");
        if ($conn) {
            $DELETE = "DELETE FROM productos WHERE id_producto = $_id_product";
            $resultado = mysqli_query($conn, $DELETE);
            if ($resultado) {
                header("Location: ../products");
            } else {
                header("Location: ../products");
            }
        } else {
            header("Location: ../products");
        }
    } else {
        header("Location: ../products");
    }
} else {
    header("Location:../login");
}
