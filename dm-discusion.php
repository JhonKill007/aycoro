<?php
$tittlePage = "Aycoro - Chat";
require("fund/head.php");



?>

<style>
    @media (max-width: 1120px) {
        .barra-inicio-new {
            height: 140px;
        }

        .nav-main {
            height: 140px;
        }

        .container-one {
            margin-top: -40px;
            height: 140px;
        }
    }

    @media (max-width: 414px) {
        .conteiner {
            width: 100%;
        }
    }
</style>

<body>

    <?php
    require("modulos/nav.php");
    require("modulos/nav-two.php");
    require("modulos/photo_edit.php");
    require("modulos/status-post.php");

    $id_sus = $_GET['usu'];

    // require("keys/usu.php");


    $eso = require("keys/conection.php");
    if ($eso) {
        $SELECT = "SELECT * FROM event inner join registro on event.id_owner=registro.id_registro where event.id_owner = $id_sus";
        $resultado = mysqli_query($conn, $SELECT);
        if ($resultado) {
            // echo "query 2";
            // require("modulos/etiquetas.php");
            while ($usu = $resultado->fetch_array()) {
                $id_disc =  $usu['id_event'];
                $id_usu = $usu['id_registro'];
                $nombre_usu = $usu['nombre'];
                $apellido_usu = $usu['apellido'];
                $photo = $usu['photo'];
                $id_owner_disc = $usu['id_owner'];
            }
        }
    }
    ?>




    <div class="conteiner">

        <div class="conteiner-chat-box">
            <div class="wrapper">
                <section class="chat-area">
                    <header>
                        <?php
                        // require("php/config.php");
                        // $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);

                        // $SELECT = "SELECT * FROM users WHERE unique_id = '$user_id'";
                        // $resultado = mysqli_query($conn, $SELECT);
                        // if ($resultado) {
                        //     $cht = $resultado->fetch_array();
                        // }

                        ?>
                        <a href="discusion" class="back-icon"><i class="fas fa-arrow-left"></i></a>
                        <a href="perfil-reciver?usu=<?php echo $id_usu; ?>">
                            <img src=<?php echo $photo; ?> alt="">
                        </a>
                        <div class="details">
                            <a href="perfil-reciver?usu=<?php echo $id_usu; ?>">
                                <span>Discucion de: <?php echo $nombre_usu . " " . $apellido_usu; ?></span>
                                <?php
                                if ($id_owner_disc  == $_SESSION['id']) {
                                ?>
                                    <a class="icon-dm" href="keys/delete-disc-key.php?id_disc=<?php echo $id_disc; ?>"><i class="fas fa-trash-alt"></i></a>
                                <?php
                                }
                                ?>
                            </a>
                            <!-- <p><?php echo $cht['status']; ?></p> -->
                        </div>
                    </header>
                    <div class="chat-box">


                    </div>
                    <form action="" method="post" class="typing-area">
                        <input type="hidden" value="<?php echo $id; ?>" name="id_sendner">
                        <input type="hidden" value="<?php echo $id_disc; ?>" name="id_disc">
                        <input type="hidden" value="" name="time" id="time_mjs">
                        <input type="text" class="input-field" name="mensaje" placeholder="Escribe Aqui" maxlength="1000">
                        <!-- <textarea name="mensaje" class="input-field" id="" cols="110" rows="2" placeholder="Type a message here."></textarea> -->
                        <button><i class="fab fa-telegram-plane"></i></button>
                    </form>
                </section>
            </div>
        </div>
    </div>
    <script>
        const time_mjs = Intl.DateTimeFormat().resolvedOptions().timeZone;
        document.getElementById("time_mjs").value = time_mjs;
    </script>
    <script src="js/chat-discusion.js"></script>
    <?php
    require("fund/script.php");
    ?>
</body>

</html>