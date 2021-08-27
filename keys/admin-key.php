<?php
$eso = require("conection.php");
    if($eso){

        $SELECT = "SELECT * FROM registro WHERE email = 'aycoroadmin@admin.com'";
        $resultado = mysqli_query($conn,$SELECT);
        if($resultado){
            // echo "query 2";
            // require("modulos/etiquetas.php");
            while($admin = $resultado->fetch_array()){
                $id_admin = $admin['id_registro'];
                

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