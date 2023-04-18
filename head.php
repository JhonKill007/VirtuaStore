<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" type="image/x-icon" href="img/logo.jpg">
    <title>Pretty Perfect Collection</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet"> -->
    <script src="https://kit.fontawesome.com/1528b45c37.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://kit.fontawesome.com/1528b45c37.css" crossorigin="anonymous">



    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-hexashop.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">

    <link rel="stylesheet" href="assets/css/main.css">

</head>
<style>
    .logo_img {
        width: 200px;
        height: 80px;
        object-fit: contain;
    }

    a {
        font-family: 'Open Sans', sans-serif;
    }

    span {
        font-family: 'Open Sans', sans-serif;
    }

    h4 h5 h6 h3 h2 h1 {
        font-family: 'Open Sans', sans-serif;
    }

    button {
        font-family: 'Open Sans', sans-serif;
    }
</style>

<body>



    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <a href="index" class="logo">
                            <img class="logo_img" src="img/logohead.png">
                        </a>
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="index" class=" home">Home</a></li>
                            <?php
                            if (isset($_SESSION['id']) || !isset($_SESSION['ID_ADMIN'])) {
                            ?>
                                <!-- <li class="scroll-to-section"><a href="onfire" class="offert">Offert</a></li> -->
                                <li class="submenu">
                                    <a href="javascript:;">Feature</a>
                                    <ul>
                                        <?php
                                        require("keys/conection.php");
                                        if ($conn) {
                                            $SELECT = "SELECT * FROM categoria ";
                                            $resultado = mysqli_query($conn, $SELECT);
                                            if ($resultado) {
                                                while ($com = $resultado->fetch_array()) {
                                        ?>
                                                    <li><a href="products"><?php echo $com['valor']; ?></a></li>


                                        <?php
                                                }
                                            } else {
                                                echo " se fue a la verga";
                                            }
                                        } else {
                                            echo "la coneccion fallo";
                                        }
                                        ?>





                                    </ul>
                                </li>
                            <?php
                            }
                            ?>


                            <li class="scroll-to-section"><a href="products" class="product">Products</a></li>

                            <li class="submenu">
                                <a href="javascript:;">
                                    <i class="fa-solid fa-user"></i>
                                    <?php
                                    if (isset($_SESSION['id'])) {
                                        $idUser = $_SESSION['id'];
                                    ?>
                                        <?php
                                        $eso =  require('./keys/conection.php');
                                        if ($eso) {
                                            $SELECT = "SELECT * from registro where id_registro ='$idUser'";
                                            $resultado = mysqli_query($conn, $SELECT);
                                            $U = $resultado->fetch_array();
                                        ?>
                                            <span><?php echo $U['nombre']; ?></span>
                                        <?php
                                        }
                                        ?>
                                    <?php
                                    }
                                    ?>

                                    <?php
                                    if (isset($_SESSION['ID_ADMIN'])) {
                                        $idUser = $_SESSION['ID_ADMIN'];
                                    ?>
                                        <?php
                                        $eso =  require('./keys/conection.php');
                                        if ($eso) {
                                            $SELECT = "SELECT * from registro where id_registro ='$idUser'";
                                            $resultado = mysqli_query($conn, $SELECT);
                                            $U = $resultado->fetch_array();
                                        ?>
                                            <span><?php echo $U['nombre']; ?></span>
                                        <?php
                                        }
                                        ?>
                                    <?php
                                    }
                                    ?>
                                </a>
                                <ul>

                                    <?php
                                    if (isset($_SESSION['ID_ADMIN']) || isset($_SESSION['id'])) {
                                        if (isset($_SESSION['ID_ADMIN'])) {
                                    ?>
                                            <li><a href="signup">Add Users</a></li>
                                            <li><a href="agregar">Add Products</a></li>
                                            <li><a href="users">Users</a></li>
                                            
                                            <li><a href="pending">Pending</a></li>
                                            <li><a href="keys/logout.php">Logout</a></li>
                                        <?php
                                        }
                                        if (isset($_SESSION['id'])) {
                                        ?>
                                            <li><a href="history">Purchase History</a></li>
                                            <li><a href="settings">Settings</a></li>
                                            <li><a href="keys/logout.php">Logout</a></li>
                                        <?php
                                        }
                                    } else {
                                        ?>
                                        <li><a href="login">Login</a></li>
                                    <?php
                                    }
                                    ?>

                                </ul>
                            </li>

                            <?php
                            if (!isset($_SESSION['ID_ADMIN'])) {
                            ?>
                                <li>
                                    <a href="car">
                                        <i class="fa-solid fa-cart-shopping" style="height:20px"></i>
                                    </a>
                                </li>
                            <?php
                            }
                            ?>

                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                    </nav>
                </div>
            </div>
        </div>
    </header>


    <script>
        window.onload = (event) => {
            const home = document.querySelector('.home');
            const offert = document.querySelector('.offert');
            const product = document.querySelector('.product');


            var url = window.location.pathname
            var path = url.split('/')

            if (path[2] == 'index' || path[2] == '') {
                home.style = "border-bottom: 1px solid;";

            } else if (path[2] == 'products') {
                product.style = "border-bottom: 1px solid;";

            } else if (path[2] == 'onfire') {
                offert.style = "border-bottom: 1px solid;";

            }

        };
    </script>