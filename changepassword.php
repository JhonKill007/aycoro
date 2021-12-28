<?php
$tittlePage = "Aycoro - Cambiar contraceña";
require("fund/head.php");
?>



<body>

<?php
require("modulos/nav.php");
require("modulos/nav-two.php");
require("modulos/status-post.php");
?>





    <div class="conteiner">
        <div class="edit">
            <h3>Cambiar Contraseña</h3>
            <div class='error'></div>
            <form action="" method="POST" class="form-horizontal formulario">
                <!-- nombre -->
                <div class="form-group">
                                    
                    

                    <b for="">Contraseña Actual</b>
                    <input type="hidden" name="id_per" value=<?php echo $_SESSION['id']; ?>>
                    <input class="form-control" type="password" name="actual" id="" maxlength="50" required>

                    <b for="">Nueva Contraseña</b>
                    <input class="form-control" type="password" name="nueva" id="" maxlength="50" required>

                    <b for="">Confirmar nueva contraseña</b>
                    <input class="form-control" type="password" name="confirm" id="" maxlength="50" required>
                    <br>          

                    <!-- boton sign up -->
                    <div class="form-group">
                        <div class="col-sm-offset">
                            <button type="submit" class="btn btn-success button-change botones-edit">Guardar</button>
                        </div>
                    </div>
                </div>
            </form>
            <a href="perfil"><button class="btn btn-danger botones-edit">Cancelar</button></a>
        </div>
    </div>

    <script src="js/changepass.js"></script>
<?php
require("fund/script.php");
?>
</body>
</html>