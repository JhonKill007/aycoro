<?php
session_start();
require('identification.php');

$id_registro = $registro['id_registro'];

$option = $_POST['option'];
if ($option == 1) {
    $nombre_edit = $_POST['name_new'];
    $name_old = $registro['nombre'];
    if (!empty($nombre_edit)) {
        $eso = require("conection.php");
        if ($eso) {
            if ($name_old != $nombre_edit) {
                $UPDATE = "UPDATE registro SET nombre='$nombre_edit' Where id_registro='$id_registro'";
                $resultado = mysqli_query($conn, $UPDATE);
                if ($resultado) {
                    $INSERT = "INSERT INTO edits (campo,new,old,id_user,date_edit)values('Name','$nombre_edit','$name_old','$id_registro',NOW())";
                    $resultado = mysqli_query($conn, $INSERT);
                    if ($resultado) {
                        header("Location: ../perfil");
                    }
                } else {
                    echo "Ha ocurrido un error!";
                }
            } else {
                header("Location: ../perfil");
            }
        } else {
            echo "fallo la coneccion";
        }
    } else {
        echo "todos los datos son OBLIGATORIOS";
        header("Location: ../perfil");
    }
} else {
    $presentacion_edit = $_POST['present_new'];
    $present_old = $registro['presentacion'];
    if (!empty($presentacion_edit)) {
        $eso = require("conection.php");
        if ($eso) {
            if ($present_old != $presentacion_edit) {
                $UPDATE = "UPDATE registro SET presentacion='$presentacion_edit' Where id_registro='$id_registro'";
                $resultado = mysqli_query($conn, $UPDATE);
                if ($resultado) {
                    $INSERT = "INSERT INTO edits (campo,new,old,id_user,date_edit)values('Presentacion','$presentacion_edit','$present_old','$id_registro',NOW())";
                    $resultado = mysqli_query($conn, $INSERT);
                    if ($resultado) {
                        header("Location: ../perfil");
                    }
                } else {
                    echo "Ha ocurrido un error!";
                }
            } else {
                // header("Location: ../perfil");
                echo "entro en el fitro de igualdad";
            }
        } else {
            echo "fallo la coneccion";
        }
    } else {
        echo "todos los datos son OBLIGATORIOS";
        // header("Location: ../perfil");
    }
}
