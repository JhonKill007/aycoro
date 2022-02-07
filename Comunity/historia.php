<?php
session_start();
$tittlePage = "Aycoro - Historia de Aycoro";
require("../fund/head-comunity.php");
?>

<style>
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

    .logo_hist{
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
            <div class="con-box">
                <div class="parrafoCompa">
                    <div class="duple">
                        <img class="ceo_img" src="img/CEO.png" alt="">
                        <b class="name">Jhon David Mesa</b>
                    </div>
                    <div class="duple">
                        <p>
                            <b>Aycoro.com</b> es una red social creada el 29 de agosto de 2021 por Jhon David Mesa
                            El Primer cuatrimestre del 2021, Juan Rene Guzman
                            quien era compañero de instituto y hermano de crianza de Jhon, estaba cursando la asignatura de programación web en el Instituto Tecnológico de la Américas y tenia una asignación para el final de cuatrimestre.
                        </p>
                    </div>
                </div>
                <div class="parrafoCompa">
                    <div class="duple">
                        <p>
                            Dicha asignacion consistía en la creación de un chat universitario en donde los estudiantes pudieran conversar entre ellos enviando mensajes conformto público y anónimo, cuyo nombre de proyecto seria ITLA Crush.
                            Por lo que le pide ayuda a Jhon quien ya había cursado la misma asignatura.
                        </p>
                    </div>
                    <div class="duple">
                        <img class="ceo_img" src="img/SUG.jpg" alt="">
                        <b class="name">Juan Rene Guzman</b>
                    </div>
                </div>
                <p>

                    <br>

                    Así nace la idea de crear una red social en la mente de Jhon, quien inmediatamente comenzó el proceso de investigación y para mayo del 2021 a inicios el segundo cuatrimestre ya había iniciado el proceso de desarrollo de dicha red social la cual comenzó llamándose snine.
                    <img class="ceo_img snine" src="img/SNINE.PNG" alt="">
                    <br>
                    <br>
                    Ya la primera face de investigación y desarrollo ya estaba en marcha y mientras se creaba esta cambio de nombre varias veces.
                    La selección del nombre fue una de las partes más cruciales, ya que el nombre snine no tenía ningún significado, se quería buscar un nombre que sea propio de la República Dominicana y se cambio el nombre anterior a mangoo,
                    <img class="mango1" src="img/MANGOO.jpg" alt="">
                    <b class="name mango1">Mango</b>

                </p>
                <div class="parrafoCompa">
                    <div class="duple">
                        <p>
                            en referencia a la deliciosa fruta tropical pero añadiéndole otra “o” para crear un nombre particular, con esta también cambio el color de azul a amarillo, pero este tampoco convencía, se buscaba un nombre que tuviera un sentido sin necesidad de tener un significado y que siguiera sonando dominicano, y fue aqui cuando se determinó que el nombre para la página sería aycoro.
                        </p>
                    </div>
                    <div class="duple">
                        <img class="ceo_img mango2" src="img/MANGOO.jpg" alt="">
                        <b class="name mango2">Mango</b>
                    </div>
                </div>
                <div class="parrafoCompa">
                    <div class="duple">
                        <p>
                            El 29 de agosto del 2021 es abierta por primera ves y en modo de prueba aycoro.com en su versión 0.1.1j, teniendo el primer día 30 registros de personas la cuales dieron su opinión y sugerencias para la página.
                            De agosto a Diciembre la pagina tuvo más de 60 actualizaciones terminando con la más reciente la versión 1.4.3 FullStar.
                        </p>
                    </div>
                    <div class="duple">
                        <img class="ceo_img logo_hist" src="../img/Logo2.png" alt="">
                        <b class="name">Logo de Aycoro</b>
                    </div>
                </div>
                <h3>Por que Aycoro?</h3>
                <p>
                    Mucho se ha preguntado por que Ay y no Hay, la verdad es que se buscaba la forma de llamar la atencion con el nombre, se puede entender claramente la oracion hay coro al oir el nombre, que es una frase comun en Dominicana, pero al verlo en una palabra y comenzando con 'A' y no con 'H', da la curiosidad de por que Aycoro.
                    <br>
                </p>
                <br>
            </div>
        </div>
        <br>
        <?php require("footer-comunity.php") ?>
    </div>

</body>

</html>