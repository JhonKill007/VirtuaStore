<style>
    .stylo {
        width: 100%;
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
    }
</style>
<?php
session_start();
if (isset($_SESSION['ID_ADMIN'])) {
    require("head.php");
?>
    <br>
    <br>

    <div class="subscribe">
        <div class="container" style="overflow-x: scroll">
            <h1>Pending for shipping</h1>
            <br>
            <br>
            <table class="table">
                <thead class="thead-dark">
                    <tr>

                        <th scope="col">First</th>
                        <th scope="col">Email</th>
                        <th scope="col">Title</th>
                        <th scope="col">Color</th>
                         <th scope="col">Size</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Purchase Date</th>
                        <th scope="col">Option</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    require("keys/conection.php");
                    if ($conn) {
                        $SELECT = "SELECT v.id_ventas,r.nombre,r.email,p.articulo,v.color,v.size,v.cantidadSelected,v.user_id,v.fecha_comprado
                        from ventas v
                        left join 
                        registro r on r.id_registro = v.user_id
                        inner join
                        productos p on v.producto_id = p.id_producto
                        where v.enviado=0";
                        $resultado = mysqli_query($conn, $SELECT);
                        if ($resultado) {
                            while ($com = $resultado->fetch_array()) {
                                $idUser = $com['user_id'];
                    ?>

                                <tr style="text-align: center;">

                                    <td ><?php echo $com['nombre']; ?></td>
                                    <td><?php echo $com['email']; ?></td>
                                    <td><?php echo $com['articulo']; ?></td>
                                    <td><?php echo $com['color']; ?></td>
                                    <td><?php echo $com['size']; ?></td>
                                    
                                    <td><?php echo $com['cantidadSelected']; ?></td>
                                    <!-- <td>
                                        <div class="Ag_Address" data-toggle="modal" data-target="#exampleModal_<?php echo $com['user_id']; ?>" style="margin-right: 20px; cursor:pointer">
                                            <i class="fa-solid fa-eye"></i>
                                        </div>
                                    </td> -->
                                    <td>
                                        <?php
                                        $input = $com['fecha_comprado'];
                                        $date = strtotime($input);
                                        echo date('m/d/Y', $date);
                                        ?>

                                    </td>
                                    <form action="keys/orden-sent-key.php" method="post">
                                        <input type="hidden" name="email" value="<?php echo $com['email']; ?>">
                                        <td style="display: flex; justify-content:space-around" type="submit">
                                            <div class="Ag_Address" data-toggle="modal" data-target="#exampleModal_<?php echo $com['user_id']; ?>" style="margin-right: 20px; cursor:pointer">
                                                <i class="fa-solid fa-eye"></i>
                                            </div>
                                            <button style="background-color: transparent;border: 1px;"><i class="fa-solid fa-paper-plane"></i></button>
                                        </td>
                                    </form>


                                    <div class="modal fade" id="exampleModal_<?php echo $idUser ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <div class="subscribe" style="margin-top: 0 !important;">
                                                        <div class="container">
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="section-heading d-flex">
                                                                        <div id="Address_H1">
                                                                            <h2>Address</h2>
                                                                        </div>
                                                                    </div>
                                                                    <?php
                                                                    require("keys/conection.php");
                                                                    if ($conn) {
                                                                        $SELECT = "SELECT * FROM configuracion WHERE id_registro = '$idUser' LIMIT 1";
                                                                        $resultadoC = mysqli_query($conn, $SELECT);
                                                                        if ($resultadoC) {
                                                                            while ($com = $resultadoC->fetch_array()) {
                                                                                $idconfig = $com['id_configuracion'];
                                                                    ?>
                                                                                <form id="contact">
                                                                                    <input type="hidden" name="pais" value="United States">
                                                                                    <input type="hidden" name="_origen" value="1">
                                                                                    <input type="hidden" name="id_configuracion" value="<?php echo $com['id_configuracion']; ?>">
                                                                                    <div class="row">
                                                                                        <div class="col-lg-6">
                                                                                            <fieldset>
                                                                                                <span>First Name</span>
                                                                                                <input class="stylo" disabled type="text" placeholder="First Name" value="<?php echo $com['nombre']; ?>" name="nombre" required>
                                                                                            </fieldset>
                                                                                        </div>
                                                                                        <div class="col-lg-6">
                                                                                            <fieldset>
                                                                                                <span>Last Name</span>
                                                                                                <input class="stylo" disabled type="text" placeholder="Last Name" value="<?php echo $com['apellido']; ?>" name="apellido" required>
                                                                                            </fieldset>
                                                                                        </div>
                                                                                        <br>
                                                                                        <br>
                                                                                        <div class="col-lg-12">
                                                                                            <fieldset>
                                                                                                <span>Street</span>
                                                                                                <input class="stylo" disabled type="text" placeholder="Street" value="<?php echo $com['calle']; ?>" name="calle" required>
                                                                                            </fieldset>
                                                                                        </div>
                                                                                        <br>
                                                                                        <br>
                                                                                        <div class="col-lg-12">
                                                                                            <fieldset>
                                                                                                <span>Aparment</span>
                                                                                                <input class="stylo" disabled type="text" placeholder="Aparment" value="<?php echo $com['numero']; ?>" name="numero" required>
                                                                                            </fieldset>
                                                                                        </div>
                                                                                        <br>
                                                                                        <br>
                                                                                        <div class="col-lg-12">
                                                                                            <fieldset>
                                                                                                <span>Zip Code</span>
                                                                                                <input class="stylo" disabled type="text" placeholder="Zip Code" value="<?php echo $com['codigo_postal']; ?>" name="cp" required>
                                                                                            </fieldset>
                                                                                        </div>
                                                                                        <br>
                                                                                        <br>
                                                                                        <div class="col-lg-6">
                                                                                            <fieldset>
                                                                                                <span>City</span>
                                                                                                <input class="stylo" disabled name="city" type="text" placeholder="City" value="<?php echo $com['ciudad']; ?>" required>
                                                                                            </fieldset>
                                                                                        </div>
                                                                                        <div class="col-lg-6">
                                                                                            <fieldset>
                                                                                                <span>State</span>
                                                                                                <select disabled style="width: 100%;
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

                                                                                                </select>
                                                                                            </fieldset>
                                                                                        </div>
                                                                                        <br>
                                                                                        <br>
                                                                                        <div class="col-lg-12">
                                                                                            <fieldset>
                                                                                                <span>Phone</span>
                                                                                                <input class="stylo" name="telefono" type="text" value="<?php echo $com['telefono']; ?>" placeholder="Phone" disabled>
                                                                                            </fieldset>
                                                                                        </div>
                                                                                        <br>
                                                                                        <br>
                                                                                        <br>
                                                                                        <br>
                                                                                        <div class="col-lg-12">


                                                                                        </div>
                                                                                    </div>
                                                                                </form>

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
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>



                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </tr>




                    <?php
                            }
                        }
                    }
                    ?>


                </tbody>
            </table>


        </div>
    </div>
<?php
    require("footer.php");
} else {
    header("Location:login");
}
?>