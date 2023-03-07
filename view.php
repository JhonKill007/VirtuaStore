<?php
require("head.php");
$id_articulo = $_GET['id_articulo']
?>
<style>
    /* Make the image fully responsive */
    .carousel-inner img {
        width: 100%;
        height: 100%;
    }
</style>
<br>
<br>
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
            <?php $com['id_producto']; ?>
            <section class="section" id="product">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <!-- <div class="left-images">
                                <img src=<?php echo $com['foto']; ?> alt="">
                            </div> -->
                            <div id="demo" class="carousel slide" data-ride="carousel">

                                <!-- Indicators -->
                                <ul class="carousel-indicators">
                                    <li data-target="#demo" data-slide-to="0" class="active"></li>
                                    <li data-target="#demo" data-slide-to="1"></li>
                                    <li data-target="#demo" data-slide-to="2"></li>
                                </ul>

                                <!-- The slideshow -->
                                <div class="carousel-inner">
                                    <div class="carousel-item active ">
                                        <img style="box-shadow: 0 6px 10px rgba(0,0,0,.08), 0 0 6px rgba(0,0,0,.05);"
                                         src=<?php echo $com['foto']; ?> alt="" width="1100" height="500">
                                    </div>
                                    <div class="carousel-item">
                                        <img src=<?php echo $com['foto']; ?> alt="" width="1100" height="500">
                                    </div>
                                    <div class="carousel-item">
                                        <img src=<?php echo $com['foto']; ?> alt="" width="1100" height="500">
                                    </div>
                                </div>

                                <!-- Left and right controls -->
                                <a style="width: 30px;
    margin: auto;
    border: 3px solid black;
    height: 50px;" class="carousel-control-prev" href="#demo" data-slide="prev">
                                    <i style="color:black" class="fa-solid fa-chevron-left"></i>
                                </a>
                                <a style="width: 30px;
    margin: auto;
    border: 3px solid black;
    height: 50px;" class="carousel-control-next" href="#demo" data-slide="next">

                                    <i style="color:black" class="fa-solid fa-chevron-right"></i>

                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="right-content">
                                <h4><?php echo $com['articulo']; ?></h4>
                                <span class="price">$<?php echo $com['precio']; ?></span>
                                <ul class="stars">
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                </ul>

                                <span>Size</span>
                                <div class="container">
                                    <div class="row">
                                        <div style="border:1px solid black; height:40px;width:50px; border-radius:20%; margin:0 5px 5px 0 ">
                                            <span style="text-align: center;margin: auto;font-size: 24px; padding:2px">S</span>
                                        </div>
                                        <div style="border:1px solid black; height:40px;width:50px; border-radius:20%; margin:0 5px 5px 0 ">
                                            <span style="text-align: center;margin: auto;font-size: 24px; padding:2px">M</span>
                                        </div>
                                        <div style="border:1px solid black; height:40px;width:50px; border-radius:20%; margin:0 5px 5px 0 ">
                                            <span style="text-align: center;margin: auto;font-size: 24px; padding:2px">L</span>
                                        </div>
                                        <div style="border:1px solid black; height:40px;width:50px; border-radius:20%; margin:0 5px 5px 0 ">
                                            <span style="text-align: center;margin: auto;font-size: 24px; padding:2px">XL</span>
                                        </div>
                                        <div style="border:1px solid black; height:40px;width:50px; border-radius:20%; margin:0 5px 5px 0 ">
                                            <span style="text-align: center;margin: auto;font-size: 24px;padding:2px">XXL</span>
                                        </div>
                                        <div style="border:1px solid black; height:40px;width:50px; border-radius:20%; margin:0 5px 5px 0 ">
                                            <span style="text-align: center;margin: auto;font-size: 24px; padding:2px">XS</span>
                                        </div>
                                        <div style="border:1px solid black; height:40px;width:50px; border-radius:20%; margin:0 5px 5px 0 ">
                                            <span style="text-align: center;margin: auto;font-size: 24px; padding:2px">XXS</span>
                                        </div>

                                    </div>
                                </div>





                            </div>
                            <div class="quantity-content">
                                <div class="left-content">
                                </div>
                                <span><b>Descripcion</b><br><?php echo $com['descripcion']; ?></span>
                                <div class="quote">
                                    <div class="right-content">

                                    </div>
                                </div>


                            </div>
                            <div class="total">
                                <div style="width: 100%; text-align: center;" class="main-border-button">
                                    <a style="width: 100%; text-align: center;" href="car.php?id_art=<?php echo $com['id_producto']; ?>">Add to bag</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>



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