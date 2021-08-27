<?php
    $eso = require("keys/conection.php");
    if($eso){
        // $SELECT = "SELECT * FROM articulos inner join carrito on articulos.id_articulos=carrito.id_articulo where carrito.id_registro_shoper='$row[id]'";

        $SELECT = "SELECT * FROM registro inner join folow on registro.id_registro=folow.id_folowing WHERE folow.id_folower='$id_regitro'";
        $resultado = mysqli_query($conn,$SELECT);
        if($resultado){
            // echo "query 2";
            // require("modulos/etiquetas.php");
            while($folo = $resultado->fetch_array()){
                $id_folo = $folo['id_folowing'];
                $foto_folo = $folo['foto'];
                $nombre_folo = $folo['nombre'];
                $apellido_folo = $folo['apellido'];
            ?>
                
                <a href="perfil-reciver.php?folo=<?php echo $id_usu;?>">
                    <div class="info-busque">
                        <div class="search-perfil-box">
                            <img src=<?php echo $foto_folo; ?> alt="">
                        </div>
                        <h5><?php echo $nombre_folo."".$apellido_folo; ?></h5>
                    </div>
                </a>
                <?php
            }
        }
        if($resultado = 0){
            echo "Aun no tinen Seguidores";
        }
        
    }
    else{
        echo "fallo la coneccion";
    }

?>