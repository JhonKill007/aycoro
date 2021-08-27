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
$birthday = $year . "/" . $month . "/" . $day;
$foto = "img/usuario.png";
$portada = "img/portada.jpg";
$presentacion = "PRESENTACION";

$datasign = "";

$script_password = password_hash($password, PASSWORD_DEFAULT);

if (!empty($nombre) || !empty($apellido) || !empty($numero) || !empty($email) || !empty($password) || !empty($day) || !empty($month) || !empty($year) || !empty($genero)) {
    $eso =  require('conection.php');
    if ($eso) {
        $SELECT = "SELECT * FROM registro WHERE email = '$email'";
        $resultado = mysqli_query($conn, $SELECT);
        if ($resultado->num_rows == 0) {


            $INSERT = "INSERT INTO registro (nombre,apellido,numero,email,password,birthday,genero,foto,portada,presentacion)values('$nombre','$apellido','$numero','$email','$script_password','$birthday','$genero','$foto','$portada','$presentacion')";
            $resultado = mysqli_query($conn, $INSERT);
            if ($resultado) {
                $SELECT = "SELECT * FROM registro WHERE email = '$email'";
                $resultado = mysqli_query($conn, $SELECT);
                if ($resultado) {

                    while ($row = $resultado->fetch_array()) {
                        $id = $row['id_registro'];
                        if (1 == 1) {
                            // echo $row['id_registro'];
                            session_start();
                            $_SESSION['id'] = $id;
                            echo "success";
                        }
                    }
                } else {
                    $datasign .= "<div class='error-txt  error'>NO HAY REGISTRO</div>";
                    echo $datasign;
                }
            } else {
                $datasign .= "<div class='error-txt  error'>NO SE GUARDO EL REGISTRO</div>";
                echo $datasign;
            }
        } else {
            $datasign .= "<div class='error-txt  error'>El Email usado ya esta Registrado</div>";
            echo $datasign;
        }
    } else {
        echo "fallo la coneccion";
    }
} else {
    echo "todos los datos son OBLIGATORIOS";
    die();
}
