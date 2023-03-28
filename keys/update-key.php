<?php

$fotoP = '../img/' . $_FILES['foto']['name'][0];
$ruta_send = 'img/' . $_FILES['foto']['name'][0];
move_uploaded_file($_FILES['foto']['tmp_name'][0], $fotoP);



$id_producto = $_POST['id'];
$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
// $categoria = $_POST['categoria'];
$descripcion = $_POST['descripcion'];

if (isset($_POST['size'])) {
    // $sizeSelect = !empty($_POST['size']);
    $sizeSelect = $_POST['size'];
} else {
    $sizeSelect = array(0);
}

if (isset($_POST['color'])) {
    $colorSelect = $_POST['color'];
} else {
    $colorSelect = array(0);
}

$cantidadS = $_POST['cantidad'];





session_start();
if (isset($_SESSION['ID_ADMIN'])) {
    if (!empty($nombre) || !empty($cantidadS) || !empty($precio)  || !empty($descripcion)) {
        require("conection.php");

        if ($conn) {
            $UPDATE = "UPDATE productos SET articulo = '$nombre', precio = '$precio', descripcion = '$descripcion', cantidad = '$cantidadS' WHERE id_producto = '$id_producto'";
            $resultado = mysqli_query($conn, $UPDATE);
            if ($resultado) {

                foreach ($sizeSelect as $size) {
                    if ($size != 0) {
                        $InsertSize = "INSERT INTO sizeporproducto (id_size,id_producto)values('$size',$id_producto)";
                        $resultado = mysqli_query($conn, $InsertSize);
                    }
                }

                foreach ($colorSelect as $color) {
                    if ($color != 0) {
                        $Insertcolor = "INSERT INTO colorporproducto (id_color,id_producto)values('$color',$id_producto)";
                        $resultado = mysqli_query($conn, $Insertcolor);
                    }
                }



                $countfiles = count($_FILES['foto']['name']);
                for ($i = 0; $i < $countfiles; $i++) {
                    $filename = $_FILES['foto']['name'][$i];
                    if ($filename != '') {
                        $ruta = '../img/' . $filename;
                        $ruta_send = 'img/' . $filename;
                        move_uploaded_file($_FILES['foto']['tmp_name'][$i], $ruta);
                        $InsertFotos = "INSERT INTO fotoporproducto (directorio,id_producto)values('$ruta_send',$id_producto)";
                        $resultado = mysqli_query($conn, $InsertFotos);
                    }
                }
                //     echo "<script>
                // alert('Product Already Update');
                // window.location='../update?id_articulo=$id_producto';
                // </script>";
                header("Location: ../update?id_articulo=$id_producto");
            } else {
                // echo "<script>
                // alert('No se Guardo');
                // window.location='../../update?id_articulo=$id_producto';
                // </script>";
                header("Location: ../update?id_articulo=$id_producto");
            }
        } else {
            // echo "la connecion fallo";
            header("Location: ../update?id_articulo=$id_producto");
        }
    } else {
        // echo "todos los datos son OBLIGATORIOS";
        header("Location: ../update?id_articulo=$id_producto");
    }
} else {
    header("Location:../login");
}
