<?php
$email = "sb-e64rp25230607@business.example.com";

require("head.php");
$Iduser = $_SESSION['id'];
$total = 0;

if (isset($_SESSION['id'])) {
?>
    <br>
    <br>

    <div class="contact-us">
        <div class="container">
            <div style="margin-bottom: 15px;">
                <a style="color:black" href="product.php"><i class="fa-solid fa-arrow-left"></i> Back to shop </a>

            </div>
            <div class="row justify-content-between ">
                <div class="col-lg-6">

                    <?php
                    if (isset($_GET['rtn'])) {
                        ?>
                        <div style="margin-bottom: 30px;">
                        <h2>Trank you for your purchase!</h2>
                        <h5>You will soon receive an email containing the shipping information.</h5>


                        </div>
                        <?php
                    } else {
                    ?>
                        <div style="margin-bottom: 15px;">
                            <?php

                            require("keys/conection.php");
                            if ($conn) {
                                // = $id_articulo
                                $SELECT = "SELECT * FROM configuracion  where id_registro = $Iduser  AND predeterminada = 1 LIMIT 1";
                                $resultadoC = mysqli_query($conn, $SELECT);
                                if ($resultadoC) {
                                    while ($com = $resultadoC->fetch_array()) {
                            ?>
                                        <h6>Ship to: <span style="color:black"><?php echo $com['calle'] ?>, <?php echo $com['ciudad'] ?></span></h6>
                            <?php
                                    }
                                } else {
                                    echo "la coneccion fallo";
                                }
                            } else {
                                echo "la coneccion fallo";
                            }
                            ?>
                        </div>
                        <?php
                      
                        require("keys/conection.php");
                        if ($conn) {
                            // = $id_articulo
                            $SELECT = "SELECT * FROM car c left join productos p on c.producto_id = p.id_producto where c.user_id = $Iduser  AND c.comprado = false";
                            $resultado = mysqli_query($conn, $SELECT);
                            if ($resultado) {
                                while ($com = $resultado->fetch_array()) {
                        ?>
                                    <?php $total += ($com['precio'] * $com['cantidadSelected']); ?>
                                    <a href="view.php?id_articulo=<?php echo $com['producto_id']; ?>">
                                        <div class="d-flex flex-row justify-content-between" style="border:1px solid grey; border-radius:10px;  margin-bottom:15px; padding:15px 7px">


                                            <div class="col-sm-3">
                                                <img src=<?php echo $com['foto']; ?> alt="" style="height:130px; width:100px">
                                            </div>

                                            <div class="col-sm-6">
                                                <span style="color:black"><b><?php echo $com['articulo']; ?></b></span>

                                                <div style="margin-top: 15px;">

                                                    <span style="color:black" class="price">Price: $<?php echo $com['precio']; ?></span>
                                                </div>

                                                <div>
                                                    <span style="color:black">Size: <?php echo $com['size']; ?></span>
                                                </div>
                                                <div>
                                                    <span style="color:black">Color: <?php echo $com['color']; ?></span>
                                                    <!-- <label style="border-radius:50%; background-color:<?php echo $com['color']; ?>; height: 20px;width:20px;margin:auto; border:1px solid" class=" ml-4 "> -->
                                                    </label>
                                                </div>

                                            </div>

                                            <div class="col-sm align-self-end">

                                                <span style="color:black">Quantity: <?php echo $com['cantidadSelected']; ?></span>

                                                <span style="color:black">Total: $<?php echo ($com['precio'] * $com['cantidadSelected']); ?></span>
                                                <div style="margin-top: 25px;">
                                                    <form id="contact" action="keys/removeFromCar.php" method="post">
                                                        <!-- <input type="hidden" name="product_id" value="<?php echo $com['ProductId']; ?>"> -->
                                                        <input type="hidden" name="product_id" value="<?php echo $com['producto_id']; ?>">
                                                        <input type="hidden" name="car_id" value="<?php echo $com['id_car']; ?>">
                                                        <button type="submit" style="width: 100%; text-align: center;">Remove</button>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </a>

                        <?php
                                }
                            } else {
                                echo "la coneccion fallo";
                            }
                        } else {
                            echo "la coneccion fallo";
                        }
                        ?>

                    <?php
                    }


                    ?>
                </div>

                <div class="col-lg-4">
                    <div style="border:1px solid; padding:10px; border-radius:10px">
                        <div>
                            <h4 style="margin-top: 15px; margin-left:10px">Order summary</h4>
                            <div class="d-flex flex-row justify-content-between" style="margin-top: 20px; ">
                                <div class="col-sm-6">
                                    <span>Subtotal:</span>
                                </div>
                                <div class="col-sm-6">
                                    <h6>$ <?php echo $total;  ?> </h6>
                                </div>

                            </div>
                            <div class="d-flex flex-row justify-content-between" style=" margin-bottom: 20px;">
                                <div class="col-sm-6">
                                    <span>Shipping:</span>
                                </div>
                                <div class="col-sm-6">
                                    <h6>Free </h6>
                                </div>

                            </div>
                            <hr>
                            <div class="d-flex flex-row justify-content-between" style="margin-top: 20px;margin-bottom: 20px; ">
                                <div class="col-sm-6">
                                    <h4>Total:</h4>
                                </div>
                                <div class="col-sm-6">
                                    <h5>$ <?php echo $total;  ?> </h5>
                                </div>

                            </div>

                        </div>

                        <div id="smart-button-container">
                            <div style="text-align: center;">
                                <?php
                                $baseUrl = 'http://localhost:8080/VirtuaStore';
                                ?>
                                <!-- Para cambiar al entorno de producción usar: https://www.paypal.com/cgi-bin/webscr -->
                                <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" id="form_pay">

                                    <?php
                                    if ($conn) {
                                        $SELECT = " SELECT * FROM configuracion where id_registro = $Iduser LIMIT 1";
                                        $resultadoCO = mysqli_query($conn, $SELECT);

                                        if ($resultadoCO) {
                                            $contador = 0;
                                            while ($com = $resultadoCO->fetch_array()) {
                                                $contador++;
                                                if ($total > 0) {
                                    ?>
                                                    <button style="width: 100%;background-color: #ffc439;border-radius: 5px" type="submit">
                                                        <img src="	data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTAxcHgiIGhlaWdodD0iMzIiIHZpZXdCb3g9IjAgMCAxMDEgMzIiIHByZXNlcnZlQXNwZWN0UmF0aW89InhNaW5ZTWluIG1lZXQiIHhtbG5zPSJodHRwOiYjeDJGOyYjeDJGO3d3dy53My5vcmcmI3gyRjsyMDAwJiN4MkY7c3ZnIj48cGF0aCBmaWxsPSIjMDAzMDg3IiBkPSJNIDEyLjIzNyAyLjggTCA0LjQzNyAyLjggQyAzLjkzNyAyLjggMy40MzcgMy4yIDMuMzM3IDMuNyBMIDAuMjM3IDIzLjcgQyAwLjEzNyAyNC4xIDAuNDM3IDI0LjQgMC44MzcgMjQuNCBMIDQuNTM3IDI0LjQgQyA1LjAzNyAyNC40IDUuNTM3IDI0IDUuNjM3IDIzLjUgTCA2LjQzNyAxOC4xIEMgNi41MzcgMTcuNiA2LjkzNyAxNy4yIDcuNTM3IDE3LjIgTCAxMC4wMzcgMTcuMiBDIDE1LjEzNyAxNy4yIDE4LjEzNyAxNC43IDE4LjkzNyA5LjggQyAxOS4yMzcgNy43IDE4LjkzNyA2IDE3LjkzNyA0LjggQyAxNi44MzcgMy41IDE0LjgzNyAyLjggMTIuMjM3IDIuOCBaIE0gMTMuMTM3IDEwLjEgQyAxMi43MzcgMTIuOSAxMC41MzcgMTIuOSA4LjUzNyAxMi45IEwgNy4zMzcgMTIuOSBMIDguMTM3IDcuNyBDIDguMTM3IDcuNCA4LjQzNyA3LjIgOC43MzcgNy4yIEwgOS4yMzcgNy4yIEMgMTAuNjM3IDcuMiAxMS45MzcgNy4yIDEyLjYzNyA4IEMgMTMuMTM3IDguNCAxMy4zMzcgOS4xIDEzLjEzNyAxMC4xIFoiPjwvcGF0aD48cGF0aCBmaWxsPSIjMDAzMDg3IiBkPSJNIDM1LjQzNyAxMCBMIDMxLjczNyAxMCBDIDMxLjQzNyAxMCAzMS4xMzcgMTAuMiAzMS4xMzcgMTAuNSBMIDMwLjkzNyAxMS41IEwgMzAuNjM3IDExLjEgQyAyOS44MzcgOS45IDI4LjAzNyA5LjUgMjYuMjM3IDkuNSBDIDIyLjEzNyA5LjUgMTguNjM3IDEyLjYgMTcuOTM3IDE3IEMgMTcuNTM3IDE5LjIgMTguMDM3IDIxLjMgMTkuMzM3IDIyLjcgQyAyMC40MzcgMjQgMjIuMTM3IDI0LjYgMjQuMDM3IDI0LjYgQyAyNy4zMzcgMjQuNiAyOS4yMzcgMjIuNSAyOS4yMzcgMjIuNSBMIDI5LjAzNyAyMy41IEMgMjguOTM3IDIzLjkgMjkuMjM3IDI0LjMgMjkuNjM3IDI0LjMgTCAzMy4wMzcgMjQuMyBDIDMzLjUzNyAyNC4zIDM0LjAzNyAyMy45IDM0LjEzNyAyMy40IEwgMzYuMTM3IDEwLjYgQyAzNi4yMzcgMTAuNCAzNS44MzcgMTAgMzUuNDM3IDEwIFogTSAzMC4zMzcgMTcuMiBDIDI5LjkzNyAxOS4zIDI4LjMzNyAyMC44IDI2LjEzNyAyMC44IEMgMjUuMDM3IDIwLjggMjQuMjM3IDIwLjUgMjMuNjM3IDE5LjggQyAyMy4wMzcgMTkuMSAyMi44MzcgMTguMiAyMy4wMzcgMTcuMiBDIDIzLjMzNyAxNS4xIDI1LjEzNyAxMy42IDI3LjIzNyAxMy42IEMgMjguMzM3IDEzLjYgMjkuMTM3IDE0IDI5LjczNyAxNC42IEMgMzAuMjM3IDE1LjMgMzAuNDM3IDE2LjIgMzAuMzM3IDE3LjIgWiI+PC9wYXRoPjxwYXRoIGZpbGw9IiMwMDMwODciIGQ9Ik0gNTUuMzM3IDEwIEwgNTEuNjM3IDEwIEMgNTEuMjM3IDEwIDUwLjkzNyAxMC4yIDUwLjczNyAxMC41IEwgNDUuNTM3IDE4LjEgTCA0My4zMzcgMTAuOCBDIDQzLjIzNyAxMC4zIDQyLjczNyAxMCA0Mi4zMzcgMTAgTCAzOC42MzcgMTAgQyAzOC4yMzcgMTAgMzcuODM3IDEwLjQgMzguMDM3IDEwLjkgTCA0Mi4xMzcgMjMgTCAzOC4yMzcgMjguNCBDIDM3LjkzNyAyOC44IDM4LjIzNyAyOS40IDM4LjczNyAyOS40IEwgNDIuNDM3IDI5LjQgQyA0Mi44MzcgMjkuNCA0My4xMzcgMjkuMiA0My4zMzcgMjguOSBMIDU1LjgzNyAxMC45IEMgNTYuMTM3IDEwLjYgNTUuODM3IDEwIDU1LjMzNyAxMCBaIj48L3BhdGg+PHBhdGggZmlsbD0iIzAwOWNkZSIgZD0iTSA2Ny43MzcgMi44IEwgNTkuOTM3IDIuOCBDIDU5LjQzNyAyLjggNTguOTM3IDMuMiA1OC44MzcgMy43IEwgNTUuNzM3IDIzLjYgQyA1NS42MzcgMjQgNTUuOTM3IDI0LjMgNTYuMzM3IDI0LjMgTCA2MC4zMzcgMjQuMyBDIDYwLjczNyAyNC4zIDYxLjAzNyAyNCA2MS4wMzcgMjMuNyBMIDYxLjkzNyAxOCBDIDYyLjAzNyAxNy41IDYyLjQzNyAxNy4xIDYzLjAzNyAxNy4xIEwgNjUuNTM3IDE3LjEgQyA3MC42MzcgMTcuMSA3My42MzcgMTQuNiA3NC40MzcgOS43IEMgNzQuNzM3IDcuNiA3NC40MzcgNS45IDczLjQzNyA0LjcgQyA3Mi4yMzcgMy41IDcwLjMzNyAyLjggNjcuNzM3IDIuOCBaIE0gNjguNjM3IDEwLjEgQyA2OC4yMzcgMTIuOSA2Ni4wMzcgMTIuOSA2NC4wMzcgMTIuOSBMIDYyLjgzNyAxMi45IEwgNjMuNjM3IDcuNyBDIDYzLjYzNyA3LjQgNjMuOTM3IDcuMiA2NC4yMzcgNy4yIEwgNjQuNzM3IDcuMiBDIDY2LjEzNyA3LjIgNjcuNDM3IDcuMiA2OC4xMzcgOCBDIDY4LjYzNyA4LjQgNjguNzM3IDkuMSA2OC42MzcgMTAuMSBaIj48L3BhdGg+PHBhdGggZmlsbD0iIzAwOWNkZSIgZD0iTSA5MC45MzcgMTAgTCA4Ny4yMzcgMTAgQyA4Ni45MzcgMTAgODYuNjM3IDEwLjIgODYuNjM3IDEwLjUgTCA4Ni40MzcgMTEuNSBMIDg2LjEzNyAxMS4xIEMgODUuMzM3IDkuOSA4My41MzcgOS41IDgxLjczNyA5LjUgQyA3Ny42MzcgOS41IDc0LjEzNyAxMi42IDczLjQzNyAxNyBDIDczLjAzNyAxOS4yIDczLjUzNyAyMS4zIDc0LjgzNyAyMi43IEMgNzUuOTM3IDI0IDc3LjYzNyAyNC42IDc5LjUzNyAyNC42IEMgODIuODM3IDI0LjYgODQuNzM3IDIyLjUgODQuNzM3IDIyLjUgTCA4NC41MzcgMjMuNSBDIDg0LjQzNyAyMy45IDg0LjczNyAyNC4zIDg1LjEzNyAyNC4zIEwgODguNTM3IDI0LjMgQyA4OS4wMzcgMjQuMyA4OS41MzcgMjMuOSA4OS42MzcgMjMuNCBMIDkxLjYzNyAxMC42IEMgOTEuNjM3IDEwLjQgOTEuMzM3IDEwIDkwLjkzNyAxMCBaIE0gODUuNzM3IDE3LjIgQyA4NS4zMzcgMTkuMyA4My43MzcgMjAuOCA4MS41MzcgMjAuOCBDIDgwLjQzNyAyMC44IDc5LjYzNyAyMC41IDc5LjAzNyAxOS44IEMgNzguNDM3IDE5LjEgNzguMjM3IDE4LjIgNzguNDM3IDE3LjIgQyA3OC43MzcgMTUuMSA4MC41MzcgMTMuNiA4Mi42MzcgMTMuNiBDIDgzLjczNyAxMy42IDg0LjUzNyAxNCA4NS4xMzcgMTQuNiBDIDg1LjczNyAxNS4zIDg1LjkzNyAxNi4yIDg1LjczNyAxNy4yIFoiPjwvcGF0aD48cGF0aCBmaWxsPSIjMDA5Y2RlIiBkPSJNIDk1LjMzNyAzLjMgTCA5Mi4xMzcgMjMuNiBDIDkyLjAzNyAyNCA5Mi4zMzcgMjQuMyA5Mi43MzcgMjQuMyBMIDk1LjkzNyAyNC4zIEMgOTYuNDM3IDI0LjMgOTYuOTM3IDIzLjkgOTcuMDM3IDIzLjQgTCAxMDAuMjM3IDMuNSBDIDEwMC4zMzcgMy4xIDEwMC4wMzcgMi44IDk5LjYzNyAyLjggTCA5Ni4wMzcgMi44IEMgOTUuNjM3IDIuOCA5NS40MzcgMyA5NS4zMzcgMy4zIFoiPjwvcGF0aD48L3N2Zz4" alt="">
                                                    </button>
                                                <?php

                                                }
                                            }
                                            if ($contador == 0) {
                                                ?>
                                                <br>
                                                <br>
                                                <button style="border-radius: 5px" type="button" style="width: 100%;" data-toggle="modal" data-target="#exampleModal" class="btn btn-light">Add new addreess</button>
                                    <?php
                                            }
                                        } else {
                                        }
                                    } else {

                                        echo "la coneccion fallo";
                                    }
                                    ?>

                                    <!-- Valores requeridos -->
                                    <input type="hidden" name="business" value="<?php echo $email ?>">
                                    <input type="hidden" name="cmd" value="_xclick">

                                    <!-- <label for="item_name" class="form-label">item_name</label> -->
                                    <input type="hidden" name="item_name" id="" value="Women pants" required=""><br>

                                    <!-- <label for="amount" class="form-label">amount</label> -->
                                    <input type="hidden" name="amount" id="" value=" <?php echo $total;  ?>" required=""><br>

                                    <input type="hidden" name="currency_code" value="USD">

                                    <!-- <label for="quantity" class="form-label">quantity</label> -->
                                    <input type="hidden" name="quantity" id="" value="1" required=""><br>

                                    <!-- Valores opcionales -->
                                    <!-- En el siguiente enlace puedes encontrar una lista completa de Variables HTML para pagos estándar de PayPal. -->
                                    <!-- https://developer.paypal.com/docs/paypal-payments-standard/integration-guide/Appx-websitestandard-htmlvariables/ -->

                                    <!-- id del producto -->
                                    <input type="hidden" name="item_number" value="1">

                                    <!-- <input type="hidden" name="invoice" value="0012"> -->

                                    <input type="hidden" name="lc" value="en_US">
                                    <input type="hidden" name="no_shipping" value="0">
                                    <input type="hidden" name="image_url" value="http://localhost:8080/VirtuaStore/img/logohead.png">
                                    <input type="hidden" name="return" value="<?php echo$baseUrl;?>/receptor">
                                    <input type="hidden" name="cancel_return" value="/car">

                                </form>

                            </div>

                        </div>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <div class="subscribe" style="margin-top: 0 !important;">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="section-heading d-flex">
                                                            <div id="Address_H1">
                                                                <h2>Add New Address</h2>
                                                                <span>All inputs are required, pleace complete it.</span>
                                                            </div>
                                                        </div>
                                                        <form id="contact" action="keys/AddAddressCarito-key" method="post">
                                                            <input type="hidden" name="pais" value="United States">
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <fieldset>
                                                                        <span>First Name</span>
                                                                        <input type="text" placeholder="First Name" name="nombre" required>
                                                                    </fieldset>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <fieldset>
                                                                        <span>Last Name</span>
                                                                        <input type="text" placeholder="Last Name" name="apellido" required>
                                                                    </fieldset>
                                                                </div>
                                                                <br>
                                                                <br>
                                                                <div class="col-lg-12">
                                                                    <fieldset>
                                                                        <span>Street</span>
                                                                        <input type="text" placeholder="Street" name="calle" required>
                                                                    </fieldset>
                                                                </div>
                                                                <br>
                                                                <br>
                                                                <div class="col-lg-12">
                                                                    <fieldset>
                                                                        <span>Aparment</span>
                                                                        <input type="text" placeholder="Aparment" name="numero" required>
                                                                    </fieldset>
                                                                </div>
                                                                <br>
                                                                <br>
                                                                <div class="col-lg-12">
                                                                    <fieldset>
                                                                        <span>Zip Code</span>
                                                                        <input type="text" placeholder="Zip Code" name="cp" required>
                                                                    </fieldset>
                                                                </div>
                                                                <br>
                                                                <br>
                                                                <div class="col-lg-6">
                                                                    <fieldset>
                                                                        <span>City</span>
                                                                        <input name="city" type="text" placeholder="City" required>
                                                                    </fieldset>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <fieldset>
                                                                        <span>State</span>
                                                                        <select style="width: 100%;
                                            height: 44px;
                                            line-height: 44px;
                                            padding: 0px 15px;
                                            font-size: 14px;
                                            font-style: italic;
                                            font-weight: 500;
                                            color: #aaa;
                                            border-radius: 0px;
                                            border: 1px solid #7a7a7a;
                                            box-shadow: none;" name="estado" required>
                                                                            <option>State</option>
                                                                            <option value="Alabama">Alabama</option>
                                                                            <option value="Alaska">Alaska</option>
                                                                            <option value="Arizona">Arizona</option>
                                                                            <option value="Arkansas">Arkansas</option>
                                                                            <option value="California">California</option>
                                                                            <option value="Colorado">Colorado</option>
                                                                            <option value="Connecticut">Connecticut</option>
                                                                            <option value="Delaware">Delaware</option>
                                                                            <option value="District Of Columbia">District Of Columbia</option>
                                                                            <option value="Florida">Florida</option>
                                                                            <option value="Georgia">Georgia</option>
                                                                            <option value="Hawaii">Hawaii</option>
                                                                            <option value="Idaho">Idaho</option>
                                                                            <option value="Illinois">Illinois</option>
                                                                            <option value="Indiana">Indiana</option>
                                                                            <option value="Iowa">Iowa</option>
                                                                            <option value="Kansas">Kansas</option>
                                                                            <option value="Kentucky">Kentucky</option>
                                                                            <option value="Louisiana">Louisiana</option>
                                                                            <option value="Maine">Maine</option>
                                                                            <option value="Maryland">Maryland</option>
                                                                            <option value="Massachusetts">Massachusetts</option>
                                                                            <option value="Michigan">Michigan</option>
                                                                            <option value="Minnesota">Minnesota</option>
                                                                            <option value="Mississippi">Mississippi</option>
                                                                            <option value="Missouri">Missouri</option>
                                                                            <option value="Montana">Montana</option>
                                                                            <option value="Nebraska">Nebraska</option>
                                                                            <option value="Nevada">Nevada</option>
                                                                            <option value="New Hampshire">New Hampshire</option>
                                                                            <option value="New Jersey">New Jersey</option>
                                                                            <option value="New Mexico">New Mexico</option>
                                                                            <option value="New York">New York</option>
                                                                            <option value="North Carolina">North Carolina</option>
                                                                            <option value="North Dakota">North Dakota</option>
                                                                            <option value="Ohio">Ohio</option>
                                                                            <option value="Oklahoma">Oklahoma</option>
                                                                            <option value="Oregon">Oregon</option>
                                                                            <option value="Pennsylvania">Pennsylvania</option>
                                                                            <option value="Rhode Island">Rhode Island</option>
                                                                            <option value="South Carolina">South Carolina</option>
                                                                            <option value="South Dakota">South Dakota</option>
                                                                            <option value="Tennessee">Tennessee</option>
                                                                            <option value="Texas">Texas</option>
                                                                            <option value="Utah">Utah</option>
                                                                            <option value="Vermont">Vermont</option>
                                                                            <option value="Virginia">Virginia</option>
                                                                            <option value="Washington">Washington</option>
                                                                            <option value="West Virginia">West Virginia</option>
                                                                            <option value="Wisconsin">Wisconsin</option>
                                                                            <option value="Wyoming">Wyoming</option>
                                                                        </select>
                                                                    </fieldset>
                                                                </div>
                                                                <br>
                                                                <br>
                                                                <div class="col-lg-12">
                                                                    <fieldset>
                                                                        <span>Phone</span>
                                                                        <input name="telefono" type="text" placeholder="Phone" required>
                                                                    </fieldset>
                                                                </div>
                                                                <br>
                                                                <br>
                                                                <br>
                                                                <br>
                                                                <div class="col-lg-12">
                                                                    <fieldset>
                                                                        <input class="main-dark-button" type="submit" value="Save">
                                                                    </fieldset>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>






                    </div>

                </div>
                <!-- paypal -->
            </div>
        </div>
    </div>







<?php
} else {
    header("Location:login");
}
require("footer.php");
?>