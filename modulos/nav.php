<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: login");
} else {
    require('keys/identification.php');

    // 
?>
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
                <script>
                    const MonViewone = document.querySelector(".num-message-bar");
                    setInterval(() => {
                        let xhrzone = new XMLHttpRequest();
                        xhrzone.open("GET", "keys/num-onview-key.php", true);
                        xhrzone.onload = () => {
                            if (xhrzone.readyState === XMLHttpRequest.DONE) {
                                if (xhrzone.status === 200) {
                                    let datoviewone = xhrzone.response;
                                    MonViewone.innerHTML = datoviewone;
                                }
                            }
                        }
                        xhrzone.send();
                    }, 500);
                </script>
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
                        <script>
                            const MonView = document.querySelector(".num-message");
                            setInterval(() => {
                                let xhrz = new XMLHttpRequest();
                                xhrz.open("GET", "keys/num-onview-key.php", true);
                                xhrz.onload = () => {
                                    if (xhrz.readyState === XMLHttpRequest.DONE) {
                                        if (xhrz.status === 200) {
                                            let datoview = xhrz.response;
                                            MonView.innerHTML = datoview;
                                        }
                                    }
                                }
                                xhrz.send();
                            }, 500);
                        </script>
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
            setInterval(() => {
                let xhrzTwo = new XMLHttpRequest();
                xhrzTwo.open("GET", "keys/num-onview-key.php", true);
                xhrzTwo.onload = () => {
                    if (xhrzTwo.readyState === XMLHttpRequest.DONE) {
                        if (xhrzTwo.status === 200) {
                            let datoviewTwo = xhrzTwo.response;
                            MonViewTwo.innerHTML = datoviewTwo;
                        }
                    }
                }
                xhrzTwo.send();
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

                <script>
                    const chatListaNav = document.querySelector(".chat-list-nav");
                    setInterval(() => {
                        let xhrz = new XMLHttpRequest();
                        xhrz.open("GET", "keys/message-nav-key.php", true);
                        xhrz.onload = () => {
                            if (xhrz.readyState === XMLHttpRequest.DONE) {
                                if (xhrz.status === 200) {
                                    let datanav = xhrz.response;
                                    chatListaNav.innerHTML = datanav;
                                }
                            }
                        }
                        xhrz.send();
                    }, 500);
                </script>






            </ul>
        </nav>
        <div class="box-main-two create-box-two-a">
            <div class="bar-box-main-two">
                <div class="box-create-two">
                    <div class="box-i-photo-a box-boton">
                        <label class="post-btn-container btn-upload postcheck" for="inputImage" title="Publicar Foto">
                            <input type="file" class="sr-only" id="inputImage" name="file" accept="image/*">
                            <i class="fas fa-plus"></i>
                        </label>
                    </div>
                    <div title="Discusion" class="box-i-event-a box-boton">
                        <label class="post-btn-container btn-upload historycheck" for="inputImagehistory" title="Publicar Historia">
                            <input type="file" class="sr-only" id="inputImagehistory" name="file" accept="image/*">
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