<?php
require("head.php");
?>
<!-- <div class="page-heading kids-page" id="top">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-content">
                    <h2>Ojos</h2>
                    <span>Deslumbra con tus ojos.</span>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- ***** Main Banner Area End ***** -->


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

    <!-- <ul class="nav">
    <li class="scroll-to-section"><a href="onfire.php">On Fire</a></li>
    <li class="submenu">
        <a href="javascript:;">ORDENAR POR</a>
        <ul>
            <li><a href="esmalte.php">Recomendado</a></li>

            <li><a href="signup.php"> Precio: Del más Bajo almás Alto</a></li>
            <li><a href="agregar.php">Precio: Del más Alto al
                    más Bajo</a></li>

            <li><a href="login.php">Nombre: A a la Z</a></li>
            <li><a href="login.php">Nombre: z a la A</a></li>


        </ul>
    </li>
    </ul> -->


    <div class="container">
        <div class="row" style="float: right; margin-top: -50px;">
            <div class="dropdown" style="margin-right: 20px;">
                <button style="color:black" class="btn btn-outline-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Color </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <div class="form-check" style="margin:10px">
                        <label class="form-check-label">
                            <input style="height: 20px;width: 20px;" type="checkbox" class="form-check-input" value="">
                            <span style="margin-left:20px; font-size:16px">Blue</span>
                        </label>
                    </div>
                    <div class="form-check" style="margin:10px">
                        <label class="form-check-label">
                            <input style="height: 20px;width: 20px;" type="checkbox" class="form-check-input" value="">
                            <span style="margin-left:20px; font-size:16px">Black</span>
                        </label>
                    </div>
                    <div class="form-check" style="margin:10px">
                        <label class="form-check-label">
                            <input style="height: 20px;width: 20px;" type="checkbox" class="form-check-input" value="">
                            <span style="margin-left:20px; font-size:16px">White</span>
                        </label>
                    </div>
                </div>

            </div>
            <div class="dropdown" style="margin-right: 20px;">
                <button style="color:black" class="btn btn-outline-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Size </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <div class="form-check" style="margin:10px">
                        <label class="form-check-label">
                            <input style="height: 20px;width: 20px;" type="checkbox" class="form-check-input" value="">
                            <span style="margin-left:20px; font-size:16px">Small</span>
                        </label>
                    </div>
                    <div class="form-check" style="margin:10px">
                        <label class="form-check-label">
                            <input style="height: 20px;width: 20px;" type="checkbox" class="form-check-input" value="">
                            <span style="margin-left:20px; font-size:16px">Midium</span>
                        </label>
                    </div>
                    <div class="form-check" style="margin:10px">
                        <label class="form-check-label">
                            <input style="height: 20px;width: 20px;" type="checkbox" class="form-check-input" value="">
                            <span style="margin-left:20px; font-size:16px">Large</span>
                        </label>
                    </div>
                </div>

            </div>
            <div class="dropdown">
                <button style="color:black" class="btn btn-outline-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    ORDENAR POR
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Recomendado</a>
                    <a class="dropdown-item" href="#">Precio: Del más Bajo al más Alto</a>
                    <a class="dropdown-item" href="#">Precio: Del más Alto al más Bajo</a>
                    <a class="dropdown-item" href="#">Nombre: A a la Z</a>
                    <a class="dropdown-item" href="#">Nombre: z a la A</a>
                </div>

            </div>
        </div>


        <div class="row">
            <?php
            require("keys/conection.php");
            if ($conn) {
                $SELECT = "SELECT * FROM tiendav.productos WHERE categoria = 'mujer' ORDER BY rand() ";
                $resultado = mysqli_query($conn, $SELECT);
                if ($resultado) {
                    while ($com = $resultado->fetch_array()) {
            ?>
                        <?php $com['id_producto']; ?>



                        <?php $com['descripcion']; ?>
                        <div class="col-lg-3">
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
<?php
require("footer.php");
?>