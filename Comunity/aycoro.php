<?php
$tittlePage = "Aycoro Network";
require("../fund/head-comunity.php");
?>

<style>
    .logo_netwok {
        background-color: red;
        border-radius: 15px;
    }

    .ceo_img {
        width: 100%;
    }

    .name {
        font-size: 13px;
    }

    .parrafoCompa {
        width: 100%;
        display: flex;
        justify-content: space-between;
    }

    .duple {
        width: 49%;
    }

    .snine {
        background-color: rgb(93, 158, 241);
        border-radius: 15px;
    }

    .mango1 {
        display: none;
        text-align: right;
    }

    .mango2 {
        text-align: right;
    }

    .logo_hist {
        background-color: red;
        border-radius: 15px;
    }

    @media (max-width: 600px) {
        .ceo_img {
            width: 100%;
        }

        .parrafoCompa {
            display: block;
        }

        .duple {
            width: 100%;
        }

        .mango1 {
            display: block;
        }

        .mango2 {
            display: none;
        }
    }
</style>

<body>
    <div id="contenedo_carca" class="charger">
        <div id="carga"></div>
    </div>

    <div class="container-one">

        <!-- new barra -->
        <div class="barra-inicio-new">
            <!-- componentes -->
            <nav class="nav-main">
                <ul>
                    <li>
                        <!-- logo -->
                        <a href="../index">
                            <img id="logo" src="../img/Logo.png" alt="">
                            <img id="logo2" src="../img/Logo2.png" alt="">
                        </a>
                    </li>
                </ul>

            </nav>

        </div>


    </div>




    <div class="conteiner">
        <div class="conteiner-signup">
            <div class="logo_netwok">
                <img src="../img/Logo.png" alt="">
            </div>
            <br>
            <div class="con-box">
                <h2>Aycoro Network</h2>
                <div class="parrafoCompa">
                    <div class="duple">
                        <p>
                            Es una red social en forma de aplicación web multiplataforma, que permite compartir publicaciones de imágenes y texto, en un muro donde tus seguidores pueden interactuar con dichas publicaciones a través de comentarios y likes, además de tener un chat en el que puedes intercambiar mensajes entre usuarios y compartir historias diarias de 24 horas de duración.
                            <br>
                            <br>
                            Dicha red social usa la modalidad de seguidores, en la cual un usuario puede seguir otro usuario para tener acceso a sus publicaciones e historias pudiendo otro usuario seguirlo también.
                        </p>
                    </div>
                    <div class="duple">
                        <img class="ceo_img logo_netwok" src="../img/Logo2.png" alt="">
                        <b class="name">Logo Aycoro</b>
                    </div>
                    <br>

                </div>
                <br>
            </div>
        </div>
        <br>
        <?php require("footer-comunity.php") ?>
    </div>
</body>

</html>