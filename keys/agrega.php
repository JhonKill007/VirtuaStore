<?php

$ruta= '../img/'.$_FILES['foto']['name'];
$ruta_send= 'img/'.$_FILES['foto']['name'];
move_uploaded_file($_FILES['foto']['tmp_name'],$ruta);

$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$categoria = $_POST['categoria'];
$descripcion = $_POST['descripcion'];



if(!empty($nombre) || !empty($ruta_send) || !empty($precio)  || !empty($descripcion)){
    require("conection.php");

    if($conn){
        $INSERT = "INSERT INTO productos (foto,articulo,categoria,precio,descripcion)values('$ruta_send','$nombre','$categoria','$precio','$descripcion')";
        $resultado = mysqli_query($conn,$INSERT);
        if($resultado){
            echo "<script>
                alert('Agregado');
                window.location='../agregar';
                </script>";
        }
        else{
            echo "<script>
                alert('No se Guardo');
                window.location='../agregar';
                </script>";
        }
    }
    else{
        echo "la connecion fallo";
    }
}
else{
    echo "todos los datos son OBLIGATORIOS";
    header("Location: ../agregar");
}
?>