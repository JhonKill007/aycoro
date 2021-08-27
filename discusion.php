<?php
require("fund/head.php");
require("modulos/nav.php");
require("modulos/nav-two.php");

?>



<body>

    <div class="conteiner">
        <div class="search-perfiles">
            <h1>Discuciones</h1>
            <div class="display-event">
                <?php




                $eso = require("keys/conection.php");
                if ($eso) {
                    $SELECT = "SELECT * FROM event inner join registro on event.id_owner=registro.id_registro ORDER BY rand()";
                    $resultado = mysqli_query($conn, $SELECT);
                    if ($resultado) {
                        // echo "query 2";
                        // require("modulos/etiquetas.php");
                        while ($usu = $resultado->fetch_array()) {
                            $id_usu = $usu['id_registro'];
                            $nombre_usu = $usu['nombre'];
                            $apellido_usu = $usu['apellido'];
                            $photo = $usu['photo'];
                ?>

                            <div class="info-busque-event">
                                <a href="dm-discucion?usu=<?php echo $id_usu; ?>">
                                    <img src=<?php echo $photo; ?> alt="">

                                    <div><a href="perfil-reciver?usu=<?php echo $id_usu; ?>">
                                            <h5 class="nombredisc"><?php echo $nombre_usu . " " . $apellido_usu; ?></h5>
                                        </a></div>
                                    <!-- </a> -->
                            </div>
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
    require("modulos/footer.php");
    require("fund/script.php");
    ?>
</body>

</html>