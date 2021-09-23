<?php

$edad = 0;
$ano_actual = 2021;

$nombre = $_POST['nombre'];
if (empty($nombre)) {
    $datasign .= "<div class='error-txt  error'>Debes completar el Nombre.</div>";
} else {
    $apellido = $_POST['apellido'];
    if (empty($apellido)) {
        $datasign .= "<div class='error-txt  error'>Debes completar el Apellido.</div>";
    } else {
        $nom_comp = $nombre . ' ' . $apellido;
        $numero = $_POST['numero'];
        if (empty($numero)) {
            $datasign .= "<div class='error-txt  error'>Debes completar el Numero.</div>";
        } else {
            $email = $_POST['email'];
            if (empty($email)) {
                $datasign .= "<div class='error-txt  error'>Debes completar el Email.</div>";
            } else {
                $password = $_POST['password'];
                if (empty($password)) {
                    $datasign .= "<div class='error-txt  error'>Debes completar la Contraseña.</div>";
                } else {
                    $passconf = $_POST['password-confirm'];
                    if (empty($passconf)) {
                        $datasign .= "<div class='error-txt  error'>Debes confirmar tu Contraseña.</div>";
                    }
                    else{
                        $script_password = password_hash($password, PASSWORD_DEFAULT);
                        $day = $_POST['day'];
                        $month = $_POST['month'];
                        $year = $_POST['year'];
                        // $genero = "";
                        if (empty($day)) {
                            $datasign .= "<div class='error-txt  error'>Debes completar el dia de nacimiento.</div>";
                        }
                        else if (empty($month)) {
                            $datasign .= "<div class='error-txt  error'>Debes completar el mes de nacimiento.</div>";
                        }
                        else if (empty($year)) {
                            $datasign .= "<div class='error-txt  error'>Debes completar el año de nacimiento.</div>";
                        }
                        else{
                            $integer_year = intval($year);
                            $edad = $ano_actual - $integer_year;
                            $birthday = $year . "/" . $month . "/" . $day;
                            if (isset($_POST['genero'])) {
                                $genero = $_POST['genero'];
                            } else {
                                $datasign .= "<div class='error-txt  error'>Debes selecionar un genero.</div>";
                            }
                        }
                    }
                }
            }
        }
    }
}



$foto = "img/usuario.png";
$portada = "img/portada.jpg";
$presentacion = "PRESENTACION";
$status = "Online";
