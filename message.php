<?php
$tittlePage = "Aycoro - Mensajes";
require("fund/head.php");
?>

<style>
    @media (max-width: 1120px) {



        .barra-inicio-new {
            height: 140px;
        }

        .nav-main {
            height: 140px;
        }

        .container-one {
            margin-top: -40px;
            height: 140px;
        }
    }
</style>

<body>
    <div id="contenedo_carca" class="charger">
        <div id="carga"></div>
    </div>
    <div class="body_center">
        <?php
        require("modulos/nav.php");
        require("modulos/nav-two.php");
        require("modulos/status-post.php");

        ?>

        <div class="conteiner">
            <div class="conteiner-messaje">
                <h1>Mensajes</h1>
                <div class="users-lista">

                </div>
                <br>
                <br>
                <script>
                    const usersLista = document.querySelector(".users-lista");
                    setInterval(() => {
                        let xhr = new XMLHttpRequest();
                        xhr.open("GET", "keys/message-page-key.php", true);
                        xhr.onload = () => {
                            if (xhr.readyState === XMLHttpRequest.DONE) {
                                if (xhr.status === 200) {
                                    let data = xhr.response;
                                    usersLista.innerHTML = data;
                                }
                            }
                        }
                        xhr.send();
                    }, 500);
                </script>

            </div>
        </div>


        <?php
        require("fund/script.php");
        ?>
    </div>
</body>

</html>