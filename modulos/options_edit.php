<?php
$id_post = $_POST['id_post'];
$data = '
<div class="options-edit-post">

    <br>
    <ul>
        <li onclick="EditPost'.$id_post.'()"><b class="text-gren">Editar</b></li>
        <li onclick="options'.$id_post.'()"><b class="text-red">Eliminar</b></li>
    </ul>
</div>';

echo $data;