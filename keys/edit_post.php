<?php

$stado = $_POST['stado_edit'];
$id_post = $_POST['id_post'];
$type_post = $_POST['type_post'];

if (!empty($id_post)) {
    if ($type_post == 1) {
        $funcion = update($stado, $id_post);
        echo $funcion;
    }
    if ($type_post == 2 && !empty($stado)) {
        $funcion = update($stado, $id_post);
        echo $funcion;
    }
}

function update($stado, $id_post)
{
    $data = "";
    $eso = require("conection.php");
    if ($eso) {
        $UPDATE = "UPDATE post SET estado_post = '$stado' WHERE id_post = $id_post";
        $resultado = mysqli_query($conn, $UPDATE);
        if ($resultado) {
            $data .= "success";
        } else {
            $data .= "Ha ocurrido un error!";
        }
    } else {
        $data .= "la connecion fallo";
    }
    return $data;
}
