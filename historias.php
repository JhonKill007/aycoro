<?php
$tittlePage = "Aycoro - Historias";
require("fund/head.php");
require("modulos/nav.php");
require("modulos/nav-two.php");
require("modulos/photo_edit.php");
require("modulos/status-post.php");


$publicaciones = array(0);
$personas = array(0);
$id_registro = $registro['id_registro'];

?>



<body>
    <script>
        identity_page_post = 3;
    </script>

    <div class="conteiner">
        <div class="search-perfiles">
            <h1>Historias</h1>
            <div class="display-event">
                <?php
                $eso = require("keys/conection.php");
                if ($eso) {

                    $SELECT = "SELECT * FROM history 
                    inner join registro on history.id_owner=registro.id_registro 
                    WHERE date >= NOW() - INTERVAL 1 DAY AND history.id_owner = $id_registro ORDER BY history.id_history DESC";

                    $resultado = mysqli_query($conn, $SELECT);
                    $cant_historys_ = $resultado->num_rows;
                    if ($resultado) {
                        if ($cant_historys_ != 0) {
                            if ($usu = $resultado->fetch_array()) {
                                $id_usu = $usu['id_registro'];
                                $nombre_usu = $usu['nombre'];
                                $apellido_usu = $usu['apellido'];
                                $photo = $usu['photo'];
                                $perfil = $usu['foto'];
                                $id_history = $usu['id_history'];
                                $init = 1;


                ?>

                                <!-- <a href="dm-discusion?usu=<?php echo $id_usu; ?>"> -->
                                <div class="info-busque-event-circle border-no-view">
                                    <a href="view-historias?history=<?php echo $init; ?>&position=<?php echo $init; ?>&identity=1">
                                        <img src=<?php echo $perfil; ?> alt="">
                                        <div>
                                            <h5 class="nombredisc">Tu historia</h5>
                                        </div>
                                    </a>
                                </div>
                            <?php
                            }
                        } else {
                            ?>

                            <label for="inputHistoryPage" title="Publicar Historia">
                                <input type="file" class="sr-only" id="inputHistoryPage" name="file" accept="image/*">
                                <div class="info-busque-event-circle">
                                    <img src=<?php echo $foto; ?> alt="">
                                    <div class="icon_history-none">
                                        <i class="fas fa-plus"></i>
                                    </div>
                                    <div>
                                        <h5 class="nombredisc">Tu historia</h5>
                                    </div>
                                </div>
                            </label>

                            <?php

                        }
                    }
                }
                if ($eso) {

                    $SELECT = "SELECT * FROM history 
                    WHERE date >= NOW() - INTERVAL 1 DAY 
                    AND id_owner != $id_registro  ORDER BY id_history Desc";

                    $resultado = mysqli_query($conn, $SELECT);
                    if ($resultado) {
                        while ($usu = $resultado->fetch_array()) {
                            $id_usu = $usu['id_owner'];
                            array_push($publicaciones, $id_usu);
                        }
                        $filtrados =  (array_unique($publicaciones));
                        foreach ($filtrados as $item) {
                            if ($item != 0) {
                                array_push($personas, $item);
                            }
                        }
                        $posiciones = count($personas);
                        for ($i = 0; $i < $posiciones; $i++) {
                            $items = $personas[$i];
                            if ($items != 0) {
                                if ($eso) {

                                    $SELECT = "SELECT * FROM history 
                                    inner join registro on history.id_owner=registro.id_registro 
                                    where history.id_owner = $items ORDER BY history.id_history DESC";

                                    $resultado = mysqli_query($conn, $SELECT);
                                    if ($resultado) {
                                        if ($usu = $resultado->fetch_array()) {
                                            $id_usu = $usu['id_registro'];
                                            $nombre_usu = $usu['nombre'];
                                            $apellido_usu = $usu['apellido'];
                                            $photo = $usu['photo'];
                                            $id_history = $usu['id_history'];
                                            $init;

                                            $SELECT = "SELECT * FROM view_historys 
                                            WHERE id_history = $id_history 
                                            AND id_viewer = $id_registro";

                                            $resultado = mysqli_query($conn, $SELECT);
                                            $wacht_already = $resultado->num_rows;
                                            if ($wacht_already == 0) {
                                                $array_cant_history = array(0);
                                                $contador_history = 1;

                                                $SELECT = "SELECT * FROM history 
                                                WHERE date >= NOW() - INTERVAL 1 DAY 
                                                AND id_owner = $id_usu";

                                                $resultado = mysqli_query($conn, $SELECT);
                                                $cant_history_user = $resultado->num_rows;
                                                // echo $cant_history_user;

                                                while($h_history = $resultado->fetch_array()){
                                                    array_push($array_cant_history, $contador_history);
                                                    $contador_history++;
                                                }
                                                $reversed = array_reverse($array_cant_history);


                                                $SELECT = "SELECT * FROM view_historys 
                                                WHERE date_view >= NOW() - INTERVAL 1 DAY 
                                                AND id_owner = $id_usu  
                                                AND id_viewer = $id_registro";

                                                $resultado = mysqli_query($conn, $SELECT);
                                                $cant_history_watch = $resultado->num_rows;
                                                // echo $cant_history_watch;
                                                if($cant_history_watch == 0 || $cant_history_user == $cant_history_watch){
                                                    $init = 1;
                                                }
                                                else{
                                                    $resta_h = $cant_history_user - $cant_history_watch;
                                                    $init = $reversed[$resta_h-1];
                                                }

                            ?>

                                                <!-- <a href="dm-discusion?usu=<?php echo $id_usu; ?>"> -->

                                                <div class="info-busque-event border-no-view">
                                                    <a href="view-historias?history=<?php echo $init; ?>&position=<?php echo $i; ?>&identity=0">
                                                        <img src=<?php echo $photo; ?> alt="">

                                                        <div>
                                                            <?php
                                                            if ($id_usu == $registro['id_registro']) {
                                                            ?>
                                                                <a href="perfil">
                                                                    <h5 class="nombredisc nom_history"><?php echo $nombre_usu . " " . $apellido_usu; ?></h5>
                                                                </a>
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <a href="perfil-reciver?usu=<?php echo $id_usu; ?>">
                                                                    <h5 class="nombredisc nom_history"><?php echo $nombre_usu . " " . $apellido_usu; ?></h5>
                                                                </a>
                                                            <?php
                                                            }
                                                            ?>
                                                        </div>
                                                    </a>
                                                </div>
                                            <?php
                                            }
                                        }
                                    }
                                }
                            }
                        }

                        for ($i = 0; $i < $posiciones; $i++) {
                            $items = $personas[$i];
                            if ($items != 0) {
                                if ($eso) {

                                    $SELECT = "SELECT * FROM history 
                                    inner join registro on history.id_owner=registro.id_registro 
                                    where history.id_owner = $items ORDER BY history.id_history DESC";

                                    $resultado = mysqli_query($conn, $SELECT);
                                    if ($resultado) {
                                        if ($usu = $resultado->fetch_array()) {
                                            $id_usu = $usu['id_registro'];
                                            $nombre_usu = $usu['nombre'];
                                            $apellido_usu = $usu['apellido'];
                                            $photo = $usu['photo'];
                                            $id_history = $usu['id_history'];
                                            $init = 1;

                                            $SELECT = "SELECT * FROM view_historys 
                                            WHERE id_history = $id_history 
                                            AND id_viewer = $id_registro";

                                            $resultado = mysqli_query($conn, $SELECT);
                                            $wacht_already = $resultado->num_rows;
                                            if ($wacht_already == 1) {

                                            ?>

                                                <!-- <a href="dm-discusion?usu=<?php echo $id_usu; ?>"> -->
                                                <div class="info-busque-event">
                                                    <a href="view-historias?history=<?php echo $init; ?>&position=<?php echo $i; ?>&identity=0">
                                                        <img src=<?php echo $photo; ?> alt="">

                                                        <div>
                                                            <?php
                                                            if ($id_usu == $registro['id_registro']) {
                                                            ?>
                                                                <a href="perfil">
                                                                    <h5 class="nombredisc nom_history"><?php echo $nombre_usu . " " . $apellido_usu; ?></h5>
                                                                </a>
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <a href="perfil-reciver?usu=<?php echo $id_usu; ?>">
                                                                    <h5 class="nombredisc nom_history"><?php echo $nombre_usu . " " . $apellido_usu; ?></h5>
                                                                </a>
                                                            <?php
                                                            }
                                                            ?>
                                                        </div>
                                                    </a>
                                                </div>
                <?php
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                    if ($resultado = 0) {
                        echo "No se han encontrado resultados para tu búsqueda";
                    }
                } else {
                    echo "la coneccion fallo";
                }
                ?>



            </div>
        </div>
    </div>



    <?php
    require("fund/script.php");
    ?>
</body>

</html>