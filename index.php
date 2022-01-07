<?php
$tittlePage = "Aycoro";
require("fund/head.php");
?>

<?php
$identity_page_post = 1;
?>


<body>
    <div id="contenedo_carca" class="charger">
        <div id="carga"></div>
    </div>
    <div class="body_center">
        <?php
        require("modulos/nav.php");
        require("modulos/nav-two.php");
        ?>
        <script>
            identity_page_post = 1;
            $(document).ready(function() {

                var $modal = $('#modal');
                var container = document.querySelector('.img-container');
                var butoninput = document.querySelector('.image');
                var image = container.getElementsByTagName('img').item(0);
                var inputpost = document.getElementById('inputpost');
                var inputhistory = document.getElementById('inputhistory');
                var inputpost_nav = document.getElementById('inputpost_nav');
                var inputhistory_nav = document.getElementById('inputhistory_nav');

                var cropper;

                inputpost.onchange = function() {
                    console.log(option);
                    var files = event.target.files;

                    var done = function(url) {
                        image.src = url;
                        $modal.modal('show');
                        console.log("mostrar")
                    };

                    if (files && files.length > 0) {
                        reader = new FileReader();
                        reader.onload = function(event) {
                            done(reader.result);
                        };
                        reader.readAsDataURL(files[0]);
                    }
                }

                inputhistory.onchange = function() {
                    console.log(option);
                    var files = event.target.files;

                    var done = function(url) {
                        image.src = url;
                        $modal.modal('show');
                        console.log("mostrar")
                    };

                    if (files && files.length > 0) {
                        reader = new FileReader();
                        reader.onload = function(event) {
                            done(reader.result);
                        };
                        reader.readAsDataURL(files[0]);
                    }
                }

                $modal.on('shown.bs.modal', function() {
                    if (option == 1 || option == 4) {
                        cropper = new Cropper(image, {
                            aspectRatio: 1,
                            viewMode: 3,
                            preview: '.preview'
                        });
                    } else if (option == 2) {
                        cropper = new Cropper(image, {
                            aspectRatio: 3 / 5,
                            viewMode: 3,
                            preview: '.preview'
                        });
                    } else if (option == 5) {
                        cropper = new Cropper(image, {
                            aspectRatio: 19 / 6,
                            viewMode: 3,
                            preview: '.preview'
                        });
                    }
                }).on('hidden.bs.modal', function() {
                    cropper.destroy();
                    cropper = null;
                    inputpost.value = null;
                    inputhistory.value = null;

                });

            });
        </script>








        <div class="box-up-one">
            <div class="plus-post-btn">
                <div class="plus-post-box">
                    <div class="btn-box-post">
                        <div class="post-btn-container">
                            <!-- <label class="post-btn-container btn-upload postcheck1" for="inputImage1" title="Publicar Foto"> -->
                            <label class="post-btn-container btn-upload postcheck1" for="inputpost" onclick="post()" title="Publicar Foto">
                                <!-- <input type="file" class="sr-only" id="inputImage1" name="file" accept="image/*"> -->
                                <input type="file" name="image" class="image_post" id="inputpost" style="display:none" accept="image/*" />
                                <i class="fas fa-plus"></i>

                            </label>
                        </div>
                    </div>
                    <div class="btn-box-post event-post">
                        <div class="post-btn-container">
                            <label class="post-btn-container btn-upload historycheck1" for="inputhistory" onclick="history()" title="Publicar Historia">
                                <!-- <input type="file" class="sr-only" id="inputImagehistory1" name="file" accept="image/*"> -->
                                <input type="file" name="image" class="image_post" id="inputhistory" data-option="2" style="display:none" accept="image/*" />

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
        if (isset($_GET['acces'])) {
            $acces = $_GET['acces'];
            if ($acces == 'Admin007') {
        ?>
                <script>
                    console.log('<?php echo $acces; ?>');
                </script>
                <?php
                // activar post
                if ($eso) {
                    $SELECT = "SELECT * FROM post ORDER BY id_post DESC";
                    $resultado = mysqli_query($conn, $SELECT);
                    $pst = $resultado->fetch_array();
                    $cant_post = $pst["id_post"] + 1;
                    for ($i = 0; $i < $cant_post; $i++) {
                        $UPDATE = "UPDATE post SET status = 'Active' WHERE id_post = $i";
                        $resultado = mysqli_query($conn, $UPDATE);
                        if ($resultado) {
                ?>
                            <script>
                                console.log('<?php echo "success" . $i . " "; ?>')
                            </script>
                        <?php
                        } else {
                        ?>
                            <script>
                                console.log('<?php echo "Ha ocurrido un error!" . $i . " "; ?>')
                            </script>
                            <?php
                        }
                    }
                } else {
                    echo "la connecion fallo";
                }


                // introducir usuarios
                if ($eso) {
                    $SELECT13 = "SELECT * FROM registro";
                    $resultado13 = mysqli_query($conn, $SELECT13);
                    while ($reg = $resultado13->fetch_array()) {
                        $id_reg = $reg["id_registro"];
                        $email_reg = $reg["email"];
                        $usuario10 = substr($email_reg, 0, strpos($email_reg, '@'));
                        if ($usuario10) {
                            // $INSERT13 = "INSERT INTO registro (usuario)values('$usuario10') WHERE email = $email_reg";
                            $UPDATE13 = "UPDATE registro SET usuario = '$usuario10' WHERE email = '$email_reg'";
                            $resultado12 = mysqli_query($conn, $UPDATE13);
                            // $resultado12 = mysqli_query($conn, $INSERT13);
                            if ($resultado12) {
                            ?>
                                <script>
                                    console.log('<?php echo "success" . $email_reg . " "; ?>')
                                </script>
                            <?php
                            } else {
                            ?>
                                <script>
                                    console.log('<?php echo "Ha ocurrido un error!" . $email_reg . " "; ?>')
                                </script>
        <?php
                            }
                        }
                    }
                } else {
                    echo "la connecion fallo";
                }
            }
        }


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

    </div>
</body>

</html>