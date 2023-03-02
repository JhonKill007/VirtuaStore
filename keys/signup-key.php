<?php
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$numero = $_POST['numero'];
$email = $_POST['email'];
$password = $_POST['password'];
$day = $_POST['day'];
$month = $_POST['month'];
$year = $_POST['year'];
$genero = $_POST['genero'];
$birthday = $year."/".$month."/".$day;


$script_password = password_hash($password, PASSWORD_DEFAULT);

if(!empty($nombre) || !empty($apellido) || !empty($numero) || !empty($email) || !empty($password) || !empty($day) || !empty($month) || !empty($year) || !empty($genero)){
    $eso =  require('conection.php');
    if($eso){
        $SELECT = "SELECT * FROM registro WHERE email = '$email'";
        $resultado = mysqli_query($conn,$SELECT);
        if($resultado->num_rows == 0){


            $INSERT = "INSERT INTO registro (nombre,apellido,numero,email,password,birthday,genero)values('$nombre','$apellido','$numero','$email','$script_password','$birthday','$genero')";
            $resultado = mysqli_query($conn,$INSERT);
            if($resultado){
                echo "REGISTRADO";
                $SELECT = "SELECT * FROM registro WHERE email = '$email'";
                $resultado = mysqli_query($conn,$SELECT);
                if($resultado){
                   
                    while($row = $resultado->fetch_array()){
                        $id = $row['id_registro'];
                        if(1==1){
                            session_start();
                            $_SESSION['id']=$id;
                            header("Location:../users.php");
                        }
                    }
                        
                }
                else{
                    echo "NO HAY REGISTRO";
                }
            }
            else{
                echo "NO SE GUARDO EL REGISTRO";
            }
            
        }

        else{
            echo "<script>
                alert('El email ya esta registrado');
                window.location='../signup.php';
                </script>";

        }
        
    }
    else{
        echo "fallo la coneccion";
    }
}
else{
    echo "<script>
    alert('Debe llenar todos los campos');
    window.location='../login.php';
    </script>";
}
?>
