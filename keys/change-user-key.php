<?php
$id_per = $_POST['id_per'];
$usario_new = $_POST['usario_new'];
$usario_old = $_POST['usario_old'];

$datachange = "";

if (!empty($id_per) && !empty($usario_new)) {
    $eso =  require('conection.php');
    if ($usario_new != $usario_old) {
        if ($eso) {
            $cadena = explode(" ", $usario_new);
            $tamaño = count($cadena);
            $espacios = $tamaño - 1;
            if ($espacios < 1) {
                $userConprover = comprobar_nombre_usuario($usario_new);
                if ($userConprover) {
                    $SELECT = "SELECT * FROM registro WHERE usuario = '$usario_new'";
                    $resultado = mysqli_query($conn, $SELECT);
                    $cant_user = $resultado->num_rows;
                    if ($cant_user < 1) {
                        $UPDATE = "UPDATE registro SET usuario ='$usario_new' Where id_registro='$id_per'";
                        $resultado = mysqli_query($conn, $UPDATE);
                        if ($resultado) {
                            $INSERT = "INSERT INTO edits (campo,new,old,id_user,date_edit)values('User','$usario_new','$usario_old','$id_per',NOW())";
                            $resultado = mysqli_query($conn, $INSERT);
                            if ($resultado) {
                                echo "success";
                            }
                        }
                    } else {
                        $datachange .= "<div class='error-txt  error'>Este usuario no esta Disponible.</div>";
                        echo $datachange;
                    }
                }
            } else {
                $datachange .= "<div class='error-txt  error'>No se aceptan espacios.</div>";
                echo $datachange;
            }
        } else {
            echo "fallo la coneccion";
        }
    } else {
        echo "success";
    }
} else {
    $datachange .= "<div class='error-txt  error'>Ingresa el nuevo Usuario.</div>";
    echo $datachange;
}



function comprobar_nombre_usuario($nombre_usuario)
{
    //compruebo que el tamaño del string sea válido.
    if (strlen($nombre_usuario) < 4) {
        echo "<div class='error-txt  error'>Un Usuario debe tener minimo 4 caracteres.</div>";
        return false;
    }
    if (strlen($nombre_usuario) > 20) {
        echo "<div class='error-txt  error'>Un Usuario debe tener maximo 20 caracteres.</div>";
        return false;
    }

    //compruebo que los caracteres sean los permitidos
    $permitidos = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789_";
    for ($i = 0; $i < strlen($nombre_usuario); $i++) {
        if (strpos($permitidos, substr($nombre_usuario, $i, 1)) === false) {
            echo "<div class='error-txt  error'>'" . $nombre_usuario . "' No es un usuario valido.</div>";
            return false;
        }
    }
    return true;
}
