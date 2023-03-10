<?php

session_start();
$Iduser = $_SESSION['id'];
$idProduct = $_POST['product_id'];
$active = 1;


if (isset($_SESSION['id'])) {
    if( !empty($idProduct) || !empty($Iduser)){
        require("conection.php");
        if($conn){
            $INSERT = "INSERT INTO car (user_id, producto_id, createdate, active)values($Iduser,'$idProduct',NOW(),$active)";
            $resultado = mysqli_query($conn,$INSERT);
            if($resultado){
                header("Location: ../car.php");
            }
            else{
                echo "<script>
                    alert('No se Guardo');
                   
                    </script>";
            }
        }
        else{
            echo "la connecion fallo";
        }
    }
    else{
        echo "todos los datos son OBLIGATORIOS";
        header("Location: ../product.php");
    }
} else {
    header("Location:../login.php");
}
