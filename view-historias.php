<?php
session_start();
if (isset($_COOKIE["IgtX9000"])) {
    $_SESSION['id'] = $_COOKIE["IgtX9000"];
}
if (!isset($_SESSION['id'])) {
    header("Location: login");
} else {
    require('keys/identification.php');
    $tittlePage = "Aycoro - Historias";
    require("fund/head.php");


    $publicaciones = array(0);
    $personas = array(0);
    $photo_historys = array(0);
    $fecha_hystorys = array(0);
    $hora_hystorys = array(0);
    $id_hystorys = array(0);


    $id_foto_position = $_GET['history'];
    $position = $_GET['position'];
    $identity_history = $_GET['identity'];

?>
    <script>
        let photo_position = <?php echo $id_foto_position; ?>;
        let item_position = <?php echo $position; ?>;
        let identity_history = <?php echo $identity_history; ?>;



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

        let time_time = formatoFecha(time_date_today, 'dd-mm-yyyy');
    </script>
<?php
}
?>
<style>
    @media (max-width: 1120px) {
        .conteiner {
            margin-top: 100px;
        }
    }
</style>

<body class="body_hystorys">
    <?php
    $id_registro = $registro['id_registro'];
    $eso = require("keys/conection.php");
    if ($eso) {
        if ($identity_history == 1) {

            $SELECT = "SELECT * FROM history 
            WHERE date >= NOW() - INTERVAL 1 DAY 
            AND id_owner = $id_registro ORDER BY id_history Desc";

            $resultado = mysqli_query($conn, $SELECT);
        } else {

            $SELECT = "SELECT * FROM history 
            inner join folow on history.id_owner  = folow.id_folowing
            WHERE date >= NOW() - INTERVAL 1 DAY 
            AND id_owner != $id_registro 
            AND folow.id_folower='$id_registro' 
            ORDER BY id_history Desc";

            $resultado = mysqli_query($conn, $SELECT);
        }
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
    ?>
            <script>
                let cant_of_perfiles = <?php echo $posiciones; ?>;
            </script>
            <?php
            $items = $personas[$position];
            ?>
            <script>

            </script>
            <?php
            if ($items != 0) {
                if ($eso) {

                    $SELECT = "SELECT * FROM history 
                    inner join registro on history.id_owner=registro.id_registro 
                    where history.id_owner = $items 
                    AND date >= NOW() - INTERVAL 1 DAY";

                    $resultado = mysqli_query($conn, $SELECT);
                    if ($resultado) {
                        while ($usu = $resultado->fetch_array()) {
                            $id_usu = $usu['id_registro'];
                            $nombre_usu = $usu['nombre'];
                            $history = $usu['photo'];
                            $id_history = $usu['id_history'];
                            $user_usu = $usu['usuario'];
                            $perfil = $usu['foto'];
                            $fecha_date_history = $usu['day'];
                            $hora = $usu['hour'];


                            array_push($photo_historys, $history);
                            array_push($fecha_hystorys, $fecha_date_history);
                            array_push($hora_hystorys, $hora);
                            array_push($id_hystorys, $id_history);
                        }

                        $number_img_historys = count($photo_historys);
            ?>
                        <script>
                            let cant_of_historys = <?php echo $number_img_historys; ?>;

                            // fechas
                            let fecha_hystory = "<?php echo $fecha_hystorys[$id_foto_position]; ?>";
                            let hora = "<?php echo $hora_hystorys[$id_foto_position]; ?>";
                            console.log(fecha_hystory);
                        </script>



                        <div class="conteiner view-history-conteiner">
                            <div class="conteiner-view-historys">
                                <a href="index">
                                    <div class="box-close">
                                        <i class="fas fa-window-close"></i>
                                    </div>
                                </a>
                                <?php
                                if ($id_usu == $registro['id_registro']) {
                                ?>
                                    <a href="perfil">
                                        <div class="perfil_circle">
                                            <div class="perfil_circle_img_box">
                                                <img src=<?php echo $perfil; ?> alt="">
                                            </div>
                                            <div class="perfil_circle_name_box">
                                                <b><?php echo $user_usu; ?></b>
                                                <p class="p_fecha"></p>
                                            </div>
                                        </div>
                                    </a>
                                <?php
                                } else {
                                ?>
                                    <a href="user?user=<?php echo $user_usu; ?>">
                                        <div class="perfil_circle">
                                            <div class="perfil_circle_img_box">
                                                <img src=<?php echo $perfil; ?> alt="">
                                            </div>
                                            <div class="perfil_circle_name_box">
                                                <b><?php echo $user_usu; ?></b>
                                                <p class="p_fecha"></p>
                                            </div>
                                        </div>
                                    </a>
                                <?php
                                    $id_history_now = $id_hystorys[$id_foto_position];
                                    GuardarViews($id_history_now, $items, $registro['id_registro']);
                                }

                                ?>
                                <script>
                                    if (fecha_hystory == time_time) {
                                        const p_fecha = document.querySelector(".p_fecha");
                                        p_fecha.innerHTML = hora;

                                    } else {
                                        const p_fecha = document.querySelector(".p_fecha");
                                        p_fecha.innerHTML = "Ayer " + hora;
                                    }







                                    function atras() {
                                        photo_position--;
                                        if (photo_position > 0) {
                                            window.location = 'view-historias?history=' + photo_position + '&position=' + item_position + '&identity=' + identity_history + '';
                                        } else {
                                            item_position--;
                                            if (item_position > 0) {
                                                photo_position = 1;
                                                window.location = 'view-historias?history=' + photo_position + '&position=' + item_position + '&identity=' + identity_history + '';

                                            } else {
                                                photo_position++;
                                                item_position++;
                                            }
                                        }
                                    }

                                    function adelante() {
                                        photo_position++;
                                        if (photo_position < cant_of_historys) {
                                            window.location = 'view-historias?history=' + photo_position + '&position=' + item_position + '&identity=' + identity_history + '';
                                        } else {
                                            item_position++;
                                            if (item_position < cant_of_perfiles) {
                                                photo_position = 1;
                                                window.location = 'view-historias?history=' + photo_position + '&position=' + item_position + '&identity=' + identity_history + '';

                                            } else {
                                                window.location = 'index';
                                            }
                                        }
                                    }



                                    var timeoutID;
                                    timeoutID = window.setTimeout(adelante, 5000);

                                    function clearAlert() {
                                        window.clearTimeout(timeoutID);
                                    }

                                    function countAgain() {
                                        timeoutID = window.setTimeout(adelante, 5000);
                                    }
                                </script>

                                <div class="atras botones" onclick="atras()">
                                    <i class="fas fa-chevron-left"></i>
                                </div>

                                <div class="adelante botones" onclick="adelante()">
                                    <i class="fas fa-chevron-right"></i>
                                </div>


                                <div class="img-history-view">
                                    <img src=<?php echo $photo_historys[$id_foto_position]; ?> alt="">
                                </div>
                                <?php
                                if ($id_usu == $registro['id_registro']) {
                                ?>
                                    <div class="up-vistas">
                                        <div class="up-vistas-icon" onclick="clearAlert()">
                                            <i class="fas fa-chevron-up"></i>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>

                            </div>

                        </div>
                        <div class="conteiner count-history-conteiner">
                            <div class="conteiner-view-historys">
                                <div class="up-vistas_two">
                                    <div class="up-vistas-icon_two" onclick="countAgain()">
                                        <i class="fas fa-chevron-down"></i>
                                    </div>
                                </div>
                                <div class="img-history-view">
                                    <div class="eye-count-views">
                                        <?php
                                        $id_history_now = $id_hystorys[$id_foto_position];
                                        $cant_result = CantViews($id_history_now);
                                        ?>
                                        <i class="fas fa-eye"></i><b><?php echo $cant_result; ?></b>
                                    </div>

                                    <?php
                                    PersonsView($id_history_now);
                                    ?>

                                </div>
                            </div>

                        </div>

                        <?php require("ads/historias_view_Ads.php") ?>
    <?php

                    
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
    <script src="js/history.js"></script>
</body>

</html>

<?php
function GuardarViews($id_history, $id_owner, $id_viewer)
{
    $eso = require("keys/conection.php");
    if ($eso) {

        $SELECT = "SELECT * FROM view_historys 
        where id_history = $id_history 
        AND id_owner = $id_owner AND id_viewer = $id_viewer";

        $resultado = mysqli_query($conn, $SELECT);
        $cant_result = $resultado->num_rows;
        if ($cant_result < 1) {

            $INSERT = "INSERT INTO 
            view_historys (id_history,id_owner,id_viewer,date_view)
            values('$id_history','$id_owner','$id_viewer',NOW())";

            $resultado = mysqli_query($conn, $INSERT);
            if ($resultado) {
                return "Todo Correcto";
            } else {
                return "No funciono";
            }
        }
    } else {
        return "No funciono la conneccion";
    }
}


function CantViews($id_history)
{
    $eso = require("keys/conection.php");
    if ($eso) {
        $SELECT = "SELECT * FROM view_historys where id_history = $id_history";
        $resultado = mysqli_query($conn, $SELECT);
        $cant_result = $resultado->num_rows;
        return $cant_result;
    } else {
        return "No funciono la conneccion";
    }
}


function PersonsView($id_history)
{
    $eso = require("keys/conection.php");
    if ($eso) {

        $SELECT = "SELECT * FROM view_historys 
        inner join registro on view_historys.id_viewer=registro.id_registro 
        where view_historys.id_history = $id_history ";

        $resultado = mysqli_query($conn, $SELECT);
        if ($resultado) {
            while ($personView = $resultado->fetch_array()) {
                $id_usu = $personView['id_registro'];
                $nombre_usu = $personView['nombre'];
                $user_usu = $personView['usuario'];
                $perfil = $personView['foto'];
?>
                <a href="user?user=<?php echo $user_usu; ?>" class="a_count_view">
                    <div class="person_count">
                        <div class="perfil_cont">
                            <img src=<?php echo $perfil; ?> alt="">
                        </div>
                        <div class="name_count">
                            <b><?php echo $user_usu; ?></b>
                        </div>
                    </div>
                </a>
<?php
            }
        }
    } else {
        return "No funciono la conneccion";
    }
}




?>