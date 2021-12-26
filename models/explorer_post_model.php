<?php
$eso =  require('keys/conection.php');
if ($eso) {

    $SELECT = "SELECT * FROM post inner join registro on post.owner=registro.id_registro WHERE post.status = 'Active' ORDER BY id_post DESC";
    $resultado = mysqli_query($conn, $SELECT);
}
?>
