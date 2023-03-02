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
                        <a href="index.php" class="logo">
                            <img class="logo_img" src="assets/images/logo.png">
                        </a>
                        <ul class="nav">
                            <!-- <li class="scroll-to-section d-flex" >
                                <input type="text" style="width:300px; height:30px" class="form-control">
                                <i style="color:black" class="fa-solid fa-chevron-right"></i>
                                <i style="color:black" class="fa-sharp fa-solid fa-magnifying-glass"></i>
                            </li> -->
                            <?php
                            session_start();
                            if (isset($_SESSION['id'])) {
                            ?>
                                <li class="scroll-to-section"><a href="users.php" class="active">Home</a></li>
                            <?php
                            } else {
                            ?>
                                <li class="scroll-to-section"><a href="index.php" class="active">Home</a></li>
                            <?php
                            }
                            ?>

                            <li class="scroll-to-section"><a href="rostro.php">On Fire</a></li>
                            <li class="submenu">
                                <a href="javascript:;">Feature</a>
                                <ul>
                                    <li><a href="esmalte.php">Boy</a></li>
                                   
                                        <li><a href="signup.php">Girl</a></li>
                                        <li><a href="agregar.php">Women</a></li>
                                   
                                        <li><a href="login.php">Men</a></li>
                                    
                                    
                                </ul>
                            </li>
                            <li class="scroll-to-section"><a href="ojos.php">Product</a></li>
                            <?php
                            if (isset($_SESSION['id'])) {
                            ?>
                                <li><a href="keys/logout.php">Cerrar Sesion</a></li>
                            <?php
                            }
                            ?>
                            <li class="submenu">
                                <a href="javascript:;">Acount</a>
                                <ul>
                                    <li><a href="esmalte.php">Uñas</a></li>
                                    <?php
                                    if (isset($_SESSION['id'])) {
                                    ?>
                                        <li><a href="signup.php">Agregar Usuario</a></li>
                                        <li><a href="agregar.php">Agregar Productos</a></li>
                                        <li><a href="selling.php">Ventas</a></li>
                                    <?php
                                    } else {
                                    ?>
                                        <li><a href="login.php">Iniciar Sesion</a></li>
                                    <?php
                                    }
                                    ?>
                                    <li><a href="about.php">Acerca de</a></li>
                                </ul>
                            </li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                    </nav>
                </div>
            </div>
        </div>
    </header>