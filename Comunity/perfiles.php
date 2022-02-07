<?php
session_start();
$tittlePage = "Aycoro - Perfiles";
require("../fund/head-comunity.php");
?>

<style>
    .list_user {
        display: flex;
        word-wrap: break-word;
    }

    .list_user a {
        margin-right: 10px;

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
            <div class="con-box list_user">
                <p>
                    <?php
                    $eso =  require('../keys/conection.php');
                    if ($eso) {
                        $SELECT = "SELECT usuario FROM registro";
                        $resultado = mysqli_query($conn, $SELECT);
                        if ($resultado) {

                            while ($registro = $resultado->fetch_array()) {
                    ?>
                                <span><a href="../user?user=<?php echo $registro['usuario']; ?>"><?php echo $registro['usuario']; ?></a></span>
                    <?php
                            }
                        }
                    }

                    ?>
                </p>
            </div>
        </div>
        <br>
        <?php require("footer-comunity.php") ?>
    </div>
</body>

</html>