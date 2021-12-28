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
            <h3>Cambiar Usuario</h3>
            <div class='error'></div>
            <form action="" method="POST" class="form-horizontal formulario">
                <!-- nombre -->
                <div class="form-group">

                    <b for="">Nuevo Usuario</b>
                    <input type="hidden" name="id_per" value=<?php echo $_SESSION['id']; ?>>
                    <input class="form-control" type="text" name="usario_new" id="" maxlength="50" placeholder="Nuevo Usuario" required>      
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

    <script src="js/changeuser.js"></script>
<?php
require("fund/script.php");
?>
</body>
</html>