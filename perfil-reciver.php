<?php
$id_sus = $_GET['usu'];
require("keys/usu.php");

$tittlePage = "Aycoro - ".$nombre_usu." ".$apellido_sus;
require("fund/head.php");

?>


<style>
    .container-scroll {
        margin-top: -70px;
    }

    @media (max-width: 1120px) {

        .container-scroll {
            margin-top: -220px;
        }
    }
</style>

<body>

    <?php
    require("modulos/nav.php");
    require("modulos/nav-two.php");
    require("modulos/photo_edit.php");
    require("modulos/status-post.php");

    
    require("modulos/perfil-bio-reciver.php");
    require("models/user_post_model.php");
    require("modulos/post-view.php");
    require("fund/script.php");
    ?>
</body>

</html>