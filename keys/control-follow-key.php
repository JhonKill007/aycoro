<?php

$folowing = $_POST["folowing"];
$folower = $_POST["folower"];
$datafollow = "";


if (!empty($folowing) || !empty($folower)) {
    $eso = require("conection.php");
    if ($eso) {
        $SELECT = "SELECT usuario FROM registro WHERE id_registro ='$folowing'";
        $resultado = mysqli_query($conn, $SELECT);
        $user = $resultado->fetch_array();

        $SELECT = "SELECT * FROM folow WHERE id_folowing ='$folowing' and id_folower ='$folower'";
        $resultado = mysqli_query($conn, $SELECT);
        $nume = $resultado->num_rows;

        if ($nume == 0) {
            $INSERT = "INSERT INTO folow (id_folowing,id_folower,date_follow)values('$folowing','$folower',NOW())";
            $resultado = mysqli_query($conn, $INSERT);
            if ($resultado) {
                $SELECT = "SELECT * FROM folow WHERE id_folowing ='$folowing'";
                $resultado_2 = mysqli_query($conn, $SELECT);
                $segui = $resultado_2->num_rows;
                $seguidores = $segui - 1;

                $SELECT = "SELECT * FROM folow WHERE id_folower ='$folowing'";
                $resultado_2 = mysqli_query($conn, $SELECT);
                $segui = $resultado_2->num_rows;
                $seguidos = $segui - 1;

                // <div class='buton_follow'><button class='green'>Seguido</button><b>". $seguidores ." Seguidores</b></div>
                $datafollow .= "<div class='button-box like'>
                                        <div class='buton_follow'>
                                            <div class='button_follow' type='submit'>
                                                <div class='icon_follow'>
                                                    <i class='fas fa-user-check'></i>
                                                </div>
                                            </div>
                                            <div class='cant_follow_conteiner'><a id='folowers_perfil' href='folows?o=1&user=" . $user['usuario'] . "'><b>" . $seguidos . " Seguidos </b></a><span>|</span><a id='folowers_perfil' href='folows?o=2&user=" . $user['usuario'] . "'><b> " . $seguidores . " Seguidores</b></a></div>
                                        </div>
                                    </div>";
            } else {
                echo "valio verga";
                // <div class='cant_follow_conteiner'><b>" . $seguidores . " Seguidores</b></div>
            }
            echo $datafollow;
        } else {
            $DELETE = "DELETE FROM folow WHERE id_folowing = $folowing and id_folower = $folower";
            $resultado = mysqli_query($conn, $DELETE);
            if ($resultado) {
                $SELECT = "SELECT * FROM folow WHERE id_folowing ='$folowing'";
                $resultado_2 = mysqli_query($conn, $SELECT);
                $segui = $resultado_2->num_rows;
                $seguidores = $segui - 1;

                $SELECT = "SELECT * FROM folow WHERE id_folower ='$folowing'";
                $resultado_2 = mysqli_query($conn, $SELECT);
                $segui = $resultado_2->num_rows;
                $seguidos = $segui - 1;

                // <div class='buton_follow'><button class='blue'>Seguir</button><b>". $seguidores ." Seguidores</b></div>
                $datafollow .= "<div class='button-box like'>
                                        <div class='buton_follow'>
                                            <div class='button_follow' type='submit'>
                                                <div class='lettle_follow'>
                                                    <b>Seguir</b>
                                                </div>
                                            </div>
                                            <div class='cant_follow_conteiner'><a id='folowers_perfil' href='folows?o=1&user=" . $user['usuario'] . "'><b>" . $seguidos . " Seguidos </b></a><span>|</span><a id='folowers_perfil' href='folows?o=2&user=" . $user['usuario'] . "'><b> " . $seguidores . " Seguidores</b></a></div>
                                        </div>
                                    </div>";
            } else {
                echo "valio verga";
            }
            echo $datafollow;
        }
    } else {
        echo "la connecion fallo";
    }
}
