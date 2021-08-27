<?php
require("fund/head.php");
?>



<body>

    <?php
    require("modulos/nav.php");
    require("modulos/nav-two.php");

    // $id_articulo = $_POST['Id_articulo'];

    // if (!empty($id_articulo)) {
    //     $eso = require("conection.php");
    //     if ($eso) {
    //         $DELETE = "DELETE FROM articulos WHERE id_articulos = $id_articulo";
    //         $resultado = mysqli_query($conn, $DELETE);
    //         if ($resultado) {
    //             echo "retirado";
    //             header("Location: ../perfil.php");
    //             // $self = $_SERVER['PHP_SELF'];
    //             // header("refresh:0; url=$self");

    //         } else {
    //             echo "valio verga";
    //         }
    //     } else {
    //         echo "la connecion fallo";
    //     }
    // }

    ?>




    <div class="box-up-one">
        <div class="plus-post-btn">
            <div class="plus-post-box">
                <div class="btn-box-post">
                    <div class="post-btn-container">
                        <i class="fas fa-plus"></i>
                    </div>
                </div>
                <div class="btn-box-post event-post">
                    <div class="post-btn-container">
                        <i class="fas fa-clock"></i>
                    </div>
                </div>
                <div class="btn-box-post post-write">
                    <div class="post-btn-container">
                        <i class="fas fa-pen"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="create-post">
            <div class="post-container col-sm-10">
                <h2>Agregar Post</h2>
                <form action="keys/agregar-post-key.php" method="post" enctype="multipart/form-data">
                    <input class="btn btn-success col-sm-12" type="file" name="photo_post" id="" accept="image/*" required>
                    <br>
                    <input type="hidden" value="1" name="opcion">
                    <textarea class="form-control col-sm-12" name="estado_post" id="" cols="20" rows="2" maxlength="115"></textarea>

                    <label for="">Maximo 115 Caracteres</label>

                    <button class="btn btn-success col-sm-12" type="submit">Publicar</button>
                </form>
            </div>
        </div>
    </div>

    <div class="box-up-two">
        <div class="plus-post-btn">
            <div class="plus-post-box">
                <div class="btn-box-post photo-post">
                    <div class="post-btn-container">
                        <i class="fas fa-plus"></i>
                    </div>
                </div>
                <div class="btn-box-post">
                    <div class="post-btn-container">
                        <i class="fas fa-clock"></i>
                    </div>
                </div>
                <div class="btn-box-post post-write-two">
                    <div class="post-btn-container">
                        <i class="fas fa-pen"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="create-post">
            <div class="post-container col-sm-10">
                <h2>Agregar Discusion</h2>
                <p>Agrega una discusion Temporal.</p>
                <form action="keys/agregar-post-key.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" value="2" name="opcion">
                    <input class="btn btn-success col-sm-12" type="file" name="evento" id="" accept="image/*" required>
                    <br>
                    <button class="btn btn-success col-sm-12" type="submit">Publicar</button>
                </form>
            </div>
        </div>
    </div>

    <div class="box-up-three">
        <div class="plus-post-btn">
            <div class="plus-post-box">
                <div class="btn-box-post photo-post-two">
                    <div class="post-btn-container">
                        <i class="fas fa-plus"></i>
                    </div>
                </div>
                <div class="btn-box-post event-post-two">
                    <div class="post-btn-container">
                        <i class="fas fa-clock"></i>
                    </div>
                </div>
                <div class="btn-box-post">
                    <div class="post-btn-container">
                        <i class="fas fa-pen"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="create-post">
            <div class="post-container col-sm-10">
                <br>
                <br>
                <h2>Estado</h2>
                <form action="keys/agregar-post-key.php" method="post">
                    <input type="hidden" value="3" name="opcion">
                    <textarea class="form-control col-sm-12" name="estado_post" id="" cols="20" rows="2" maxlength="115" required></textarea>
                    <label for="">Maximo 115 Caracteres</label>
                    <button class="btn btn-success col-sm-12" type="submit">Publicar</button>
                </form>
            </div>
        </div>
    </div>

    <!-- <div class="create-post">
        <div class="post-container col-sm-10">
            <h2>Agregar Post</h2>
            <input type="file" name="" id="">
            <textarea class="form-control col-sm-12" name="" id="" cols="20" rows="2"></textarea>
            
            <button>Publicar</button>
        </div>
    </div> -->



    <?php
    require("modulos/post-view.php");
    ?>



    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <?php
    require("modulos/footer.php");
    require("fund/script.php");
    ?>
</body>

</html>