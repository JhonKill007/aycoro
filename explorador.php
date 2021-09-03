<?php
require("fund/head.php");
?>



<body>

    <?php
    require("modulos/nav.php");
    require("modulos/nav-two.php");

    ?>

    <div class="conteiner">
        <div class="search-perfiles">
            <h1>Explorador</h1>
            <div class="display">
                <?php




                $eso = require("keys/conection.php");
                if ($eso) {
                    $SELECT = "SELECT * FROM registro WHERE id_registro != $id ORDER BY rand() LIMIT 5";
                    $resultado = mysqli_query($conn, $SELECT);
                    if ($resultado) {
                        // echo "query 2";
                        // require("modulos/etiquetas.php");
                        while ($usu = $resultado->fetch_array()) {
                            $id_usu = $usu['id_registro'];
                            $nombre_usu = $usu['nombre'];
                            $apellido_usu = $usu['apellido'];
                            $foto_usu = $usu['foto'];
                ?>

                            <a href="perfil-reciver?usu=<?php echo $id_usu; ?>">
                                <div class="info-busque">
                                    <div class="search-perfil-box">
                                        <img src=<?php echo $foto_usu; ?> alt="">
                                    </div>
                                    <h5><?php echo $nombre_usu . " " . $apellido_usu; ?></h5>
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










    <?php
    require("modulos/post-view-explorer.php");
    require("modulos/footer.php");
    require("fund/script.php");
    ?>
</body>

</html>