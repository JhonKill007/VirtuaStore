<?php
session_start();
require("head.php");
?>

<section class="section" id="products">
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <div class="col-lg-4">
                <div class="section-heading">
                    <h2>Outstanding</h2>
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
                $SELECT = "SELECT * FROM productos ORDER BY rand() ";
                $resultado = mysqli_query($conn, $SELECT);
                if ($resultado) {
                    while ($com = $resultado->fetch_array()) {
            ?>
                        <?php $id_articulo = $com['id_producto']; ?>



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
                                            <li>
                                                <?php $productoSelect = $com['id_producto']; ?>
                                                <a style="cursor: pointer;" class="" data-toggle="modal" data-target="#exampleModal">
                                                    <i class="fa fa-shopping-cart"></i>
                                                </a>

                                            </li>                                        </ul>
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
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
<!-- ***** Men Area Ends ***** -->

<?php
require("footer.php");
?>