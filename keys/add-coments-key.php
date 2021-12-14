<?php
$id_post = $_POST['id_post'];
$id_coment_owner = $_POST['liker'];
$coment_value = $_POST['coment_value'];
$data = "";

if (!empty($id_post) || !empty($id_coment_owner) || !empty($coment_value)) {
    $eso = require("conection.php");
    if($coment_value != ""){
        if ($eso) {
            $INSERT = "INSERT INTO comentarios (id_coment_owner,id_publicacion,comentario,coment_date)values('$id_coment_owner','$id_post','$coment_value',NOW())";
            $resultado = mysqli_query($conn, $INSERT);
            if ($resultado) {
                $data = "successfull";
                echo $data;
            } else {
                $data = "Ha ocurrido un error!";
                echo $data;
            }
        } else {
            $data = "la connecion fallo";
            echo $data;
        }
    }
}
