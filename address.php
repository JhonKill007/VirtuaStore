<?php
session_start();
if (isset($_SESSION['ID_ADMIN'])) {
    require("head.php");
?>
    <br>
    <br>
    <div class="contact-us">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div id="map">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h2>Address Settings</h2>
                        <!-- <span>Registrate y llevate lo que te gusta.</span> -->
                    </div>
                    <form id="contact" action="keys/updateAddress" method="post">
                        <?php
                        require("keys/conection.php");
                        if ($conn) {
                            $SELECT = "SELECT * FROM configuracion WHERE id_registro = 3";
                            $resultado = mysqli_query($conn, $SELECT);
                            if ($resultado) {
                                while ($com = $resultado->fetch_array()) {
                        ?>
                                    <input type="hidden" name="id_configuracion" value="<?php echo $com['id_configuracion']; ?>">
                                    <input type="hidden" name="pais" value="United States">
                                    <input type="hidden" name="_origen" value="2">

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <fieldset>
                                                <span>First Name</span>
                                                <input type="text" placeholder="First Name" value="<?php echo $com['nombre']; ?>" name="nombre" required>
                                            </fieldset>
                                        </div>
                                        <div class="col-lg-6">
                                            <fieldset>
                                                <span>Last Name</span>
                                                <input type="text" placeholder="Last Name" value="<?php echo $com['apellido']; ?>" name="apellido" required>
                                            </fieldset>
                                        </div>
                                        <br>
                                        <br>
                                        <div class="col-lg-12">
                                            <fieldset>
                                                <span>Street</span>
                                                <input type="text" placeholder="Street" value="<?php echo $com['calle']; ?>" name="calle" required>
                                            </fieldset>
                                        </div>
                                        <br>
                                        <br>
                                        <div class="col-lg-12">
                                            <fieldset>
                                                <span>Aparment</span>
                                                <input type="text" placeholder="Aparment" value="<?php echo $com['numero']; ?>" name="numero" required>
                                            </fieldset>
                                        </div>
                                        <br>
                                        <br>
                                        <div class="col-lg-12">
                                            <fieldset>
                                                <span>Zip Code</span>
                                                <input type="text" placeholder="Zip Code" value="<?php echo $com['codigo_postal']; ?>" name="cp" required>
                                            </fieldset>
                                        </div>
                                        <br>
                                        <br>
                                        <div class="col-lg-6">
                                            <fieldset>
                                                <span>City</span>
                                                <input name="city" type="text" placeholder="City" value="<?php echo $com['ciudad']; ?>" required>
                                            </fieldset>
                                        </div>
                                        <div class="col-lg-6">
                                            <fieldset>
                                                <span>State</span>
                                                <select style="width: 100%;
                                            height: 44px;
                                            line-height: 44px;
                                            padding: 0px 15px;
                                            font-size: 14px;
                                            font-style: italic;
                                            font-weight: 500;
                                            color: #aaa;
                                            border-radius: 0px;
                                            border: 1px solid #7a7a7a;
                                            box-shadow: none;" name="estado" required>
                                                    <option value="<?php echo $com['estado']; ?>"><?php echo $com['estado']; ?></option>
                                                    <option value="Alabama">Alabama</option>
                                                    <option value="Alaska">Alaska</option>
                                                    <option value="Arizona">Arizona</option>
                                                    <option value="Arkansas">Arkansas</option>
                                                    <option value="California">California</option>
                                                    <option value="Colorado">Colorado</option>
                                                    <option value="Connecticut">Connecticut</option>
                                                    <option value="Delaware">Delaware</option>
                                                    <option value="District Of Columbia">District Of Columbia</option>
                                                    <option value="Florida">Florida</option>
                                                    <option value="Georgia">Georgia</option>
                                                    <option value="Hawaii">Hawaii</option>
                                                    <option value="Idaho">Idaho</option>
                                                    <option value="Illinois">Illinois</option>
                                                    <option value="Indiana">Indiana</option>
                                                    <option value="Iowa">Iowa</option>
                                                    <option value="Kansas">Kansas</option>
                                                    <option value="Kentucky">Kentucky</option>
                                                    <option value="Louisiana">Louisiana</option>
                                                    <option value="Maine">Maine</option>
                                                    <option value="Maryland">Maryland</option>
                                                    <option value="Massachusetts">Massachusetts</option>
                                                    <option value="Michigan">Michigan</option>
                                                    <option value="Minnesota">Minnesota</option>
                                                    <option value="Mississippi">Mississippi</option>
                                                    <option value="Missouri">Missouri</option>
                                                    <option value="Montana">Montana</option>
                                                    <option value="Nebraska">Nebraska</option>
                                                    <option value="Nevada">Nevada</option>
                                                    <option value="New Hampshire">New Hampshire</option>
                                                    <option value="New Jersey">New Jersey</option>
                                                    <option value="New Mexico">New Mexico</option>
                                                    <option value="New York">New York</option>
                                                    <option value="North Carolina">North Carolina</option>
                                                    <option value="North Dakota">North Dakota</option>
                                                    <option value="Ohio">Ohio</option>
                                                    <option value="Oklahoma">Oklahoma</option>
                                                    <option value="Oregon">Oregon</option>
                                                    <option value="Pennsylvania">Pennsylvania</option>
                                                    <option value="Rhode Island">Rhode Island</option>
                                                    <option value="South Carolina">South Carolina</option>
                                                    <option value="South Dakota">South Dakota</option>
                                                    <option value="Tennessee">Tennessee</option>
                                                    <option value="Texas">Texas</option>
                                                    <option value="Utah">Utah</option>
                                                    <option value="Vermont">Vermont</option>
                                                    <option value="Virginia">Virginia</option>
                                                    <option value="Washington">Washington</option>
                                                    <option value="West Virginia">West Virginia</option>
                                                    <option value="Wisconsin">Wisconsin</option>
                                                    <option value="Wyoming">Wyoming</option>
                                                </select>
                                            </fieldset>
                                        </div>
                                        <br>
                                        <br>
                                        <div class="col-lg-12">
                                            <fieldset>
                                                <span>Phone</span>
                                                <input name="telefono" type="text" value="<?php echo $com['telefono']; ?>" placeholder="Phone" required>
                                            </fieldset>
                                        </div>
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <div class="col-lg-12">
                                            <fieldset>
                                                <input class="main-dark-button" type="submit" value="Save">
                                            </fieldset>
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

                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
    require("footer.php");
} else {
    header("Location:login");
}
?>