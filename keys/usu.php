<?php
$eso = require("keys/conection.php");
    if($eso){

        $SELECT = "SELECT * FROM registro WHERE usuario = '$usuario_usu'";
        $resultado = mysqli_query($conn,$SELECT);
        $n_usu = $resultado->num_rows;
        if($resultado){
            while($usu = $resultado->fetch_array()){
                $id_usu = $usu['id_registro'];
                $nombre_usu = $usu['nombre'];
                $usuario_sus = $usu['usuario'];
                $presentacion_sus = $usu['presentacion'];
                $foto_sus = $usu['foto'];
                $portada_sus = $usu['portada'];
                $status_usu = $usu['status'];

            }
        }
        if($n_usu < 1){
            header("Location: index");
        }
    }
    else{
        echo"la coneccion fallo";
    }

?>