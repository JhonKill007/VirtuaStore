<?php
require("head.php");
if (isset($_SESSION['id'])) {
    $idUser=$_SESSION['id'];

?>
    <br>
    <br>

    <div class="subscribe">
        <div class="container" style="overflow-x: scroll">
            <h1>Purchase History</h1>
            <br>
            <br>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Color</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">P/P</th>
                        <th scope="col">Total</th>
                     

                    </tr>
                </thead>
                <tbody>
                    <?php
                    require("keys/conection.php");
                    if ($conn) {
                        $SELECT = "SELECT c.id_car,r.nombre,r.email,p.articulo,c.color,c.cantidadSelected,p.precio
                        from car c 
                        inner join 
                        registro r on r.id_registro = c.user_id
                        inner join
                        productos p on c.producto_id = p.id_producto
                        where c.comprado=1 and c.user_id=$idUser" ;
                        $resultado = mysqli_query($conn, $SELECT);
                        if ($resultado) {
                            while ($com = $resultado->fetch_array()) {
                                $total=$com['cantidadSelected'] *$com['precio'];  
                    ?>

                                <tr>
                                   
                                    <td><?php echo $com['articulo']; ?></td>
                                    <td><?php echo $com['color']; ?></td>
                                    <td><?php echo $com['cantidadSelected']; ?></td>
                                    <td><?php echo $com['precio']; ?></td>
                                    <td><?php echo $total ?></td>

                                  
                                   
                                    
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