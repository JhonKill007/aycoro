<?php
$tittlePage = "Aycoro - Chat";
require("fund/head.php");
require("modulos/session.php");


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
    // $idmine = $_GET['idmine'];
    $usuario_usu = $_GET['user'];
    require("keys/usu.php");
    // $eso = require("keys/conection.php");

    
    // $id_sus = $_GET['usu'];

    
    require("modulos/nav.php");
    require("modulos/nav-two.php");
    $idmine = $registro['id_registro'];  
    require("modulos/status-post.php");
    if ($eso) {
        $UPDATE = "UPDATE chat SET readdate = 1 where id_reciver = '$idmine' AND id_sendner = '$id_usu' AND readdate = 0";
        $resultadoUP = mysqli_query($conn, $UPDATE);
        if ($resultadoUP) {
        } else {
        }
    }
    ?>


    <div class="conteiner">
        <div class="conteiner-chat-box">
            <div class="wrapper">
                <section class="chat-area">
                    <header>
                        <a href="message" class="back-icon"><i class="fas fa-arrow-left"></i></a>
                        <a href="user?user=<?php echo $usuario_usu; ?>">
                            <img src=<?php echo $foto_sus; ?> alt="">
                        </a>
                        <div class="details">
                            <a href="user?user=<?php echo $usuario_usu; ?>">
                                <span><?php echo $nombre_usu; ?></span>
                            </a>
                            <div class="status_usu">
                            </div>
                        </div>
                        <div class="icon-dm-box">
                            <a class="icon-dm" href="dm-secrete?user=<?php echo $usuario_usu; ?>"><i class="fas fa-comment-slash"></i></a>
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
                        <input type="hidden" value="<?php echo $registro['id_registro']; ?>" name="id_sendner">
                        <input type="hidden" value="<?php echo $id_usu; ?>" name="id_reciver">
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