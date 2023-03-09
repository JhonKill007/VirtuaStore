<?php
require("head.php");

if (isset($_SESSION['id'])) {
?>
    <br>
    <br>
    <br>
    <div class="contact-us">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h2>Agregar Productos</h2>
                        <span>Aqui se agregan los proctuctos que se van a vender.</span>
                    </div>
                    <form id="contact" action="keys/agrega.php" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-12">
                                <fieldset>
                                    <input class="form-control" type="file" name="foto" required="">
                                </fieldset>
                            </div>
                            <br>
                            <br>
                            <br>
                            <div class="col-lg-12">
                                <fieldset>
                                    <input class="form-control" name="nombre" type="text" id="name" placeholder="Nombre" required="">
                                </fieldset>
                            </div>
                            <br>
                            <br>
                            <br>
                            <div class="col-lg-6">
                                <fieldset>
                                    <input class="form-control" name="precio" type="number" id="name" placeholder="Precio" required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-6">
                                <fieldset>
                                    <select class="form-control" id="categoria" name="categoria" required>
                                        <option>Categoria</option>
                                        <option value="mujer">women</option>
                                        <option value="rostro">Rostro</option>
                                        <option value="uñas">Uñas</option>
                                        <option value="ojos">Ojos</option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <textarea class="form-control" name="descripcion" rows="6" id="message" placeholder="Descripcion" required=""></textarea>
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <input class="main-dark-button" type="submit" value="Guardar">
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
    header("Location:login.php");
}
?>