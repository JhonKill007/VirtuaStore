<?php
require("head.php");

if (isset($_SESSION['ID_ADMIN'])) {
?>
    <br>
    <br>
    <br>
    <div class="contact-us">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h2>Add product</h2>
                        <span>Here you add the products that are going to be sold.</span>
                    </div>
                    <form id="contact" action="keys/agrega.php" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-12">
                                <fieldset>
                                    <!-- <label class="post-btn-container btn-upload postcheck1" for="inputpost" onclick="post()" title="Publicar Foto">
                                        <i class="fas fa-plus"></i>

                                    </label> -->
                                    <input class="form-control" type="file"  name="foto[]" multiple  required="">

                                 
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
                                    <select style="width: 100%;
                                            height: 44px;
                                            line-height: 44px;
                                            padding: 0px 15px;
                                            font-size: 14px;
                                            font-style: italic;
                                            font-weight: 500;
                                            color: #aaa;
                                            border-radius: 0px;
                                            border: 1px solid #7a7a7a;
                                            box-shadow: none;" class="form-control" id="categoria" name="categoria" required>
                                        <option>Categoria</option>
                                        <option value="mujer">women</option>
                                        <option value="rostro">Rostro</option>
                                        <option value="uñas">Uñas</option>
                                        <option value="ojos">Ojos</option>
                                    </select>
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
                                    <div class="dropdown" style="margin-right: 20px; ">
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