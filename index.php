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
        identity_page_post = 1;
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