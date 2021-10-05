<?php
require("fund/head.php");

?>



<body>

    <?php
    require("modulos/nav.php");
    require("modulos/nav-two.php");

    $id_sus = $_GET['usu'];

    require("keys/usu.php");
    require("modulos/perfil-bio-reciver.php");
    require("models/user_post_model.php");
    require("modulos/post-view.php");
    require("fund/script.php");
    ?>
</body>

</html>