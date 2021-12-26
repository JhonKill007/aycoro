<?php
$eso = require("keys/conection.php");
if ($eso) {
    $SELECT = "SELECT * FROM folow WHERE id_folowing ='$id_registro'";
    $resultado = mysqli_query($conn, $SELECT);
    $segui = $resultado->num_rows;
    $nume = $segui - 1;
} else {
    echo "fallo la coneccion";
}
?>



<div class="conteiner">
    <div class="biograf">
        <div class="portada">
            <img src=<?php echo $portada; ?> alt="">
            <div class="pen">
                <label class="post-btn-container btn-upload portadacheck" for="inputImageportada" title="Editar Portada">
                    <input type="file" class="sr-only" id="inputImageportada" name="file" accept="image/*">
                    <i class="fas fa-pen"></i>
                </label>
            </div>
        </div>
        <div class="perfil">
            <img src=<?php echo $foto; ?> alt="img/usuario.png">
            <div class="pen2">
                <label class="post-btn-container btn-upload perfilcheck" for="inputImageperfil" title="Editar Perfil">
                    <input type="file" class="sr-only" id="inputImageperfil" name="file" accept="image/*">
                    <i class="fas fa-pen"></i>
                </label>
            </div>
        </div>
        <div class="nombre">
            <h1><?php echo $nombre . " " . $apellido; ?></h1>
            <a href=""><b><?php echo $usuario; ?></b></a>
            <br>
            <b><?php echo $nume . " " . "Seguidores"; ?></b>
            <p><?php echo $presentacion." "; ?><a href="edit-perfil"><i class="fas fa-cog"></i></a></p>
        </div>
        <hr>
    </div>
</div>