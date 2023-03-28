<style>
    .footer_logo {
        width: 250px;
    }
</style>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="first-item">
                    <div class="logo">
                        <img class="footer_logo" src="img/logo.jpg" alt="hexashop ecommerce templatemo">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <br>
                <br>
                <ul>
                    <li><a href="#"><i class="fa fa-facebook"></i> facebook</a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i> twitter</a></li>
                    <li><a href="#"><i class="fa fa-instagram"></i> instagram</a></li>

                </ul>
            </div>

            <div class="col-lg-2">
                <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30272.44678808401!2d-69.93792502318628!3d18.481129297752123!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8eaf89e4e39a2ab5%3A0x98df0764eaed40ca!2sBlueMall%20Santo%20Domingo!5e0!3m2!1ses!2sdo!4v1677787444616!5m2!1ses!2sdo" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->

            </div>
            <div class="col-lg-12">
                <div class="under-footer">
                    <p>Copyright © 2023 Pretty Perfect Collection, All Rights Reserved.
                    </p>

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