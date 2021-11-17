<?php
$eso = require("keys/conection.php");
    if($eso){

        $SELECT = "SELECT * FROM registro WHERE id_registro = $id_sus";
        $resultado = mysqli_query($conn,$SELECT);
        if($resultado){
            // echo "query 2";
            // require("modulos/etiquetas.php");
            while($usu = $resultado->fetch_array()){
                $id_usu = $usu['id_registro'];
                $nombre_usu = $usu['nombre'];
                $apellido_sus = $usu['apellido'];
                $presentacion_sus = $usu['presentacion'];
                $foto_sus = $usu['foto'];
                $portada_sus = $usu['portada'];
                $status_usu = $usu['status'];

            }
        }
        if($resultado = 0){
            echo "No se han encontrado resultados para tu búsqueda";
        }
    }
    else{
        echo"la coneccion fallo";
    }

?>