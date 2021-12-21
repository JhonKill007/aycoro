<?php
session_start();
if (isset($_SESSION['id'])) {
    header("Location: index");
}
$tittlePage = "Aycoro - Inicia sesion";
require("fund/head.php");
?>



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
                        <a href="login">
                            <img id="logo" src="img/Logo.png" alt="">
                            <img id="logo2" src="img/Logo2.png" alt="">
                        </a>
                    </li>
                </ul>

            </nav>

        </div>


    </div>




    <div class="conteiner">
        <br>
        <br>
        <div class="conteiner-login">
            <!-- caja del formulario -->
            <div class="formu-box">
                <div class="con-box">
                    <h2>Iniciar Sesion</h2>
                    <div class='error'></div>



                    <!-- formulario -->
                    <form action="keys/log-in-key.php" method="POST" class="form-horizontal formu">

                        <!-- email -->
                        <div class="form-group">
                            <label for="email" class="control-label">
                                Email
                            </label>
                            <div>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese su Email" required>
                            </div>
                        </div>

                        <!-- password -->
                        <div class="form-group">
                            <label for="numero" class="control-label">
                                Contraseña
                            </label>
                            <div>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Ingrese su Contraseña" required>
                            </div>
                        </div>

                        <!-- boton log in -->
                        <div class="form-group">
                            <div class="col-sm-offset">
                                <button class="btn btn-success button-log">
                                    Iniciar Sesion
                                </button>
                            </div>
                        </div>

                        <!-- link log -->
                        <div class="links-log">
                            <span>Aun no tengo cuenta</span>
                            <a href="signup"><b>Crear Nueva Cuenta</b></a>
                            <br>
                            <a href="identity"><b>Restablecer Contraseña</b></a>
                        </div>
                        <br>
                    </form>
                </div>
            </div>
        </div>
        <!-- <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6464187088568984" crossorigin="anonymous"></script> -->
        <!-- login y signup -->
        <!-- <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-6464187088568984" data-ad-slot="7758489410" data-ad-format="auto" data-full-width-responsive="true"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script> -->
    </div>


    <script src="js/login.js"></script>
    <?php
    require("fund/script.php");
    ?>
</body>

</html>