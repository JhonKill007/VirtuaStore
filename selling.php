<?php
require("head.php");
if (isset($_SESSION['id'])) {
?>
    <br>
    <br>
    <br>
    <br>
    <div class="subscribe">
        <div class="container">
            <h1>Ventas</h1>
            <div class="row">
                <table border="1">
                    <tbody>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Orden</th>
                            <th>Email</th>
                            <th>Numero</th>
                            <th>Direccion</th>
                        </tr>

                        <?php
                        require("keys/conection.php");
                        if ($conn) {
                            $SELECT = "SELECT * FROM ventas INNER JOIN productos on ventas.id_producto=productos.id_producto";
                            $resultado = mysqli_query($conn, $SELECT);
                            if ($resultado) {
                                while ($com = $resultado->fetch_array()) {
                        ?>

                                    <tr>
                                        <td><?php echo $com['nombre']; ?></td>
                                        <td><?php echo $com['apellido']; ?></td>
                                        <td><?php echo $com['articulo']; ?></td>
                                        <td><?php echo $com['email']; ?></td>
                                        <td><?php echo $com['numero']; ?></td>
                                        <td><?php echo $com['direccion']; ?></td>
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
    </div>
<?php
    require("footer.php");
} else {
    header("Location:login.php");
}
?>