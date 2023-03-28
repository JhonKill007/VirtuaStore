<?php
require("head.php");
require("keys/conection.php");
$filtro = '';
$sort = '';
?>

<br>
<br>
<br>
<style>
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





<section class="section" id="products">
    <div class="container">
        <div class="row" style="display: flex;    justify-content: end;margin-bottom: -25px;">
            <div class="col-lg-4">
                <div class="section-heading ">
                    <form id="contact" action="products" method="POST">

                        <div class="row" style=" margin-top: -50px; justify-content: end; margin-right: 5px">
                            <div class="dropdown" style="margin-right: 15px;">
                                <button style="color:black" class="btn btn-outline-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Color </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                    <?php
                                    if ($conn) {
                                        $SELECT = "SELECT * FROM color ";
                                        $resultado = mysqli_query($conn, $SELECT);
                                        if ($resultado) {
                                            while ($com = $resultado->fetch_array()) {
                                    ?>
                                                <div class="form-check" style="margin:10px">
                                                    <label class="form-check-label">
                                                        <input style="height: 20px;width: 20px;" name="buscarC[]" type="checkbox" class="form-check-input" value="<?php echo $com['valor']; ?>">
                                                        <span style="margin-left:20px; font-size:16px"><?php echo $com['valor']; ?></span>
                                                    </label>
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
                            <div class="dropdown" style="margin-right: 15px;">
                                <button style="color:black" class="btn btn-outline-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Size </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                    <?php
                                    if ($conn) {
                                        $SELECT = "SELECT * FROM size ";
                                        $resultado = mysqli_query($conn, $SELECT);
                                        if ($resultado) {
                                            while ($com = $resultado->fetch_array()) {
                                    ?>
                                                <div class="form-check" style="margin:10px">
                                                    <label class="form-check-label">
                                                        <input style="height: 20px;width: 20px;" type="checkbox" name="buscarS[]" class="form-check-input" value="<?php echo $com['valor']; ?>">
                                                        <span style="margin-left:20px; font-size:16px"><?php echo $com['valor']; ?></span>
                                                    </label>
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
                            <div class="dropdown" style="margin-right: 15px;">
                                <button style="color:black" class="btn btn-outline-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Sort
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                    <!-- <option class="dropdown-item" name="sort" value="">Best March</option>
            <option class="dropdown-item" name="sort" value="desc">Price: Lowest first</option>
            <option class="dropdown-item" name="sort" value="asc">Price: Highest first</option> -->
                                    <div class="form-check" style="margin:10px">
                                        <label class="form-check-label">
                                            <input style="height: 20px;width: 20px;" type="radio" name="sort" class="form-check-input" value="">
                                            <span style="margin-left:20px; font-size:16px">Best March</span>
                                        </label>
                                    </div>
                                    <div class="form-check" style="margin:10px">
                                        <label class="form-check-label">
                                            <input style="height: 20px;width: 20px;" type="radio" name="sort" class="form-check-input" value="asc">
                                            <span style="margin-left:20px; font-size:16px">Price: Lowest first</span>
                                        </label>
                                    </div>
                                    <div class="form-check" style="margin:10px">
                                        <label class="form-check-label">
                                            <input style="height: 20px;width: 20px;" type="radio" name="sort" class="form-check-input" value="desc">
                                            <span style="margin-left:20px; font-size:16px">Price: Highest first</span>
                                        </label>
                                    </div>
                                    <!-- <option  class="dropdown-item" value="ojos">Ojos</option> -->

                                </div>

                            </div>
                            <button style="margin-right: 10px;" type="submit" class="btn btn-light"><b>Apply</b></button>

                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>




    <div class="container">


        <?php

        if (isset($_POST['sort'])) {

            $valuesort = $_POST['sort'];
            $sort = "order by p.precio $valuesort";
        }

        if (isset($_POST['buscarS'])) {
            $sizes = $_POST['buscarS'];

            $count = count($_POST['buscarS']);

            $filtro = "where s.valor= ";
            for ($i = 0; $i < $count; $i++) {

                $filtro .= "'$sizes[$i]'";

                if ($count - 1 > $i) {
                    $filtro .= ' or s.valor= ';
                }
            }
        } else if (isset($_POST['buscarC'])) {
            $colors = $_POST['buscarC'];

            $countC = count($_POST['buscarC']);


            if (isset($_POST['buscarS'])) {
                $filtro .= "and c.valor=";

                for ($j = 0; $j < $countC; $j++) {

                    $filtro .= "'$colors[$j]'";

                    if ($countC - 1 > $j) {
                        $filtro .= ' or c.valor= ';
                    }
                }
            } else {

                $filtro = "where c.valor= ";

                for ($j = 0; $j < $countC; $j++) {

                    $filtro .= "'$colors[$j]'";

                    if ($countC - 1 > $j) {
                        $filtro .= ' or c.valor= ';
                    }
                }
            }
        }
        ?>

        <div class="row">


            <?php
            if ($conn) {
                $SELECT = "SELECT distinct p.id_producto, p.precio,p.foto,p.articulo,p.descripcion,p.cantidad from productos p
                join colorporproducto cp on cp.id_producto= p.id_producto
                join color c on c.id = cp.id_color
                join sizeporproducto sp on p.id_producto = sp.id_producto
                join size s on sp.id_size = s.id $filtro  $sort";


                $resultado = mysqli_query($conn, $SELECT);
                if ($resultado) {
                    while ($com = $resultado->fetch_array()) {
            ?>
                        <?php $id_articulo = $com['id_producto'];
                        $cantidad = $com['cantidad'];
                        ?>




                        <?php $com['descripcion']; ?>
                        <div class="col-lg-3">
                            <div class="item">
                                <div class="thumb">
                                    <?php
                                    if (isset($_SESSION['ID_ADMIN'])) {
                                    ?>
                                        <div class="hover-content">
                                            <ul>
                                                <li><a href="update?id_articulo=<?php echo $com['id_producto']; ?>"><i class="fa-solid fa-pen"></i></a></li>
                                                <li>
                                                    <?php $productoSelect = $com['id_producto']; ?>
                                                    <a style="cursor: pointer;" href="./keys/delete-product-key?id_product=<?php echo $com['id_producto']; ?>">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </a>
                                                </li>

                                            </ul>
                                        </div>
                                    <?php
                                    }
                                    ?>


                                    <?php
                                    if (isset($_SESSION['id'])) {
                                    ?>
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
                                    <?php
                                    }
                                    ?>

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
                                    <span style="font-size: 15px; color:black"><?php echo $com['articulo']; ?></span>
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
                                                <span> <b>Size</b> </span>
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

                                                <span> <b> Color</b> </span>

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
                                                                            <input type="radio" onclick="handleClick(this);" name="color" value="<?php echo $com['valor']; ?>" required>
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



<?php
require("footer.php");
?>


<script>
    var currentValue = 0;

    function handleClick(myRadio) {

        document.getElementById('colorSelected').innerHTML = myRadio.value + '';
    }
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