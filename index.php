<?php
require("head.php");
?>
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active" >
    <img src="assets/images/carrusel.jpg" alt="" class="d-block w-100">
    <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
        <p>Some representative placeholder content for the third slide.</p>
      </div>
    </div>
    <div class="carousel-item">
    <img src="assets/images/carrusel2.jpg" class="d-block w-100" width="100%">
    <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
        <p>Some representative placeholder content for the third slide.</p>
      </div>
    </div>
    <div class="carousel-item">
    <img src="assets/images/carrusel3.web" class="d-block w-100">
    <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
        <p>Some representative placeholder content for the third slide.</p>
      </div>
    </div>
  </div>

</div>

<section class="section" id="products">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-heading">
                    <h2>Lo mas destacado</h2>
                    <span>Mas detalles en la seccion de labios.</span>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <?php
            require("keys/conection.php");
            if ($conn) {
                $SELECT = "SELECT * FROM productos WHERE categoria = 'pantalon' ORDER BY rand() ";
                $resultado = mysqli_query($conn, $SELECT);
                if ($resultado) {
                    while ($com = $resultado->fetch_array()) {
            ?>
                        <?php $com['id_producto']; ?>



                        <?php $com['descripcion']; ?>
                        <div class="col-lg-3">
                            <div class="item" >
                                <div class="thumb">
                                <!-- <div class="hover-content">
                                        <div class="inner">
                                        <img src=<?php echo $com['foto']; ?> alt="">

                                        </div>
                                    </div> -->
                                    
                                    <div class="hover-content">
                                        <ul>
                                            <li><a href="view.php?id_articulo=<?php echo $com['id_producto']; ?>"><i class="fa fa-eye"></i></a></li>
                                            <li><a href="view.php?id_articulo=<?php echo $com['id_producto']; ?>"><i class="fa fa-star"></i></a></li>
                                            <li><a href="view.php?id_articulo=<?php echo $com['id_producto']; ?>"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <img src=<?php echo $com['foto']; ?> alt="">
                                </div>
                                <div class="down-content">
                                    <h4><?php echo $com['articulo']; ?></h4>
                                    <span>$<?php echo $com['precio']; ?></span>
                                    <ul class="stars">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
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

<!-- ***** Women Area Starts ***** -->
<section class="section" id="women">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-heading">
                    <h2>Lo ultimo para Ojos</h2>
                    <span>Mas detalles en la seccion de ojos.</span>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="women-item-carousel">
                    <div class="owl-men-item owl-carousel">
                        <?php
                        require("keys/conection.php");
                        if ($conn) {
                            $SELECT = "SELECT * FROM productos WHERE categoria = 'ojos' ORDER BY rand() LIMIT 3";
                            $resultado = mysqli_query($conn, $SELECT);
                            if ($resultado) {
                                while ($com = $resultado->fetch_array()) {
                        ?>




                                    <?php $com['descripcion']; ?>
                                    <div class="item">
                                        <div class="thumb">
                                            <div class="hover-content">
                                                <ul>
                                                    <li><a href="view.php?id_articulo=<?php echo $com['id_producto']; ?>"><i class="fa fa-eye"></i></a></li>
                                                    <li><a href="view.php?id_articulo=<?php echo $com['id_producto']; ?>"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="view.php?id_articulo=<?php echo $com['id_producto']; ?>"><i class="fa fa-shopping-cart"></i></a></li>
                                                </ul>
                                            </div>
                                            <img src=<?php echo $com['foto']; ?> alt="">
                                        </div>
                                        <div class="down-content">
                                            <h4><?php echo $com['articulo']; ?></h4>
                                            <span>$<?php echo $com['precio']; ?></span>
                                            <ul class="stars">
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                            </ul>
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
            </div>
        </div>
    </div>
</section>
<!-- ***** Women Area Ends ***** -->

<!-- ***** Kids Area Starts ***** -->
<section class="section" id="kids">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-heading">
                    <h2>Lo ultimo de Rostro</h2>
                    <span>Mas detalles ir a la seccion de rostro.</span>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="kid-item-carousel">
                    <div class="owl-men-item owl-carousel">
                        <?php
                        require("keys/conection.php");
                        if ($conn) {
                            $SELECT = "SELECT * FROM productos WHERE categoria = 'rostro' ORDER BY rand() LIMIT 3";
                            $resultado = mysqli_query($conn, $SELECT);
                            if ($resultado) {
                                while ($com = $resultado->fetch_array()) {
                        ?>




                                    <?php $com['descripcion']; ?>
                                    <div class="item">
                                        <div class="thumb">
                                            <div class="hover-content">
                                                <ul>
                                                    <li><a href="view.php?id_articulo=<?php echo $com['id_producto']; ?>"><i class="fa fa-eye"></i></a></li>
                                                    <li><a href="view.php?id_articulo=<?php echo $com['id_producto']; ?>"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="view.php?id_articulo=<?php echo $com['id_producto']; ?>"><i class="fa fa-shopping-cart"></i></a></li>
                                                </ul>
                                            </div>
                                            <img src=<?php echo $com['foto']; ?> alt="">
                                        </div>
                                        <div class="down-content">
                                            <h4><?php echo $com['articulo']; ?></h4>
                                            <span>$<?php echo $com['precio']; ?></span>
                                            <ul class="stars">
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                            </ul>
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
            </div>
        </div>
    </div>
</section>
<!-- ***** Kids Area Ends ***** -->

<!-- ***** Explore Area Starts ***** -->
<section class="section" id="explore">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="left-content">
                    <h2>Explora Nuestros Esmaltes</h2>
                    <span>Nuestra coleccion de esmaltes esta enrtre las Mejores del pais.</span>
                    <div class="quote">
                        <i class="fa fa-quote-left"></i>
                        <p>No te puedes perder lo oportunidad de verlos.</p>
                    </div>
                    <div class="main-border-button">
                        <a href="accesorios.php">Discover More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="right-content">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="leather">
                                <h4>Brilla</h4>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="first-image">
                                <img src="assets/images/explore-image-01.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="second-image">
                                <img src="assets/images/explore-image-02.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="types">
                                <h4>Mas!!</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section" id="social">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading">
                    <h2>Social Media</h2>
                    <span>Details to details is what makes Hexashop different from the other themes.</span>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row images">
            <div class="col-2">
                <div class="thumb">
                    <div class="icon">
                        <a href="http://instagram.com">
                            <h6>Fashion</h6>
                            <i class="fa fa-instagram"></i>
                        </a>
                    </div>
                    <img src="assets/images/instagram-01.jpg" alt="">
                </div>
            </div>
            <div class="col-2">
                <div class="thumb">
                    <div class="icon">
                        <a href="http://instagram.com">
                            <h6>New</h6>
                            <i class="fa fa-instagram"></i>
                        </a>
                    </div>
                    <img src="assets/images/instagram-02.jpg" alt="">
                </div>
            </div>
            <div class="col-2">
                <div class="thumb">
                    <div class="icon">
                        <a href="http://instagram.com">
                            <h6>Brand</h6>
                            <i class="fa fa-instagram"></i>
                        </a>
                    </div>
                    <img src="assets/images/instagram-03.jpg" alt="">
                </div>
            </div>
            <div class="col-2">
                <div class="thumb">
                    <div class="icon">
                        <a href="http://instagram.com">
                            <h6>Makeup</h6>
                            <i class="fa fa-instagram"></i>
                        </a>
                    </div>
                    <img src="assets/images/instagram-04.jpg" alt="">
                </div>
            </div>
            <div class="col-2">
                <div class="thumb">
                    <div class="icon">
                        <a href="http://instagram.com">
                            <h6>Leather</h6>
                            <i class="fa fa-instagram"></i>
                        </a>
                    </div>
                    <img src="assets/images/instagram-05.jpg" alt="">
                </div>
            </div>
            <div class="col-2">
                <div class="thumb">
                    <div class="icon">
                        <a href="http://instagram.com">
                            <h6>Bag</h6>
                            <i class="fa fa-instagram"></i>
                        </a>
                    </div>
                    <img src="assets/images/instagram-06.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<?php
require("footer.php");
?>