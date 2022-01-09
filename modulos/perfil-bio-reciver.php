<div class="conteiner">
    <div class="biograf">
        <div class="portada">
            <img src=<?php echo $portada_sus; ?> alt="">
        </div>
        <div class="perfil">
            <img src=<?php echo $foto_sus; ?> alt="img/usuario.png">
        </div>
        <div class="nombre">

            <h4><?php echo $nombre_usu; ?></h4>
            <a href=""><b><?php echo $usuario_sus; ?></b></a>

            <div class="messege-icon">


                <?php

                $eso = require("keys/conection.php");
                if ($eso) {
                    if (isset($_SESSION['id'])) {
                        $SELECT = "SELECT * FROM folow WHERE id_folowing ='$id_usu' and id_folower ='$id_registro'";
                        $resultado = mysqli_query($conn, $SELECT);
                        $nume = $resultado->num_rows;
                    }

                    $SELECT = "SELECT * FROM folow WHERE id_folowing ='$id_usu'";
                    $resultado_2 = mysqli_query($conn, $SELECT);
                    $segui = $resultado_2->num_rows;
                    $seguidores = $segui - 1;

                    $SELECT = "SELECT * FROM folow WHERE id_folower ='$id_usu'";
                    $resultado_2 = mysqli_query($conn, $SELECT);
                    $segui = $resultado_2->num_rows;
                    $seguidos = $segui - 1;
                    if ($resultado) {
                        if (isset($_SESSION['id'])) {
                ?>
                            <div class="box-button-follow">
                                <form action="" method="POST" class="follow-area">
                                    <input type="hidden" name="folowing" value="<?php echo $id_usu; ?>">
                                    <input type="hidden" name="folower" value="<?php echo $id_registro; ?>">

                                    <?php
                                    if ($nume == 0) {
                                    ?>
                                        <div class="button-box like" id="">
                                            <div class="buton_follow">
                                                <div class="button_follow" type="submit">
                                                    <div class="lettle_follow">
                                                        <b>Seguir</b>
                                                    </div>
                                                </div>

                                                <div class="cant_follow_conteiner"><a id="folowers_perfil" href="folows?o=2&user=<?php echo $usuario_sus; ?>"><b><?php echo $seguidos . " Seguidos "; ?></b></a><span>|</span><a id="folowers_perfil" href="folows?o=1&user=<?php echo $usuario_sus; ?>"><b> <?php echo $seguidores . " " . "Seguidores"; ?></b></a></div>
                                            </div>
                                        </div>
                                    <?php

                                    } else {
                                    ?>
                                        <div class="button-box like" id="">
                                            <div class="buton_follow">
                                                <div class="button_follow" type="submit">
                                                    <div class="icon_follow">
                                                        <i class="fas fa-user-check"></i>
                                                    </div>
                                                </div>
                                                <div class="cant_follow_conteiner"><a id="folowers_perfil" href="folows?o=2&user=<?php echo $usuario_sus; ?>"><b><?php echo $seguidos . " Seguidos "; ?></b></a><span>|</span><a id="folowers_perfil" href="folows?o=1&user=<?php echo $usuario_sus; ?>"><b> <?php echo $seguidores . " " . "Seguidores"; ?></b></a></div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </form>
                            </div>




                            <script>
                                const formu = document.querySelector(".follow-area"),
                                    ButtonBox = document.querySelector(".button-box"),
                                    FollowButton = ButtonBox.querySelector(".buton_follow"),
                                    LikeBox = document.querySelector(".like-box");




                                formu.onsubmit = (e) => {
                                    e.preventDefault(); //previene el recargo de la pagina
                                }



                                document.querySelector('.button_follow').addEventListener('click', () => {


                                    let xhr = new XMLHttpRequest();
                                    xhr.open("POST", "keys/control-follow-key.php", true);
                                    xhr.onload = () => {
                                        if (xhr.readyState === XMLHttpRequest.DONE) {
                                            if (xhr.status === 200) {
                                                let data = xhr.response;
                                                FollowButton.innerHTML = data;
                                            }
                                        }
                                    }
                                    // // vamos a mandar el formu data atraves de ajax a php
                                    let formData = new FormData(formu); //creando el objeto formData
                                    xhr.send(formData); //enviando el formData a php



                                });
                            </script>

                            <div class="icon_messages_perfil">
                                <a href="dm?user=<?php echo $usuario_usu; ?>">
                                    <i class="fas fa-comment"></i>
                                </a>
                            </div>

                        <?php
                        } else {
                        ?>
                            <div class="button-box like" id="">
                                <div class="buton_follow">
                                    <div class="cant_follow_conteiner"><a id="folowers_perfil" href=""><b><?php echo $seguidos . " Seguidos "; ?></b></a><span>|</span><a id="folowers_perfil" href=""><b> <?php echo $seguidores . " " . "Seguidores"; ?></b></a></div>
                                </div>
                            </div>
                <?php


                        }
                    }
                } else {
                    echo "fallo la coneccion";
                }

                ?>

            </div>
            <p><?php echo $presentacion_sus; ?></p>
            <hr>
        </div>

    </div>
</div>