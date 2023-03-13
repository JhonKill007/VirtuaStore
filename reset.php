<?php
require("head.php");

$dato = $_GET['fditer'];

if ($dato) {
    $email = str_replace(" ", "+", $dato);

    $date = $_GET['hfdar'];

    include "keys/metadate/mcript.php";

    $dato_desncriptado = $desencriptar($email);
    $date_desencryp = $desencriptar($date);

    $eso =  require('keys/conection.php');
    if ($eso) {
        $SELECT = "SELECT * from registro where email='$dato_desncriptado'";
        $resultado = mysqli_query($conn, $SELECT);

        if ($resultado->num_rows == 1) {
            $identity = $resultado->fetch_array();
            $id_identity = $identity['id_registro'];
            $name_identity = $identity['nombre'];
            $email_identity = $identity['email'];
        } else {
            header("Location: login");
        }
    }

    $date_today = time();
    if ($email_identity != $dato_desncriptado || $date_desencryp < $date_today) {
        header("Location: login");
    }
}
else{
    header("Location: login");
}

?>
<div class="subscribe">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="section-heading">
                    <h2>Reset your password</h2>
                </div>
                <form id="subscribe" action="keys/identity-key.php" method="post">
                    <input type="hidden" name="id_per" value=<?php echo $id_identity; ?>>
                    <div class="row">
                        <div class="col-lg-5">
                            <fieldset>
                                <input name="nueva" type="password" id="name" placeholder="New password" required="">
                            </fieldset>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-5">
                            <fieldset>
                                <input name="confirm" type="password" id="name" placeholder="Confirm password" required="">
                            </fieldset>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-5">
                            <fieldset>
                                <input class="main-dark-button" type="submit" value="Save" placeholder="Save">
                            </fieldset>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
require("footer.php");
?>