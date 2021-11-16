<?php
$tittlePage = "Aycoro";
require("fund/head.php");
?>



<body>

    <?php
    require("modulos/nav.php");
    require("modulos/nav-two.php");
    require("modulos/photo_edit.php");
    ?>



    <script>
        perfil = 1;
    </script>

    <div class="box-up-one">
        <div class="plus-post-btn">
            <div class="plus-post-box">
                <div class="btn-box-post">
                    <div class="post-btn-container">

                        <label class="post-btn-container btn-upload postcheck1" for="inputImage1" title="Publicar Foto">

                            <input type="file" class="sr-only" id="inputImage1" name="file" accept="image/*">
                            <i class="fas fa-plus"></i>

                        </label>
                    </div>
                </div>
                <div class="btn-box-post event-post">
                    <div class="post-btn-container">
                        <label class="post-btn-container btn-upload historycheck1" for="inputImagehistory1" title="Publicar Historia">
                            <input type="file" class="sr-only" id="inputImagehistory1" name="file" accept="image/*">
                            <i class="fas fa-clock"></i>
                        </label>
                    </div>
                </div>
                <div class="btn-box-post post-write1">
                    <div class="post-btn-container">
                        <i class="fas fa-pen"></i>
                    </div>
                </div>
            </div>
        </div>
        <?php
        require("modulos/status-post.php");
        require("modulos/footer.php");
        ?>
    </div>



    <!-- <div class="box-up-two">
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
                    <input type="hidden" value="" name="time" id="time2">
                    <input class="btn btn-success col-sm-12" type="file" name="evento" id="" accept="image/*" required>
                    <br>
                    <button class="btn btn-success col-sm-12" type="submit">Publicar</button>
                </form>
            </div>
        </div>
    </div> -->

    <!-- <div class="box-up-three">
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
                    <input type="hidden" value="" name="time" id="time3">
                    <textarea class="form-control col-sm-12" name="estado_post" id="" cols="20" rows="2" maxlength="115" required></textarea>
                    <label for="">Maximo 115 Caracteres</label>
                    <button class="btn btn-success col-sm-12" type="submit">Publicar</button>
                </form>
            </div>
        </div>
    </div> -->

    <!-- <div class="create-post">
        <div class="post-container col-sm-10">
            <h2>Agregar Post</h2>
            <input type="file" name="" id="">
            <textarea class="form-control col-sm-12" name="" id="" cols="20" rows="2"></textarea>
            
            <button>Publicar</button>
        </div>
    </div> -->




    <?php
    require("models/index_post_model.php");
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
    require("fund/script.php");
    ?>
</body>

</html>