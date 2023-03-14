<?php


require("head.php");
$Iduser = $_SESSION['id'];

if (isset($_SESSION['id'])) {
?>
    <br>
    <br>

    <div class="contact-us">
        <div class="container">
            <div style="margin-bottom: 15px;">
                <a style="color:black" href="product.php"><i class="fa-solid fa-arrow-left"></i> Back to shop</a>

            </div>
            <div class="row justify-content-between ">
                <div class="col-lg-6">


                    <div style="margin-bottom: 15px;">

                        <h6>Ship to: <span>Santo Domingo, Rep Dom</span></h6>
                    </div>
                    <?php
                    $total = 0;
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

                                                <span style="color:black" class="price">price: $<?php echo $com['precio']; ?></span>
                                            </div>

                                            <div>
                                                <span style="color:black">Size: <?php echo $com['size']; ?></span>
                                            </div>
                                            <div>
                                                <span style="color:black">Color:</span>
                                                <label style="border-radius:50%; background-color:<?php echo $com['color']; ?>; height: 20px;width:20px;margin:auto" class=" ml-4 ">
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
                </div>

                <div class="col-lg-4">
                    <div style="border:1px solid; padding:10px">
                        <div>
                            <h4 style="margin-top: 15px;">Order summary</h4>
                            <div class="d-flex flex-row justify-content-between" style="margin-top: 20px; margin-bottom: 20px;">
                                <div class="col-sm-6">
                                    <span>Subtotal:</span>
                                </div>
                                <div class="col-sm-6">
                                    <span style="font-size: 25px;">$ <?php echo $total;  ?> </span>
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

                                    <button style="width: 100%;background-color: #ffc439;" type="submit">
                                        <img src="	data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTAxcHgiIGhlaWdodD0iMzIiIHZpZXdCb3g9IjAgMCAxMDEgMzIiIHByZXNlcnZlQXNwZWN0UmF0aW89InhNaW5ZTWluIG1lZXQiIHhtbG5zPSJodHRwOiYjeDJGOyYjeDJGO3d3dy53My5vcmcmI3gyRjsyMDAwJiN4MkY7c3ZnIj48cGF0aCBmaWxsPSIjMDAzMDg3IiBkPSJNIDEyLjIzNyAyLjggTCA0LjQzNyAyLjggQyAzLjkzNyAyLjggMy40MzcgMy4yIDMuMzM3IDMuNyBMIDAuMjM3IDIzLjcgQyAwLjEzNyAyNC4xIDAuNDM3IDI0LjQgMC44MzcgMjQuNCBMIDQuNTM3IDI0LjQgQyA1LjAzNyAyNC40IDUuNTM3IDI0IDUuNjM3IDIzLjUgTCA2LjQzNyAxOC4xIEMgNi41MzcgMTcuNiA2LjkzNyAxNy4yIDcuNTM3IDE3LjIgTCAxMC4wMzcgMTcuMiBDIDE1LjEzNyAxNy4yIDE4LjEzNyAxNC43IDE4LjkzNyA5LjggQyAxOS4yMzcgNy43IDE4LjkzNyA2IDE3LjkzNyA0LjggQyAxNi44MzcgMy41IDE0LjgzNyAyLjggMTIuMjM3IDIuOCBaIE0gMTMuMTM3IDEwLjEgQyAxMi43MzcgMTIuOSAxMC41MzcgMTIuOSA4LjUzNyAxMi45IEwgNy4zMzcgMTIuOSBMIDguMTM3IDcuNyBDIDguMTM3IDcuNCA4LjQzNyA3LjIgOC43MzcgNy4yIEwgOS4yMzcgNy4yIEMgMTAuNjM3IDcuMiAxMS45MzcgNy4yIDEyLjYzNyA4IEMgMTMuMTM3IDguNCAxMy4zMzcgOS4xIDEzLjEzNyAxMC4xIFoiPjwvcGF0aD48cGF0aCBmaWxsPSIjMDAzMDg3IiBkPSJNIDM1LjQzNyAxMCBMIDMxLjczNyAxMCBDIDMxLjQzNyAxMCAzMS4xMzcgMTAuMiAzMS4xMzcgMTAuNSBMIDMwLjkzNyAxMS41IEwgMzAuNjM3IDExLjEgQyAyOS44MzcgOS45IDI4LjAzNyA5LjUgMjYuMjM3IDkuNSBDIDIyLjEzNyA5LjUgMTguNjM3IDEyLjYgMTcuOTM3IDE3IEMgMTcuNTM3IDE5LjIgMTguMDM3IDIxLjMgMTkuMzM3IDIyLjcgQyAyMC40MzcgMjQgMjIuMTM3IDI0LjYgMjQuMDM3IDI0LjYgQyAyNy4zMzcgMjQuNiAyOS4yMzcgMjIuNSAyOS4yMzcgMjIuNSBMIDI5LjAzNyAyMy41IEMgMjguOTM3IDIzLjkgMjkuMjM3IDI0LjMgMjkuNjM3IDI0LjMgTCAzMy4wMzcgMjQuMyBDIDMzLjUzNyAyNC4zIDM0LjAzNyAyMy45IDM0LjEzNyAyMy40IEwgMzYuMTM3IDEwLjYgQyAzNi4yMzcgMTAuNCAzNS44MzcgMTAgMzUuNDM3IDEwIFogTSAzMC4zMzcgMTcuMiBDIDI5LjkzNyAxOS4zIDI4LjMzNyAyMC44IDI2LjEzNyAyMC44IEMgMjUuMDM3IDIwLjggMjQuMjM3IDIwLjUgMjMuNjM3IDE5LjggQyAyMy4wMzcgMTkuMSAyMi44MzcgMTguMiAyMy4wMzcgMTcuMiBDIDIzLjMzNyAxNS4xIDI1LjEzNyAxMy42IDI3LjIzNyAxMy42IEMgMjguMzM3IDEzLjYgMjkuMTM3IDE0IDI5LjczNyAxNC42IEMgMzAuMjM3IDE1LjMgMzAuNDM3IDE2LjIgMzAuMzM3IDE3LjIgWiI+PC9wYXRoPjxwYXRoIGZpbGw9IiMwMDMwODciIGQ9Ik0gNTUuMzM3IDEwIEwgNTEuNjM3IDEwIEMgNTEuMjM3IDEwIDUwLjkzNyAxMC4yIDUwLjczNyAxMC41IEwgNDUuNTM3IDE4LjEgTCA0My4zMzcgMTAuOCBDIDQzLjIzNyAxMC4zIDQyLjczNyAxMCA0Mi4zMzcgMTAgTCAzOC42MzcgMTAgQyAzOC4yMzcgMTAgMzcuODM3IDEwLjQgMzguMDM3IDEwLjkgTCA0Mi4xMzcgMjMgTCAzOC4yMzcgMjguNCBDIDM3LjkzNyAyOC44IDM4LjIzNyAyOS40IDM4LjczNyAyOS40IEwgNDIuNDM3IDI5LjQgQyA0Mi44MzcgMjkuNCA0My4xMzcgMjkuMiA0My4zMzcgMjguOSBMIDU1LjgzNyAxMC45IEMgNTYuMTM3IDEwLjYgNTUuODM3IDEwIDU1LjMzNyAxMCBaIj48L3BhdGg+PHBhdGggZmlsbD0iIzAwOWNkZSIgZD0iTSA2Ny43MzcgMi44IEwgNTkuOTM3IDIuOCBDIDU5LjQzNyAyLjggNTguOTM3IDMuMiA1OC44MzcgMy43IEwgNTUuNzM3IDIzLjYgQyA1NS42MzcgMjQgNTUuOTM3IDI0LjMgNTYuMzM3IDI0LjMgTCA2MC4zMzcgMjQuMyBDIDYwLjczNyAyNC4zIDYxLjAzNyAyNCA2MS4wMzcgMjMuNyBMIDYxLjkzNyAxOCBDIDYyLjAzNyAxNy41IDYyLjQzNyAxNy4xIDYzLjAzNyAxNy4xIEwgNjUuNTM3IDE3LjEgQyA3MC42MzcgMTcuMSA3My42MzcgMTQuNiA3NC40MzcgOS43IEMgNzQuNzM3IDcuNiA3NC40MzcgNS45IDczLjQzNyA0LjcgQyA3Mi4yMzcgMy41IDcwLjMzNyAyLjggNjcuNzM3IDIuOCBaIE0gNjguNjM3IDEwLjEgQyA2OC4yMzcgMTIuOSA2Ni4wMzcgMTIuOSA2NC4wMzcgMTIuOSBMIDYyLjgzNyAxMi45IEwgNjMuNjM3IDcuNyBDIDYzLjYzNyA3LjQgNjMuOTM3IDcuMiA2NC4yMzcgNy4yIEwgNjQuNzM3IDcuMiBDIDY2LjEzNyA3LjIgNjcuNDM3IDcuMiA2OC4xMzcgOCBDIDY4LjYzNyA4LjQgNjguNzM3IDkuMSA2OC42MzcgMTAuMSBaIj48L3BhdGg+PHBhdGggZmlsbD0iIzAwOWNkZSIgZD0iTSA5MC45MzcgMTAgTCA4Ny4yMzcgMTAgQyA4Ni45MzcgMTAgODYuNjM3IDEwLjIgODYuNjM3IDEwLjUgTCA4Ni40MzcgMTEuNSBMIDg2LjEzNyAxMS4xIEMgODUuMzM3IDkuOSA4My41MzcgOS41IDgxLjczNyA5LjUgQyA3Ny42MzcgOS41IDc0LjEzNyAxMi42IDczLjQzNyAxNyBDIDczLjAzNyAxOS4yIDczLjUzNyAyMS4zIDc0LjgzNyAyMi43IEMgNzUuOTM3IDI0IDc3LjYzNyAyNC42IDc5LjUzNyAyNC42IEMgODIuODM3IDI0LjYgODQuNzM3IDIyLjUgODQuNzM3IDIyLjUgTCA4NC41MzcgMjMuNSBDIDg0LjQzNyAyMy45IDg0LjczNyAyNC4zIDg1LjEzNyAyNC4zIEwgODguNTM3IDI0LjMgQyA4OS4wMzcgMjQuMyA4OS41MzcgMjMuOSA4OS42MzcgMjMuNCBMIDkxLjYzNyAxMC42IEMgOTEuNjM3IDEwLjQgOTEuMzM3IDEwIDkwLjkzNyAxMCBaIE0gODUuNzM3IDE3LjIgQyA4NS4zMzcgMTkuMyA4My43MzcgMjAuOCA4MS41MzcgMjAuOCBDIDgwLjQzNyAyMC44IDc5LjYzNyAyMC41IDc5LjAzNyAxOS44IEMgNzguNDM3IDE5LjEgNzguMjM3IDE4LjIgNzguNDM3IDE3LjIgQyA3OC43MzcgMTUuMSA4MC41MzcgMTMuNiA4Mi42MzcgMTMuNiBDIDgzLjczNyAxMy42IDg0LjUzNyAxNCA4NS4xMzcgMTQuNiBDIDg1LjczNyAxNS4zIDg1LjkzNyAxNi4yIDg1LjczNyAxNy4yIFoiPjwvcGF0aD48cGF0aCBmaWxsPSIjMDA5Y2RlIiBkPSJNIDk1LjMzNyAzLjMgTCA5Mi4xMzcgMjMuNiBDIDkyLjAzNyAyNCA5Mi4zMzcgMjQuMyA5Mi43MzcgMjQuMyBMIDk1LjkzNyAyNC4zIEMgOTYuNDM3IDI0LjMgOTYuOTM3IDIzLjkgOTcuMDM3IDIzLjQgTCAxMDAuMjM3IDMuNSBDIDEwMC4zMzcgMy4xIDEwMC4wMzcgMi44IDk5LjYzNyAyLjggTCA5Ni4wMzcgMi44IEMgOTUuNjM3IDIuOCA5NS40MzcgMyA5NS4zMzcgMy4zIFoiPjwvcGF0aD48L3N2Zz4
" alt="">
                                    </button>
                                    <!-- Valores requeridos -->
                                    <input type="hidden" name="business" value="sb-e64rp25230607@business.example.com">
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

                                    <input type="hidden" name="item_number" value="1">
                                    <!-- <input type="hidden" name="invoice" value="0012"> -->

                                    <input type="hidden" name="lc" value="en_US">
                                    <input type="hidden" name="no_shipping" value="2">
                                    <input type="hidden" name="image_url" value="https://picsum.photos/150/150">
                                    <input type="hidden" name="return" value="<?= $baseUrl ?>/receptor">
                                    <input type="hidden" name="cancel_return" value="<?= $baseUrl ?>/car">

                                    <hr>



                                </form>
                            </div>

                        </div>






                        <!-- <script src="https://www.paypal.com/sdk/js?client-id=AXyeUhBn2Mppl4a3K6XGtbc4zRBsmBVLCHAmkJVN-OkABjSHxrRMM-RS7Z2h0C5UwOTk9AAQF3RIWLua&enable-funding=venmo&currency=USD" ></script>

                        <script>
                            function initPayPalButton() {
                                paypal.Buttons({
                                    style: {
                                        shape: 'rect',
                                        color: 'gold',
                                        layout: 'vertical',
                                        label: 'paypal',

                                    },

                                    createOrder: function(data, actions) {
                                        return actions.order.create({
                                            purchase_units: [{
                                                "amount": {
                                                    "currency_code": "USD",
                                                    "value": <?php echo $total;  ?>
                                                }
                                            }]

                                        });
                                    },

                                    onApprove: function(data, actions) {
                                        return actions.order.capture().then(function(orderData) {

                                            // Full available details
                                            console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));

                                            // Show a success message within this page, e.g.
                                            const element = document.getElementById('paypal-button-container');
                                            element.innerHTML = '';
                                            element.innerHTML = '<h3>Thank you for your payment!</h3>';

                                            // Or go to another URL:  actions.redirect('thank_you.html');

                                        });
                                    },

                                    onError: function(err) {
                                        console.log(err);
                                    }
                                }).render('#paypal-button-container');
                            }
                            initPayPalButton();
                        </script> -->
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