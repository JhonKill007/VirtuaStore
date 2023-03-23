<?php
require("head.php");
if (isset($_SESSION['id'])) {
    $idRegistro = $_SESSION['id'];
?>
    <style>
        .setting_nav div {
            margin-right: 20px;
        }

        .item {
            margin-right: 10px;
            cursor: pointer;
            border-bottom: 2px solid #fff;
        }

        .item:hover {
            border-bottom: 2px solid black;
        }


        .firts_modal {
            display: block;
        }

        .second_modal {
            display: none;
        }

        .third_modal {
            display: none;
        }

        /* hide */
        .firts_modal.hide {
            display: none;
        }

        .second_modal.hide {
            display: none;
        }

        .third_modal.hide {
            display: none;
        }

        /* show */
        .firts_modal.show {
            display: block;
        }

        .second_modal.show {
            display: block;
        }

        .third_modal.show {
            display: block;
        }
    </style>
    <br>
    <br>
    <div class="firts_modal">
        <div class="subscribe">
            <div class="container">
                <div class="row d-flex setting_nav">
                    <div class="item">
                        <b>Personal Infomation</b>
                    </div>
                    <div class="item modal_1_button_2">
                        <b>Password</b>
                    </div>
                    <div class="item modal_1_button_3">
                        <b>Address</b>
                    </div>
                </div>
            </div>
        </div>

        <hr>

        <div class="subscribe">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="section-heading">
                            <h2>Personal Data Setting</h2>
                            <span>You can update your personal information</span>
                        </div>
                        <form id="contact" action="keys/updateData.php" method="post">
                            <?php
                            require("keys/conection.php");
                            if ($conn) {
                                $SELECT = "SELECT * FROM registro WHERE id_registro = $idRegistro";
                                $resultado = mysqli_query($conn, $SELECT);
                                if ($resultado) {
                                    while ($U = $resultado->fetch_array()) {
                            ?>
                                        <input type="hidden" name="id" value="<?php echo $U['id_registro']; ?>">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <fieldset>
                                                    <input value="<?php echo $U['nombre']; ?>" name="nombre" type="text" id="name" placeholder="Nombre" required="">
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-6">
                                                <fieldset>
                                                    <input value="<?php echo $U['apellido']; ?>" name="apellido" type="text" placeholder="Apellido" required="">
                                                </fieldset>
                                            </div>
                                            <br>
                                            <br>
                                            <div class="col-lg-12">
                                                <fieldset>
                                                    <input value="<?php echo $U['numero']; ?>" type="number" placeholder="Numero" name="numero">
                                                </fieldset>
                                            </div>
                                            <br>
                                            <br>
                                            <div class="col-lg-12">
                                                <fieldset>
                                                    <input value="<?php echo $U['email']; ?>" type="email" placeholder="Email" name="email" autocomplete="off">
                                                </fieldset>
                                            </div>
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
                                }
                            }
                            ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="second_modal">
        <div class="subscribe">
            <div class="container">
                <div class="row d-flex setting_nav">
                    <div class="item modal_2_button_1">
                        <b>Personal Infomation</b>
                    </div>
                    <div class="item">
                        <b>Password</b>
                    </div>
                    <div class="item modal_2_button_3">
                        <b>Address</b>
                    </div>
                </div>
            </div>
        </div>

        <hr>

        <div class="subscribe">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="section-heading">
                            <h2>Change Password</h2>
                            <span>You should use uppercase numbers and characters to make your password more secure.</span>
                        </div>
                        <form id="subscribe" action="keys/change-password-key.php" method="post">
                            <input type="hidden" name="id_per" value="<?php echo $_SESSION['id']; ?>">
                            <div class="row">
                                <div class="col-lg-10">
                                    <fieldset>
                                        <input name="actual" type="password" placeholder="Current password" required="">
                                    </fieldset>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-10">
                                    <fieldset>
                                        <input name="nueva" type="password" placeholder="New Password" required="">
                                    </fieldset>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-10">
                                    <fieldset>
                                        <input name="confirm" type="password" placeholder="Confirm Password" required="">
                                    </fieldset>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-10">
                                    <fieldset>
                                        <input class="main-dark-button" type="submit" value="Save" placeholder="Save">
                                    </fieldset>
                                </div>
                            </div>
                        </form>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="third_modal">
        <div class="subscribe">
            <div class="container">
                <div class="row d-flex setting_nav">
                    <div class="item modal_3_button_1">
                        <b>Personal Infomation</b>
                    </div>
                    <div class="item modal_3_button_2">
                        <b>Password</b>
                    </div>
                    <div class="item">
                        <b>Address</b>
                    </div>
                </div>
            </div>
        </div>

        <hr>

        <style>
            #Address_H1 {
                margin-right: 30px;
            }

            .Ag_Address {
                height: 44px;
                line-height: 44px;
                padding: 0px 15px;
                font-size: 14px;
                font-style: italic;
                font-weight: 500;
                color: #aaa;
                border-radius: 0px;
                border: 1px solid #7a7a7a;
                box-shadow: none;
                cursor: pointer;
            }

            .Ag_Address i {
                color: #aaa;
            }
        </style>




        <div class="subscribe">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="section-heading d-flex">
                            <div id="Address_H1">
                                <h2>Address Settings</h2>
                            </div>
                            <div class="Ag_Address" data-toggle="modal" data-target="#exampleModal">
                                <i class="fa-solid fa-plus" style="height:20px"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="subscribe" style="margin-top: 0 !important;">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="section-heading d-flex">
                                            <div id="Address_H1">
                                                <h2>Add New Address</h2>
                                                <span>All inputs are required, pleace complete it.</span>
                                            </div>
                                        </div>
                                        <form id="contact" action="keys/AddAddress-key" method="post">
                                            <input type="hidden" name="pais" value="United States">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <fieldset>
                                                        <span>First Name</span>
                                                        <input type="text" placeholder="First Name" name="nombre" required>
                                                    </fieldset>
                                                </div>
                                                <div class="col-lg-6">
                                                    <fieldset>
                                                        <span>Last Name</span>
                                                        <input type="text" placeholder="Last Name" name="apellido" required>
                                                    </fieldset>
                                                </div>
                                                <br>
                                                <br>
                                                <div class="col-lg-12">
                                                    <fieldset>
                                                        <span>Street</span>
                                                        <input type="text" placeholder="Street" name="calle" required>
                                                    </fieldset>
                                                </div>
                                                <br>
                                                <br>
                                                <div class="col-lg-12">
                                                    <fieldset>
                                                        <span>Aparment</span>
                                                        <input type="text" placeholder="Aparment" name="numero" required>
                                                    </fieldset>
                                                </div>
                                                <br>
                                                <br>
                                                <div class="col-lg-12">
                                                    <fieldset>
                                                        <span>Zip Code</span>
                                                        <input type="text" placeholder="Zip Code" name="cp" required>
                                                    </fieldset>
                                                </div>
                                                <br>
                                                <br>
                                                <div class="col-lg-6">
                                                    <fieldset>
                                                        <span>City</span>
                                                        <input name="city" type="text" placeholder="City" required>
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
                                                            <option>State</option>
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
                                                        <input name="telefono" type="text" placeholder="Phone" required>
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
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <?php
                require("keys/conection.php");
                if ($conn) {
                    $SELECT = "SELECT * FROM configuracion WHERE id_registro = '$idRegistro'";
                    $resultado = mysqli_query($conn, $SELECT);
                    if ($resultado) {
                        while ($com = $resultado->fetch_array()) {
                            $idconfig = $com['id_configuracion'];
                ?>
                            <div class="col-md-10" style="border:1px solid grey; border-radius:10px;  margin-bottom:15px; padding:15px; margin-left:10px;">
                                <div class="d-flex">
                                    <div class="col-md-4">
                                        <div class="col-md-12" style="margin-bottom:15px;">
                                            <b>First Name:</b>
                                            <span><?php echo $com['nombre']; ?></span>
                                        </div>
                                        <div class="col-md-12" style="margin-bottom:15px;">
                                            <b>Street:</b>
                                            <span><?php echo $com['calle']; ?></span>
                                        </div>
                                        <div class="col-md-12" style="margin-bottom:15px;">
                                            <b>Zip Code:</b>
                                            <span><?php echo $com['codigo_postal']; ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="col-md-12" style="margin-bottom:15px;">
                                            <b>Last Name:</b>
                                            <span><?php echo $com['apellido']; ?></span>
                                        </div>
                                        <div class="col-md-12" style="margin-bottom:15px;">
                                            <b>Aparment:</b>
                                            <span><?php echo $com['numero']; ?></span>
                                        </div>
                                    </div>
                                    <div class="col-dm-5 d-flex">
                                        <div class="col-md-8">
                                            <div class="col-md-12" style="margin-bottom:15px;">
                                                <b>City:</b>
                                                <span><?php echo $com['ciudad']; ?></span>
                                            </div>
                                            <div class="col-md-12" style="margin-bottom:15px;">
                                                <b>State:</b>
                                                <span><?php echo $com['estado']; ?></span>
                                            </div>
                                            <div class="col-md-12" style="margin-bottom:15px;">
                                                <b>Phone:</b>
                                                <span><?php echo $com['telefono']; ?></span>
                                            </div>
                                        </div>
                                        <div class="col-dm-4 d-flex">
                                            <div class="Ag_Address" data-toggle="modal" data-target="#exampleModal_<?php echo $com['id_configuracion']; ?>" style="margin-right: 20px;">
                                                <i class="fa-solid fa-pencil" style="height:20px;"></i>
                                            </div>
                                            <form action="keys/deleteUser.php" method="post">
                                                <input type="hidden" name="id_configuracion" value="<?php echo $com['id_configuracion']; ?>">
                                                <button class="Ag_Address" type="submit" style="margin-right: 20px;">
                                                    <i class="fa-solid fa-trash" style="height:20px;"></i>
                                                </button>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="exampleModal_<?php echo $com['id_configuracion']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <div class="subscribe" style="margin-top: 0 !important;">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="section-heading d-flex">
                                                                <div id="Address_H1">
                                                                    <h2>Update Your Address</h2>
                                                                </div>
                                                            </div>
                                                            <form id="contact" action="keys/updateAddress" method="post">
                                                                <input type="hidden" name="pais" value="United States">
                                                                <input type="hidden" name="_origen" value="1">
                                                                <input type="hidden" name="id_configuracion" value="<?php echo $com['id_configuracion']; ?>">
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
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
    </div>

    <script>
        // modal_1
        document.querySelector('.modal_1_button_2').addEventListener('click', () => {
            document.querySelector(".second_modal").classList.toggle("show")
            document.querySelector(".firts_modal").classList.toggle("hide")
        })
        document.querySelector('.modal_1_button_3').addEventListener('click', () => {
            document.querySelector(".third_modal").classList.toggle("show")
            document.querySelector(".firts_modal").classList.toggle("hide")
        })

        // modal_2
        document.querySelector('.modal_2_button_1').addEventListener('click', () => {
            document.querySelector(".firts_modal").classList.toggle("hide")
            document.querySelector(".second_modal").classList.toggle("show")
        })
        document.querySelector('.modal_2_button_3').addEventListener('click', () => {
            document.querySelector(".third_modal").classList.toggle("show")
            document.querySelector(".second_modal").classList.toggle("show")
        })

        // modal_3
        document.querySelector('.modal_3_button_1').addEventListener('click', () => {
            document.querySelector(".firts_modal").classList.toggle("hide")
            document.querySelector(".third_modal").classList.toggle("show")
        })
        document.querySelector('.modal_3_button_2').addEventListener('click', () => {
            document.querySelector(".second_modal").classList.toggle("show")
            document.querySelector(".third_modal").classList.toggle("show")
        })
    </script>



<?php
    require("footer.php");
} else {
    header("Location:login");
}
?>