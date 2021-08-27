<?php
session_start();
require('identification.php');

$id_registro = $registro['id_registro'];
$portada = $registro['portada'];
// echo $perfil;



$ruta= '../photo_portada/'.$_FILES['portada']['name'];
$ruta_send= 'photo_portada/'.$_FILES['portada']['name'];
move_uploaded_file($_FILES['portada']['tmp_name'],$ruta);
if($ruta_send =='photo_portada/'){
    $photo_portada = $portada;
    echo $photo_portada;
}
else{
    $photo_portada = $ruta_send;
    echo $photo_portada;
}

if(!empty($photo_portada)){
    $eso = require("conection.php");
    if($eso){
        $UPDATE = "UPDATE registro SET portada ='$photo_portada' Where id_registro='$id_registro'";
        $resultado = mysqli_query($conn,$UPDATE);
        if($resultado){
            // echo"todo correcto";
            header("Location: ../perfil");
        }
        else{
            echo"se fue a la verga";
        }
    }
    else{
    echo"fallo la coneccion";
    }
}
else{
    echo "todos los datos son OBLIGATORIOS";
    header("Location: ../perfil");
}


?>
