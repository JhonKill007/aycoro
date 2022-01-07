<?php
$id_per = $_POST['id_per'];
$email_new = $_POST['email_new'];
$email_old = $_POST['email_old'];

$datachange = "";

if (!empty($id_per) && !empty($email_new) && !empty($email_old)) {
    $eso =  require('conection.php');
    if ($eso) {
        if ($email_new != $email_old) {
            if (filter_var($email_new, FILTER_VALIDATE_EMAIL)) {
                $SELECT = "SELECT * FROM registro WHERE email = '$email_new'";
                $resultado = mysqli_query($conn, $SELECT);
                $cant_user = $resultado->num_rows;
                if ($cant_user < 1) {
                    $UPDATE = "UPDATE registro SET email ='$email_new' Where id_registro='$id_per'";
                    $resultado = mysqli_query($conn, $UPDATE);
                    if ($resultado) {
                        $INSERT = "INSERT INTO edits (campo,new,old,id_user,date_edit)values('Email','$email_new','$email_old','$id_per',NOW())";
                        $resultado = mysqli_query($conn, $INSERT);
                        if ($resultado) {
                            echo "success";
                        }
                    }
                } else {
                    $datachange .= "<div class='error-txt  error'>Este Email no esta Disponible.</div>";
                    echo $datachange;
                }
            } else {
                $datachange .= "<div class='error-txt  error'>'" . $email_new . "' Este Email no es valido</div>";
                echo $datachange;
            }
        } else {
            echo "success";
        }
    } else {
        echo "fallo la coneccion";
    }
} else {
    $datachange .= "<div class='error-txt  error'>Ingresa el nuevo Email.</div>";
    echo $datachange;
}
