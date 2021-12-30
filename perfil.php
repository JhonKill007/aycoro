<?php
$tittlePage = "Aycoro - Perfil";
require("fund/head.php");
?>

<script>
    identity_page_post = 2;
    $(document).ready(function() {

        var $modal = $('#modal');
        var container = document.querySelector('.img-container');
        var butoninput = document.querySelector('.image');
        var image = container.getElementsByTagName('img').item(0);
        var perfilfoto = document.getElementById('inputImageperfil');
        var portadafoto = document.getElementById('inputImageportada');

        var cropper;

        perfilfoto.onchange = function() {
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

        portadafoto.onchange = function() {
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
            perfilfoto.value = null;
            portadafoto.value = null;

        });
        $('#crop').click(function() {

            if (option == 1 || option == 4) {
                canvas = cropper.getCroppedCanvas({
                    width: 750,
                    height: 750
                });
            } else if (option == 2) {
                canvas = cropper.getCroppedCanvas({
                    width: 647,
                    height: 1080
                });
            } else if (option == 5) {
                canvas = cropper.getCroppedCanvas({
                    width: 1440,
                    height: 454
                });
                console.log(canvas)
            }

            canvas.toBlob(function(blob) {
                url = URL.createObjectURL(blob);
                var reader = new FileReader();
                reader.readAsDataURL(blob);
                reader.onloadend = function() {
                    var base64data = reader.result;
                    document.getElementById("base64_post").value = base64data;
                    document.getElementById("option_view_opt").value = option;
                    const timezone = Intl.DateTimeFormat().resolvedOptions().timeZone;
                    document.getElementById("time_view_opt").value = timezone;
                    debugger
                    send_form();
                    $modal.modal('show');
                };
            });
        });

    });
</script>

<style>
    .container-scroll {
        margin-top: -100px;
    }

    @media (max-width: 1120px) {

        .container-scroll {
            margin-top: -150px;
        }
    }
</style>

<body>

    <?php
    require("modulos/nav.php");
    require("modulos/nav-two.php");
    require("modulos/status-post.php");


    $eso = require("keys/conection.php");
    if ($eso) {
        $SELECT = "SELECT * FROM folow WHERE id_folowing ='$id_registro'";
        $resultado = mysqli_query($conn, $SELECT);
        $nume = $resultado->num_rows;
    } else {
        echo "fallo la coneccion";
    }

    require("modulos/perfil-bio.php");
    require("models/perfil_post_model.php");
    require("modulos/post-view.php");
    require("fund/script.php");
    ?>
</body>

</html>