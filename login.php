<?php
session_start();
if (isset($_SESSION['id'])) {
    header("Location: index");
}
$tittlePage = "Aycoro - Inicia sesion";
require("fund/head.php");
?>

<style>
    .timer_conteiner {
        width: 100%;
        /* height: 100px; */

    }

    .reloj {
        width: 100%;
        /* height: 100px; */
        display: flex;
        justify-content: space-between;
        /* border: 1px solid black; */
    }

    .letter_conteiner {
        width: 100%;
        /* height: 25px; */
        /* margin-top: -30px; */
        display: flex;
        justify-content: space-between;
        /* border: 1px solid black; */
    }

    .visores {
        /* margin: auto; */
        width: 20%;
        height: 50px;
        background-color: white;
        text-align: center;
        border-radius: 5px;
    }

    .names_reloj {
        margin: auto;
        width: 20%;
        /* height: 20px; */
        text-align: center;
        border-radius: 5px;
    }

    body,
    html {
        overflow-y: hidden;
        overflow-x: hidden;

        background: url("img/background.jpg") no-repeat center center/cover;
        /* background: url("img/background-27defebrero-version.jpg") no-repeat center center/cover; */
    }

    /* body { */
    /* } */

    #tittle {
        text-align: center;
    }

    .particula {
        width: 8px;
        height: 8px;
        background: black;
        border-radius: 50%;
        position: absolute;
    }

    .particula[data-padre="false"] {
        width: 5px;
        height: 5px;
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
        <!-- <br> -->
        <div class="conteiner-login">
            <h5 id="tittle">Cuenta regresiva lanzamiento Aycoro.com</h5>
            <div class="formu-box">
                <div class="con-box">
                    <div class="timer_conteiner">
                        <div class="reloj">
                            <div class="visores">
                                <h1 id="days"></h1>
                            </div>
                            <div class="visores">
                                <h1 id="hours"></h1>
                            </div>
                            <div class="visores">
                                <h1 id="minutes"></h1>
                            </div>
                            <div class="visores">
                                <h1 id="seconds"></h1>
                            </div>
                        </div>
                        <div class="letter_conteiner">
                            <div class="names_reloj"><b>Dias</b></div>
                            <div class="names_reloj"><b>Horas</b></div>
                            <div class="names_reloj"><b>Minutos</b></div>
                            <div class="names_reloj"><b>Segundos</b></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
                                Usuario
                            </label>
                            <div>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Teléfono, usuario o correo electrónico" required>
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
        <br>
        <br>

        <!-- <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6464187088568984" crossorigin="anonymous"></script> -->
        <!-- login y signup -->
        <!-- <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-6464187088568984" data-ad-slot="7758489410" data-ad-format="auto" data-full-width-responsive="true"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script> -->
    </div>

    <!-- <div class="particula" data-velocidad="0" /> -->


    <script src="js/login.js"></script>
    <script src="js/fireworks.js"></script>
    <?php
    require("fund/script.php");
    ?>
</body>

</html>

<script>
    //===
    // VARIABLES
    //===
    const DATE_TARGET = new Date('1/23/2022 7:00 PM');
    // const DATE_TARGET = new Date('12/25/2021 7:17 PM');
    // DOM for render
    const h1_DAYS = document.querySelector('h1#days');
    const h1_HOURS = document.querySelector('h1#hours');
    const h1_MINUTES = document.querySelector('h1#minutes');
    const h1_SECONDS = document.querySelector('h1#seconds');
    // Milliseconds for the calculations
    const MILLISECONDS_OF_A_SECOND = 1000;
    const MILLISECONDS_OF_A_MINUTE = MILLISECONDS_OF_A_SECOND * 60;
    const MILLISECONDS_OF_A_HOUR = MILLISECONDS_OF_A_MINUTE * 60;
    const MILLISECONDS_OF_A_DAY = MILLISECONDS_OF_A_HOUR * 24

    //===
    // FUNCTIONS
    //===

    /**
     * Method that updates the countdown and the sample
     */
    function updateCountdown() {
        // Calcs
        const NOW = new Date()
        const DURATION = DATE_TARGET - NOW;
        const REMAINING_DAYS = Math.floor(DURATION / MILLISECONDS_OF_A_DAY);
        const REMAINING_HOURS = Math.floor((DURATION % MILLISECONDS_OF_A_DAY) / MILLISECONDS_OF_A_HOUR);
        const REMAINING_MINUTES = Math.floor((DURATION % MILLISECONDS_OF_A_HOUR) / MILLISECONDS_OF_A_MINUTE);
        const REMAINING_SECONDS = Math.floor((DURATION % MILLISECONDS_OF_A_MINUTE) / MILLISECONDS_OF_A_SECOND);
        // Thanks Pablo Monteserín (https://pablomonteserin.com/cuenta-regresiva/)

        // Render
        // dias
        if (REMAINING_DAYS < 1) {
            h1_DAYS.textContent = "00";
        } else {
            if (REMAINING_DAYS < 10) {
                h1_DAYS.textContent = "0" + REMAINING_DAYS;
            } else {
                h1_DAYS.textContent = REMAINING_DAYS;
            }
        }

        // horas
        if (REMAINING_HOURS < 1) {
            h1_HOURS.textContent = "00";
        } else {
            if (REMAINING_HOURS < 10) {
                h1_HOURS.textContent = "0" + REMAINING_HOURS;

            } else {
                h1_HOURS.textContent = REMAINING_HOURS;
            }
        }

        // minutos
        if (REMAINING_MINUTES < 1) {
            h1_MINUTES.textContent = "00";
        } else {
            if (REMAINING_MINUTES < 10) {
                h1_MINUTES.textContent = "0" + REMAINING_MINUTES;
            } else {
                h1_MINUTES.textContent = REMAINING_MINUTES;
            }
        }

        // segundos
        if (REMAINING_SECONDS < 1) {
            h1_SECONDS.textContent = "00";
        } else {
            if (REMAINING_SECONDS < 10) {
                h1_SECONDS.textContent = "0" + REMAINING_SECONDS;
            } else {
                h1_SECONDS.textContent = REMAINING_SECONDS;
            }
        }

        if (REMAINING_DAYS == 0 && REMAINING_HOURS == 0 && REMAINING_MINUTES == 0 && REMAINING_SECONDS == 0) {
            fireworks();
        }

    }

    //===
    // INIT
    //===
    updateCountdown();
    // Refresh every second
    setInterval(updateCountdown, MILLISECONDS_OF_A_SECOND);
</script>