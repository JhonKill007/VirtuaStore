<?php
require("head.php");

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
                    $SELECT = "SELECT * FROM car c left join productos p on c.producto_id = p.id_producto where c.user_id = 4";
                    $resultado = mysqli_query($conn, $SELECT);
                    if ($resultado) {
                        while ($com = $resultado->fetch_array()) {
                ?>
                            <?php $total += $com['precio']; ?>
                            <a href="view.php?id_articulo=<?php echo $com['producto_id']; ?>">
                                <div class="d-flex flex-row justify-content-between" style="border:1px solid grey; border-radius:10px;  margin-bottom:15px; padding:15px">


                                    <div class="col-sm-3">
                                        <img src=<?php echo $com['foto']; ?> alt="" style="height:130px; width:100px">
                                    </div>

                                    <div class="col-sm-6">
                                        <span style="color:black"><?php echo $com['articulo']; ?></span>

                                        <div style="margin-top: 15px;">

                                            <span style="color:black" class="price">$<?php echo $com['precio']; ?></span>
                                        </div>

                                        <div>
                                            <span style="color:black">Size: 49</span>
                                        </div>

                                    </div>

                                    <div class="col-sm align-self-end">
                                        <span style="color:black">Total : $<?php echo $com['precio']; ?></span>
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
                            <div id="paypal-button-container"></div>
                        </div>
                    </div>
                    <script src="https://www.paypal.com/sdk/js?client-id=sb&enable-funding=venmo&currency=USD" data-sdk-integration-source="button-factory"></script>
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
                    </script>
                </div>

                <div class="col-lg-4">
                    <div style="border:1px solid; padding:10px">
                        <div>
                            <h4 style="margin-top: 15px;">Resumen Del Pedido</h4>
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
                                <div id="paypal-button-container"></div>
                            </div>
                        </div>
                        <script src="https://www.paypal.com/sdk/js?client-id=sb&enable-funding=venmo&currency=USD" data-sdk-integration-source="button-factory"></script>
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
                                                    "value": 1
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
                        </script>
                    </div>

                </div>



            </div>


            <!-- paypal -->





        </div>


    </div>



    </div>

    </div>





<?php
}else{
    header("Location:login.php");
}
require("footer.php");
?>