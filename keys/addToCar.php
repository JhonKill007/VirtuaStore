<?php

session_start();
$Iduser = $_SESSION['id'];
$idProduct = $_POST['product_id'];
$active = 1;
$sizeS= $_POST['size'];
$colorS= $_POST['color'];
$cantidadS= $_POST['cantidad'];





if (isset($_SESSION['id'])) {
    if( !empty($idProduct) || !empty($Iduser)){
        require("conection.php");
        if($conn){
            $INSERT = "INSERT INTO car (user_id, producto_id, createdate, active,size,color,cantidadSelected,comprado)values($Iduser,'$idProduct',NOW(),$active,'$sizeS','$colorS',$cantidadS,false)";
            $resultado = mysqli_query($conn,$INSERT);
            if($resultado){
                header("Location: ../car");
            }
            else{
                // echo "<script>
                //     alert('No se Guardo');
                //     window.location='../car';
                //     </script>";
                header("Location: ../index");
            }
        }
        else{
            // echo "la connecion fallo";
            header("Location: ../index");
        }
    }
    else{
        // echo "todos los datos son OBLIGATORIOS";
        header("Location: ../products");
    }
} else {
    setcookie("producto"."[".$_POST['product_id'].$_POST['size']."|".$_POST['color']."]",$_POST['product_id']."|".$_POST["cantidad"]."|".$_POST['size']."|".$_POST['color'],time()+360000,"/VirtuaStore");

    header("Location: ../car");

}


?>
