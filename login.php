<?php
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
                        <!-- <a href="index.php"><img id="logo" src="img/logo.png" alt="hola"></a> -->
                        <img id="logo" src="img/Logo.png" alt="">
                        <img id="logo2" src="img/Logo2.png" alt="">
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
                    <h2>Iniciar Session</h2>
                    <div class='error'></div>



                    <!-- formulario -->
                    <form action="keys/log-in-key.php" method="POST" class="form-horizontal formu">

                        <!-- email -->
                        <div class="form-group">
                            <label for="email" class="control-label col-sm-2">
                                Email
                            </label>
                            <div class="col-sm-12">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese su Email" required>
                            </div>
                        </div>

                        <!-- password -->
                        <div class="form-group">
                            <label for="numero" class="control-label col-sm-2">
                                Contraseña
                            </label>
                            <div class="col-sm-12">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Ingrese su Contraseña" required>
                            </div>
                        </div>

                        <!-- boton log in -->
                        <div class="form-group">
                            <div class="col-sm-offset">
                                <button class="btn btn-success col-sm-12 button-log">
                                    Iniciar Sesion
                                </button>
                            </div>
                        </div>

                        <!-- link log -->
                        <div class="links-log">
                            <!-- <a href="">¿Se te olvidó tu contraseña?</a> -->
                            <!-- <br> -->
                            <span>Aun no tengo cuenta</span>

                            <a href="signup"><b>Crear Nueva Cuenta</b></a>
                        </div>
                        <br>



                    </form>
                </div>
            </div>


        </div>
    </div>


    <script src="js/login.js"></script>
    <?php
    // require("modulos/footer-two.php");
    require("fund/script.php");
    ?>
</body>

</html>