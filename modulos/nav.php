<?php
session_start();
if (isset($_COOKIE["IgtX9000"])) {
    $_SESSION['id'] = $_COOKIE["IgtX9000"];
}
if (!isset($_SESSION['id'])) {
    header("Location: login");
} else {
    require('keys/identification.php');
?>


    <script>
        var option = 0;

        function post() {
            option = 1;
            // console.log(option);

        }

        function history() {
            option = 2;
            // console.log(option);

        }

        function fotoPerfil(){
            option = 4;
        }

        function fotoPortada(){
            option = 5;
        }

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

            inputpost_nav.onchange = function() {
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

            inputhistory_nav.onchange = function() {
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
                    if (option == 1) {
                        document.querySelector(".text_input_post").classList.toggle("show")
                    }
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
                inputpost_nav.value = null;
                inputhistory_nav.value = null;
                if (option == 1) {
                    document.querySelector(".text_input_post").classList.toggle("show");
                }

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
                }

                canvas.toBlob(function(blob) {
                    // console.log(blob)
                    url = URL.createObjectURL(blob);
                    var reader = new FileReader();
                    reader.readAsDataURL(blob);
                    reader.onloadend = function() {
                        var base64data = reader.result;
                        document.getElementById("base64_post").value = base64data;
                        document.getElementById("option_view_opt").value = option;
                        const timezone = Intl.DateTimeFormat().resolvedOptions().timeZone;
                        document.getElementById("time_view_opt").value = timezone;
                        send_form();
                        $modal.modal('show');
                    };
                });
            });

        });
    </script>


    <!-- <div class="container" align="center">
        <br />
        <h3 align="center">Crop Image Before Upload using CropperJS with PHP</h3>
        <br />
        <div class="row">
            <div class="col-md-4">&nbsp;</div>
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
            </div>
        </div>
    </div> -->



    <div class="container" align="center">
        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="img-container">
                            <div class="row">
                                <div class="col-md-8 visor">
                                    <div class="img_conteiner">
                                        <img src="" id="sample_image" />
                                    </div>
                                </div>
                                <div class="col-md-4 text_input_post">
                                    <div class="col-md-12 textos_stados">
                                        <h4>Escribe un comentario</h4>
                                        <form action="keys/agregar-post-key.php" id="form_files" method="post" enctype="multipart/form-data">
                                            <input type="hidden" id="base64_post" name="file_post" value="hola como estas">
                                            <input type="hidden" id="option_view_opt" name="opcion" value="">
                                            <input type="hidden" id="time_view_opt" name="time" value="">
                                            <textarea class="form-control col-sm-12" name="estado_post" id="estado_post" cols="20" placeholder="Escribe aqui!" rows="5" maxlength="115"></textarea>
                                        </form>
                                        <label for="">Maximo 115 Caracteres</label>
                                        <br>
                                    </div>
                                </div>
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
    </div>


    <div class="container-one">




        <nav class="bar-main fixed-top">

            <ul class="bar-menu">
                <br>
                <br>
                <br>
                <br>
                <a href="perfil" title="Perfil"><img src=<?php echo $foto; ?> class="foto-bar" alt=""></a>
                <li><a href="perfil" title="Perfil"><?php echo $nombre . ' ' . $apellido ?></a></li>
                <li><a href="message" title="Mensajes">Mensajes (<label class="num-message-bar" for="icon-logo"></label>)</a></li>
                <li><a href="explorador" title="Explorador">Explorador</a></li>
                <li><a href="historias" title="Historias">Historias</a></li>
                <li><a href="edit-perfil" title="Ajustes">Ajustes</a></li>
                <li><a href="sugerencias" title="Sugerencias">Sugerencias</a></li>
                <li><a href="ayuda" title="Ayuda">Ayuda</a></li>
                <li><a href="modulos/logout.php" title="Cerrar Sesion">Cerrar Sesion</a></li>
                <div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                </div>

            </ul>
        </nav>



        <!-- new barra -->
        <div class="barra-inicio-new">
            <!-- componentes -->
            <nav class="nav-main">
                <ul>
                    <li>
                        <!-- logo -->
                        <!-- <a href="index.php"><img id="logo" src="img/logo.png" alt="hola"></a> -->
                        <a href="index"><img id="logo" src="img/Logo.png" title="Aycoro" alt=""></a>
                        <a href="index"><img id="logo2" src="img/Logo2.png" title="Aycoro" alt=""></a>
                    </li>
                    <li>
                        <!-- container -->
                        <div class="middle-nav">
                            <form action="busqueda" method="GET" class="form-horizontal">
                                <!-- caja de busqueda -->
                                <input type="search" name="search-box" title="A quien busca?" placeholder="A quien buscas?" id="search-box">
                                <!-- boton buscar -->
                                <button class="btn btn-success" id="search-boton" title="Buscar" name="search-boton" type="submit"><i class="fas fa-search"></i></button>
                            </form>


                        </div>
                    </li>
                    <li>
                        <!-- boton log -->
                        <div class="img-barra">
                            <div class="img-box">
                                <a href="perfil"><img id="usuario-photo" title="Perfi" src=<?php echo $foto; ?> alt="perfil"></a>

                            </div>
                        </div>
                    </li>
                    <li class="icon-message">
                        <!-- mensaje -->
                        <img class="message-btn" id="icon-logo" src="img/message.png" title="Mensajes" alt="Mensajes">
                        <div class="cicule-mjs">
                            <span class="num-message" for="icon-logo"></span>
                        </div>
                    </li>
                    <li class="icon-out">
                        <a href="modulos/logout.php">
                            <div><i title="Cerrar Sesion" class="fas fa-sign-out-alt go-out"></i></div>
                        </a>
                    </li>
                    <li class="search-button-two">
                        <div class="search">
                            <!-- <span class="text"></span> -->
                            <form action="busqueda" method="GET">
                                <input type="text" name="search-box" title="A quien buscas?" placeholder="A quien Buscas?">
                            </form>
                            <button><i class="fas fa-search" title="Buscar"></i></button>
                        </div>
                    </li>
                    <li>
                        <div class="menu-btn">
                            <i class="fas fa-bars" title="Menu"></i>
                            <div class="cir-num-mjs">
                                <label class="num-message-bar-Two" for="icon-logo"></label>
                            </div>
                        </div>
                    </li>
                </ul>

            </nav>

        </div>
        <script>
            const MonViewTwo = document.querySelector(".num-message-bar-Two");
            const MonView = document.querySelector(".num-message");
            const MonViewone = document.querySelector(".num-message-bar");
            setInterval(() => {
                let xhrz = new XMLHttpRequest();
                xhrz.open("GET", "keys/num-onview-key.php", true);
                xhrz.onload = () => {
                    if (xhrz.readyState === XMLHttpRequest.DONE) {
                        if (xhrz.status === 200) {
                            let datoview = xhrz.response;
                            MonView.innerHTML = datoview;
                            MonViewTwo.innerHTML = datoview;
                            MonViewone.innerHTML = datoview;
                        }
                    }
                }
                xhrz.send();
            }, 500);
        </script>

        <!-- barra lateral derecha -->
        <nav class="bar-main-rigth fixed-top">

            <ul class="bar-menu-rigth">
                <a href="message">
                    <h2>Mensajes</h2>
                </a>
                <div class="chat-list-nav">

                </div>


            </ul>
        </nav>
        <div class="box-main-two create-box-two-a">
            <div class="bar-box-main-two">
                <div class="box-create-two">
                    <div class="box-i-photo-a box-boton">
                        <label class="post-btn-container btn-upload postcheck" for="inputpost_nav" onclick="post()" title="Publicar Foto">
                            <input type="file" class="image_post" id="inputpost_nav" name="file" style="display:none" accept="image/*">
                            <i class="fas fa-plus"></i>
                        </label>
                    </div>
                    <div title="Discusion" class="box-i-event-a box-boton">
                        <label class="post-btn-container btn-upload historycheck" for="inputhistory_nav" onclick="history()" title="Publicar Historia">
                            <input type="file" class="image_post" id="inputhistory_nav" style="display:none" name="file" accept="image/*">
                            <i class="fas fa-clock"></i>
                        </label>
                    </div>
                    <div title="Estado" class="box-i-stat-a box-boton post-write"><i class="fas fa-pen lapiz-i"></i></div>
                </div>
            </div>

        </div>
    </div>

<?php
}
?>