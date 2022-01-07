<?php
$usuario_usu = $_GET['user'];
require("keys/usu.php");

$tittlePage = "Aycoro - " . $usuario_usu;
require("fund/head.php");

?>


<style>
    .container-scroll {
        margin-top: -60px;
    }

    @media (max-width: 1120px) {

        .container-scroll {
            margin-top: -110px;
        }
    }
</style>

<body>
    <div id="contenedo_carca" class="charger">
        <div id="carga"></div>
    </div>
    <div class="body_center">
        <?php
        require("modulos/nav.php");
        require("modulos/nav-two.php");
        require("modulos/status-post.php");


        require("modulos/perfil-bio-reciver.php");
        require("models/user_post_model.php");
        require("modulos/post-view.php");
        require("fund/script.php");
        ?>
    </div>
</body>

</html>