<?php
require("head.php");
if (isset($_SESSION['ID_ADMIN'])) {
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
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Email</th>
                        <th scope="col">Title</th>
                        <th scope="col">Color</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Address</th>
                        <th scope="col">Option</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    require("keys/conection.php");
                    if ($conn) {
                        $SELECT = "SELECT c.id_car,r.nombre,r.email,p.articulo,c.color,c.cantidadSelected
                        from car c 
                        inner join 
                        registro r on r.id_registro = c.user_id
                        inner join
                        productos p on c.producto_id = p.id_producto
                        where c.comprado=1";
                        $resultado = mysqli_query($conn, $SELECT);
                        if ($resultado) {
                            while ($com = $resultado->fetch_array()) {
                    ?>

                                <tr>
                                    <th scope="row"><?php echo $com['id_car']; ?></th>
                                    <td><?php echo $com['nombre']; ?></td>
                                    <td><?php echo $com['email']; ?></td>
                                    <td><?php echo $com['articulo']; ?></td>
                                    <td><?php echo $com['color']; ?></td>
                                    <td><?php echo $com['cantidadSelected']; ?></td>
                                    <td><i class="fa-solid fa-eye"></i></td>
                                    <td> <i class="fa-solid fa-paper-plane"></i></td>
                                   
                                    
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