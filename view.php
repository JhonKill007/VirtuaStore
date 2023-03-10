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
            <section class="contact-us" id="product">
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
                                        <img style="box-shadow: 0 6px 10px rgba(0,0,0,.08), 0 0 6px rgba(0,0,0,.05);" src=<?php echo $com['foto']; ?> alt="" width="1100" height="500">
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


                                <span>Size</span>
                                <div class="container">
                                    <div class="row">
                                        <div class="btn-group btn-group-toggle overflow-auto" data-toggle="buttons">
                                            <label style="border-radius:20%; height: 50px;width:50px;margin:auto" class="btn btn-outline-secondary active mr-1">
                                                <input style="font-size:14px;" type="radio" name="options" id="option1" autocomplete="off"> 11
                                            </label>
                                            <label style="border-radius:20%;height: 50px;width:50px;margin:auto" class="btn btn-outline-secondary active mr-1">
                                                <input type="radio" name="options" id="option2" autocomplete="off"> 13
                                            </label>
                                            <label style="border-radius:20%; height: 50px;width:50px ;margin:auto" class="btn btn-outline-secondary active mr-1">
                                                <input type="radio" name="options" id="option3" autocomplete="off"> 15
                                            </label>
                                            
                                           
                                        </div>
                                    </div>
                                </div>
                                
                                <hr>
                              
                                <span>Colors</span>
                                <div class="container">
                                    <div class="row">
                                        <div class="btn-group btn-group-toggle overflow-auto" data-toggle="buttons">
                                            <label style="border-radius:50%; background-color:aqua; height: 50px;width:50px;margin:auto" class="btn btn-outline-secondary active mr-1 ">
                                                <input type="radio" name="options" id="option1" checked> 
                                            </label>
                                            <label style="border-radius:50% ;background-color:red;height: 50px;width:50px;margin:auto" class="btn btn-outline-secondary active mr-1">
                                                <input type="radio" name="options" id="option2" autocomplete="off"> 
                                            </label>
                                            <label style="border-radius:50%; background-color:black;height: 50px;width:50px;margin:auto" class="btn btn-outline-secondary active mr-1">
                                                <input type="radio" name="options" id="option3" autocomplete="off"> 
                                            </label>

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
                            <div class="contact">
                                <div style="width: 100%; text-align: center;" class="contact">
                                    <form id="contact" action="keys/addToCar.php" method="post">
                                        <input type="hidden" name="product_id" value="<?php echo $com['id_producto']; ?>">
                                        <button type="submit" style="width: 100%; text-align: center;">Add to bag</button>

                                        <!-- href="car.php?id_art=<?php echo $com['id_producto']; ?> -->
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <section class="section" id="products">
                <div class="container" style="margin-top: 20px;">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="section-heading">
                                <h2>Lo mas destacado</h2>
                                <span>Las Ofertas de temporada</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <?php
                        require("keys/conection.php");
                        if ($conn) {
                            $SELECT = "SELECT * FROM productos WHERE categoria = 'mujer' ORDER BY rand() ";
                            $resultado = mysqli_query($conn, $SELECT);
                            if ($resultado) {
                                while ($com = $resultado->fetch_array()) {
                        ?>
                                    <?php $com['id_producto']; ?>



                                    <?php $com['descripcion']; ?>
                                    <div class="col-lg-3">
                                        <div class="item">
                                            <div class="thumb">
                                                <!-- <div class="hover-content">
                                        <div class="inner">
                                        <img src=<?php echo $com['foto']; ?> alt="">

                                        </div>
                                    </div> -->

                                                <div class="hover-content">
                                                    <ul>
                                                        <li><a href="view.php?id_articulo=<?php echo $com['id_producto']; ?>"><i class="fa fa-eye"></i></a></li>
                                                        <li><a href="car.php?id_articulo=<?php echo $com['id_producto']; ?>"><i class="fa fa-shopping-cart"></i></a></li>
                                                    </ul>
                                                </div>
                                                <img src=<?php echo $com['foto']; ?> alt="">
                                            </div>
                                            <div class="down-content">
                                                <h4><?php echo $com['articulo']; ?></h4>
                                                <span>$<?php echo $com['precio']; ?></span>

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
                    </div>
                </div>
            </section>
            <!-- ***** Men Area Ends ***** -->



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