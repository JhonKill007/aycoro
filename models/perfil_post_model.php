<?php
$eso =  require('keys/conection.php');
if ($eso) {

    $SELECT = "SELECT * FROM post inner join registro on post.owner=registro.id_registro where owner = $id_registro ORDER BY id_post DESC LIMIT 12";
    $resultado = mysqli_query($conn, $SELECT);
}
?>