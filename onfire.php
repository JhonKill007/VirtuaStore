<?php
require("head.php");
?>
<!-- <div class="page-heading men-page" id="top">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-content">
                    <h2>Rostro</h2>
                    <span>Has que tu rostro se ilumine.</span>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- ***** Main Banner Area End ***** -->

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

<?php
require("footer.php");
?>