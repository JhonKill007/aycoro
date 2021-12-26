<?php
$tittlePage = "Aycoro - Editar perfil";
require("fund/head.php");
?>



<body>

    <?php
    require("modulos/nav.php");
    require("modulos/nav-two.php");
    require("modulos/photo_edit.php");
    require("modulos/status-post.php");
    ?>





    <div class="conteiner">
        <div class="edit">
            <h3>Editar Perfil</h3>
            <a href="changepassword"><button class="btn btn-warning botones-edit">Cambiar Contraseña</button></a>
            <form action="keys/edit-perfil.php" method="POST" enctype="multipart/form-data" class="form-horizontal">
                <!-- nombre -->
                <div class="form-group">

                    <b for="">Nombre</b>
                    <input class="form-control" type="text" name="nombre_edit" id="" value=<?php echo $registro['nombre']; ?> maxlength="30" required>

                    <b for="">Apellido</b>
                    <input class="form-control" type="text" name="apellido_edit" id="" value=<?php echo $registro['apellido']; ?> maxlength="30">

                    <b for="">Usuario</b>
                    <a href="change-user"><span>editar</span></a>
                    <input class="form-control" type="text" disabled value=<?php echo $registro['usuario']; ?> maxlength="30">
                    
                    <b for="">Presentacion</b>
                    <textarea class="form-control" name="presentacion_edit" id="" cols="23" rows="3" maxlength="90" required><?php echo $registro['presentacion']; ?></textarea>
                    <p>Maximo 90 Caracteres</p>



                    <!-- boton sign up -->
                    <div class="form-group">
                        <div class="col-sm-offset">
                            <button type="submit" class="btn btn-success botones-edit">Guardar</button>
                        </div>
                    </div>
                </div>
            </form>
            <a href="perfil"><button class="btn btn-danger botones-edit">Cancelar</button></a>
        </div>
    </div>


    <?php
    require("fund/script.php");
    ?>
</body>

</html>