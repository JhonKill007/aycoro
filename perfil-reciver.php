<?php
$id_sus = $_GET['usu'];
require("keys/usu.php");

$tittlePage = "Aycoro - ".$nombre_usu." ".$apellido_sus;
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

    <?php
    require("modulos/nav.php");
    require("modulos/nav-two.php");
    require("modulos/status-post.php");

    
    require("modulos/perfil-bio-reciver.php");
    require("models/user_post_model.php");
    require("modulos/post-view.php");
    require("fund/script.php");
    ?>
</body>

</html>