<?php


$id = $_POST['id_producto'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$numero = $_POST['numero'];
$email = $_POST['email'];
$direccion = $_POST['direccion'];



if(!empty($nombre) || !empty($apellido) || !empty($id) || !empty($numero) || !empty($email) || !empty($direccion)){
    require("conection.php");

    if($conn){
        $INSERT = "INSERT INTO ventas (nombre,apellido,id_producto,direccion,numero,email)values('$nombre','$apellido','$id','$direccion','$numero','$email')";
        $resultado = mysqli_query($conn,$INSERT);
        if($resultado){
            // echo "<script>
            //     alert('Compra realizada con exito');
            //     window.location='../index.php';
            //     </script>";
            header("Location: ../index.php");
                
        }
        else{
            // echo "<script>
            //     alert('no se realizo el pago');
            //     window.location='../index.php';
            //     </script>";
        }
    }
    else{
        // echo "la connecion fallo";
        header("Location: ../index.php");
    }
}
else{
    // echo "<script>
    //         alert('todos los campos son obligatorios');
    //         window.location='../car.php?".$id."';
    //         </script>";
            header("Location: ../car.php?".$id."");
}
?>