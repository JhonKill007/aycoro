<?php
$tittlePage = "Aycoro - Sugerencias";
require("fund/head.php");


$o = $_GET['o'];
$usuario_usu = $_GET['user'];
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
        require("keys/usu.php");
        $eso = require("keys/conection.php");
        ?>

        <div class="conteiner">
            <?php
            if (isset($_SESSION['id'])) {
                $id_log = $_SESSION['id'];
                $SELECT = "SELECT * FROM registro WHERE id_registro = '$id_log'";
                $resultado = mysqli_query($conn, $SELECT);
                if ($resultado) {
                    $seguidor = $resultado->fetch_array();
                    $usuario_log = $seguidor['usuario'];
                    if ($usuario_log == $usuario_usu) {
            ?>
                        <a href="perfil">
                            <h3 id="lettle_title"><?php echo $usuario_usu; ?></h3>
                        </a>
                    <?php
                    } else {
                    ?>
                        <a href="user?user=<?php echo $usuario_usu; ?>">
                            <h3 id="lettle_title"><?php echo $usuario_usu; ?></h3>
                        </a>
                <?php
                    }
                }
            } else {
                ?>
                <a href="user?user=<?php echo $usuario_usu; ?>">
                    <h3 id="lettle_title"><?php echo $usuario_usu; ?></h3>
                </a>
            <?php
            }
            ?>


            <div class="segidores_box">
                <div class="folows_buton_conteiner">
                    <div class="folows_buton_box" id="select">
                        <button class="btn btn-danger">Seguidores</button>
                    </div>
                    <div class="folows_buton_box">
                        <button class="btn btn-primary go">Seguidos</button>
                    </div>
                </div>
                <div class="persons_folow">
                    <?php
                    if ($eso) {
                        $SELECT = "SELECT * FROM folow WHERE id_folowing ='$id_usu' AND id_folower !='$id_usu'";
                        $resultado_folowers = mysqli_query($conn, $SELECT);
                        $segui = $resultado_folowers->num_rows;
                        $seguidores = $segui;
                        if ($seguidores == "") {
                            $seguidores = 0;
                        }
                    }
                    ?>
                    <b><?php echo $seguidores . " Seguidores"; ?></b>
                    <?php
                    if ($seguidores != 0) {
                        while ($folowers = $resultado_folowers->fetch_array()) {
                            $id_usuario_folowers = $folowers['id_folower'];
                            $SELECT = "SELECT * FROM registro WHERE id_registro = '$id_usuario_folowers'";
                            $resultado = mysqli_query($conn, $SELECT);
                            if ($resultado) {
                                while ($seguidor = $resultado->fetch_array()) {
                                    $id_seguidor = $seguidor['id_registro'];
                                    $nombre_seguidor = $seguidor['nombre'];
                                    $usuario_seguidor = $seguidor['usuario'];
                                    $perfil_seguidor = $seguidor['foto'];
                                }
                            }
                    ?>
                            <a href="user?user=<?php echo $usuario_seguidor; ?>" class="a_count_view">
                                <div class="person_count">
                                    <div class="perfil_cont">
                                        <img src=<?php echo $perfil_seguidor; ?> alt="">
                                    </div>
                                    <div class="name_count">
                                        <b class="user_folows"><?php echo $usuario_seguidor; ?></b>
                                    </div>
                                </div>
                            </a>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>

            <div class="segidos_box">
                <div class="folows_buton_conteiner">
                    <div class="folows_buton_box">
                        <button class="btn btn-danger goback">Seguidores</button>
                    </div>
                    <div class="folows_buton_box" id="select">
                        <button class="btn btn-primary">Seguidos</button>
                    </div>
                </div>
                <div class="persons_folow">
                    <?php
                    if ($eso) {
                        $SELECT = "SELECT * FROM folow WHERE id_folower ='$id_usu' AND id_folowing != '$id_usu'";
                        $resultado_2 = mysqli_query($conn, $SELECT);
                        $segui = $resultado_2->num_rows;
                        $seguidos = $segui;
                        if ($seguidos == "") {
                            $seguidos = 0;
                        }
                    }
                    ?>
                    <b><?php echo $seguidos . " Seguidos"; ?></b>
                    <?php
                    while ($folowings = $resultado_2->fetch_array()) {
                        $id_usuario = $folowings['id_folowing'];
                        $SELECT = "SELECT * FROM registro WHERE id_registro = '$id_usuario'";
                        $resultado = mysqli_query($conn, $SELECT);
                        if ($resultado) {
                            while ($seguidor = $resultado->fetch_array()) {
                                $id_seguidor = $seguidor['id_registro'];
                                $nombre_seguidor = $seguidor['nombre'];
                                $usuario_seguidor = $seguidor['usuario'];
                                $perfil_seguidor = $seguidor['foto'];
                            }
                        }
                    ?>
                        <a href="user?user=<?php echo $usuario_seguidor; ?>" class="a_count_view">
                            <div class="person_count">
                                <div class="perfil_cont">
                                    <img src=<?php echo $perfil_seguidor; ?> alt="">
                                </div>
                                <div class="name_count">
                                    <b class="user_folows"><?php echo $usuario_seguidor; ?></b>
                                </div>
                            </div>
                        </a>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6464187088568984" crossorigin="anonymous"></script>
            <!-- sugerencias y ayudas -->
            <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-6464187088568984" data-ad-slot="5316158900" data-ad-format="auto" data-full-width-responsive="true"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
        </div>
        <script>
            var option = <?php echo $o; ?>;
            var Seleccion = selectDiv(option);

            // console.log(<?php echo $o; ?>);

            function selectDiv(option) {
                if (option == 1) {
                    document.querySelector(".segidores_box").classList.toggle("show")
                } else {
                    document.querySelector(".segidos_box").classList.toggle("show")
                }
            }
            document.querySelector('.goback').addEventListener('click', () => {
                document.querySelector(".segidos_box").classList.toggle("show")
                document.querySelector(".segidores_box").classList.toggle("show")
            })
            document.querySelector('.go').addEventListener('click', () => {
                document.querySelector(".segidores_box").classList.toggle("show")
                document.querySelector(".segidos_box").classList.toggle("show")
            })
        </script>
        <?php
        require("fund/script.php");
        ?>
    </div>
</body>

</html>