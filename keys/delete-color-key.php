<?php
session_start();
$_id_ = $_GET['id'];
$_id_product = $_GET['id_product'];

if (isset($_SESSION['ID_ADMIN'])) {
    if (!empty($_id_product) && !empty($_id_)) {
        require("conection.php");
        if ($conn) {
            $DELETE = "DELETE FROM colorporproducto WHERE id_colorporproducto = $_id_";
            $resultado = mysqli_query($conn, $DELETE);
            if ($resultado) {
                header("Location: ../update?id_articulo=$_id_product");
            } else {
                header("Location: ../update?id_articulo=$_id_product");
            }
        } else {
            header("Location: ../update?id_articulo=$_id_product");
        }
    } else {
        header("Location: ../update?id_articulo=$_id_product");
    }
} else {
    header("Location:../login");
}
