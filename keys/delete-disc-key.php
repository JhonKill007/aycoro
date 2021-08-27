<?php

$id_disc = $_GET['id_disc'];

if(!empty($id_disc)){
    $eso = require("conection.php");
    if($eso){
        $DELETE = "DELETE FROM event WHERE id_event = $id_disc";
        $resultado = mysqli_query($conn,$DELETE);
        if($resultado){
            // echo "retirado";
            header("Location: ../index");
            // $self = $_SERVER['PHP_SELF'];
            // header("refresh:0; url=$self");
            
        }
        else{
            echo "valio verga";
        }
    }
    else{
        echo "la connecion fallo";
    }
}
