<?php
$tittlePage = "Aycoro - Busqueda";
require("fund/head.php");
require("modulos/session.php");
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
            <div class="search-perfiles">
                <h1>Busqueda</h1>
                <div class="display">
                    <?php



                    $word = $_GET['search-box'];
                    // echo $word.$categoria;

                    $eso = require("keys/conection.php");
                    if ($eso) {
                        if (!empty($word)) {
                            $SELECT = "SELECT * FROM registro WHERE (nombre LIKE '%$word%') OR (usuario LIKE '%$word%')";
                            $resultado = mysqli_query($conn, $SELECT);
                            if ($resultado) {
                                // echo "query 2";
                                // require("modulos/etiquetas.php");
                                while ($usu = $resultado->fetch_array()) {
                                    $id_usu = $usu['id_registro'];
                                    $nombre_usu = $usu['nombre'];
                                    $foto_usu = $usu['foto'];
                                    $user_usu = $usu['usuario'];

                                    if ($id_usu == $_SESSION['id']) {
                    ?>

                                        <a href="perfil">
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
                                    } else {
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
                            }
                            if ($resultado = 0) {
                                echo "No se han encontrado resultados para tu búsqueda";
                            }
                        } else {
                            echo "No se han encontrado resultados para tu búsqueda";
                        }
                    } else {
                        echo "la coneccion fallo";
                    }


                    ?>



                </div>
            </div>
        </div>

        <?php
        require("fund/script.php");
        ?>
    </div>
</body>

</html>