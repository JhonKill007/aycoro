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
            <h3>Cambiar Contraseña</h3>
            <div class='error'></div>
            <form action="" method="POST" class="form-horizontal formulario">
                <!-- nombre -->
                <div class="form-group">
                                    
                    

                    <b for="">Contraseña Actual</b>
                    <input type="hidden" name="id_per" value=<?php echo $_SESSION['id']; ?>>
                    <input class="form-control" type="password" name="actual" id="" required>

                    <b for="">Nueva Contraseña</b>
                    <input class="form-control" type="password" name="nueva" id="" required>

                    <b for="">Confirmar nueva contraseña</b>
                    <input class="form-control" type="password" name="confirm" id="" required>
                    <br>          

                    <!-- boton sign up -->
                    <div class="form-group">
                        <div class="col-sm-offset">
                            <button type="submit" class="btn btn-success col-sm-12 button-change">Guardar</button>
                        </div>
                    </div>
                </div>
            </form>
            <a href="perfil"><button class="btn btn-danger col-sm-12">Cancelar</button></a>
        </div>
    </div>

    <script src="js/changepass.js"></script>
<?php

require("modulos/footer.php");
require("fund/script.php");
?>
</body>
</html>