<?php
session_start();
require('identification.php');

$id_registro = $registro['id_registro'];


$nombre_edit = $_POST['nombre_edit'];
$apellido_edit = $_POST['apellido_edit'];
$presentacion_edit = $_POST['presentacion_edit'];
$nom_comp = $nombre_edit . ' ' . $apellido_edit;






if (!empty($nombre_edit) && !empty($presentacion_edit)) {
    $eso = require("conection.php");
    if ($eso) {
        $UPDATE = "UPDATE registro SET nombre='$nombre_edit', apellido='$apellido_edit', nom_comp='$nom_comp', presentacion='$presentacion_edit'Where id_registro='$id_registro'";
        $resultado = mysqli_query($conn, $UPDATE);
        if ($resultado) {
            // echo"todo correcto";
            header("Location: ../perfil");
        } else {
            echo "Ha ocurrido un error!";
        }
    } else {
        echo "fallo la coneccion";
    }
} else {
    echo "todos los datos son OBLIGATORIOS";
    header("Location: ../perfil");
}
