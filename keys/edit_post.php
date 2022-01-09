<?php

$stado = $_POST['stado_edit'];
$id_post = $_POST['id_post'];
$type_post = $_POST['type_post'];

$eso = require("conection.php");
$SELECT = "SELECT * FROM post where id_post = $id_post";
$resultado_post = mysqli_query($conn, $SELECT);
if($resultado_post){
    $result = $resultado_post->fetch_array();
    $old = $result['estado_post'];
}

if (!empty($id_post)) {
    if ($type_post == 1) {
        $funcion = update($stado, $id_post,$old);
        echo $funcion;
    }
    if ($type_post == 2 && !empty($stado)) {
        $funcion = update($stado, $id_post,$old);
        echo $funcion;
    }
}

function update($stado, $id_post,$old)
{
    $data = "";
    $eso = require("conection.php");
    if ($eso) {
        $UPDATE = "UPDATE post SET estado_post = '$stado' WHERE id_post = $id_post";
        $resultado = mysqli_query($conn, $UPDATE);
        if ($resultado) {
            $INSERT = "INSERT INTO edit_post (id_post,new,old,date_editPost)values('$id_post','$stado','$old',NOW())";
            $resultado = mysqli_query($conn, $INSERT);
            if ($resultado) {
                $data .= "success";
            }
        } else {
            $data .= "Ha ocurrido un error!";
        }
    } else {
        $data .= "la connecion fallo";
    }
    return $data;
}
