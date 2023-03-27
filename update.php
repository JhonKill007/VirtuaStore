<?php
require("head.php");

if (isset($_SESSION['ID_ADMIN'])) {
    $id_producto = $_GET['id_articulo'];
    $filtro_sizes = '';
    $filtro_colors = '';
    $sizes =  array(0);
    $colors =  array(0);
?>
    <br>
    <br>
    <br>
    <style>
        img {
            width: 100px;
            height: 100px;
            object-fit: contain;
        }
    </style>


    <div class="contact-us">
        <div class="container">
            <div class="row">
                <?php
                require("keys/conection.php");
                if ($conn) {
                    $SELECT = "SELECT * from productos WHERE id_producto = $id_producto";
                    $resultado = mysqli_query($conn, $SELECT);
                    if ($resultado) {
                        while ($pro = $resultado->fetch_array()) {
                ?>
                            <div class="col-lg-6">
                                <div class="section-heading">
                                    <h2>Edit product</h2>
                                </div>
                                <form id="contact" action="keys/update-key" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="id" value="<?php echo $id_producto ?>">
                                    <div>
                                        <div class="col-lg-12">
                                            <fieldset>
                                                <label class="btn btn-light" for="image_uploads" title="Publicar Foto" style="font-size: 20px;cursor:pointer"> Add Images
                                                    <i class="fa-solid fa-plus" style="height:20px; "></i>

                                                </label>

                                                <input style="display:none" class="form-control imput" type="file" id="image_uploads" name="foto[]" multiple>
                                                <div style="display:flex; width: 100%; overflow: auto;">
                                                    <style>
                                                        .preview_one {
                                                            height: 130px;
                                                        }

                                                        .preview_one ol li div {
                                                            width: 15px;
                                                            margin-top: -100px;
                                                            margin-left: 75px;
                                                        }

                                                        .preview_one ol li {
                                                            height: 102px;
                                                        }

                                                        .preview_one ol li div i {
                                                            background-color: white;
                                                            border-radius: 2px;
                                                            padding: 5px;
                                                            cursor: pointer;
                                                        }

                                                        .preview_one ol li div i:hover {
                                                            background-color: black;
                                                            color: white;
                                                        }
                                                    </style>
                                                    <div class="preview_one">
                                                        <ol style="display: flex;">
                                                            <?php
                                                            $SELECT = "select * from fotoporproducto where id_producto = $id_producto";
                                                            $result_foto = mysqli_query($conn, $SELECT);
                                                            if ($result_foto) {
                                                                while ($pho = $result_foto->fetch_array()) {
                                                            ?>
                                                                    <li style="margin: 10px; border: 1px solid;">
                                                                        <img src="<?php echo $pho['directorio'] ?>">
                                                                        <p></p>
                                                                        <div>
                                                                            <a href="keys/delete-foto-key?id=<?php echo $pho['id'] ?>&id_product=<?php echo $id_producto ?>">
                                                                                <i class="fa-solid fa-x"></i>
                                                                            </a>
                                                                        </div>
                                                                    </li>
                                                            <?php
                                                                }
                                                            }
                                                            ?>

                                                        </ol>
                                                    </div>
                                                    <div class="preview">
                                                    </div>
                                                </div>

                                            </fieldset>
                                        </div>
                                        <hr>
                                        <div class="col-lg-12">
                                            <fieldset>
                                                <span>Title</span>
                                                <input value="<?php echo $pro['articulo']; ?>" class="form-control" name="nombre" type="text" id="name" placeholder="Title" required>
                                            </fieldset>
                                        </div>
                                        <hr>
                                        <div class="col-lg-6">
                                            <fieldset>
                                                <span>Price</span>
                                                <input value="<?php echo $pro['precio']; ?>" class="form-control" name="precio" type="number" step="0.01" id="name" placeholder="Price" required>
                                            </fieldset>
                                        </div>
                                        <hr>
                                        <div class="col-lg-4">
                                            <fieldset>
                                                <span>Quantity</span>
                                                <input value=<?php echo $pro['cantidad']; ?> type="number" placeholder="Quantity" name="cantidad" required>
                                            </fieldset>
                                        </div>
                                        <hr>
                                        <div class="col-lg-4">
                                            <fieldset>
                                                <span>Sizes</span>
                                                <table class="table">
                                                    <tbody>
                                                        <?php
                                                        if ($conn) {
                                                            $SELECT = "select s.valor, sp.id_sizeporproducto from sizeporproducto sp inner join size s on sp.id_size= s.id where sp.id_producto=$id_producto";
                                                            $resultado = mysqli_query($conn, $SELECT);
                                                            if ($resultado) {
                                                                while ($z = $resultado->fetch_array()) {
                                                                    $valor = $z['valor'];
                                                                    array_push($sizes, $valor);
                                                        ?>

                                                                    <tr>
                                                                        <th scope="row"><?php echo $z['valor']; ?></th>
                                                                        <td><?php echo $z['valor']; ?></td>
                                                                        <td>
                                                                            <a href="keys/delete-size-key?id=<?php echo $z['id_sizeporproducto'] ?>&id_product=<?php echo $id_producto ?>">
                                                                                <i style="cursor: pointer;" class="fa-solid fa-trash"></i>
                                                                            </a>
                                                                        </td>
                                                                    </tr>

                                                        <?php
                                                                }
                                                            }
                                                        }
                                                        ?>

                                                    </tbody>
                                                </table>
                                                <div class="dropdown">
                                                    <button style="width:100%; background-color:white; color:black; border: 1px solid #7a7a7a" class="btn btn-outline-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Add Sizes </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                                        <?php
                                                        require("keys/conection.php");
                                                        $count_sizes = count($sizes);
                                                        if ($count_sizes > 0) {
                                                            $filtro_sizes = "WHERE valor != ";
                                                            for ($i = 0; $i < $count_sizes; $i++) {

                                                                $filtro_sizes .= "'$sizes[$i]'";

                                                                if ($count_sizes - 1 > $i) {
                                                                    $filtro_sizes .= ' AND valor != ';
                                                                }
                                                            }
                                                        }
                                                        if ($conn) {
                                                            $SELECT = "SELECT * FROM size $filtro_sizes";
                                                            $resultado = mysqli_query($conn, $SELECT);
                                                            if ($resultado) {
                                                                while ($com = $resultado->fetch_array()) {
                                                        ?>
                                                                    <div class="form-check" style="margin:10px">
                                                                        <label class="form-check-label">
                                                                            <input style="height: 20px;width: 20px;" type="checkbox" class="form-check-input" name="size[]" value="<?php echo $com['id']; ?>">
                                                                            <span style="margin-left:20px; font-size:16px"><?php echo $com['valor']; ?></span>
                                                                        </label>
                                                                    </div>

                                                        <?php
                                                                }
                                                            } else {
                                                                echo " se fue a la verga";
                                                            }
                                                        } else {
                                                            echo "la coneccion fallo";
                                                        }
                                                        ?>

                                                    </div>

                                                </div>
                                            </fieldset>
                                        </div>
                                        <hr>
                                        <div class="col-lg-4">
                                            <span>Color</span>
                                            <table class="table">
                                                <tbody>
                                                    <?php
                                                    if ($conn) {
                                                        $SELECT = "select c.valor, cp.id_colorporproducto from colorporproducto cp inner join color c on cp.id_color= c.id where cp.id_producto = $id_producto";
                                                        $resultado = mysqli_query($conn, $SELECT);
                                                        if ($resultado) {
                                                            while ($com = $resultado->fetch_array()) {
                                                                $valor = $com['valor'];
                                                                array_push($colors, $valor);
                                                    ?>
                                                                <tr>
                                                                    <th scope="row">
                                                                        <i style="color: <?php echo $com['valor']; ?>; border: 1px solid black; border-radius: 50%; background-color:black;" class="fa-solid fa-circle"></i>
                                                                    </th>
                                                                    <td><?php echo $com['valor']; ?></td>
                                                                    
                                                                    <td>
                                                                    <a href="keys/delete-color-key?id=<?php echo $com['id_colorporproducto'] ?>&id_product=<?php echo $id_producto ?>">

                                                                        <i style="cursor: pointer;" class="fa-solid fa-trash"></i>
                                                                    </td>
                                                                </tr>
                                                    <?php
                                                            }
                                                        }
                                                    }
                                                    ?>

                                                </tbody>
                                            </table>
                                            <fieldset>
                                                <div class="dropdown">
                                                    <button style="width:100%; background-color:white; color:black; border: 1px solid #7a7a7a" class="btn btn-outline-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Add Colors</button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                                        <?php
                                                        require("keys/conection.php");
                                                        $count_colors = count($colors);
                                                        if ($count_colors > 0) {
                                                            $filtro_colors = "WHERE valor != ";
                                                            for ($i = 0; $i < $count_colors; $i++) {

                                                                $filtro_colors .= "'$colors[$i]'";

                                                                if ($count_colors - 1 > $i) {
                                                                    $filtro_colors .= ' AND valor != ';
                                                                }
                                                            }
                                                        }
                                                        if ($conn) {
                                                            $SELECT = "SELECT * FROM color $filtro_colors";
                                                            $resultado = mysqli_query($conn, $SELECT);
                                                            if ($resultado) {
                                                                while ($com = $resultado->fetch_array()) {
                                                        ?>
                                                                    <div class="form-check" style="margin:10px">
                                                                        <label class="form-check-label">
                                                                            <input style="height: 20px;width: 20px;" type="checkbox" class="form-check-input" name="color[]" value="<?php echo $com['id']; ?>">
                                                                            <span style="margin-left:20px; font-size:16px"><?php echo $com['valor']; ?></span>
                                                                        </label>
                                                                    </div>

                                                        <?php
                                                                }
                                                            } else {
                                                                echo " se fue a la verga";
                                                            }
                                                        } else {
                                                            echo "la coneccion fallo";
                                                        }
                                                        ?>

                                                    </div>

                                                </div>
                                            </fieldset>
                                        </div>
                                        <hr>
                                        <div class="col-lg-12">
                                            <fieldset>
                                                <span>Descripcion</span>
                                                <textarea class="form-control" name="descripcion" rows="6" id="message" placeholder="Descripcion" required=""><?php echo $pro['descripcion']; ?></textarea>
                                            </fieldset>
                                        </div>
                                        <div class="col-lg-12">
                                            <fieldset>
                                                <button style="width: 100%;" class="main-dark-button" type="submit" value="Save">Save</button>
                                            </fieldset>
                                        </div>
                                    </div>
                                </form>
                            </div>
                <?php
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>
<?php
    require("footer.php");
} else {
    header("Location:login");
}
?>

<script>
    const input = document.querySelector('.imput');
    const preview = document.querySelector('.preview');

    input.addEventListener('change', updateImageDisplay);
    input.style.opacity = 0;

    function updateImageDisplay() {
        while (preview.firstChild) {
            preview.removeChild(preview.firstChild);
        }

        const curFiles = input.files;
        if (curFiles.length === 0) {
            const para = document.createElement('p');
            para.textContent = 'No files currently selected for upload';
            preview.appendChild(para);
        } else {
            const list = document.createElement('ol');
            list.style = "display:flex;";

            preview.appendChild(list);

            for (const file of curFiles) {
                const listItem = document.createElement('li');
                listItem.style = "margin: 10px;border: 1px solid;"
                const para = document.createElement('p');
                if (validFileType(file)) {
                    // para.textContent = `File name ${file.name}, file size ${returnFileSize(file.size)}.`;
                    const image = document.createElement('img');
                    image.src = URL.createObjectURL(file);


                    listItem.appendChild(image);
                    listItem.appendChild(para);
                } else {
                    para.textContent = `File name ${file.name}: Not a valid file type. Update your selection.`;
                    listItem.appendChild(para);
                }

                list.appendChild(listItem);
            }

        }

    }

    // https://developer.mozilla.org/en-US/docs/Web/Media/Formats/Image_types
    const fileTypes = [
        "image/apng",
        "image/bmp",
        "image/gif",
        "image/jpeg",
        "image/pjpeg",
        "image/png",
        "image/svg+xml",
        "image/tiff",
        "image/webp",
        "image/x-icon"
    ];

    function validFileType(file) {
        return fileTypes.includes(file.type);
    }

    function returnFileSize(number) {
        if (number < 1024) {
            return `${number} bytes`;
        } else if (number >= 1024 && number < 1048576) {
            return `${(number / 1024).toFixed(1)} KB`;
        } else if (number >= 1048576) {
            return `${(number / 1048576).toFixed(1)} MB`;
        }
    }
</script>