<?php
$tittlePage = "Aycoro - Historias";
require("fund/head.php");
require("modulos/session.php");
$publicaciones = array(0);
$personas = array(0);
?>



<body>
    <div id="contenedo_carca" class="charger">
        <div id="carga"></div>
    </div>
    <div class="body_center">
        <?php
        require("modulos/nav.php");
        require("modulos/nav-two.php");
        require("modulos/status-post.php");
        $id_registro = $registro['id_registro'];
        ?>
        <script>
            identity_page_post = 3;
            $(document).ready(function() {

                var $modal = $('#modal');
                var container = document.querySelector('.img-container');
                var butoninput = document.querySelector('.image');
                var image = container.getElementsByTagName('img').item(0);
                var historyPage = document.getElementById('HistoryPage');

                var cropper;

                historyPage.onchange = function() {
                    console.log(option);
                    var files = event.target.files;

                    var done = function(url) {
                        image.src = url;
                        $modal.modal('show');
                        console.log("mostrar")
                    };

                    if (files && files.length > 0) {
                        reader = new FileReader();
                        reader.onload = function(event) {
                            done(reader.result);
                        };
                        reader.readAsDataURL(files[0]);
                    }
                }

                $modal.on('shown.bs.modal', function() {
                    if (option == 1 || option == 4) {
                        cropper = new Cropper(image, {
                            aspectRatio: 1,
                            viewMode: 3,
                            preview: '.preview'
                        });
                    } else if (option == 2) {
                        cropper = new Cropper(image, {
                            aspectRatio: 3 / 5,
                            viewMode: 3,
                            preview: '.preview'
                        });
                    } else if (option == 5) {
                        cropper = new Cropper(image, {
                            aspectRatio: 19 / 6,
                            viewMode: 3,
                            preview: '.preview'
                        });
                    }
                }).on('hidden.bs.modal', function() {
                    cropper.destroy();
                    cropper = null;
                    historyPage.value = null;

                });
                $('#crop').click(function() {
                    if (option == 1 || option == 4) {
                        canvas = cropper.getCroppedCanvas({
                            width: 750,
                            height: 750
                        });
                    } else if (option == 2) {
                        canvas = cropper.getCroppedCanvas({
                            width: 647,
                            height: 1080
                        });
                    } else if (option == 5) {
                        canvas = cropper.getCroppedCanvas({
                            width: 1440,
                            height: 454
                        });
                        console.log(canvas)
                    }

                    canvas.toBlob(function(blob) {
                        url = URL.createObjectURL(blob);
                        var reader = new FileReader();
                        reader.readAsDataURL(blob);
                        reader.onloadend = function() {
                            var base64data = reader.result;
                            document.getElementById("base64_post").value = base64data;
                            document.getElementById("option_view_opt").value = option;
                            const timezone = Intl.DateTimeFormat().resolvedOptions().timeZone;
                            document.getElementById("time_view_opt").value = timezone;
                            debugger
                            send_form();
                            $modal.modal('show');
                        };
                    });
                });

            });
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

                                <label for="HistoryPage" title="Publicar Historia" onclick="history()">
                                    <input type="file" class="sr-only" id="HistoryPage" name="file" accept="image/*">
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

                                                    while ($h_history = $resultado->fetch_array()) {
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
                                                    if ($cant_history_watch == 0 || $cant_history_user == $cant_history_watch) {
                                                        $init = 1;
                                                    } else {
                                                        $resta_h = $cant_history_user - $cant_history_watch;
                                                        $init = $reversed[$resta_h - 1];
                                                    }

                                ?>



                                                    <div class="info-busque-event border-no-view">
                                                        <a href="view-historias?history=<?php echo $init; ?>&position=<?php echo $i; ?>&identity=0">
                                                            <img src=<?php echo $photo; ?> alt="">

                                                            <div>
                                                                <?php
                                                                if ($id_usu == $registro['id_registro']) {
                                                                ?>
                                                                    <a href="perfil">
                                                                        <h5 class="nombredisc nom_history"><?php echo $nombre_usu; ?></h5>
                                                                    </a>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <a href="user?user=<?php echo $id_usu; ?>">
                                                                        <h5 class="nombredisc nom_history"><?php echo $nombre_usu; ?></h5>
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
                                                                        <h5 class="nombredisc nom_history"><?php echo $nombre_usu; ?></h5>
                                                                    </a>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <a href="user?user=<?php echo $id_usu; ?>">
                                                                        <h5 class="nombredisc nom_history"><?php echo $nombre_usu; ?></h5>
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
    </div>
</body>

</html>