<?php
$datasign = "";
require("metadate/singupDate.php");




if (!empty($nombre) && !empty($apellido) && !empty($numero) && !empty($email) && !empty($password) && !empty($passconf) && !empty($day) && !empty($month) && !empty($year) && !empty($genero)) {
    if ($edad > 10) {
        $eso =  require('conection.php');
        if ($eso) {
            $SELECT = "SELECT * FROM registro WHERE email = '$email'";
            $resultado = mysqli_query($conn, $SELECT);
            if ($resultado->num_rows == 0) {
                if ($password == $passconf) {
                    $INSERT = "INSERT INTO registro (nombre,apellido,nom_comp,numero,email,password,birthday,genero,foto,portada,presentacion,status,date_signup)values('$nombre','$apellido','$nom_comp','$numero','$email','$script_password','$birthday','$genero','$foto','$portada','$presentacion','$status',NOW())";
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
            $datasign .= "<div class='error-txt  error'>Fallo la coneccion</div>";
        }
    }
    else {
        $datasign .= "<div class='error-txt  error'>Debes tener una edad mayor a 10 Años</div>";
    }
} 
echo $datasign;
