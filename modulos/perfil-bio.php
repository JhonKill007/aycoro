<?php
$eso = require("keys/conection.php");
if ($eso) {
    $SELECT = "SELECT * FROM folow WHERE id_folowing ='$id_registro'";
    $resultado = mysqli_query($conn, $SELECT);
    $nume = $resultado->num_rows;
} else {
    echo "fallo la coneccion";
}
?>

<div class="conteiner">
    <div class="biograf">
        <div class="portada">
            <img src=<?php echo $portada; ?> alt="">
            <div class="pen"><a href="edit-portada"><i class="fas fa-pen"></i></a></div>
        </div>
        <div class="perfil">
            <img src=<?php echo $foto; ?> alt="img/usuario.png">
            <div  class="pen2"><a href="edit-perfil"><i class="fas fa-pen"></i></a></div>
        </div>
        <div class="nombre">

            <h1><?php echo $nombre . " " . $apellido; ?></h1>
            <b><?php echo $nume . " " . "Seguidores"; ?></b>
            <p><?php echo $presentacion; ?></p>
            <!-- <div class="folower-perfil">
                <b><?php echo $nume . " " . "Seguidores"; ?></b>

            </div> -->
        </div>

    </div>
</div>