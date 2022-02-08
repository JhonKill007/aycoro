<?php
$usuario_usu = $_GET['user'];
require("keys/usu.php");

$tittlePage = "Aycoro - " . $usuario_usu;
require("fund/head.php");

?>


<style>
    .container-scroll {
        margin-top: -60px;
    }

    @media (max-width: 1120px) {

        .container-scroll {
            margin-top: -110px;
        }
    }

    @media (max-width: 500px) {

        .container-scroll {
            margin-top: -230px;
        }
    }

    .buton_registra_user {
        width: 98px;
        margin: auto;
    }
</style>

<body>
    <div id="contenedo_carca" class="charger">
        <div id="carga"></div>
    </div>
    <div class="body_center">
        <?php
        require("modulos/nav.php");
        require("modulos/nav-two.php");
        require("modulos/status-post.php");


        require("modulos/perfil-bio-reciver.php");

        if (isset($_SESSION['id'])) {
            require("models/user_post_model.php");
            require("modulos/post-view.php");
        } else {
        ?>
            <div class="conteiner">
                <br>
                <div class="container-scroll">
                    <!-- <div class="publicacion-text"> -->
                    <div class="piecera">
                        <div class="estado_lettle">
                            <!-- <p id="stado<?php echo $id_post; ?>"><?php echo $estado_post; ?></p> -->
                            <h6>Registrate para que puedas ver todas sus fotos, seguir a la persona que quieras y conversar con ella.</h6>
                        </div>
                        <div class="buton_registra_user">
                            <button class="btn btn-primary">Registrate</button>
                        </div>
                    </div>
                    <!-- </div> -->
                </div>
            </div>
            <br>
            <br>
            <?php require("modulos/footer-blog.php")?>
        <?php
        }
        require("fund/script.php");
        ?>
    </div>
</body>

</html>