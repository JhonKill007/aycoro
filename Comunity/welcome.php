<?php
session_start();
$tittlePage = "Aycoro - Wellcome";
require("../fund/head-comunity.php");
$name = $_GET['name'];
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
                        <a href="../login">
                            <img id="logo" src="../img/Logo.png" alt="">
                            <img id="logo2" src="../img/Logo2.png" alt="">
                        </a>
                    </li>
                </ul>

            </nav>

        </div>


    </div>




    <div class="conteiner">
        <h1>Hola <?php echo $name; ?></h1>

        <h4>Te damos la bienvenida a Aycoro, la primera red social de la Repubica Dominicana.
            <br>
            Aqui podras compartir fotos con tus seguidores ademas de historias diarias
            <br>
            y podras intercambiar mesajes con otros usuarios.
            <br>
            <br>
            <?php
            if (isset($_SESSION['id'])) {
            ?>
                <?php echo $name; ?>, cordialmente Jhon David Mesa fundador y CEO de Aycoro te agradece
                <br>
                por haberte registrado en nuestra plataforma, ahora ve y comparte tus
                <br>
                mejores momentos con el mundo.
                <a href="../index">Home</a>
            <?php
            } else {
            ?>
                <?php echo $name; ?>, cordialmente Jhon David Mesa fundador y CEO de Aycoro te invita a que
                <br>
                te registres en nuestra plataforma, has click
                <a href="../signup">aqui</a>.
            <?php
            }
            ?>
        </h4>
        <br>
        <?php require("footer-comunity.php") ?>
    </div>
</body>


<script>
    //===
    // VARIABLES
    //===
    // const DATE_TARGET = new Date('1/23/2022 7:00 PM');
    const DATE_TARGET = new Date('12/25/2021 3:45 PM');
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

    }

    //===
    // INIT
    //===
    updateCountdown();
    // Refresh every second
    setInterval(updateCountdown, MILLISECONDS_OF_A_SECOND);
</script>