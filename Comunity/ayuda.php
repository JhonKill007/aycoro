<?php
session_start();
$tittlePage = "Aycoro - Ayuda";
require("../fund/head-comunity.php");
?>

<style>
    .menu {
        width: 100%;
        /* background-color: rgb(252, 79, 79); */
    }

    .menu ul {
        width: 100%;
        margin-top: 0;
        padding: 0;
    }

    .list {
        width: 100%;
        list-style: none;
        height: 45px;
        border-bottom: 5px solid white;
        transition: .7s;
        overflow: hidden;
    }

    .carita {
        display: flex;
        justify-content: space-between;
        padding: 15px;
        background-color: red;
        cursor: pointer;
        color: white;
    }

    .link {
        text-decoration: none;
        color: white;
        margin-top: -5px;
    }

    .fas fa-chevron-down {
        transition: .3s;
    }

    p {
        padding: 10px;
        color: grey;
    }

    .scale {
        height: auto;
    }

    .rotate {
        transform: rotate(180deg);
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
        margin-top: -35px;
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

    .textare {
        width: 100%;
        padding: 10px;
    }

    .boton_help {
        width: 100%;
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

        .form_help {
            width: 100%;
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
        <div class="conteiner-signup" id="contein">
            <h1>Ayuda</h1>
            <div class="menu">
                <ul>
                    <li class="list">
                        <div class="carita">
                            <span class="link">Como me registro?</span><i class="fas fa-chevron-down flecha"></i>
                        </div>
                        <p>El proceso de registro es muy facil solo tienes que
                            completar todos los campos de ese simple formulario, y asi ser parte de nuestra comunidad, que esperas ven y <a href="../signup.php">registrate</a>.
                            <img src="img/SIGNUP.jpeg" alt="">
                        </p>
                    </li>
                    <li class="list">
                        <div class="carita">
                            <span class="link">Como subir un post?</span><i class="fas fa-chevron-down flecha"></i>
                        </div>
                        <p>
                        <div class="parrafoCompa">
                            <div class="duple">
                                <p>
                                    Los post son imagenes que subes a tu muro y que se quedan guardadas en tu perfil y que quienes te siguen pueden ver e interactuar.
                                    <br>
                                    <br>
                                    Para subir un post en Aycoro solo tienes que clikear en el icono de mas que aparece en la pantalla.
                                    <br>
                                    En dispositivos moviles en la parte superior y para PC en la parte inferior izquierda de la pantalla.
                                </p>
                            </div>
                            <div class="duple">
                                <img class="ceo_img" src="img/POST_A.jpeg" alt="">
                                <b class="name">Iconos en pc</b>
                                <img class="ceo_img" src="img/POST_B.jpeg" alt="">
                                <b class="name">Iconos en dispositivos moviles</b>
                            </div>
                            <br>

                        </div>
                        <br>
                        <img class="ceo_img" src="img/RECORTE.png" alt="">
                        <p>
                            Luego recostas la parte que quieres que salga en tu foto y ponerle un comentarios si asi lo deceas,
                            al final clikeas publicar y esperas que carge.
                        </p>
                        </p>
                    </li>
                    <li class="list">
                        <div class="carita">
                            <span class="link">Como subir una historia?</span><i class="fas fa-chevron-down flecha"></i>
                        </div>
                        <p>
                        <div class="parrafoCompa">
                            <div class="duple">
                                <p>
                                    Las historias son imagenes que publicas con una duracion de 24 horas y que solo la pueden ver tus seguidores,
                                    estas se pueden ver en la pagina principal en la parte superior encima de las publicaciones.
                                    <br>
                                    <br>
                                    Para subir una historia en Aycoro solo tienes que clikear en el icono con forma de reloj que aparece en la pantalla.
                                    <br>
                                    En dispositivos moviles en la parte superior y para PC en la parte inferior izquierda de la pantalla.
                                    Ademas el la parte superior si no tienes historias te permitira subir una en el circulo de tu historia.
                                </p>
                            </div>
                            <div class="duple">
                                <img class="ceo_img" src="img/HISTORYa_A.jpeg" alt="">
                                <b class="name">Iconos en pc</b>
                                <img class="ceo_img" src="img/HISTORYa_B.jpeg" alt="">
                                <b class="name">Iconos en dispositivos moviles</b>
                            </div>
                            <br>

                        </div>
                        <br>
                        <img class="ceo_img" src="img/HISTORY_CUT.png" alt="">
                        <p>
                            Luego recostas la parte que quieres que salga en tu historia, clikeas publicar y esperas que carge.
                        </p>
                        </p>
                    </li>
                    <li class="list">
                        <div class="carita">
                            <span class="link">Como puedo recuperar mi cuenta?</span><i class="fas fa-chevron-down flecha"></i>
                        </div>
                        <p>
                            Todos alguna ves hemos olvidado nuestra contraseña de algun sitio web y es un dolor de cabeza cuando no sabemos que hacer.
                            Si olvidas la contraseña de tu cuenta en Aycoro estos son los pasos para recuperar tu cuenta.
                        <div class="parrafoCompa">
                            <div class="duple">
                                <p>

                                    <br>
                                    <br>
                                    1.En la sección de iniciar sesion clikeas donde dice 'Olvidaste tu contraseña?' debajo de recuatro de la contraseña.
                                    <br>
                                    <br>
                                    2.Luego debes colocar el email con el cual te registraste en Aycoro y clikear en envias,
                                    esto enviara un link a tu email donde podras cambiar tu contraseña por una nueva contraseña.
                                    <br>
                                    <br>
                                    3.Abre tu correo y clikeas el link que se ha enviado y restablece tu contraseña,
                                    primero escribe una nueva contraseña y luego confirma esa nueva contraseña.
                                    <br>
                                    <br>

                                </p>
                            </div>
                            <div class="duple">
                                <b class="name">Paso 1</b>
                                <img class="ceo_img" src="img/PASSWORD.png" alt="">
                                <br>
                                <br>
                                <b class="name">Paso 2</b>
                                <img class="ceo_img" src="img/SEND_EMAIL.png" alt="">
                            </div>
                            <br>

                        </div>
                        <br>
                        <b class="name">Paso 3</b>
                        <img class="ceo_img" src="img/RESTABLECER.png" alt="">
                        <p>
                            Al final inicias sesion con tu correo o usuario y tu nueva contraseña.
                        </p>
                        </p>
                    </li>
                    <?php
                    if (isset($_SESSION['id'])) {
                        require("../keys/admin-key.php");
                        $opc = 1;
                    ?>
                        <li class="list">
                            <div class="carita">
                                <span class="link">Solicitar ayuda o reportar un problema</span><i class="fas fa-chevron-down flecha"></i>
                            </div>
                            <p>
                                Envianos un mensaje acerca de tu situacion y te responderemos lo mas rapido posible atraves de la bandeja de mensajeria.
                            <form class="form_help" action="../keys/send-ayudaosug-key.php" method="post">
                                <textarea class="textare" name="mensaje" maxlength="1000" placeholder="Escribe aqui..." name="" id="" cols="30" rows="10"></textarea>
                                <input type="hidden" value="<?php echo $_SESSION['id']; ?>" name="id_sendner">
                                <input type="hidden" value="<?php echo $id_admin; ?>" name="id_reciver">
                                <input type="hidden" value="<?php echo $opc; ?>" name="opc">
                                <br>
                                <button class="btn btn-success boton_help">Enviar</button>
                            </form>
                            </p>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
        <br>
        <?php require("footer-comunity.php") ?>
    </div>
    <script>
        const contein = document.getElementById('contein');

        contein.addEventListener('click', (e) => {
            if (e.target.classList.contains('carita')) {
                e.target.parentElement.classList.toggle('scale')
                e.target.children[1].classList.toggle('rotate')
            }
            if (e.target.classList.contains('link')) {
                var carita = e.target.parentElement;
                carita.parentElement.classList.toggle('scale')
                carita.children[1].classList.toggle('rotate')
            }
            if (e.target.classList.contains('flecha')) {
                var carita = e.target.parentElement;
                carita.parentElement.classList.toggle('scale')
                carita.children[1].classList.toggle('rotate')
            }
        })
    </script>
</body>

</html>