<?php

$id_post = $_POST['id_post'];
$deleted = "Deleted";

if(!empty($id_post)){
    $eso = require("conection.php");
    if($eso){
        $UPDATE = "UPDATE post SET status = '$deleted', date_post_deteted = NOW() WHERE id_post = $id_post";
        $resultado = mysqli_query($conn,$UPDATE);
        if($resultado){
            echo "success";
            
        }
        else{
            echo "Ha ocurrido un error!";
        }
    }
    else{
        echo "la connecion fallo";
    }
}

?>
