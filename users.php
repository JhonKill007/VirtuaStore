<?php
require("head.php");
if (isset($_SESSION['id'])) {
?>
    <div class="main-banner" id="top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="left-content">
                        <div class="thumb">
                            <div class="inner-content">
                                <h4></h4>
                                <span></span>
                            </div>
                            <img src="assets/images/left-banner-image.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="right-content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4>Labios</h4>
                                        </div>
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4>Labios</h4>
                                                <div class="main-border-button">
                                                    <a href="labios.php">Discover More</a>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="assets/images/baner-right-image-01.jpg">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4>Rostro</h4>
                                        </div>
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4>Rostro
                                                <div class="main-border-button">
                                                    <a href="rostro.php">Discover More</a>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="assets/images/baner-right-image-02.jpg">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4>Ojos</h4>
                                        </div>
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4>Ojos</h4>
                                                <div class="main-border-button">
                                                    <a href="ojos.php">Discover More</a>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="assets/images/baner-right-image-03.jpg">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4>Uñas</h4>
                                        </div>
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4>Uñas</h4>
                                                <div class="main-border-button">
                                                    <a href="esmalte.php">Discover More</a>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="assets/images/baner-right-image-04.jpg">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    require("footer.php");
} else {
    header("Location:login.php");
}
?>