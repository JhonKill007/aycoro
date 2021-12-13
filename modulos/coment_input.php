<?php
$id_post = $_POST['id_post'];
// $id_comentador = $_POST['liker'];
$data = '
<div class="coment_add_box_send">
        <div class="coment_add_box_center">
            <div class="coment_add_input">
                <input class="form-control" name="coment_value" id="coment_value'.$id_post.'" placeholder="Agrega un comentario..." type="text">
            </div>
            <div class="coment_add_buttons">
                <button class="btn btn-success" onclick="SendComent'.$id_post.'()">Publicar</button>
            </div>
        </div>
</div>';

echo $data;



