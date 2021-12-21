<?php
session_start();
if (isset($_COOKIE["IgtX9000"])) {
    $_SESSION['id'] = $_COOKIE["IgtX9000"];
}
if (!isset($_SESSION['id'])) {
    header("Location: login");
} else {
    require('keys/identification.php');
    $tittlePage = "Aycoro - Editor";
    // require("fund/head.php");

    $opt = $_POST['option'];
    $files = $_POST['files'];
    $extencion = $_POST['extencion'];
    $timezone = $_POST['time'];
}
?>
<script>
    var opt = <?php echo $opt; ?>;
</script>

<!-- <body>
    <script src="js/cropper.js"></script>
    <div class="container">
        <?php
        if ($opt == 1) {
        ?>
            <h1>Editor de Post</h1>
        <?php
        } else if ($opt == 2) {
        ?>
            <h1>Editor de Historias</h1>
        <?php
        } else if ($opt == 4) {
        ?>
            <h1>Editor de Foto de Perfil</h1>
        <?php
        } else if ($opt == 5) {
        ?>
            <h1>Editor de Foto de Portada</h1>
        <?php
        }
        ?>

        <form action="keys/agregar-post-key.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-9">
                    <div class="docs-demo">
                        <div class="img-container">
                            <img src="<?php echo $files ?>" alt="">
                        </div>
                    </div>
                </div>
                <?php
                if ($opt == 1) {
                ?>
                    <div class="col-md-3 textos_stados">
                        <h4>Escribe un comentario</h4>
                        <textarea class="form-control col-sm-12" name="estado_post" id="" cols="20" placeholder="Escribe aqui!" rows="5" maxlength="115"></textarea>
                        <label for="">Maximo 115 Caracteres</label>
                        <br>
                    </div>
                <?php
                }
                ?>

            </div>
            <div class="row" id="actions">
                <div class="col-md-9 docs-buttons">
                    <div class="btn-group">
                        <br>
                    </div>

                    <div class="btn-group">
                        <button type="button" class="btn btn-primary" data-method="zoom" data-option="0.1" title="Zoom In">
                            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.zoom(0.1)">
                                <span class="fa fa-search-plus"></span>
                            </span>
                        </button>
                        <button type="button" class="btn btn-primary" data-method="zoom" data-option="-0.1" title="Zoom Out">
                            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.zoom(-0.1)">
                                <span class="fa fa-search-minus"></span>
                            </span>
                        </button>
                    </div>

                    <div class="btn-group">
                        <button type="button" class="btn btn-primary" data-method="move" data-option="-10" data-second-option="0" title="Move Left">
                            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.move(-10, 0)">
                                <span class="fa fa-arrow-left"></span>
                            </span>
                        </button>
                        <button type="button" class="btn btn-primary" data-method="move" data-option="10" data-second-option="0" title="Move Right">
                            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.move(10, 0)">
                                <span class="fa fa-arrow-right"></span>
                            </span>
                        </button>
                        <button type="button" class="btn btn-primary" data-method="move" data-option="0" data-second-option="-10" title="Move Up">
                            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.move(0, -10)">
                                <span class="fa fa-arrow-up"></span>
                            </span>
                        </button>
                        <button type="button" class="btn btn-primary" data-method="move" data-option="0" data-second-option="10" title="Move Down">
                            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.move(0, 10)">
                                <span class="fa fa-arrow-down"></span>
                            </span>
                        </button>
                    </div>

                    <div class="btn-group">
                        <button type="button" class="btn btn-primary" data-method="rotate" data-option="-45" title="Rotate Left">
                            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.rotate(-45)">
                                <span class="fa fa-undo-alt"></span>
                            </span>
                        </button>
                        <button type="button" class="btn btn-primary" data-method="rotate" data-option="45" title="Rotate Right">
                            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.rotate(45)">
                                <span class="fa fa-redo-alt"></span>
                            </span>
                        </button>
                    </div>

                    <div class="btn-group">
                        <button type="button" class="btn btn-primary" data-method="scaleX" data-option="-1" title="Flip Horizontal">
                            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.scaleX(-1)">
                                <span class="fa fa-arrows-alt-h"></span>
                            </span>
                        </button>
                        <button type="button" class="btn btn-primary" data-method="scaleY" data-option="-1" title="Flip Vertical">
                            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.scaleY(-1)">
                                <span class="fa fa-arrows-alt-v"></span>
                            </span>
                        </button>
                        <button type="button" class="btn btn-primary" data-method="reset" title="Reset">
                            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.reset()">
                                <span class="fa fa-sync-alt"></span>
                            </span>
                        </button>
                    </div>




                    <div class="btn-group">
                        <button type="submit" class="btn btn-success" data-method="getCroppedCanvas" data-option="{ &quot;maxWidth&quot;: 4096, &quot;maxHeight&quot;: 4096 }">
                            <span class="docs-tooltip" data-toggle="tooltip" title="Publicar">
                                Publicar
                            </span>
                        </button>
                        <a href="index">
                            <div class="btn btn-danger hidde_editor">
                                <span class="docs-tooltip" data-toggle="tooltip" title="Cancelar">
                                    Cancelar
                                </span>
                            </div>
                        </a>
                    </div>
                    <div class="btn-group">

                    </div>
                    <input type="hidden" name="foto" value="" id="base65">
                    <input type="hidden" value=<?php echo $opt ?> name="opcion" id="optionpost">
                    <input type="hidden" value=<?php echo $extencion ?> name="extencion" id="extencion">
                    <input type="hidden" value="<?php echo $timezone ?>" name="time">






                    <div class="modal fade docs-cropped" id="getCroppedCanvasModal" role="dialog" aria-hidden="true" aria-labelledby="getCroppedCanvasTitle" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="getCroppedCanvasTitle">Cropped</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body"></div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <a class="btn btn-primary" id="download" href="javascript:void(0);" download="cropped.jpg">Download</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-md-3 docs-toggles">
                    <div class="dropdown dropup docs-options">

                    </div>
                </div>
        </form>
    </div>

</body>

</html>

<?php
// require("fund/script.php");
?> -->


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $tittlePage; ?></title>
    <link rel="icon" type="imagen/png" href="img/Icon.jpg">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/dropzone/dist/dropzone.css" />
    <link href="https://unpkg.com/cropperjs/dist/cropper.css" rel="stylesheet" />
    <script src="https://unpkg.com/dropzone"></script>
    <script src="https://unpkg.com/cropperjs"></script>

    <style>
        /* .image_area {
            position: relative;
        } */

        img {
            /* display: block; */
            max-width: 100%;
        }

        .preview {
            overflow: hidden;
            width: 160px;
            height: 160px;
            margin: 10px;
            border: 1px solid red;
        }

        /* .modal-lg {
            max-width: 1000px !important;
        } */

        /* .overlay {
            position: absolute;
            bottom: 10px;
            left: 0;
            right: 0;
            background-color: rgba(255, 255, 255, 0.5);
            overflow: hidden;
            height: 0;
            transition: .5s ease;
            width: 100%;
        } */

        /* .image_area:hover .overlay {
            height: 50%;
            cursor: pointer;
        } */

        /* .text {
            color: #333;
            font-size: 20px;
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            text-align: center;
        } */

        .visor {
            padding: 0;
        }
    </style>
</head>

<body>
    <div class="container" align="center">
        <!-- <br />
        <h3 align="center">Crop Image Before Upload using CropperJS with PHP</h3>
        <br /> -->
        <div class="row">
            <!-- <div class="col-md-4">&nbsp;</div>
            <div class="col-md-4">
                <div class="image_area">
                    <form method="post">
                        <label for="upload_image">
                            <img src="upload/user.png" id="uploaded_image" class="img-responsive img-circle" />
                            <div class="overlay">
                                <div class="text">Click to Change Profile Image</div>
                            </div>
                            <input type="file" name="image" class="image" id="upload_image" style="display:none" />
                        </label>
                    </form>
                </div>
            </div> -->
            <form action="keys/agregar-post-key.php" method="post" id="form_files" enctype="multipart/form-data">
                <input type="hidden" name="foto" value="" id="base65">
                <input type="hidden" value=<?php echo $opt ?> name="opcion" id="optionpost">
                <input type="hidden" value=<?php echo $extencion ?> name="extencion" id="extencion">
                <input type="hidden" value="<?php echo $timezone ?>" name="time">
                <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <?php
                                if ($opt == 1) {
                                ?>
                                    <h1 class="modal-title">Editor de Post</h1>
                                <?php
                                } else if ($opt == 2) {
                                ?>
                                    <h1 class="modal-title">Editor de Historias</h1>
                                <?php
                                } else if ($opt == 4) {
                                ?>
                                    <h1 class="modal-title">Editor de Foto de Perfil</h1>
                                <?php
                                } else if ($opt == 5) {
                                ?>
                                    <h1 class="modal-title">Editor de Foto de Portada</h1>
                                <?php
                                }
                                ?>
                                <!-- <h5 class="modal-title">Crop Image Before Upload</h5> -->
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="img-container">
                                    <div class="row">
                                        <div class="col-md-8 visor">
                                            <img src="<?php echo $files ?>" id="sample_image" />
                                        </div>
                                        <?php
                                        if ($opt == 1) {
                                        ?>
                                            <div class="col-md-4">
                                                <div class="col-md-12 textos_stados">
                                                    <h4>Escribe un comentario</h4>
                                                    <textarea class="form-control col-sm-12" name="estado_post" id="" cols="20" placeholder="Escribe aqui!" rows="5" maxlength="115"></textarea>
                                                    <label for="">Maximo 115 Caracteres</label>
                                                    <br>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" id="crop" class="btn btn-primary">Publicar</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>

<script>
    $(document).ready(function() {

        var $modal = $('#modal');
        var container = document.querySelector('.img-container');
        var image = container.getElementsByTagName('img').item(0);
        $modal.modal('show');

        var cropper;

        $('#upload_image').change(function(event) {
            var files = event.target.files;

            var done = function(url) {
                image.src = url;
                $modal.modal('show');
            };

            if (files && files.length > 0) {
                reader = new FileReader();
                reader.onload = function(event) {
                    done(reader.result);
                };
                reader.readAsDataURL(files[0]);
            }
        });
        $modal.on('shown.bs.modal', function() {
            if (opt == 1 || opt == 4) {
                cropper = new Cropper(image, {
                    aspectRatio: 1,
                    viewMode: 3,
                    preview: '.preview'
                });
            } else if (opt == 2) {
                cropper = new Cropper(image, {
                    aspectRatio: 3 / 5,
                    viewMode: 3,
                    preview: '.preview'
                });
            } else if (opt == 5) {
                cropper = new Cropper(image, {
                    aspectRatio: 19 / 6,
                    viewMode: 3,
                    preview: '.preview'
                });
            }
        }).on('hidden.bs.modal', function() {
            location.href = "index"
        });


        $('#crop').click(function() {

            if (opt == 1 || opt == 4) {
                canvas = cropper.getCroppedCanvas({
                    width: 750,
                    height: 750
                });
            } else if (opt == 2) {
                canvas = cropper.getCroppedCanvas({
                    width: 647,
                    height: 1080
                });
            } else if (opt == 5) {
                canvas = cropper.getCroppedCanvas({
                    width: 1440,
                    height: 454
                });
            }

            canvas.toBlob(function(blob) {
                url = URL.createObjectURL(blob);
                var reader = new FileReader();
                reader.readAsDataURL(blob);
                reader.onloadend = function() {
                    var base64data = reader.result;
                    document.getElementById("base65").value = base64data;
                    send_form();
                };
            });
        });

    });

    function send_form() {
        document.all["form_files"].submit();
    }
</script>