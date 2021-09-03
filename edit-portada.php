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
        <br>
        <br>
        <br>
        <br>
        <div class="edit">
            <h3>Editar foto de Portada</h3>
            <form action="keys/edit-portada.php" method="POST" enctype="multipart/form-data" class="form-horizontal">
                <!-- nombre -->
                <div class="form-group">



                    <input type="file" class="form-control" id="perfil" name="portada" accept="image/*" require>


                    <br>
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
    require("modulos/footer.php");
    require("fund/script.php");
    ?>
</body>

</html>