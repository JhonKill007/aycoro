<?php
$tittlePage = "Aycoro - Ayuda";
require("fund/head.php");
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

        ?>

        <div class="conteiner">
            <div class="conteiner-ayuda">
                <h1>Ayuda</h1>
                <div class="title-ayu"><b>Que necesitas?</b></div>
                <br>
                <?php
                require("keys/admin-key.php");
                $opc = 1;
                ?>
                <div class="interactionbox">
                    <span>En que te podemos ayudar, envia tu problema y responderemos lo mas rapido posible por la bandeja de mensajeria.</span>
                    <form action="keys/send-ayudaosug-key.php" method="post">
                        <textarea name="mensaje" cols="30" rows="10" placeholder="   Escribe aqui!" maxlength="1000"></textarea>
                        <input type="hidden" value="<?php echo $_SESSION['id']; ?>" name="id_sendner">
                        <input type="hidden" value="<?php echo $id_admin; ?>" name="id_reciver">
                        <input type="hidden" value="<?php echo $opc; ?>" name="opc">
                        <br>
                        <button class="btn btn-success">Enviar</button>
                    </form>
                </div>
                <br>
                <br>

            </div>
            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6464187088568984" crossorigin="anonymous"></script>
            <!-- sugerencias y ayudas -->
            <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-6464187088568984" data-ad-slot="5316158900" data-ad-format="auto" data-full-width-responsive="true"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
        </div>


        <?php
        require("fund/script.php");
        ?>

    </div>
</body>

</html>