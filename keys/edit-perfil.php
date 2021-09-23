<?php
session_start();
require('identification.php');

$id_registro = $registro['id_registro'];
$perfil = $_POST['actualfoto'];
// echo $perfil;


$nombre_edit = $_POST['nombre_edit'];
$apellido_edit = $_POST['apellido_edit'];
$presentacion_edit = $_POST['presentacion_edit'];
$nom_comp = $nombre_edit . ' ' . $apellido_edit;


$str_perfil = "1fgf-perfil";

$filename = $_FILES['perfil']['name'];
$new_name = $id_registro . '-' . $str_perfil;


$xplode = explode('.', $filename);
$extencion = array_pop($xplode);
$apply_name = $new_name . '.' . $extencion;

$ruta = '../photo_perfil/' . $apply_name;
$ruta_send = 'photo_perfil/' . $apply_name;
move_uploaded_file($_FILES['perfil']['tmp_name'], $ruta);
require("formate_img.php");



if ($ruta_send == 'photo_perfil/'.$id_registro.'-1fgf-perfil.') {
    $photo_perfil = $perfil;
    echo $photo_perfil;
} else {
    $photo_perfil = $ruta_send;
    echo $photo_perfil;
}






if (!empty($nombre_edit) && !empty($presentacion_edit)) {
    $eso = require("conection.php");
    if ($eso) {
        $UPDATE = "UPDATE registro SET foto='$photo_perfil', nombre='$nombre_edit', apellido='$apellido_edit', nom_comp='$nom_comp', presentacion='$presentacion_edit'Where id_registro='$id_registro'";
        $resultado = mysqli_query($conn, $UPDATE);
        if ($resultado) {
            // echo"todo correcto";
            header("Location: ../perfil");
        } else {
            echo "se fue a la verga";
        }
    } else {
        echo "fallo la coneccion";
    }
} else {
    echo "todos los datos son OBLIGATORIOS";
    header("Location: ../perfil");
}
