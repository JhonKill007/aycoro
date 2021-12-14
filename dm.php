<?php
$tittlePage = "Aycoro - Chat";
require("fund/head.php");



?>
<style>
    @media (max-width: 1120px) {
        .barra-inicio-new {
            height: 140px;
        }

        .nav-main {
            height: 140px;
        }

        .container-one {
            margin-top: -40px;
            height: 140px;
        }
    }

    @media (max-width: 414px) {
        .conteiner {
            width: 100%;
        }
    }
</style>


<body>

    <?php
    $idmine = $_GET['idmine'];
    $id_sendner = $_GET['usu'];

    $eso = require("keys/conection.php");

    if ($eso) {
        $UPDATE = "UPDATE chat SET readdate = 1 where id_reciver = '$idmine' AND id_sendner = '$id_sendner' AND readdate = 0";
        $resultadoUP = mysqli_query($conn, $UPDATE);
        if ($resultadoUP) {
        } else {
        }
    }
    $id_sus = $_GET['usu'];

    require("keys/usu.php");
    require("modulos/nav.php");
    require("modulos/nav-two.php");
    $idmine = $registro['id_registro'];



    require("modulos/photo_edit.php");
    require("modulos/status-post.php");
    // echo $n_usu;
    ?>


    <div class="conteiner">

        <div class="conteiner-chat-box">
            <div class="wrapper">
                <section class="chat-area">
                    <header>
                        <a href="message" class="back-icon"><i class="fas fa-arrow-left"></i></a>
                        <a href="perfil-reciver?usu=<?php echo $id_usu; ?>">
                            <img src=<?php echo $foto_sus; ?> alt="">
                        </a>
                        <div class="details">
                            <a href="perfil-reciver?usu=<?php echo $id_usu; ?>">
                                <span><?php echo $nombre_usu . " " . $apellido_sus; ?></span>
                            </a>
                            <div class="status_usu">
                            </div>
                        </div>
                        <div class="icon-dm-box">
                            <a class="icon-dm" href="dm-secrete?usu=<?php echo $id_sus; ?>&idmine=<?php echo $id; ?>"><i class="fas fa-comment-slash"></i></a>
                        </div>
                    </header>
                    <div class="chat-box">


                    </div>
                    <?php
                    $pri = 0;
                    $vista = 0;
                    $credms = 0;
                    ?>
                    <form action="" method="post" class="typing-area">
                        <input type="hidden" value="<?php echo $id; ?>" name="id_sendner">
                        <input type="hidden" value="<?php echo $id_sus; ?>" name="id_reciver">
                        <input type="hidden" value="<?php echo $pri; ?>" name="mgsprivate">
                        <input type="hidden" value="" name="time" id="time_mjs">
                        <input type="hidden" value="<?php echo $vista; ?>" name="vista">
                        <input type="hidden" value="<?php echo $credms; ?>" name="createdms">
                        <input type="text" autocomplete="off" class="input-field" name="mensaje" placeholder="Escribe Aqui" maxlength="1000">
                        <button><i class="fab fa-telegram-plane"></i></button>
                    </form>
                </section>
            </div>
        </div>
    </div>
    <script>
        const time_mjs = Intl.DateTimeFormat().resolvedOptions().timeZone;
        document.getElementById("time_mjs").value = time_mjs;
    </script>
    <script src="js/chat.js"></script>
    <script src="js/status.js"></script>
    <?php
    require("fund/script.php");
    ?>
</body>

</html>