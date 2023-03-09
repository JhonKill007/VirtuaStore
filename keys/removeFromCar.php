<?php

session_start();
$Iduser= $_SESSION['id'];

$idProduct = $_POST['product_id'];
$IdCarrito = $_POST['car_id'];

echo "<script>
                alert($IdCarrito+'');
                
                </script>";

if( !empty($idProduct)){
    require("conection.php");

    if($conn){
        $DELETE = "Delete from tiendav.car where Id= $IdCarrito";
        $resultado = mysqli_query($conn,$DELETE);
        if($resultado){
            echo "<script>
                alert('Eliminado');
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
    header("Location: ../agregar.php");
}
?>