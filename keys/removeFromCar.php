<?php

session_start();
$IdCarrito = $_POST['car_id'];

if (isset($_SESSION['id'])) {
    if (!empty($IdCarrito)) {
        require("conection.php");
        if ($conn) {
            $DELETE = "DELETE FROM car WHERE id_car = $IdCarrito";
            $resultado = mysqli_query($conn, $DELETE);
            if ($resultado) {
                header("Location: ../car");
            } else {
                // echo "<script>
                //     alert('No se Guardo');
                //     window.location='../car';
                //     </script>";
                header("Location: ../car");
            }
        } else {
            // echo "la connecion fallo";
            header("Location: ../car");
        }
    } else {
        // echo "todos los datos son OBLIGATORIOS";
        header("Location: ../car");
    }
} else {

    setcookie("producto"."[".$_POST['car_id'].$_POST['size']."|".$_POST['color']."]","",time()-1,"/VirtuaStore");

    header("Location:../car");
}
