<?php
$id_post = $_POST['id_post'];
$data = "";

if (!empty($id_post)) {
    $eso = require("conection.php");
    if ($eso) {
        $SELECT = "SELECT * FROM comentarios WHERE id_publicacion = $id_post";
        $resultado = mysqli_query($conn, $SELECT);
        if ($resultado) {
            $cant_of_coments = $resultado->num_rows;


            if ($cant_of_coments > 0) {
                $data .= '<b class="title-coment active-view-conment'.$id_post.'" onclick="ViewComents'.$id_post.'()">Ver '.$cant_of_coments.' comentarios</b>';
            }

            echo $data;
        } else {
            $data = "Ha ocurrido un error!";
            echo $data;
        }
    } else {
        $data = "la connecion fallo";
        echo $data;
    }
} else {
    $data = "debe llenar los datos";
    echo $data;
}
