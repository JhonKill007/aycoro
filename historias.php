<?php
$tittlePage = "Aycoro - Historias";
require("fund/head.php");
require("modulos/nav.php");
require("modulos/nav-two.php");
require("modulos/photo_edit.php");
require("modulos/status-post.php");


$publicaciones = array(0);
$personas = array(0);


?>



<body>

    <div class="conteiner">
        <div class="search-perfiles">
            <h1>Historias</h1>
            <div class="display-event">
                <?php
                $eso = require("keys/conection.php");
                if ($eso) {
                    $SELECT = "SELECT * FROM event ORDER BY id_history Desc";
                    $resultado = mysqli_query($conn, $SELECT);
                    if ($resultado) {
                        while ($usu = $resultado->fetch_array()) {
                            $id_usu = $usu['id_owner'];
                            array_push($publicaciones, $id_usu);
                        }
                        $filtrados =  (array_unique($publicaciones));
                        foreach ($filtrados as $item) {
                            if ($item != 0) {
                                array_push($personas, $item);
                            }
                        }
                        $posiciones = count($personas);
                        for ($i = 0; $i < $posiciones; $i++) {
                            $items = $personas[$i];
                            if ($items != 0) {
                                if ($eso) {
                                    $SELECT = "SELECT * FROM event inner join registro on event.id_owner=registro.id_registro where event.id_owner = $items ORDER BY event.id_history DESC";
                                    $resultado = mysqli_query($conn, $SELECT);
                                    if ($resultado) {
                                        if ($usu = $resultado->fetch_array()) {
                                            $id_usu = $usu['id_registro'];
                                            $nombre_usu = $usu['nombre'];
                                            $apellido_usu = $usu['apellido'];
                                            $photo = $usu['photo'];
                                            $id_history = $usu['id_history'];
                                            $init = 1;
                ?>
                                            <script>
                                                const time_date_today = new Date();
                                                time_date_today.toLocaleDateString();


                                                function formatoFecha(fecha, formato) {
                                                    const map = {
                                                        dd: fecha.getDate(),
                                                        mm: fecha.getMonth() + 1,
                                                        yy: fecha.getFullYear().toString().slice(-2),
                                                        yyyy: fecha.getFullYear()
                                                    }

                                                    return formato.replace(/dd|mm|yyyy/gi, matched => map[matched])
                                                }

                                                let time_last_date = formatoFecha(time_date_today, 'dd-mm-yyyy');



                                                function send() {
                                                    window.location = 'view-historias?history=<?php echo $init; ?>&position=<?php echo $i; ?>&time=' + time_last_date + '';
                                                }
                                            </script>
                                            <div class="info-busque-event" onclick="send()">
                                                <!-- <a href="dm-discusion?usu=<?php echo $id_usu; ?>"> -->
                                                <img src=<?php echo $photo; ?> alt="">

                                                <div>
                                                    <?php
                                                    if ($id_usu == $registro['id_registro']) {
                                                    ?>
                                                        <a href="perfil">
                                                            <h5 class="nombredisc"><?php echo $nombre_usu . " " . $apellido_usu; ?></h5>
                                                        </a>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <a href="perfil-reciver?usu=<?php echo $id_usu; ?>">
                                                            <h5 class="nombredisc"><?php echo $nombre_usu . " " . $apellido_usu; ?></h5>
                                                        </a>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                                <!-- </a> -->
                                            </div>
                                            <script>
                                                

                                                // var tope = 0;
                                                // var intervalo;
                                                // intervalo();
                                                // function mensaje() {

                                                //     console.log("hola desde javascript");
                                                //     tope++;
                                                //     if (tope >= 10) {
                                                //         clearInterval(intervalo);
                                                //     }
                                                // }

                                                // function intervalo() {

                                                //     intervalo = setInterval(mensaje, 1000);

                                                // }
                                            </script>
                <?php
                                        }
                                    }
                                }
                            }
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
    require("fund/script.php");
    ?>
</body>

</html>