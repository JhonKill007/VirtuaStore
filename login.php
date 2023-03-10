<?php
require("head.php");
if (!isset($_SESSION['ID_ADMIN']) && !isset($_SESSION['id'])) {
?>
    <div class="subscribe">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="section-heading">
                        <h2>Iniciar Sesion</h2>
                        <span>Aun no tienes cuenta, registrate <a href="signup">aqui</a>.</span>
                    </div>
                    <form id="subscribe" action="keys/log-in-key.php" method="post">
                        <div class="row">
                            <div class="col-lg-5">
                                <fieldset>
                                    <input name="email" type="text" id="email" pattern="[^ @]*@[^ @]*" placeholder="Email" required="">
                                </fieldset>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-5">
                                <fieldset>
                                    <input name="password" type="password" id="name" placeholder="Contraseña" required="">
                                </fieldset>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-5">
                                <fieldset>
                                    <input class="main-dark-button" type="submit" value="Iniciar Sesion" placeholder="Iniciar Sesion">
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
} else {
    header("Location:index");
}
?>