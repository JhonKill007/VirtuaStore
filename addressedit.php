<?php
require("head.php");
if (isset($_SESSION['id'])) {
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