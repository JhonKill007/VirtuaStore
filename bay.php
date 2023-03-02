<?php
require("head.php");
$id_articulo = $_GET['id_art']
?>
<br>
<br>
<?php
require("keys/conection.php");
if ($conn) {
    $SELECT = "SELECT * FROM productos WHERE id_producto = $id_articulo";
    $resultado = mysqli_query($conn, $SELECT);
    if ($resultado) {
        while ($com = $resultado->fetch_array()) {
?>
            <div class="contact-us">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div id="map">
                                <div class="left-images">
                                    <img src=<?php echo $com['foto']; ?> alt="">
                                </div>
                                <h4><?php echo $com['articulo']; ?></h4>
                                <span class="price">$<?php echo $com['precio']; ?></span>
                                <span><b>Descripcion</b><br><?php echo $com['descripcion']; ?></span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="section-heading">
                                <h2>Pagar Producto</h2>
                                <span>Informacion de Comprador.</span>
                            </div>
                            <form id="contact" action="keys/ventas.php" method="post">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <fieldset>
                                            <input type="hidden" name="id_producto" value="<?php echo $com['id_producto']; ?>">
                                            <input name="nombre" type="text" id="name" placeholder="Nombre" required="">
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-6">
                                        <fieldset>
                                            <input name="apellido" type="text" placeholder="Apellido" required="">
                                        </fieldset>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="col-lg-12">
                                        <fieldset>
                                            <input type="number" placeholder="Numero" name="numero">
                                        </fieldset>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="col-lg-12">
                                        <fieldset>
                                            <input type="email" placeholder="Email" name="email">
                                        </fieldset>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="col-lg-12">
                                        <fieldset>
                                            <input type="text" placeholder="Direccion" name="direccion">
                                        </fieldset>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="col-lg-12">
                                        <fieldset>
                                            <input class="main-dark-button" type="submit" value="Comprar">
                                        </fieldset>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
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


<?php
require("footer.php");
?>