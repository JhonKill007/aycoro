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

    <div class="container" id="container">
        <div class="conteiner-login">
            
                <!-- formulario -->
                <form action="keys/log-in-key.php" method="POST" class="form-horizontal formu">

                    <!-- email -->
                    <div class="form-group">
                        <div class="form-container sign-in-container">
                        <div class='error'></div>
                            <form action="#">
                                <h1>Iniciar sesión</h1>
                                <br>
                            <center><input type="email"  id="email" name="email" placeholder="Ingrese su Email" required style="width:300px" > </center> 
                            <center><input type="password"  id="password" name="password" placeholder="Ingrese su Contraseña" required style="width:300px"></center> 
                            <br>

                                    <button class="button-log" style="background-color: grey" >
                                            Iniciar Sesion
                                    </button>
                                    <!-- link log -->
                                    <br><br>
                                    <div class="links-log">
                                        <!-- <a href="">¿Se te olvidó tu contraseña?</a> -->
                                        <!-- <br> -->
                                        <span>Aun no tengo cuenta</span>
                                        <a href="signup"><b>Crear Nueva Cuenta</b></a>
                                    </div>
                                    <br>
                            </form>
                        </div>
                        <div class="overlay-container">
                            <div class="overlay">
                                <div class="overlay-panel overlay-right">
                                    <h1>Hello, Friend!<br>Aycoro</h1>
                                    <p>Ingrese sus datos personales y haga un coro con nosotros </p>
                                    <!-- <a href="signup">
                                        <button class="ghost">Registrate</button>
                                    </a>  -->
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
        </div>
	</div>

    <script src="js/login.js"></script>
    <?php
    require("fund/script.php");
    ?>
</body>

</html>
