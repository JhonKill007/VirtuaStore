<?php
session_start();
if (isset($_SESSION['ID_ADMIN'])) {
    require("head.php");
?>
    <section class="section" id="products">
        <div class="container" style="margin-top: 20px;">
            <div class="row">
                <div class="col-lg-4">
                    <div class="section-heading">
                        <h2>Users Manager</h2>
                        <span>Edita los Manejadores de tu pagina</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <?php
                require("keys/conection.php");
                if ($conn) {
                    $SELECT = "SELECT * FROM registro WHERE role = 'ADMIN' AND email != 'admin@store.com'";
                    $resultado = mysqli_query($conn, $SELECT);
                    if ($resultado) {
                        while ($com = $resultado->fetch_array()) {
                ?>
                            <div style="border:1px solid grey; border-radius:10px;  margin-bottom:15px; padding:15px; margin-left:10px;">
                                <div class="col-sm-12">
                                    <b>Email:</b>
                                    <span><?php echo $com['email']; ?></span>
                                </div>

                                <div class="col-sm-12">
                                    <b>Name:</b>
                                    <span><?php echo $com['nombre']; ?></span>
                                </div>
                                <div class="col-sm-12">
                                    <b>Last Name:</b>
                                    <span><?php echo $com['apellido']; ?></span>
                                </div>
                                <div class="col-sm align-self-end">
                                    <div style="margin-top: 25px;">
                                        <form id="contact" action="keys/deleteUser.php" method="post">
                                            <input type="hidden" name="user_id" value="<?php echo $com['id_registro']; ?>">
                                            <button type="submit" style="width: 100%; text-align: center;">Remove</button>

                                        </form>
                                    </div>

                                </div>
                            </div>
                <?php
                        }
                    } else {
                        echo " se fue a la verga";
                    }
                } else {
                    echo "la coneccion fallo";
                }
                ?>
            </div>
        </div>
    </section>
   

<?php
    require("footer.php");
} else {
    header("Location:login");
}
?>