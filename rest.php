<?php
$tittlePage = "Aycoro - Restablecer contraseña";
require("fund/head.php");


$email = $_GET['fditer'];
$date = $_GET['hfdar'];
include "keys/metadate/mcript.php";

$dato_desncriptado = $desencriptar($dato);
$date_desencryp = $desencriptar($date);

$eso =  require('keys/conection.php');
if ($eso) {
    $SELECT = "SELECT * from registro where email='$email'";
    $resultado = mysqli_query($conn, $SELECT);

    if ($resultado->num_rows == 1) {
        $identity = $resultado->fetch_array();
        $id_identity = $identity['id_registro'];
        $name_identity = $identity['nombre'];
        $lastname_identity = $identity['apellido'];
        $email_identity = $identity['email'];
    } else {
        header("Location: login");
    }
}

$date_today = time();
if ($email_identity != $email || $date_desencryp<$date_today) {
    header("Location: login");
}

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
        <div class="conteiner-signup">
            <div class="con-box">
                <h2>Restablecer contraseña</h2>
                <div class='error'></div>
                <hr>

                <form action="" method="POST" class="form-horizontal formulario_identity">
                    <!-- nombre -->
                    <div class="form-group">


                        <div class="">
                            <div class=" email-box">
                                <b>Nueva contraseña</b>
                                <input type="password" class="form-control" id="pass" name="pass" maxlength="50" required>
                                <b>Confirmar nueva contraseña</b>
                                <input type="password" class="form-control" id="pass" name="pass_confirm" maxlength="50" required>
                            </div>
                        </div>
                        <br>



                        <!-- boton sign up -->
                        <div class="btn-box form-group">
                            <div class="col-sm-offset">
                                <button class="btn btn-success  button-identity">
                                    Guardar
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
                <br>
            </div>
        </div>



    </div>


    <script src="js/identity.js"></script>
    <?php
    require("fund/script.php");
    ?>
</body>

</html>