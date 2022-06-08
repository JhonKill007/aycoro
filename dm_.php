<?php
require("modulos/session.php");
$tittlePage = "Aycoro - Chat";
require("fund/head.php");


?>


<body>
    <style>
        @media (max-width: 414px) {
            .container-one {
                display: none;
            }

            .conteiner {
                width: 100%;
                margin-top: 0;
            }
        }
    </style>

    <?php
    $id_chat = $_GET['private'];



    require("modulos/nav.php");
    // require("modulos/nav-two.php");
    $idmine = $registro['id_registro'];
    require("modulos/status-post.php");


    $eso = require("keys/conection.php");
    $SELECTidchat = "SELECT * FROM idchat WHERE id_chat = $id_chat";
    $resultadoidchat = mysqli_query($conn, $SELECTidchat);
    if ($resultadoidchat) {
        if ($idchat_result = $resultadoidchat->fetch_array()) {
            if ($idchat_result['private'] == 1) {
                if ($idchat_result['id_usu1'] == $idmine) {
                    $id_sus = $idchat_result['id_usu2'];
                } else {
                    $id_sus = $idchat_result['id_usu1'];
                }
            }
        }
    }


    if ($eso) {
        $UPDATE = "UPDATE chat SET readdate = 1 where id_chat = '$id_chat' AND id_sendner != '$idmine' AND readdate = 0";
        $resultadoUP = mysqli_query($conn, $UPDATE);
        if ($resultadoUP) {
        } else {
            echo "fallo el query";
        }
    }
    ?>


    <div class="conteiner">
        <div class="conteiner-chat-box">
            <div class="wrapper">
                <section class="chat-area">
                    <header>
                        <a href="message" class="back-icon"><i class="fas fa-arrow-left"></i></a>
                        <a href="">
                            <img src="img/usuario.png" alt="">
                        </a>
                        <div class="details">
                            <a href="">
                                <span>Incognito</span>
                            </a>
                            <div class="status_usu">
                            </div>
                        </div>
                    </header>
                    <div class="chat-box">


                    </div>
                    <?php
                    $pri = 1;
                    $vista = 1;
                    $credms = 2;
                    ?>
                    <form action="" method="post" class="typing-area">
                        <input type="hidden" value="<?php echo $idmine; ?>" name="id_sendner">
                        <input type="hidden" value="<?php echo $id_sus; ?>" name="id_reciver">
                        <input type="hidden" value="<?php echo $pri; ?>" name="mgsprivate">
                        <input type="hidden" value="" name="time" id="time_mjs">
                        <input type="hidden" value="<?php echo $vista; ?>" name="vista">
                        <input type="hidden" value="<?php echo $id_chat; ?>" name="id_chat">
                        <input type="hidden" value="<?php echo $vista; ?>" name="readdate">
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
    <!-- <script src="js/status.js"></script> -->
    <?php
    require("fund/script.php");
    ?>
</body>

</html>