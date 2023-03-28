<?php

$fotoP = '../img/' . $_FILES['foto']['name'][0];
$ruta_send = 'img/' . $_FILES['foto']['name'][0];
move_uploaded_file($_FILES['foto']['tmp_name'][0], $fotoP);



$nombre = $_POST['nombre'];
$precio = $_POST['precio'];

$categoria = $_POST['categoria'];
$descripcion = $_POST['descripcion'];
$colorSelect = $_POST['color'];
$sizeSelect = $_POST['size'];
$cantidadS = $_POST['cantidad'];





session_start();
if (isset($_SESSION['ID_ADMIN'])) {
    if (!empty($nombre) || !empty($ruta_send) || !empty($precio)  || !empty($descripcion)) {
        require("conection.php");

        if ($conn) {
            $INSERT = "INSERT INTO productos (foto,articulo,categoria,precio,descripcion,cantidad)values('$ruta_send','$nombre','$categoria',$precio,'$descripcion','$cantidadS')";
            $resultado = mysqli_query($conn, $INSERT);
            if ($resultado) {

                $SelectLast = "SELECT id_producto from productos  ORDER BY id_producto DESC LIMIT 1 ";
                $resultado = mysqli_query($conn, $SelectLast);

                $com = $resultado->fetch_array();
                $id_producto = $com['id_producto'];

                foreach ($sizeSelect as $size) {

                    $InsertSize = "INSERT INTO sizeporproducto (id_size,id_producto)values('$size',$id_producto)";
                    $resultado = mysqli_query($conn, $InsertSize);
                }

                foreach ($colorSelect as $color) {
                    $Insertcolor = "INSERT INTO colorporproducto (id_color,id_producto)values('$color',$id_producto)";
                    $resultado = mysqli_query($conn, $Insertcolor);
                }



                $countfiles = count($_FILES['foto']['name']);
                for ($i = 0; $i < $countfiles; $i++) {
                    $filename = $_FILES['foto']['name'][$i];

                    $ruta = '../img/' . $filename;
                    $ruta_send = 'img/' . $filename;
                    move_uploaded_file($_FILES['foto']['tmp_name'][$i], $ruta);
                    $InsertFotos = "INSERT INTO fotoporproducto (directorio,id_producto)values('$ruta_send',$id_producto)";
                    $resultado = mysqli_query($conn, $InsertFotos);
                }


                // echo "<script>
                // alert('Agregado');
                // window.location='../agregar';
                // </script>";
                header("Location: ../agregar");
            } else {
                // echo "<script>
                // alert('No se Guardo');
                // window.location='../agregar';
                // </script>";
                header("Location: ../agregar");
                
            }
        } else {
            // echo "la connecion fallo";
            header("Location: ../agregar");

        }
    } else {
        // echo "todos los datos son OBLIGATORIOS";
        header("Location: ../agregar");
    }
} else {
    header("Location:../login");
}
