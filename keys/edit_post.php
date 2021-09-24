<?php

$stado = $_POST['stado_edit'];
$id_post = $_POST['id_post'];

if(!empty($id_post)){
    $eso = require("conection.php");
    if($eso){
        $UPDATE = "UPDATE post SET estado_post = '$stado' WHERE id_post = $id_post";
        $resultado = mysqli_query($conn,$UPDATE);
        if($resultado){
            echo "success";
            // echo $id_post;
         
        }
        else{
            echo "valio verga";
        }
    }
    else{
        echo "la connecion fallo";
    }
}
?>
