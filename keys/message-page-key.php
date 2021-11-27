<?php
session_start();
$id = $_SESSION['id'];


require("conection.php");
$id_mds =  array(0);


$SELECT = "SELECT id_chat FROM chat WHERE id_reciver = $id OR id_sendner = $id ORDER BY id_message DESC";
$resultado = mysqli_query($conn, $SELECT);
$vueltas = count($id_mds);
$contador = 0;

$data = '';


while ($men = $resultado->fetch_array()) {

    $idchat = $men['id_chat'];

    array_push($id_mds, $idchat);

}

$todos =  (array_unique($id_mds));


foreach ($todos as $numero) {

    if ($numero != 0) {


        $id_chat = $numero;

        $SELECTidchat = "SELECT * FROM idchat WHERE id_chat = $id_chat";
        $resultadoidchat = mysqli_query($conn, $SELECTidchat);
        if ($resultadoidchat) {
            while ($idchat_result = $resultadoidchat->fetch_array()) {
                if ($idchat_result['private'] == 0) {
                    $dato_id;
                    if ($idchat_result['id_usu1'] == $id) {
                        $dato_id = $idchat_result['id_usu2'];
                    } else {
                        $dato_id = $idchat_result['id_usu1'];
                    }
                    $SELECT_perfil = "SELECT * FROM registro WHERE id_registro = '$dato_id'";
                    $resultado_perfil = mysqli_query($conn, $SELECT_perfil);
                    $info_perfil = $resultado_perfil->fetch_array();


                    $nameandlast = $info_perfil['nombre'] . ' ' . $info_perfil['apellido'];
                    $cant_nom_caract = strlen($nameandlast);
                    if($cant_nom_caract > 21){
                        $nomape = substr($nameandlast, 0, 18) . '...';
                    }
                    else{
                        $nomape = $info_perfil['nombre'] . ' ' . $info_perfil['apellido'];
                    }
                    $foto_mgs = $info_perfil['foto'];



                    $SELECT_mgs = "SELECT * FROM chat WHERE id_chat = $id_chat ORDER BY id_message DESC";
                    $resultado_mgs = mysqli_query($conn, $SELECT_mgs);

                    if ($mgs = $resultado_mgs->fetch_array()) {
                        $msgs = $mgs['mensaje'];
                        if ($mgs['id_sendner'] == $id) {
                            $ypo = 'Tu:';
                        } else {
                            $ypo = '';
                        }
                        $msgst = substr($msgs, 0, 29) . '...';

                        if ($mgs['readdate'] == 0 && $mgs['id_sendner'] == $dato_id) {
                            $data .= '<a href="dm.php?usu=' . $dato_id . '&idmine=' . $id . '">
                                                                <div class="message-box-page-me">
                                                                <img class="img_mgs" src="' . $foto_mgs . '" alt="">
                                                                    <b>' . $nomape . '</b>
                                                                    <br>
                                                                    <b class="mgs_pgas">' . $ypo . $msgst . '</b>
                                                                </div>
                                                            </a>';
                        } else if ($mgs['id_sendner'] == $id) {
                            $data .= '<a href="dm.php?usu=' . $dato_id . '&idmine=' . $id . '">
                                                            <div class="message-box-page-me">
                                                            <img class="img_mgs" src="' . $foto_mgs . '" alt="">
                                                                    <b>' . $nomape . '</b>
                                                                    <p class="mgs_pgas">' . $ypo . $msgst . '</p>
                                                                </div>
                                                            </a>';
                        } else {
                            $data .= '<a href="dm.php?usu=' . $dato_id . '&idmine=' . $id . '">
                                                            <div class="message-box-page-nome">
                                                            <img class="img_mgs" src="' . $foto_mgs . '" alt="">
                                                                    <b>' . $nomape . '</b>
                                                                    <p class="mgs_pgas">' . $ypo . $msgst . '</p>
                                                                </div>
                                                            </a>';
                        }
                    }
                } else {
                    $dato_id = $idchat_result['id_usu1'];
                    if ($idchat_result['id_usu1'] == $id) {
                    } else {
                        $SELECT_perfil = "SELECT * FROM registro WHERE id_registro = '$dato_id'";
                        $resultado_perfil = mysqli_query($conn, $SELECT_perfil);
                        $info_perfil = $resultado_perfil->fetch_array();
                        $nomape = 'Incognito';




                        $SELECT_mgs = "SELECT * FROM chat WHERE id_chat = $id_chat ORDER BY id_message DESC";
                        $resultado_mgs = mysqli_query($conn, $SELECT_mgs);

                        if ($mgs = $resultado_mgs->fetch_array()) {
                            $msgs = $mgs['mensaje'];

                            if ($mgs['id_sendner'] == $id) {
                                $ypo = 'Tu:';
                            } else {
                                $ypo = '';
                            }
                            $msgst = substr($msgs, 0, 29) . '...';

                            if ($mgs['readdate'] == 0 && $mgs['id_sendner'] == $dato_id) {
                                $data .= '<a href="dm_.php?private=' . $id_chat . '">
                                                                <div class="message-box-page-me">
                                                                <img class="img_mgs" src="img/usuario.png" alt="">
                                                                    <b>' . $nomape. '</b>
                                                                    <br>
                                                                    <b class="mgs_pgas">' . $ypo . $msgst . '</b>
                                                                </div>
                                                            </a>';
                            } else if ($mgs['id_sendner'] == $id) {
                                $data .= '<a href="dm_.php?private=' . $id_chat . '">
                                                            <div class="message-box-page-me">
                                                            <img class="img_mgs" src="img/usuario.png" alt="">
                                                                    <b>' . $nomape. '</b>
                                                                    <p class="mgs_pgas">' . $ypo . $msgst . '</p>
                                                                </div>
                                                            </a>';
                            } else {
                                $data .= '<a href="dm_.php?private=' . $id_chat . '">
                                                            <div class="message-box-page-nome">
                                                            <img class="img_mgs" src="img/usuario.png" alt="">
                                                                    <b>' . $nomape . '</b>
                                                                    <p class="mgs_pgas">' . $ypo . $msgst . '</p>
                                                                </div>
                                                            </a>';
                            }
                        }
                    }
                }
            }
        } else {
            echo "hay un fallo";
        }
    }
}
if ($data == '') {
    $data .= '<h4 class="nochat">No tienes ningun Chat</h4>';
}
echo $data;
