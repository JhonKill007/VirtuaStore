<?php
session_start();
if (!isset($_SESSION['ID_ADMIN']) && !isset($_SESSION['id'])) {
    require("head.php");
?>
    <div class="subscribe">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="section-heading">
                        <h2>Recover account</h2>
                        <span>
                            It's ok, you can recover your account, <br>
                            We will send a recovery link to the email that you have linked to your account.
                        </span>
                    </div>
                    <form id="subscribe" action="keys/identity-key.php" method="post">
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
                                    <input class="main-dark-button" type="submit" value="Send" placeholder="Send">
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