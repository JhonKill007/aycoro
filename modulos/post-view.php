<div class="conteiner">
    <br>
    <br>
    <div class="container-scroll">
        <h2>Publicaciones</h2>
        <!-- posiciones  de prooductos -->
        <?php
        $publi = 0;
        if ($resultado) {
            $cant_de_post = $resultado->num_rows;
            if ($cant_de_post == 0 && $identity_page_post == 1) {
        ?>
                <div class="publicacion inicio_de_cuenta">
                    <h5>Al parecer eres nuevo en Aycoro</h5>
                    <?php
                    if ($registro['genero'] == 'm') {
                    ?>
                        <h3>Bienvenido <?php echo $registro['nombre']; ?></h3>
                    <?php
                    }
                    else{
                        ?>
                        <h3>Bienvenida <?php echo $registro['nombre']; ?></h3>
                    <?php
                    }
                    ?>
                    <h6>Esperamos que disfrutes compartir con nosotros,
                        <br>
                        puedes comenzar a seguir a tus amigos buscandolos
                        <br>
                        en la barra superior que dice buscar, o viendo personas
                        <br>
                        aleatorias y todas nuestras publicaciones en forma
                        <br>
                        desendente en <a href="explorador">explorador.</a>
                        <br>
                        Tambien puedes ver y subir historias diarias en <a href="historias">historias.</a>
                    </h6>
                    <h4>Gracias!</h4>
                </div>
                <?php
            }
            while ($post = $resultado->fetch_array()) {
                $publi++;
                $liker = $_SESSION['id'];
                $id_post = $post['id_post'];
                $foto_perfil = $post['foto'];
                $photo_post = $post['photo_post'];
                $nombre_owner_post = $post['nombre'];
                $estado_post =  $post['estado_post'];
                $owner_post = $post['owner'];
                $user_post = $post['usuario'];
                $fecha = $post['hour'] . " " . $post['day'];

                if ($publi == 3) {
                ?>
                    <!-- <div class="publicacion"> -->
                    <!-- <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6464187088568984" crossorigin="anonymous"></script> -->
                    <!-- publicaciones -->
                    <!-- <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-6464187088568984" data-ad-slot="8349709873" data-ad-format="auto" data-full-width-responsive="true"></ins>
                        <script>
                            (adsbygoogle = window.adsbygoogle || []).push({});
                        </script>
                    </div> -->
                <?php
                    $publi = 0;
                }

                if (!empty($photo_post)) {
                    $SELECT = "SELECT * FROM likes WHERE id_post ='$id_post' and id_liker ='$liker'";
                    $resultado_like1 = mysqli_query($conn, $SELECT);
                    $nume = $resultado_like1->num_rows;

                    $SELECT = "SELECT * FROM likes WHERE id_post ='$id_post'";
                    $resultado_like2 = mysqli_query($conn, $SELECT);
                    $num_like = $resultado_like2->num_rows;




                ?>

                    <div class="publicacion">
                        <div class="pub-img-box">
                            <img src=<?php echo $photo_post; ?> alt="">
                        </div>
                        <div class="piecera">
                            <form action="" method="POST" class="liking-area<?php echo $id_post; ?>">
                                <input type="hidden" name="stado_edit" id="status_edit<?php echo $id_post; ?>" value="">
                                <input type="hidden" name="type_post" value="1">
                                <input type="hidden" id="status_input_hiden<?php echo $id_post; ?>" name="coment_value" value="">
                                <input type="hidden" name="id_post" value="<?php echo $id_post; ?>">
                                <input type="hidden" name="liker" value="<?php echo $id_registro; ?>">
                                <?php
                                if ($nume == 0) {
                                ?>
                                    <div class="display-form">
                                        <div class="button-box<?php echo $id_post; ?> like" id="<?php echo $id_post; ?>">
                                            <div class="buton_like"><i class="far fa-heart like-wait"></i><b><?php echo $num_like ?> Like</b></div>
                                        </div>
                                        <div class="coment-box button_coment<?php echo $id_post; ?>" onclick="OpenInputComent<?php echo $id_post; ?>()">
                                            <div><i class="far fa-comment conment-icon"></i></div>
                                        </div>
                                    </div>
                                <?php
                                } else {
                                ?>
                                    <div class="display-form">
                                        <div class="button-box<?php echo $id_post; ?> like" id="<?php echo $id_post; ?>">
                                            <div class="buton_like"><i class="fas fa-heart like-red"></i><b><?php echo $num_like ?> Like</b></div>
                                        </div>
                                        <div class="coment-box button_coment<?php echo $id_post; ?>" onclick="OpenInputComent<?php echo $id_post; ?>()">
                                            <div><i class="far fa-comment conment-icon"></i></div>
                                        </div>
                                    </div>

                                <?php
                                }
                                ?>

                                <?php
                                if ($owner_post == $_SESSION['id']) {
                                ?>

                                    <div class="post_setting">
                                        <div class="box_setting<?php echo $id_post; ?>">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </div>
                                    </div>
                                    <div class="options-edit-post<?php echo $id_post; ?> options-edit-post_space">

                                    </div>
                                <?php
                                }
                                if ($estado_post == "") {
                                ?>
                                    <br>
                                <?php
                                }
                                ?>
                                <p id="stado<?php echo $id_post; ?>"><?php echo $estado_post; ?></p>
                                <div class="name_and_date_post">
                                    <?php
                                    if ($owner_post == $_SESSION['id']) {
                                    ?>
                                        <a href="perfil">
                                            <b><?php echo $user_post; ?></b>
                                        </a>
                                    <?php
                                    } else {
                                    ?>
                                        <a href="user?user=<?php echo $user_post; ?>">
                                            <b><?php echo $user_post; ?></b>
                                        </a>
                                    <?php
                                    }
                                    ?>
                                    <span class="fecha"><?php echo $fecha; ?></span>
                                    <br>
                                    <div class="conteiner_cant_coments_view<?php echo $id_post; ?>">

                                    </div>
                                </div>
                                <div class="coment_add_box conteiner_coment_input<?php echo $id_post; ?>">

                                </div>
                                <div class="coment-text-box<?php echo $id_post; ?>">

                                </div>
                                <br>
                                <?php
                                require("modulos/post_manager.php");
                                ?>
                                <script>
                                    const formu<?php echo $id_post; ?> = document.querySelector(".liking-area<?php echo $id_post; ?>"),
                                        ButtonBox<?php echo $id_post; ?> = document.querySelector(".button-box<?php echo $id_post; ?>"),
                                        LikeIcon<?php echo $id_post; ?> = ButtonBox<?php echo $id_post; ?>.querySelector(".buton_like"),
                                        LikeBox<?php echo $id_post; ?> = document.querySelector(".like-box");




                                    formu<?php echo $id_post; ?>.onsubmit = (e) => {
                                        e.preventDefault(); //previene el recargo de la pagina
                                    }



                                    document.querySelector('.button-box<?php echo $id_post; ?>').addEventListener('click', () => {


                                        let xhr<?php echo $id_post; ?> = new XMLHttpRequest();
                                        xhr<?php echo $id_post; ?>.open("POST", "keys/control-like-key.php", true);
                                        xhr<?php echo $id_post; ?>.onload = () => {
                                            if (xhr<?php echo $id_post; ?>.readyState === XMLHttpRequest.DONE) {
                                                if (xhr<?php echo $id_post; ?>.status === 200) {
                                                    let data<?php echo $id_post; ?> = xhr<?php echo $id_post; ?>.response;
                                                    LikeIcon<?php echo $id_post; ?>.innerHTML = data<?php echo $id_post; ?>;
                                                }
                                            }
                                        }
                                        // // vamos a mandar el formu data atraves de ajax a php
                                        let formData<?php echo $id_post; ?> = new FormData(formu<?php echo $id_post; ?>); //creando el objeto formData
                                        xhr<?php echo $id_post; ?>.send(formData<?php echo $id_post; ?>); //enviando el formData a php



                                    });
                                </script>
                            </form>

                        </div>
                        <?php
                        require("modulos/coments_make_view.php")
                        ?>
                    </div>
    </div>

<?php
                } else {
                    $SELECT = "SELECT * FROM likes WHERE id_post ='$id_post' and id_liker ='$liker'";
                    $resultado_like1 = mysqli_query($conn, $SELECT);
                    $nume = $resultado_like1->num_rows;

                    $SELECT = "SELECT * FROM likes WHERE id_post ='$id_post'";
                    $resultado_like2 = mysqli_query($conn, $SELECT);
                    $num_like = $resultado_like2->num_rows;
?>
    <div class="publicacion-text">
        <div class="piecera">
            <div class="estado_lettle">
                <p id="stado<?php echo $id_post; ?>"><?php echo $estado_post; ?></p>
            </div>
            <form action="" method="POST" class="liking-area<?php echo $id_post; ?>">
                <input type="hidden" name="stado_edit" id="status_edit<?php echo $id_post; ?>" value="">
                <input type="hidden" name="type_post" value="2">
                <input type="hidden" name="id_post" value="<?php echo $id_post; ?>">
                <input type="hidden" name="liker" value="<?php echo $id_registro; ?>">
                <?php
                    if ($nume == 0) {
                ?>
                    <div class="display-form">
                        <div class="button-box<?php echo $id_post; ?> like" id="<?php echo $id_post; ?>">
                            <div class="buton_like"><i class="far fa-heart like-wait"></i><b><?php echo $num_like ?> Like</b></div>
                        </div>
                        <div class="coment-box button_coment<?php echo $id_post; ?>" onclick="OpenInputComent<?php echo $id_post; ?>()">
                            <div><i class="far fa-comment conment-icon"></i></div>
                        </div>
                    </div>
                <?php
                    } else {
                ?>
                    <div class="display-form">
                        <div class="button-box<?php echo $id_post; ?> like" id="<?php echo $id_post; ?>">
                            <div class="buton_like"><i class="fas fa-heart like-red"></i><b><?php echo $num_like ?> Like</b></div>
                        </div>
                        <div class="coment-box button_coment<?php echo $id_post; ?>" onclick="OpenInputComent<?php echo $id_post; ?>()">
                            <div><i class="far fa-comment conment-icon"></i></div>
                        </div>
                    </div>

                <?php
                    }
                ?>
                <br>
                <?php
                    if ($owner_post == $_SESSION['id']) {
                ?>

                    <div class="post_setting">
                        <div class="box_setting<?php echo $id_post; ?>">
                            <i class="fas fa-ellipsis-h"></i>
                        </div>
                    </div>
                    <div class="options-edit-post<?php echo $id_post; ?> options-edit-post_space">

                    </div>
                <?php
                    }
                ?>
                <div class="name_and_date_post">
                    <?php
                    if ($owner_post == $_SESSION['id']) {
                    ?>
                        <a href="perfil">
                            <b><?php echo $user_post; ?></b>
                        </a>
                    <?php
                    } else {
                    ?>
                        <a href="user?user=<?php echo $user_post; ?>">
                            <b><?php echo $user_post; ?></b>
                        </a>
                    <?php
                    }
                    ?>
                    <span class="fecha"><?php echo $fecha; ?></span>
                    <br>
                    <div class="conteiner_cant_coments_view<?php echo $id_post; ?>">

                    </div>
                </div>
                <div class="coment_add_box conteiner_coment_input<?php echo $id_post; ?>">

                </div>
                <div class="coment-text-box<?php echo $id_post; ?>">

                </div>
                <br>
                <?php
                    require("modulos/post_manager.php");
                ?>
                <script>
                    const formu<?php echo $id_post; ?> = document.querySelector(".liking-area<?php echo $id_post; ?>"),
                        ButtonBox<?php echo $id_post; ?> = document.querySelector(".button-box<?php echo $id_post; ?>"),
                        LikeIcon<?php echo $id_post; ?> = ButtonBox<?php echo $id_post; ?>.querySelector(".buton_like"),
                        LikeBox<?php echo $id_post; ?> = document.querySelector(".like-box");




                    formu<?php echo $id_post; ?>.onsubmit = (e) => {
                        e.preventDefault(); //previene el recargo de la pagina
                    }



                    document.querySelector('.button-box<?php echo $id_post; ?>').addEventListener('click', () => {


                        let xhr<?php echo $id_post; ?> = new XMLHttpRequest();
                        xhr<?php echo $id_post; ?>.open("POST", "keys/control-like-key.php", true);
                        xhr<?php echo $id_post; ?>.onload = () => {
                            if (xhr<?php echo $id_post; ?>.readyState === XMLHttpRequest.DONE) {
                                if (xhr<?php echo $id_post; ?>.status === 200) {
                                    let data<?php echo $id_post; ?> = xhr<?php echo $id_post; ?>.response;
                                    LikeIcon<?php echo $id_post; ?>.innerHTML = data<?php echo $id_post; ?>;
                                }
                            }
                        }
                        // // vamos a mandar el formu data atraves de ajax a php
                        let formData<?php echo $id_post; ?> = new FormData(formu<?php echo $id_post; ?>); //creando el objeto formData
                        xhr<?php echo $id_post; ?>.send(formData<?php echo $id_post; ?>); //enviando el formData a php



                    });
                </script>
            </form>

            <br>
        </div>
        <?php
                    require("modulos/coments_make_view.php")
        ?>
    </div>
<?php
                }
            }
            if ($publi != 3) {
?>
<!-- <div class="publicacion"> -->
<!-- <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6464187088568984" crossorigin="anonymous"></script> -->
<!-- publicaciones -->
<!-- <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-6464187088568984" data-ad-slot="8349709873" data-ad-format="auto" data-full-width-responsive="true"></ins>
                                <script>
                                    (adsbygoogle = window.adsbygoogle || []).push({});
                                </script>
                            </div> -->
<?php
                $publi = 0;
            }
        } else {
            echo "Ha ocurrido un error!";
        }
?>
</div>