<?php
require("fund/head.php");
?>



<body>

    <?php
    require("modulos/nav.php");
    require("modulos/nav-two.php");

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
    require("modulos/footer.php");
    require("fund/script.php");
    ?>
</body>

</html>