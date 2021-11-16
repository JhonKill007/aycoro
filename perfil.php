<?php
$tittlePage = "Aycoro - Perfil";
require("fund/head.php");
?>

<script>
    perfil = 2;
</script>

<body>

    <?php
    require("modulos/nav.php");
    require("modulos/nav-two.php");
    require("modulos/photo_edit.php");
    require("modulos/status-post.php");


    $eso = require("keys/conection.php");
    if ($eso) {
        $SELECT = "SELECT * FROM folow WHERE id_folowing ='$id_registro'";
        $resultado = mysqli_query($conn, $SELECT);
        $nume = $resultado->num_rows;
    } else {
        echo "fallo la coneccion";
    }

    require("modulos/perfil-bio.php");
    require("models/perfil_post_model.php");
    require("modulos/post-view.php");
    require("fund/script.php");
    ?>
</body>

</html>