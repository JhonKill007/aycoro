<?php
session_start();
$id_post = $_POST['id_post'];
$data = "";

if (!empty($id_post)) {
    $eso = require("conection.php");
    if ($eso) {
        $SELECT = "SELECT * FROM comentarios INNER JOIN registro ON comentarios.id_coment_owner = registro.id_registro WHERE id_publicacion = $id_post ORDER BY id_comentario DESC";
        $resultado = mysqli_query($conn, $SELECT);
        if ($resultado) {
            while ($coments = $resultado->fetch_array()) {
                $id_registro = $coments['id_registro'];
                $foto_perfil = $coments['foto'];
                $nombre_perfil = $coments['nombre'];
                $usuario_perfil = $coments['usuario'];
                $fecha_coment = $coments['coment_date'];
                $value_coment = $coments['comentario'];


                if ($id_registro == $_SESSION['id']) {
                    $head_coment = '<a href="perfil">
                                        <div class="head_coment_text_box">
                                            <div class="img_perfil_coment">
                                                <img src="' . $foto_perfil . '" alt="">
                                            </div>
                                            <div class="name_perfil_coment">
                                                <b>' . $usuario_perfil . '</b>
                                            </div>    
                                        </div>
                                    </a>';
                } else {
                    $head_coment = '<a href="user?user=' . $usuario_perfil . '">
                                        <div class="head_coment_text_box">
                                            <div class="img_perfil_coment">
                                                <img src="' . $foto_perfil . '" alt="">
                                            </div>
                                            <div class="name_perfil_coment">
                                                <b>' . $usuario_perfil . '</b>
                                            </div>
                                        </div>
                                    </a>';
                }


                $data .= '<div class="model-coment-view">
                            
                            ' . $head_coment . '    
                            
                            <div class="coment_value">
                                <p>' . $value_coment . ' <span class="coment_date">' . $fecha_coment . '</span></p>
                            </div>
                        </div>
                ';
            }
            echo $data;
        } else {
            $data = "Ha ocurrido un error!";
            echo $data;
        }
    } else {
        $data = "la connecion fallo";
        echo $data;
    }
} else {
    $data = "debe llenar los datos";
    echo $data;
}
