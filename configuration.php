<?php
require("modulos/session.php");
$tittlePage = "Aycoro - Editar perfil";
require("fund/head.php");
?>



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
            <div class="edit">
                <h3>Informacion del Perfil</h3>
                <a href="perfil">Atras</a>
                <a href="edit?e=Password"><button class="btn btn-warning botones-edit">Cambiar Contraseña</button></a>
                <!-- nombre -->
                <div class="form-group">

                    <b for="">Nombre</b>
                    <a href="edit?e=Name"><span>editar</span></a>
                    <br>
                    <span><?php echo $registro['nombre']; ?></span>
                    <br>
                    <br>
                    <b for="">Usuario</b>
                    <a href="edit?e=User"><span>editar</span></a>
                    <br>
                    <span><?php echo $registro['usuario']; ?></span>
                    <br>
                    <br>
                    <b for="">Email</b>
                    <a href="edit?e=Email"><span>editar</span></a>
                    <br>
                    <span><?php echo $registro['email']; ?></span>
                    <br>
                    <br>
                    <b for="">Presentacion</b>
                    <a href="edit?e=Presentacion"><span>editar</span></a>
                    <br>
                    <span><?php echo $registro['presentacion']; ?></span>
                    <br>
                    <br>
                    <b>Numero</b>
                    <?php if ($registro['numero'] == "Null") {
                    ?>
                        <br>
                        <a href="edit?e=Phone"><span>Agregar Numero</span></a>
                    <?php
                    } else {
                    ?>
                        <a href="edit?e=Phone"><span>editar</span></a>
                        <br>
                        <span><?php echo $registro['numero']; ?></span>
                    <?php
                    }
                    ?>
                </div>
                <a href="terminos"><b>Terminos y condiciones de uso.</b></a>
            </div>
        </div>

        <?php
        require("fund/script.php");
        ?>
    </div>
</body>

</html>