<?php
$datasign = "";
require("metadate/singupDate.php");




if (!empty($nombre) && !empty($numero) && !empty($email) && !empty($password) && !empty($passconf) && !empty($day) && !empty($month) && !empty($year) && !empty($genero)) {
    if ($edad > 10) {
        $eso =  require('conection.php');
        if ($eso) {
            $cadena = explode(" ", $usuario);
            $tamaño = count($cadena);
            $espacios = $tamaño - 1;
            if ($espacios < 1) {
                $userConprover = comprobar_nombre_usuario($usuario);
                if ($userConprover) {
                    $SELECT = "SELECT * FROM registro WHERE usuario = '$usuario'";
                    $resultado = mysqli_query($conn, $SELECT);
                    if ($resultado->num_rows == 0) {
                        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                            $SELECT = "SELECT * FROM registro WHERE email = '$email'";
                            $resultado = mysqli_query($conn, $SELECT);
                            if ($resultado->num_rows == 0) {
                                if ($password == $passconf) {
                                    $INSERT = "INSERT INTO registro (nombre,numero,usuario,email,password,birthday,genero,foto,portada,presentacion,status,date_signup)values('$nombre','$numero','$usuario','$email','$script_password','$birthday','$genero','$foto','$portada','$presentacion','$status',NOW())";
                                    $resultado = mysqli_query($conn, $INSERT);
                                    if ($resultado) {
                                        $SELECT = "SELECT * FROM registro WHERE email = '$email'";
                                        $resultadoh = mysqli_query($conn, $SELECT);
                                        if ($resultadoh) {
                                            while ($sign = $resultadoh->fetch_array()) {
                                                $id = $sign['id_registro'];
                                                if (1 == 1) {
                                                    $INSERTsign = "INSERT INTO folow (id_folowing,id_folower,date_follow)values('$id','$id',NOW())";
                                                    $resultadosign = mysqli_query($conn, $INSERTsign);
                                                    if ($resultadosign) {
                                                        setcookie("IgtX9000", $id, time() + 2592000, "/");
                                                        session_start();
                                                        $_SESSION['id'] = $id;
                                                        echo "success";
                                                    }
                                                }
                                            }
                                        } else {
                                            $datasign .= "<div class='error-txt  error'>NO HAY REGISTRO</div>";
                                        }
                                    } else {
                                        $datasign .= "<div class='error-txt  error'>NO SE GUARDO EL REGISTRO</div>";
                                    }
                                } else {
                                    $datasign .= "<div class='error-txt  error'>Las contraseñas no coinsiden</div>";
                                }
                            } else {
                                $datasign .= "<div class='error-txt  error'>El Email usado ya esta Registrado</div>";
                            }
                        } else {
                            $datasign .= "<div class='error-txt  error'>'" . $email . "' Este Email no es valido</div>";
                        }
                    } else {
                        $datasign .= "<div class='error-txt  error'>Usuario no disponible</div>";
                    }
                }
            } else {
                $datasign .= "<div class='error-txt  error'>No se aceptan espacios en el usuario.</div>";
            }
        } else {
            $datasign .= "<div class='error-txt  error'>Fallo la coneccion</div>";
        }
    } else {
        $datasign .= "<div class='error-txt  error'>Debes tener una edad mayor a 10 Años</div>";
    }
}
echo $datasign;


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
