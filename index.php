<?php
$tittlePage = "Aycoro";
require("fund/head.php");
require("modulos/session.php");
$publicaciones = array(0);
$personas = array(0);
?>

<?php
$identity_page_post = 1;
?>
<style>
    @media (max-width: 1120px) {
        .conteiner {
            width: 100%;
        }
    }
</style>

<body>
    <div id="contenedo_carca" class="charger">
        <div id="carga"></div>
    </div>
    <div class="body_center">
        <?php
        require("modulos/nav.php");
        require("modulos/nav-two.php");
        ?>
        <script>
            identity_page_post = 1;
            $(document).ready(function() {

                var $modal = $('#modal');
                var container = document.querySelector('.img-container');
                var butoninput = document.querySelector('.image');
                var image = container.getElementsByTagName('img').item(0);
                var inputpost = document.getElementById('inputpost');
                var inputhistory = document.getElementById('inputhistory');
                var inputpost_nav = document.getElementById('inputpost_nav');
                var inputhistory_nav = document.getElementById('inputhistory_nav');
                var inputhistoryCircle = document.getElementById('HistoryCircle');

                var cropper;

                inputpost.onchange = function() {
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

                inputhistory.onchange = function() {
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

                inputhistoryCircle.onchange = function() {
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
                    inputpost.value = null;
                    inputhistory.value = null;

                });

            });
        </script>

        <div class="box-up-one">
            <div class="plus-post-btn">
                <div class="plus-post-box">
                    <div class="btn-box-post">
                        <div class="post-btn-container">
                            <!-- <label class="post-btn-container btn-upload postcheck1" for="inputImage1" title="Publicar Foto"> -->
                            <label class="post-btn-container btn-upload postcheck1" for="inputpost" onclick="post()" title="Publicar Foto">
                                <!-- <input type="file" class="sr-only" id="inputImage1" name="file" accept="image/*"> -->
                                <input type="file" name="image" class="image_post" id="inputpost" style="display:none" accept="image/*" />
                                <i class="fas fa-plus"></i>

                            </label>
                        </div>
                    </div>
                    <div class="btn-box-post event-post">
                        <div class="post-btn-container">
                            <label class="post-btn-container btn-upload historycheck1" for="inputhistory" onclick="history()" title="Publicar Historia">
                                <!-- <input type="file" class="sr-only" id="inputImagehistory1" name="file" accept="image/*"> -->
                                <input type="file" name="image" class="image_post" id="inputhistory" data-option="2" style="display:none" accept="image/*" />

                                <i class="fas fa-clock"></i>
                            </label>
                        </div>
                    </div>
                    <div class="btn-box-post post-write1">
                        <div class="post-btn-container">
                            <i class="fas fa-pen"></i>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            require("modulos/status-post.php");
            require("modulos/footer.php");
            ?>
        </div>

        <div class="conteiner">
            <div class="conteiner_historys">
                <div class="mas_boton_left">
                    <div class="div_boton back_buton_history"><i class="fas fa-chevron-left"></i></div>
                </div>
                <div class="conteiner_box_history" id="caja_de_historias">
                    <?php
                    $eso = require("keys/conection.php");
                    if ($eso) {

                        $SELECT = "SELECT * FROM history 
                    inner join registro on history.id_owner=registro.id_registro 
                    WHERE date >= NOW() - INTERVAL 1 DAY AND history.id_owner = $id_registro 
                    ORDER BY history.id_history DESC";

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

                                    <div class="box_person_history">
                                        <a href="view-historias?history=<?php echo $init; ?>&position=<?php echo $init; ?>&identity=1">
                                            <div class="box_img_history noSeen">
                                                <img src=<?php echo $perfil; ?> alt="">
                                            </div>
                                            <div class="div_name_history">
                                                <b>Tu historia</b>
                                            </div>
                                        </a>
                                    </div>
                                <?php
                                }
                            } else {
                                ?>

                                <label for="HistoryCircle" title="Publicar Historia" onclick="history()">
                                    <input type="file" class="sr-only" id="HistoryCircle" name="file" accept="image/*">
                                    <div class="box_person_history">
                                        <div class="box_img_history Seen">
                                            <img src=<?php echo $foto; ?> alt="">
                                            <div class="icon_history-none">
                                                <i class="fas fa-plus"></i>
                                            </div>
                                        </div>
                                        <div class="div_name_history">
                                            <b>Tu historia</b>
                                        </div>
                                    </div>
                                </label>



                                <?php

                            }
                        }
                    }
                    if ($eso) {

                        $SELECT = "SELECT * from folow 
                        inner join history on folow.id_folowing = history.id_owner 
                        inner join registro on history.id_owner=registro.id_registro 
                        WHERE date >= NOW() - INTERVAL 1 DAY 
                        AND folow.id_folower='$id_registro' 
                        AND history.id_owner != $id_registro 
                        ORDER BY history.id_history DESC";

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
                                                $usuario_usu = $usu['usuario'];
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

                                                    <div class="box_person_history">
                                                        <a href="view-historias?history=<?php echo $init; ?>&position=<?php echo $i; ?>&identity=0">

                                                            <div class="box_img_history noSeen">
                                                                <img src=<?php echo $photo; ?> alt="">
                                                            </div>
                                                            <div class="div_name_history">
                                                                <b><?php echo $usuario_usu; ?></b>
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
                                                $usuario_usu = $usu['usuario'];
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
                                                    <div class="box_person_history">
                                                        <a href="view-historias?history=<?php echo $init; ?>&position=<?php echo $i; ?>&identity=0">

                                                            <div class="box_img_history">
                                                                <img src=<?php echo $photo; ?> alt="">
                                                            </div>
                                                            <div class="div_name_history">
                                                                <b><?php echo $usuario_usu; ?></b>
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
                <div class="mas_boton_right">
                    <div class="div_boton come_buton_history"><i class="fas fa-chevron-right"></i></div>
                </div>
            </div>
        </div>


        <?php
        require("models/index_post_model.php");
        ?>
        <div class="conteiner_index">
            <?php
            require("modulos/post-view.php");
            ?>
        </div>
        <?php
        if (isset($_GET['acces'])) {
            $acces = $_GET['acces'];
            if ($acces == 'Admin007') {
        ?>
                <script>
                    console.log('<?php echo $acces; ?>');
                </script>
                <?php
                // activar post
                if ($eso) {
                    $SELECT = "SELECT * FROM post ORDER BY id_post DESC";
                    $resultado = mysqli_query($conn, $SELECT);
                    $pst = $resultado->fetch_array();
                    $cant_post = $pst["id_post"] + 1;
                    for ($i = 0; $i < $cant_post; $i++) {
                        $UPDATE = "UPDATE post SET status = 'Active' WHERE id_post = $i";
                        $resultado = mysqli_query($conn, $UPDATE);
                        if ($resultado) {
                ?>
                            <script>
                                console.log('<?php echo "success" . $i . " "; ?>')
                            </script>
                        <?php
                        } else {
                        ?>
                            <script>
                                console.log('<?php echo "Ha ocurrido un error!" . $i . " "; ?>')
                            </script>
                            <?php
                        }
                    }
                } else {
                    echo "la connecion fallo";
                }


                // introducir usuarios
                if ($eso) {
                    $SELECT13 = "SELECT * FROM registro";
                    $resultado13 = mysqli_query($conn, $SELECT13);
                    while ($reg = $resultado13->fetch_array()) {
                        $id_reg = $reg["id_registro"];
                        $email_reg = $reg["email"];
                        $usuario10 = substr($email_reg, 0, strpos($email_reg, '@'));
                        if ($usuario10) {
                            // $INSERT13 = "INSERT INTO registro (usuario)values('$usuario10') WHERE email = $email_reg";
                            $UPDATE13 = "UPDATE registro SET usuario = '$usuario10' WHERE email = '$email_reg'";
                            $resultado12 = mysqli_query($conn, $UPDATE13);
                            // $resultado12 = mysqli_query($conn, $INSERT13);
                            if ($resultado12) {
                            ?>
                                <script>
                                    console.log('<?php echo "success" . $email_reg . " "; ?>')
                                </script>
                            <?php
                            } else {
                            ?>
                                <script>
                                    console.log('<?php echo "Ha ocurrido un error!" . $email_reg . " "; ?>')
                                </script>
        <?php
                            }
                        }
                    }
                } else {
                    echo "la connecion fallo";
                }
            }
        }


        ?>



        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>


        <?php
        require("fund/script.php");
        ?>

    </div>
</body>

</html>