<?php

$id_post = $_POST['id_post'];

if(!empty($id_post)){
    $eso = require("conection.php");
    if($eso){
        $DELETE = "DELETE FROM post WHERE id_post = $id_post";
        $resultado = mysqli_query($conn,$DELETE);
        if($resultado){
            echo "success";
            
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
