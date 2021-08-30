<div class="conteiner">

    <div class="container-scroll">
        <h2>Publicaciones</h2>
        <!-- posiciones  de prooductos -->









        <?php
        $eso =  require('keys/conection.php');
        if ($eso) {
            $SELECT = "SELECT * FROM post inner join registro on post.owner=registro.id_registro where owner = $id_registro ORDER BY id_post DESC LIMIT 12";


            $resultado = mysqli_query($conn, $SELECT);
            if ($resultado) {
                while ($post = $resultado->fetch_array()) {
                    $liker = $_SESSION['id'];
                    $id_post = $post['id_post'];
                    $photo_post = $post['photo_post'];
                    $nombre_owner_post = $post['nombre'];
                    $apellido_owner_post = $post['apellido'];
                    $estado_post = $post['estado_post'];
                    $owner_post = $post['owner'];

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
                                    <input type="hidden" name="id_post" value="<?php echo $id_post; ?>">
                                    <input type="hidden" name="liker" value="<?php echo $id_registro; ?>">
                                    <?php
                                    if ($nume == 0) {
                                    ?>
                                        <div class="button-box<?php echo $id_post; ?> like" id="<?php echo $id_post; ?>">
                                            <button class="buton_like"><i class="far fa-heart like-wait like"></i><b><?php echo $num_like ?> Like</b></button>
                                        </div>
                                    <?php

                                    } else {
                                    ?>
                                        <div class="button-box<?php echo $id_post; ?> like" id="<?php echo $id_post; ?>">
                                            <button class=" buton_like"><i class="fas fa-heart like-red like"></i><b><?php echo $num_like ?> Like</b></button>
                                        </div>
                                    <?php
                                    }
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
                                <p><?php echo $estado_post; ?></p>
                                <?php
                                if ($owner_post == $_SESSION['id']) {
                                ?>
                                    <a href="perfil">
                                        <b><?php echo $nombre_owner_post . " " . $apellido_owner_post; ?></b>
                                    </a>
                                <?php
                                } else {
                                ?>
                                    <a href="perfil-reciver?usu=<?php echo $owner_post; ?>">
                                        <b><?php echo $nombre_owner_post . " " . $apellido_owner_post; ?></b>
                                    </a>
                                <?php
                                }
                                ?>
                                <br>
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
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <p><?php echo $estado_post; ?></p>
                                <form action="" method="POST" class="liking-area<?php echo $id_post; ?>">
                                    <input type="hidden" name="id_post" value="<?php echo $id_post; ?>">
                                    <input type="hidden" name="liker" value="<?php echo $id_registro; ?>">
                                    <?php
                                    if ($nume == 0) {
                                    ?>
                                        <div class="button-box<?php echo $id_post; ?> like" id="<?php echo $id_post; ?>">
                                            <button class="buton_like"><i class="far fa-heart like-wait like"></i><b><?php echo $num_like ?> Like</b></button>
                                        </div>
                                    <?php

                                    } else {
                                    ?>
                                        <div class="button-box<?php echo $id_post; ?> like" id="<?php echo $id_post; ?>">
                                            <button class=" buton_like"><i class="fas fa-heart like-red like"></i><b><?php echo $num_like ?> Like</b></button>
                                        </div>
                                    <?php
                                    }
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

                                <?php
                                if ($owner_post == $_SESSION['id']) {
                                ?>
                                    <a href="perfil">
                                        <b><?php echo $nombre_owner_post . " " . $apellido_owner_post; ?></b>
                                    </a>
                                <?php
                                } else {
                                ?>
                                    <a href="perfil-reciver?usu=<?php echo $owner_post; ?>">
                                        <b><?php echo $nombre_owner_post . " " . $apellido_owner_post; ?></b>
                                    </a>
                                <?php
                                }
                                ?>
                                <br>
                            </div>
                        </div>
        <?php
                    }
                }
            } else {
                echo " se fue a la verga";
            }
        } else {
            echo "la coneccion fallo";
        }
        ?>











    </div>
</div>