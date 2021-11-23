<div class="conteiner">
    <div class="biograf">
        <div class="portada">
            <img src=<?php echo $portada_sus; ?> alt="">
        </div>
        <div class="perfil">
            <img src=<?php echo $foto_sus; ?> alt="img/usuario.png">
        </div>
        <div class="nombre">

            <h1><?php echo $nombre_usu . " " . $apellido_sus; ?></h1>


            <div class="messege-icon">
                <div class="icon_messages_perfil">
                    <a href="dm?usu=<?php echo $id_usu; ?>&idmine=<?php echo $id; ?>">
                        <i class="fas fa-comment"></i>
                    </a>
                </div>
                <h1>|</h1>



                <?php

                $eso = require("keys/conection.php");
                if ($eso) {
                    $SELECT = "SELECT * FROM folow WHERE id_folowing ='$id_usu' and id_folower ='$id_registro'";
                    $resultado = mysqli_query($conn, $SELECT);
                    $nume = $resultado->num_rows;

                    $SELECT = "SELECT * FROM folow WHERE id_folowing ='$id_usu'";
                    $resultado_2 = mysqli_query($conn, $SELECT);
                    $segui = $resultado_2->num_rows;
                    $seguidores = $segui - 1;
                    if ($resultado) {

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
                                            <div><b><?php echo $seguidores . " " . "Seguidores"; ?></b></div>
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
                                            <div><b><?php echo $seguidores . " " . "Seguidores"; ?></b></div>
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



                            document.querySelector('.button-box').addEventListener('click', () => {


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

                <?php

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