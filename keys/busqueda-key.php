<?php
session_start();

$word = $_POST['search-box'];
$data = "";

$eso = require("conection.php");
if ($eso) {
    if (!empty($word)) {
        $SELECT = "SELECT * FROM registro WHERE (nombre LIKE '%$word%') OR (usuario LIKE '%$word%')";
        $resultado = mysqli_query($conn, $SELECT);
        if ($resultado) {
            while ($usu = $resultado->fetch_array()) {
                $id_usu = $usu['id_registro'];
                $nombre_usu = $usu['nombre'];
                $foto_usu = $usu['foto'];
                $user_usu = $usu['usuario'];

                if ($id_usu == $_SESSION['id']) {
                    $data .= "<a href='perfil'>
                                <div class='search_conteiner_box'>
                                    <div class='img_search_box'>
                                        <img src='" . $foto_usu . "'>
                                    </div>
                                    <div class='nameAndUserSeach'>
                                        <b>" . $user_usu . "</b>
                                        <br>
                                        <span>" . $nombre_usu . "</span>
                                    </div>
                                </div>
                            </a>";
                } else {
                    $data .= "<a href='user?user=" . $user_usu . "'>
                                <div class='search_conteiner_box'>
                                    <div class='img_search_box'>
                                        <img src='" . $foto_usu . "'>
                                    </div>
                                    <div class='nameAndUserSeach'>
                                        <b>" . $user_usu . "</b>
                                        <br>
                                        <span>" . $nombre_usu . "</span>
                                    </div>
                                </div>
                            </a>";
                }
            }
            if ($data !=  "") {
                echo "<div class='conteiner_search_box'>" . $data . "</div>";
            } else {
                echo "<div class='conteiner_search_box'>
                        <div class='search_conteiner_box'>
                            <b class='NoFoundSearch'>No se han encontrado resultados para tu búsqueda</b>
                        </div>
                    </div>";
            }
        }
    } else {
        echo "No se han encontrado resultados para tu búsqueda";
    }
} else {
    echo "la coneccion fallo";
}
