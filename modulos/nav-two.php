<?php
if (isset($_COOKIE["IgtX9000"])) {
    $_SESSION['id'] = $_COOKIE["IgtX9000"];
}
if (!isset($_SESSION['id'])) {
} else {
?>
    <div class="conteiner-nav-two">
        <div class="nav-two">
            <a href="index">Inicio</a>
            <a href="explorador">Explorador</a>
            <a href="historias">Historias</a>

        </div>
    </div>
<?php
}
