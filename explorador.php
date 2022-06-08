<?php
require("modulos/session.php");
$tittlePage = "Aycoro - Explorador";
require("fund/head.php");
?>

<style>
    .container-scroll {
        margin-top: -200px;
    }

    @media (max-width: 1120px) {

        .container-scroll {
            margin-top: -250px;
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
        // require("modulos/nav-two.php");
        require("modulos/status-post.php");

        ?>

        <div class="conteiner">
            <div class="search-perfiles">
                <h1>Explorador</h1>
                <div class="display">
                    <?php

                    $eso = require("keys/conection.php");
                    if ($eso) {
                        $SELECT = "SELECT * FROM registro WHERE id_registro != $id ORDER BY rand() LIMIT 4";
                        $resultado = mysqli_query($conn, $SELECT);
                        if ($resultado) {
                            while ($usu = $resultado->fetch_array()) {
                                $id_usu = $usu['id_registro'];
                                $nombre_usu = $usu['nombre'];
                                $foto_usu = $usu['foto'];
                                $user_usu = $usu['usuario'];
                    ?>

                                <a href="user?user=<?php echo $user_usu; ?>">
                                    <div class="info-busque">
                                        <div class="search-perfil-box">
                                            <img src=<?php echo $foto_usu; ?> alt="">
                                        </div>
                                        <div class="user-info-busque">
                                            <span><?php echo $user_usu; ?></span>
                                        </div>
                                    </div>
                                </a>
                    <?php
                            }
                        }
                        if ($resultado = 0) {
                            echo "No se han encontrado resultados para tu búsqueda";
                        }
                    } else {
                        echo "la coneccion fallo";
                    }



                    ?>



                </div>
            </div>
        </div>

        <br>
        <br>
        <br>
        <br>

        <?php
        // require("models/explorer_post_model.php");
        require("modulos/post-view.php");
        require("fund/script.php");
        ?>
        <script>
            window.onload = async function() {
                this.loadItems(<?php echo $_SESSION['id']; ?>, <?php echo $_SESSION['id']; ?>);
            };
        </script>

    </div>

</body>

</html>