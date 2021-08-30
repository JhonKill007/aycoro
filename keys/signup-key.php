<?php
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$numero = $_POST['numero'];
$email = $_POST['email'];
$password = $_POST['password'];
$passconf = $_POST['password-confirm'];
$day = $_POST['day'];
$month = $_POST['month'];
$year = $_POST['year'];
$genero = $_POST['genero'];
$birthday = $year . "/" . $month . "/" . $day;
$foto = "img/usuario.png";
$portada = "img/portada.jpg";
$presentacion = "PRESENTACION";
$nom_comp = $nombre . ' ' . $apellido;


$datasign = "";

$script_password = password_hash($password, PASSWORD_DEFAULT);

if (!empty($nombre) || !empty($apellido) || !empty($numero) || !empty($email) || !empty($password) || !empty($passconf) || !empty($day) || !empty($month) || !empty($year) || !empty($genero)) {
    $eso =  require('conection.php');
    if ($eso) {
        $SELECT = "SELECT * FROM registro WHERE email = '$email'";
        $resultado = mysqli_query($conn, $SELECT);
        if ($resultado->num_rows == 0) {
            if ($password == $passconf) {
                $INSERT = "INSERT INTO registro (nombre,apellido,nom_comp,numero,email,password,birthday,genero,foto,portada,presentacion)values('$nombre','$apellido','$nom_comp','$numero','$email','$script_password','$birthday','$genero','$foto','$portada','$presentacion')";
                $resultado = mysqli_query($conn, $INSERT);
                if ($resultado) {
                    $SELECT = "SELECT * FROM registro WHERE email = '$email'";
                    $resultadoh = mysqli_query($conn, $SELECT);
                    if ($resultadoh) {
                        while ($sign = $resultadoh->fetch_array()) {
                            $id = $sign['id_registro'];
                            if (1 == 1) {
                                $INSERTsign = "INSERT INTO folow (id_folowing,id_folower)values('$id','$id')";
                                $resultadosign = mysqli_query($conn, $INSERTsign);
                                if ($resultadosign) {
                                    session_start();
                                    $_SESSION['id'] = $id;
                                    echo "success";
                                }
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
                $datasign .= "<div class='error-txt  error'>Las contraseñas no coinsiden</div>";
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
    $datasign .= "<div class='error-txt  error'>Todos los Campos son obligatorios</div>";
    echo $datasign;
}
