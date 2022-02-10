<?php
$tittlePage = "Aycoro - No recuerdo mi Contraseña";
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
        <div class="conteiner-signup">
            <div class="con-box">
                <h2>Recuperar Cuenta</h2>
                <label><b>Has olvidado la contraseña de tu cuenta?</b> <br>
                    Esta bien, puedes recuperar tu cuenta, <br>
                    Enviaremos un link de recuperacion al email que tienes enlazado a tu cuenta.
                </label>
                <div class='error'></div>
                <hr>

                <form action="" method="POST" class="form-horizontal formulario_identity">
                    <!-- nombre -->
                    <div class="form-group">


                        <div class="">
                            <div class=" email-box">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" maxlength="50" required>
                            </div>
                        </div>
                        <br>



                        <!-- boton sign up -->
                        <div class="btn-box form-group">
                            <div class="col-sm-offset">
                                <button class="btn btn-success  button-identity">
                                    Enviar
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="links-log">
                        <!-- <a href="">¿Se te olvidó tu contraseña?</a> -->
                        <!-- <br> -->
                        <!-- <span>Volver</span> -->

                        <a href="login.php"><b>Volver Atras</b></a>
                    </div>
                </form>
                <br>
            </div>
        </div>
        <?php require("ads/login_signup_Ads.php") ?>

    </div>


    <script src="js/identity.js?<?php echo $version; ?>"></script>
    <?php
    require("fund/script.php");
    ?>
</body>

</html>