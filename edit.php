<?php
require("modulos/session.php");
$e = $_GET['e'];
$tittlePage = "Aycoro - Edit " . $e;
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

        if ($e == "User") {
        ?>
            <div class="conteiner">
                <div class="edit">
                    <h3>Cambiar Usuario</h3>
                    <a href="configuration">Atras</a>
                    <div class='error'></div>
                    <form action="" method="POST" class="form-horizontal formulario_user">
                        <!-- nombre -->
                        <div class="form-group">

                            <b for="">Nuevo Usuario</b>
                            <input type="hidden" name="id_per" value=<?php echo $_SESSION['id']; ?>>
                            <input type="hidden" name="usario_old" value="<?php echo $registro['usuario']; ?>">
                            <input class="form-control" type="text" name="usario_new" id="" maxlength="50" value="<?php echo $registro['usuario']; ?>" placeholder="Nuevo Usuario" required>
                            <br>

                            <!-- boton sign up -->
                            <div class="form-group">
                                <div class="col-sm-offset">
                                    <button type="submit" class="btn btn-success button-change-user botones-edit">Guardar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <script src="js/changeuser.js?<?php echo $version; ?>"></script>

        <?php
        }
        if ($e == "Password") {
        ?>
            <div class="conteiner">
                <div class="edit">
                    <h3>Cambiar Contraseña</h3>
                    <a href="configuration">Atras</a>
                    <div class='error'></div>
                    <form action="" method="POST" class="form-horizontal formulario_password">
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
                                    <button type="submit" class="btn btn-success button-change-pass botones-edit">Guardar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <script src="js/changepass.js?<?php echo $version; ?>"></script>

        <?php
        }
        if ($e == "Email") {
        ?>
            <div class="conteiner">
                <div class="edit">
                    <h3>Cambiar Email</h3>
                    <a href="configuration">Atras</a>
                    <div class='error'></div>
                    <form action="" method="POST" class="form-horizontal formulario_email">
                        <!-- nombre -->
                        <div class="form-group">

                            <b for="">Nuevo Email</b>
                            <input type="hidden" name="id_per" value=<?php echo $_SESSION['id']; ?>>
                            <input type="hidden" name="email_old" value="<?php echo $registro['email']; ?>">
                            <input class="form-control" type="text" name="email_new" id="" value="<?php echo $registro['email']; ?>" maxlength="50" placeholder="Nuevo Email" required>
                            <br>

                            <!-- boton sign up -->
                            <div class="form-group">
                                <div class="col-sm-offset">
                                    <button type="submit" class="btn btn-success button-change-email botones-edit">Guardar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <script src="js/change-email.js?<?php echo $version; ?>"></script>

        <?php
        }
        if ($e == "Phone") {
        ?>
            <div class="conteiner">
                <div class="edit">
                    <h3>Cambiar Numero de Telefono</h3>
                    <a href="configuration">Atras</a>
                    <div class='error'></div>
                    <form action="" method="POST" class="form-horizontal formulario_phone">
                        <!-- nombre -->
                        <div class="form-group">

                            <b for="">Nuevo Numero</b>
                            <input type="hidden" name="id_per" value=<?php echo $_SESSION['id']; ?>>
                            <input type="hidden" name="number_old" value=<?php echo $registro['numero']; ?>>
                            <?php
                            if ($registro['numero'] == "Null") {
                            ?>
                                <input class="form-control" type="tel" name="number_new" id="" maxlength="50" placeholder="Nuevo Numero" required>
                            <?php
                            } else {
                            ?>
                                <input class="form-control" type="tel" name="number_new" id="" maxlength="50" value="<?php echo $registro['numero']; ?>" placeholder="Nuevo Numero" required>
                            <?php
                            }
                            ?>
                            <br>

                            <!-- boton sign up -->
                            <div class="form-group">
                                <div class="col-sm-offset">
                                    <button type="submit" class="btn btn-success button-change-phone botones-edit">Guardar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <script src="js/change-phone.js?<?php echo $version; ?>"></script>

        <?php
        }
        if ($e == "Name") {
        ?>
            <div class="conteiner">
                <div class="edit">
                    <h3>Cambiar Nombre</h3>
                    <a href="configuration">Atras</a>
                    <form action="keys/edit-perfil-key.php" method="POST" class="form-horizontal">
                        <!-- nombre -->
                        <div class="form-group">

                            <b for="">Nuevo Nombre</b>
                            <input type="hidden" name="option" value="1">
                            <textarea name="name_new" class="form-control" id="" maxlength="50" placeholder="Nuevo Nombre" cols="30" rows="1" required><?php echo $registro['nombre']; ?></textarea>
                            <br>

                            <!-- boton sign up -->
                            <div class="form-group">
                                <div class="col-sm-offset">
                                    <button type="submit" class="btn btn-success botones-edit">Guardar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        <?php
        }
        if ($e == "Presentacion") {
        ?>
            <div class="conteiner">
                <div class="edit">
                    <h3>Cambiar Presentacion</h3>
                    <a href="configuration">Atras</a>
                    <form action="keys/edit-perfil-key.php" method="POST" class="form-horizontal">
                        <!-- nombre -->
                        <div class="form-group">

                            <b for="">Nueva Presentacion</b>
                            <input type="hidden" name="option" value="2">
                            <textarea class="form-control" name="present_new" maxlength="50" id="" cols="30" rows="3" placeholder="Nueva Presentacion" required><?php echo $registro['presentacion']; ?></textarea>
                            <br>

                            <!-- boton sign up -->
                            <div class="form-group">
                                <div class="col-sm-offset">
                                    <button type="submit" class="btn btn-success botones-edit">Guardar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        <?php
        }
        require("fund/script.php");
        ?>
    </div>
</body>

</html>