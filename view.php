<?php
session_start();
require("head.php");
$id_articulo = $_GET['id_articulo']
?>
<style>
    .btn-outline-secondary:not(:disabled):not(.disabled).active,
    .btn-outline-secondary:not(:disabled):not(.disabled):active,
    .show>.btn-outline-secondary.dropdown-toggle {
        color: #fff;
        background-color: #000000;
        border-color: #000000;
    }

    .btn-outline-secondary:hover {
        color: #fff;
        background-color: #000000;
        border-color: #000000;
    }

    .zoomIt {
        display: inline-block !important;
        -webkit-transition: -webkit-transform 1s ease-out;
        transition: transform 0.5s ease-out;
        margin-top: px;
    }

    .zoomIt:hover {

        -webkit-transform: scale(2);
        transform: scale(2)
    }

    /* Make the image fully responsive */
    .carousel-inner img {
        width: 100%;
        height: 100%;
    }

    .quantity {
        position: relative;
    }

    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    input[type=number] {
        -moz-appearance: textfield;
    }

    .quantity input {
        width: 45px;
        height: 42px;
        line-height: 1.65;
        float: left;
        display: block;
        padding: 0;
        margin: 0;
        padding-left: 20px;
        border: 1px solid #eee;
    }

    .quantity input:focus {
        outline: 0;
    }

    .quantity-nav {
        float: left;
        position: relative;
        height: 42px;
    }

    .quantity-button {
        position: relative;
        cursor: pointer;
        border-left: 1px solid #eee;
        width: 20px;
        text-align: center;
        color: #333;
        font-size: 13px;
        font-family: "Trebuchet MS", Helvetica, sans-serif !important;
        line-height: 1.7;
        -webkit-transform: translateX(-100%);
        transform: translateX(-100%);
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        -o-user-select: none;
        user-select: none;
    }

    .quantity-button.quantity-up {
        position: absolute;
        height: 50%;
        top: 0;
        border-bottom: 1px solid #eee;
    }

    .quantity-button.quantity-down {
        position: absolute;
        bottom: -1px;
        height: 50%;
    }

    .checkboxSelected input:checked {
        border: 1px solid red !important;

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
            <?php $cantidad = $com['cantidad']; ?>


            <section class="contact-us" id="product" style="margin-top: 15px;">
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
                                                $idFP = $rw_slider['id'];

                                            ?>
                                                <div class="carousel-item carrusel-img <?php echo $active; ?>">
                                                    <img class="zoomIt" data-src="holder.js/900x500/auto/#777:#777" alt="900x500" src="<?php echo $rw_slider['directorio']; ?>" data-holder-rendered="true">

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

                        <div class="col-lg-7">
                            <form id="" action="keys/addToCar.php" method="post">
                                <div class="right-content">
                                    <h4><?php echo $com['articulo']; ?></h4>
                                    <span class="price">$<?php echo $com['precio']; ?></span>


                                    <span id="size" style="color:black; margin-bottom: 10px;font-weight: bold; margin-top:2px"> Sizes
                                    </span>
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
                                                                <input style="font-size:14px;" class="size" required type="radio" name="size" id="option1" autocomplete="off" value="<?php echo $com['valor']; ?>"> <?php echo $com['valor']; ?>
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
                                    <span id="color" style="color:black; margin-bottom: -20px;font-weight: bold; margin-top:2px"> Colors</span>
                                    <span> </span>

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
                                                             height: 50px;width:50px;margin:auto" class="btn btn-outline-secondary active mr-1 checkboxSelected">
                                                                <input type="radio" name="color" class="color" id="option1" value="<?php echo $com['valor']; ?>" required>
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
                                <hr>
                                <div class="">

                                    <span><b>Quantity</b></span>
                                    <div class="container">
                                        <div class="row">
                                            <div class="quantity">
                                                <div class="right-content">
                                                    <input style="width: 80px;" name="cantidad" type="number" min="1" max="<?php echo $cantidad; ?>" step="1" value="1">
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <hr>
                                </div>
                                <div class="">
                                    <div class="left-content">
                                    </div>
                                    <span><b>Descripcion</b><br><?php echo $descripcion ?></span>
                                    <div class="quote">
                                        <div class="right-content">

                                        </div>
                                    </div>

                                    <hr>
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

            <!-- <?php
                    // if (isset($_SESSION['id'])) {
                    ?> -->
            <section class="section" id="products">
                <div class="container" style="margin-top: 20px;">
                    <div class="row">
                        <div class="col-lg-4">
                            <div style="text-align: left !important;"class="section-heading">
                                <h2 >Outstanding</h2>
                                <span>More details in the product section.</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <?php
                        require("keys/conection.php");
                        if ($conn) {
                            $SELECT = "SELECT * FROM productos  ORDER BY rand() LIMIT 8 ";
                            $resultado = mysqli_query($conn, $SELECT);
                            if ($resultado) {
                                while ($com = $resultado->fetch_array()) {
                        ?>
                                    <?php $id_articulo = $com['id_producto']; ?>



                                    <?php $com['descripcion']; ?>
                                    <div class="col-lg-3">
                                        <div class="item">
                                            <div class="thumb">

                                                <div class="hover-content">
                                                    <ul>
                                                        <li><a href="view.php?id_articulo=<?php echo $com['id_producto']; ?>"><i class="fa fa-eye"></i></a></li>
                                                        <li>
                                                            <?php $productoSelect = $com['id_producto']; ?>
                                                            <a style="cursor: pointer;" class="" data-toggle="modal" data-target="#exampleModal-<?php echo $com['id_producto']; ?>">
                                                                <i class="fa fa-shopping-cart"></i>

                                                            </a>


                                                        </li>
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
                                            <div class="down-content" style="text-align: center">
                                                <span style="font-size: 15px; color:grey"><?php echo $com['articulo']; ?></span>
                                                <span style="font-size: 15px;color:grey">$<?php echo $com['precio']; ?></span>

                                                <?php

                                                if ($conn) {
                                                    $SELECT = "select c.valor from color c inner join  colorporproducto cp on c.id = cp.id_color where cp.id_producto=$id_articulo ";
                                                    $resultadoColor = mysqli_query($conn, $SELECT);
                                                    if ($resultadoColor) {
                                                        while ($com = $resultadoColor->fetch_array()) {
                                                ?>

                                                            <div style="display: inline-block;">
                                                                <span style="border-radius:50%; border:1px solid black;  background-color:<?php echo $com['valor']; ?>;
                                                             height: 20px;width:20px;margin:auto" class="  ">
                                                                </span>
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
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal-<?php echo $id_articulo ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Select Size and Color</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form id="" action="keys/addToCar.php" method="post">
                                                    <div class="modal-body">

                                                        <div class="right-content">
                                                            <span id="sizeM" style="color:black; margin-bottom: 10px;font-weight: bold"> Sizes</span>
                                                            <div class="container">
                                                                <div class="row">
                                                                    <div class="btn-group btn-group-toggle " data-toggle="buttons">
                                                                        <?php
                                                                        require("keys/conection.php");
                                                                        if ($conn) {
                                                                            $SELECT = "select s.valor from sizeporproducto sp inner join size s on sp.id_size= s.id where sp.id_producto=$id_articulo ";
                                                                            $resultadoM = mysqli_query($conn, $SELECT);
                                                                            if ($resultadoM) {
                                                                                while ($com = $resultadoM->fetch_array()) {
                                                                        ?>

                                                                                    <label style="border-radius:20%; height: 50px;width:50px;margin:auto" class="btn btn-outline-secondary active mr-1">
                                                                                        <input style="font-size:14px;" class="sizeM" required type="radio" name="size" id="option1" autocomplete="off" value="<?php echo $com['valor']; ?>"> <?php echo $com['valor']; ?>
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

                                                            <span id="colorM" style="color:black; margin-bottom: -20px;font-weight: bold"> Colors</span>

                                                            <div class="container">

                                                                <div class="row">
                                                                    <div class="btn-group btn-group-toggle " data-toggle="buttons">



                                                                        <?php
                                                                        if ($conn) {
                                                                            $SELECT = "select c.valor from colorporproducto cp inner join color c on cp.id_color= c.id where cp.id_producto=$productoSelect";
                                                                            $resultadoC = mysqli_query($conn, $SELECT);
                                                                            if ($resultadoC) {
                                                                                while ($com = $resultadoC->fetch_array()) {
                                                                        ?>

                                                                                    <label style="border-radius:50%; font-size:30px; background-color:<?php echo $com['valor']; ?>;
                                                             height: 50px;width:50px;margin:auto" class="btn btn-outline-secondary active mr-1 ">
                                                                                        <input type="radio" class="colorM" name="color" value="<?php echo $com['valor']; ?>" required>
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



                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <input type="hidden" name="product_id" value="<?php echo $productoSelect; ?>">
                                                        <button type="submit" class="btn btn-dark">Add to Bag</button>


                                                    </div>
                                                </form>
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
            <!-- <?php
                    // }
                    ?> -->



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

<script>
    $(document).ready(function() {
        $('.color').click(function() {
            document.getElementById('color').innerHTML = "Color: " + $(this).val();
        });
        $('.size').click(function() {
            document.getElementById('size').innerHTML = "Size: " + $(this).val();
        });
        $('.colorM').click(function() {
            document.getElementById('colorM').innerHTML = "Color: " + $(this).val();
        });
        $('.sizeM').click(function() {
            document.getElementById('sizeM').innerHTML = "Size: " + $(this).val();
        });
    });
</script>

<script>
    jQuery('<div class="quantity-nav"><div class="quantity-button quantity-up">+</div><div class="quantity-button quantity-down">-</div></div>').insertAfter('.quantity input');
    jQuery('.quantity').each(function() {
        var spinner = jQuery(this),
            input = spinner.find('input[type="number"]'),
            btnUp = spinner.find('.quantity-up'),
            btnDown = spinner.find('.quantity-down'),
            min = input.attr('min'),
            max = input.attr('max');

        btnUp.click(function() {
            var oldValue = parseFloat(input.val());
            if (oldValue >= max) {
                var newVal = oldValue;
            } else {
                var newVal = oldValue + 1;
            }
            spinner.find("input").val(newVal);
            spinner.find("input").trigger("change");
        });

        btnDown.click(function() {
            var oldValue = parseFloat(input.val());
            if (oldValue <= min) {
                var newVal = oldValue;
            } else {
                var newVal = oldValue - 1;
            }
            spinner.find("input").val(newVal);
            spinner.find("input").trigger("change");
        });

    });
</script>