<?php
require("fund/head.php");



?>



<body>

    <?php
    $idmine = $_GET['idmine'];
    $id_sendner = $_GET['usu'];
    $eso = require("keys/conection.php");
    if ($eso) {
        $UPDATE = "UPDATE chat SET readdate = 1 where id_reciver = '$idmine' AND id_sendner = '$id_sendner' AND readdate = 0";
        $resultadoUP = mysqli_query($conn, $UPDATE);
        if ($resultadoUP) {
            echo "hecho!!";
        } else {
            echo "esa mierda no sirve";
        }
    }
    require("modulos/nav.php");
    require("modulos/nav-two.php");

    $id_sus = $_GET['usu'];

    require("keys/usu.php");
    ?>


    <div class="conteiner">

        <div class="conteiner-chat-box">
            <div class="wrapper">
                <section class="chat-area color-secrete">
                    <header>
                        <a href="message" class="back-icon icon-dm"><i class="fas fa-arrow-left"></i></a>
                        <a href="perfil-reciver?usu=<?php echo $id_usu; ?>">
                            <img src=<?php echo $foto_sus; ?> alt="">
                        </a>
                        <div class="details">
                            <a href="perfil-reciver?usu=<?php echo $id_usu; ?>">
                                <span><?php echo $nombre_usu . " " . $apellido_sus; ?></span>
                            </a>
                            <p>Chat incognito</p>
                            <!-- <p><?php echo $cht['status']; ?></p> -->
                        </div>
                        <div class="icon-dm-box">
                            <a class="icon-dm" href="dm?usu=<?php echo $id_sus; ?>&idmine=<?php echo $id; ?>"><i class="fas fa-comment"></i></a>
                        </div>
                    </header>
                    <div class="chat-box color-secrete chat-box-secrete">


                    </div>
                    <?php 
                    $pri = 1;
                    $vista = 0;
                    $credms = 1; 
                    ?>
                    <form action="" method="post" class="typing-area">
                        <input type="hidden" value="<?php echo $id; ?>" name="id_sendner">
                        <input type="hidden" value="<?php echo $id_sus; ?>" name="id_reciver">
                        <input type="hidden" value="<?php echo $pri; ?>" name="mgsprivate">
                        <input type="hidden" value="<?php echo $vista; ?>" name="vista">
                        <input type="hidden" value="<?php echo $credms; ?>" name="createdms">
                        <input type="text" class="input-field" name="mensaje" placeholder="Type a message here.">
                        <!-- <textarea name="mensaje" class="input-field" id="" cols="110" rows="2" placeholder="Type a message here."></textarea> -->
                        <button><i class="fab fa-telegram-plane"></i></button>
                    </form>
                </section>
            </div>
        </div>

        <?php
        // require("modulos/chat-module.php");
        ?>
    </div>
    <script src="js/chat.js"></script>
    <!-- <script>
        var chatHistory = document.getElementById("message-box");
        chatHistory.scrollTop = chatHistory.scrollHeight;
    </script> -->
    <?php
    // require("modulos/footer.php");
    require("fund/script.php");
    ?>
</body>

</html>