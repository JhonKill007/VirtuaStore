<?php
require("head.php");
$id_articulo = $_GET['id_art']
?>
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
            <div class="contact-us">
                <div class="container">
                    <div class="row justify-content-between ">
                        <div class="col-lg-6">
                            <div class="d-flex flex-row justify-content-between" style="border:1px solid grey; border-radius:10px; background-color:azure;">

                                <div class="p-2">
                                    <img src=<?php echo $com['foto']; ?> alt="" style="height:100px; width:100px">
                                </div>

                                <div class="p-2">
                                    <h4><?php echo $com['articulo']; ?></h4>

                                    <div>

                                        <span class="price">$<?php echo $com['precio']; ?></span>
                                    </div>

                                    <div>

                                        <span>$<?php echo $com['descripcion']; ?></span>
                                    </div>

                                </div>

                                <div class="p-2 align-self-end">
                                    <button class="btn btn-outline-danger">Remove</button>
                                </div>


                            </div>
                        </div>

                        <div class="col-lg-4">
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


                    <!-- paypal -->





                </div>


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


<?php
require("footer.php");
?>