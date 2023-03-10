<?php
require("head.php");
?>

<section class="section" id="products">
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <div class="col-lg-4">
                <div class="section-heading">
                    <h2>Most outstanding</h2>
                    <label >Seasonal Offers</label>
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
                                            <li><a href="car.php?id_articulo=<?php echo $com['id_producto']; ?>"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <div style="height: 400px;">
                                        <a href="view.php?id_articulo=<?php echo $com['id_producto']; ?>">
                                            <img style="width: 100%;
                                                            height: 100%;
                                                            object-fit: cover;
                                                            object-position: center center;" src=<?php echo $com['foto']; ?> alt="">
                                        </a>

                                    </div>
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
require("footer.php");
?>