<?php

session_start();
$Iduser= $_SESSION['id'];

$idProduct = $_POST['product_id'];
$active = 1;



if( !empty($idProduct)){
    require("conection.php");

    if($conn){
        $INSERT = "INSERT INTO car (user_id,producto_id,createdate,active)values($Iduser,'$idProduct',NOW(),$active)";
        $resultado = mysqli_query($conn,$INSERT);
        if($resultado){
            echo "<script>
                
                window.location='../car.php';
                </script>";
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
?>