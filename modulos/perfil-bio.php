<?php
$eso = require("keys/conection.php");
if ($eso) {
    $SELECT = "SELECT * FROM folow WHERE id_folowing ='$id_registro'";
    $resultado = mysqli_query($conn, $SELECT);
    $segui = $resultado->num_rows;
    $can_of_folowers = $segui - 1;

    $SELECT = "SELECT * FROM folow WHERE id_folower ='$id_registro'";
    $resultado = mysqli_query($conn, $SELECT);
    $segui = $resultado->num_rows;
    $can_of_foloweds = $segui - 1;
} else {
    echo "fallo la coneccion";
}
?>





<div class="conteiner">
    <div class="biograf">
        <div class="portada">
            <img src=<?php echo $portada; ?> alt="">
            <div class="pen">
                <label class="post-btn-container btn-upload portadacheck" for="inputImageportada" onclick="fotoPortada()" title="Editar Portada">
                    <input type="file" name="image" class="image_post" id="inputImageportada" data-option="2" style="display:none" accept="image/*" />
                    <i class="fas fa-pen"></i>
                </label>
            </div>
        </div>
        <div class="perfil">
            <img src=<?php echo $foto; ?> alt="img/usuario.png">
            <div class="pen2">
                <label class="post-btn-container btn-upload perfilcheck" for="inputImageperfil" onclick="fotoPerfil()" title="Cambiar Foto">
                    <input type="file" name="image" class="image_post" id="inputImageperfil" data-option="2" style="display:none" accept="image/*" />
                    <i class="fas fa-pen"></i>
                </label>
            </div>
        </div>
        <div class="nombre">
            <h4><?php echo $nombre; ?></h4>
            <a href=""><b><?php echo $usuario; ?></b></a>
            <br>
            <a id="folowers_perfil" href="folows?o=1&user=<?php echo $usuario; ?>"><b><?php echo $can_of_folowers . " " . "Seguidores"; ?></b></a>
            <span>|</span>
            <a id="folowers_perfil" href="folows?o=2&user=<?php echo $usuario; ?>"><b><?php echo $can_of_foloweds . " " . "Seguidos"; ?></b></a>
            <p><?php echo $presentacion . " "; ?><a href="configuration"><i class="fas fa-cog"></i></a></p>
        </div>
        <hr>
    </div>
</div>