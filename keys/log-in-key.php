<?php

$email = $_POST['email'];
$password = $_POST['password'];
$datalog = "";


if (!empty($email) || !empty($password)) {

    $eso =  require('conection.php');
    if ($eso) {
        $SELECT = "SELECT * from registro where email='$email'";
        $resultado = mysqli_query($conn, $SELECT);

        if ($resultado->num_rows == 1) {
            $log = $resultado->fetch_array();

            if (password_verify($password, $log['password'])) {
                // echo "true";
                $id = $log['id_registro'];
                session_start();
                $_SESSION['id'] = $id;
                echo "success";
            } else {
                $datalog .= "<div class='error-txt  error'>La Contraseña es Incorrecta</div>";
                echo $datalog;
            }
        } else {

            $datalog .= "<div class='error-txt  error'>El Email es Incorrecto</div>";
            echo $datalog;
        }
    } else {
        echo "la coneccionn de la base de  datos fallo";
    }
} else {
    echo "todos los datos son OBLIGATORIOS";
    die();
}
