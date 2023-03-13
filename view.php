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
            <?php $descripcion = $com['descripcion']; ?>

            <?php $idProducto = $com['id_producto']; ?>
            <section class="contact-us" id="product">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">

                            <div id="demo" class="carousel slide" data-ride="carousel">
                                <?php
                                require("keys/conection.php");
                                if ($conn) {
                                    $SELECT = "select * from fotoporproducto where id_producto=$id_articulo";
                                    $resultado = mysqli_query($conn, $SELECT);
                                    if ($resultado) {
                                        $nums_slides = mysqli_num_rows($resultado);



                                ?>
                                        <ol class="carousel-indicators">
                                            <?php
                                            for ($i = 0; $i < $nums_slides; $i++) {
                                                $active = "active";
                                            ?>
                                                <li data-target="#demo" data-slide-to="<?php echo $i; ?>" class="<?php echo $active; ?>"></li>
                                            <?php
                                                $active = "";
                                            }
                                            ?>
                                        </ol>
                                        <div class="carousel-inner">
                                            <?php
                                            $active = "active";
                                            while ($rw_slider = mysqli_fetch_array($resultado)) {
                                            ?>
                                                <div class="carousel-item carrusel-img <?php echo $active; ?>">
                                                    <img data-src="holder.js/900x500/auto/#777:#777" alt="900x500" src="<?php echo $rw_slider['directorio']; ?>" data-holder-rendered="true">

                                                </div>
                                            <?php
                                                $active = "";
                                            }
                                            ?>

                                        </div>
                                <?php

                                    } else {
                                        echo " se fue a la verga";
                                    }
                                } else {
                                    echo "la coneccion fallo";
                                }
                                ?>


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
                            <form id="" action="keys/addToCar.php" method="post">
                                <div class="right-content">
                                    <h4><?php echo $com['articulo']; ?></h4>
                                    <span class="price">$<?php echo $com['precio']; ?></span>


                                    <span>Size</span>
                                    <div class="container">
                                        <div class="row">
                                            <div class="btn-group btn-group-toggle " data-toggle="buttons">
                                                <?php
                                                require("keys/conection.php");
                                                if ($conn) {
                                                    $SELECT = "select s.valor from sizeporproducto sp inner join size s on sp.id_size= s.id where sp.id_producto=$id_articulo";
                                                    $resultado = mysqli_query($conn, $SELECT);
                                                    if ($resultado) {
                                                        while ($com = $resultado->fetch_array()) {
                                                ?>

                                                            <label style="border-radius:20%; height: 50px;width:50px;margin:auto" class="btn btn-outline-secondary active mr-1">
                                                                <input style="font-size:14px;" required type="radio" name="size" id="option1" autocomplete="off" value="<?php echo $com['valor']; ?>"> <?php echo $com['valor']; ?>
                                                            </label>

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
                                    </div>

                                    <hr>

                                    <span>Colors</span>
                                    <div class="container">
                                        <div class="row">
                                            <div class="btn-group btn-group-toggle " data-toggle="buttons">

                                                <?php
                                                require("keys/conection.php");
                                                if ($conn) {
                                                    $SELECT = "select c.valor from colorporproducto cp inner join color c on cp.id_color= c.id where cp.id_producto=$id_articulo";
                                                    $resultado = mysqli_query($conn, $SELECT);
                                                    if ($resultado) {
                                                        while ($com = $resultado->fetch_array()) {
                                                ?>

                                                            <label style="border-radius:50%; font-size:30px; background-color:<?php echo $com['valor']; ?>;
                                                             height: 50px;width:50px;margin:auto" class="btn btn-outline-secondary active mr-1 ">
                                                                <input type="radio" name="color" value="<?php echo $com['valor']; ?>" required>
                                                            </label>



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
                                    </div>
                                </div>
                                <div class="quantity-content">
                                    <div class="left-content">
                                    </div>
                                    <span><b>Descripcion</b><br><?php echo $descripcion ?></span>
                                    <div class="quote">
                                        <div class="right-content">

                                        </div>
                                    </div>


                                </div>
                                <div class="contact">
                                    <div style="width: 100%; text-align: center;" class="contact">


                                        <input type="hidden" name="product_id" value="<?php echo $idProducto ?>">
                                        <button type="submit" style="width: 100%; text-align: center;">Add to bag</button>


                                    </div>
                                </div>
                            </form>
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