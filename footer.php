<style>
    .footer_logo{
        width: 250px;
    }
</style>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="first-item">
                    <div class="logo">
                        <img class="footer_logo" src="assets/images/white-logo.png" alt="hexashop ecommerce templatemo">
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <h4>Shopping &amp; Categories</h4>
                <ul>
                    <li><a href="rostro.php">Rostro</a></li>
                    <li><a href="ojos.php">Ojos</a></li>
                    <li><a href="labios.php">Labios</a></li>
                    <li><a href="esmalte.php">Uñas</a></li>
                </ul>
            </div>
            <div class="col-lg-3">
                <h4>Useful Links</h4>
                <ul>
                    <?php
                    if (isset($_SESSION['id'])) {
                    ?>
                        <li><a href="keys/logout.php">Cerrar Sesion</a></li>
                        <li><a href="agregar.php">Agregar Productos</a></li>
                        <li><a href="ventas.php">Ventas</a></li>
                    <?php
                    } else {
                    ?>
                        <li><a href="login.php">Iniciar Sesion</a></li>
                    <?php
                    }
                    ?>
                    <li><a href="about.php">Acerca de</a></li>
                </ul>
            </div>
            <div class="col-lg-12">
                <div class="under-footer">
                    <p>Copyright © 2021 Lolet, All Rights Reserved.
                    </p>
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-behance"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>


<!-- jQuery -->
<script src="assets/js/jquery-2.1.0.min.js"></script>

<!-- Bootstrap -->
<script src="assets/js/popper.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

<!-- Plugins -->
<script src="assets/js/owl-carousel.js"></script>
<script src="assets/js/accordions.js"></script>
<script src="assets/js/datepicker.js"></script>
<script src="assets/js/scrollreveal.min.js"></script>
<script src="assets/js/waypoints.min.js"></script>
<script src="assets/js/jquery.counterup.min.js"></script>
<script src="assets/js/imgfix.min.js"></script>
<script src="assets/js/slick.js"></script>
<script src="assets/js/lightbox.js"></script>
<script src="assets/js/isotope.js"></script>

<!-- Global Init -->
<script src="assets/js/custom.js"></script>

<script>
    $(function() {
        var selectedClass = "";
        $("p").click(function() {
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
            $("#portfolio div").not("." + selectedClass).fadeOut();
            setTimeout(function() {
                $("." + selectedClass).fadeIn();
                $("#portfolio").fadeTo(50, 1);
            }, 500);

        });
    });
</script>

</body>

</html>