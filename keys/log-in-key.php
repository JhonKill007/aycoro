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
                $UPDATE = "UPDATE registro SET status='Online' Where id_registro ='$id'";
                $resultado = mysqli_query($conn, $UPDATE);
                if ($resultado) {
                    session_start();
                    $_SESSION['id'] = $id;
                    echo "success";
                } else {
                    $datalog .= "<div class='error-txt  error'>Error 4013</div>";
                }
            } else {
                $datalog .= "<div class='error-txt  error'>La Contraseña es Incorrecta</div>";
            }
        } else {
            $datalog .= "<div class='error-txt  error'>El Email es Incorrecto</div>";
        }
    } else {
        $datalog .= "<div class='error-txt  error'>Fallo la coneccion</div>";
    }
} else {
    $datalog .= "<div class='error-txt  error'>El Email es Incorrecto</div>";
}
echo $datalog;
