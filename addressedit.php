<?php
session_start();
if (isset($_SESSION['id'])) {
    require("head.php");
    $idRegistro = $_SESSION['id'];
    $idAddres = $_GET['id'];
?>

    <br>
    <br>

    <div>
        <div class="subscribe">

        </div>
    </div>



<?php
    require("footer.php");
} else {
    header("Location:login");
}
?>