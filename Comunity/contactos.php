<?php
session_start();
$tittlePage = "Aycoro - Contactos";
require("../fund/head-comunity.php");
?>


<style>
    .logo_conta {
        background-color: red;
        border-radius: 15px;
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
            <div class="con-box">
                <img class="logo_conta" src="../img/Logo.png" alt="">
            </div>
            <h3>Contactos</h3>
            <p>Si quieres cotactarnos puedes hacerlo atraves de estos emails:</p>
            <b>adminaycoro@aycoro.com</b>
            <br>
            <b>aycoro.com@gmail.com</b>
            <br>
            <br>
        </div>
        <?php require("footer-comunity.php") ?>
    </div>
</body>

</html>