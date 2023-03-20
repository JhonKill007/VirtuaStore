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
$role = $_POST['role'];
$birthday = $year . "/" . $month . "/" . $day;

// echo $nombre;
// echo $apellido;
// echo $numero;
// echo $email;
// echo $password;
// echo $day;
// echo $month;
// echo $year;
// echo $genero;
// echo $role;
// echo $birthday;


$script_password = password_hash($password, PASSWORD_DEFAULT);

if (!empty($nombre) || !empty($apellido) || !empty($numero) || !empty($email) || !empty($password) || !empty($day) || !empty($month) || !empty($year) || !empty($genero) || !empty($role)) {
    $eso =  require('conection.php');
    if ($eso) {
        $SELECT = "SELECT * FROM registro WHERE email = '$email'";
        $resultado = mysqli_query($conn, $SELECT);
        if ($resultado->num_rows == 0) {


            $INSERT = "INSERT INTO registro (nombre,apellido,numero,email,password,birthday,genero,role)values('$nombre','$apellido','$numero','$email','$script_password','$birthday','$genero','$role')";
            $resultado = mysqli_query($conn, $INSERT);
            if ($resultado) {
                echo "REGISTRADO";
                $SELECT = "SELECT * FROM registro WHERE email = '$email'";
                $resultado = mysqli_query($conn, $SELECT);
                if ($resultado) {

                    while ($row = $resultado->fetch_array()) {
                        if ($row['role'] == "ADMIN") {
                            header("Location: ../users");
                        }
                        if ($row['role'] == "USER") {
                            $id = $row['id_registro'];
                            $INSERT = "INSERT INTO registro (nombre,apellido,numero,email,password,birthday,genero,role)values('$nombre','$apellido','$numero','$email','$script_password','$birthday','$genero','$role')";
                            $resultado = mysqli_query($conn, $INSERT);
                            if ($resultado) {
                                session_start();
                                $_SESSION['id'] = $id;
                                header("Location: ../index");
                            }
                        }
                    }
                } else {
                    echo "NO HAY REGISTRO";
                }
            } else {
                echo "NO SE GUARDO EL REGISTRO";
            }
        } else {
            echo "<script>
                alert('El email ya esta registrado');
                window.location='../signup';
                </script>";
        }
    } else {
        echo "fallo la coneccion";
    }
} else {
    echo "<script>
    alert('Debe llenar todos los campos');
    window.location='../login';
    </script>";
}
