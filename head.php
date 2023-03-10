<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/1528b45c37.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://kit.fontawesome.com/1528b45c37.css" crossorigin="anonymous">
    <title>Lolet</title>


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
                            <img class="logo_img" src="assets/images/logo.png">
                        </a>
                        <ul class="nav">

                            <?php
                            session_start();
                            if (isset($_SESSION['id'])) {
                            ?>
                                <li class="scroll-to-section"><a href="index" class="active">Home</a></li>
                            <?php
                            } else {
                            ?>
                                <li class="scroll-to-section"><a href="index" class="active">Home</a></li>
                            <?php
                            }
                            ?>

                            <li class="scroll-to-section"><a href="onfire">Offert</a></li>
                            <li class="submenu">
                                <a href="javascript:;">Feature</a>
                                <ul>
                                    <li><a href="product">Boy</a></li>

                                    <li><a href="product">Girl</a></li>
                                    <li><a href="product">Women</a></li>

                                    <li><a href="product">Men</a></li>


                                </ul>
                            </li>
                            <li class="scroll-to-section"><a href="product">Products</a></li>

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
                                            <li><a href="address">Address</a></li>
                                            <li><a href="selling">Sales History</a></li>
                                            <li><a href="keys/logout.php">Logout</a></li>
                                        <?php
                                        }
                                        if (isset($_SESSION['id'])) {
                                        ?>
                                            <li><a href="selling">Purchase History</a></li>
                                            <li><a href="selling">Settins</a></li>
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