<?php
require("modulos/session.php");
$tittlePage = "Aycoro - Sugerencias";
require("fund/head.php");
?>



<body>
    <div id="contenedo_carca" class="charger">
        <div id="carga"></div>
    </div>
    <div class="body_center">
        <?php
        require("modulos/nav.php");
        // require("modulos/nav-two.php");
        require("modulos/status-post.php");
        ?>

        <div class="conteiner">
            <div class="conteiner-ayuda">
                <h1>Sugerencias</h1>
                <div class="title-sug"><b>Cual es tu sugerencia?</b></div>
                <br>
                <?php
                require("keys/admin-key.php");
                $opc = 0;
                ?>
                <div class="interactionbox">
                    <form action="keys/send-ayudaosug-key.php" method="post">
                        <span>Puedes enviarnos cualquier sugerencia de cambios en nuestra plataforma, te lo agradeceremos.</span>
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
            <br>
            <?php require("modulos/footer-blog.php")?>
        </div>

        <?php
        require("fund/script.php");
        ?>
    </div>
</body>

</html>