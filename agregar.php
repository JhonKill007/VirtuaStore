<?php
require("head.php");

if (isset($_SESSION['ID_ADMIN'])) {
?>
    <br>
    <br>
    <br>
    <style>
        img{
            width: 100px; 
            height:100px; 
            object-fit: contain;
        }
    </style>
    <div class="contact-us">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h2>Create product</h2>
                    </div>
                    <form id="contact" action="keys/agrega.php" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-12">
                                <fieldset>
                                    <label class="btn btn-light"  for="image_uploads" title="Publicar Foto" style="font-size: 20px;cursor:pointer"> Add Images
                                        <i class="fa-solid fa-plus" style="height:20px; "></i>

                                    </label>

                                    <input style="display:none" class="form-control imput" type="file" id="image_uploads" name="foto[]" multiple required="">

                                    <div  class="preview" >
                                        <p >No files currently selected for upload</p>
                                    </div>
                                </fieldset>
                            </div>
                            <br>
                            <br>
                            <br>
                            <div class="col-lg-12">
                                <fieldset>
                                    <input class="form-control" name="nombre" type="text" id="name" placeholder="Title" required="">
                                </fieldset>
                            </div>
                            <br>
                            <br>
                            <br>
                            <div class="col-lg-6">
                                <fieldset>
                                    <input class="form-control" name="precio" type="number" step="0.01" id="name" placeholder="Price" required="">
                                </fieldset>
                            </div>
                           
                            <div class="col-lg-6">
                                <fieldset>
                                    <div class="dropdown">
                                        <button style="width:100%; background-color:white; color:black; border: 1px solid #7a7a7a" class="btn btn-outline-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Feature </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                            <?php
                                            require("keys/conection.php");
                                            if ($conn) {
                                                $SELECT = "SELECT * FROM categoria ";
                                                $resultado = mysqli_query($conn, $SELECT);
                                                if ($resultado) {
                                                    while ($com = $resultado->fetch_array()) {
                                            ?>
                                                        <div class="form-check" style="margin:10px">
                                                            <label class="form-check-label">
                                                                <input style="height: 20px;width: 20px;" type="radio" class="form-check-input" name="categoria" value="<?php echo $com['valor']; ?>">
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
                            <br>
                            <br>
                            <br>
                            <hr>
                            <div class="col-lg-4">
                                <fieldset>
                                    <div class="dropdown">
                                        <button style="width:100%; background-color:white; color:black; border: 1px solid #7a7a7a" class="btn btn-outline-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Sizes </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                            <?php
                                            require("keys/conection.php");
                                            if ($conn) {
                                                $SELECT = "SELECT * FROM size ";
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
                            <div class="col-lg-4">
                                <fieldset>
                                    <div class="dropdown" >
                                        <button style="width:100%; background-color:white; color:black; border: 1px solid #7a7a7a" class="btn btn-outline-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Colors </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                            <?php
                                            require("keys/conection.php");
                                            if ($conn) {
                                                $SELECT = "SELECT * FROM color ";
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
                            <div class="col-lg-4">
                                <fieldset>
                                    <input type="number" placeholder="quantity" name="cantidad" required>
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <textarea class="form-control" name="descripcion" rows="6" id="message" placeholder="Descripcion" required=""></textarea>
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <button style="width: 100%;" class="main-dark-button" type="submit" value="">Save</button>
                                </fieldset>
                            </div>
                        </div>
                    </form>
                </div>
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
            list.style="display:flex; width: 100%;overflow: auto;";

            preview.appendChild(list);

            for (const file of curFiles) {
                const listItem = document.createElement('li');
                listItem.style="margin: 10px;border: 1px solid;"
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