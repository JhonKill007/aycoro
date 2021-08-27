<?php
require("fund/head.php");
?>



<body>

<?php
require("modulos/nav.php");
require("modulos/nav-two.php");
// require("modulos/perfil-bio.php");
?>





    <div class="conteiner">
        <div class="col-sm-4 edit">
            <h3>Editar Perfil</h3>
            <a href="changepassword"><button class="btn btn-warning col-sm-12">Cambiar Contraseña</button></a>
            <form action="keys/edit-perfil.php" method="POST" enctype="multipart/form-data" class="form-horizontal">
                <!-- nombre -->
                <div class="form-group">
                                    
                    <input class="form-control" type="hidden" name="actualfoto" value=<?php echo $foto; ?>>       
                    <b for="">Foto de Perfil</b>            
                    <input type="file" class="form-control" id="perfil" name="perfil" accept="image/*">

                    <b for="">Nombre</b>
                    <input class="form-control" type="text" name="nombre_edit" id="" value=<?php echo$registro['nombre']; ?> required>

                    <b for="">Apellido</b>
                    <input class="form-control" type="text" name="apellido_edit" id="" value=<?php echo$registro['apellido']; ?>>

                    <b for="">Presentacion</b>
                    <textarea class="form-control" name="presentacion_edit" id="" cols="23" rows="3" maxlength="90" required><?php echo$registro['presentacion']; ?></textarea>
                    <p>Maximo 90 Caracteres</p>
                                        
                                    

                    <!-- boton sign up -->
                    <div class="form-group">
                        <div class="col-sm-offset">
                            <button type="submit" class="btn btn-success col-sm-12">Guardar</button>
                        </div>
                    </div>
                </div>
            </form>
            <a href="perfil"><button class="btn btn-danger col-sm-12">Cancelar</button></a>
        </div>
    </div>


<?php

require("modulos/footer.php");
require("fund/script.php");
?>
</body>
</html>