<?php
session_start();
if (isset($_SESSION['id'])) {
    require("conection.php");
    $id_sendner = $_POST["id_sendner"];
    $id_reciver = $_POST["id_reciver"];
    $private = $_POST["mgsprivate"];
    $vista = $_POST["vista"];
    $creatdm = $_POST["createdms"];

    $output = "";
    if ($creatdm == 1) {
        $SELECT_CHAT = "SELECT * FROM idchat WHERE id_usu1 = $id_sendner AND id_usu2 = $id_reciver AND private = $private";
        $resultadoCHAT = mysqli_query($conn, $SELECT_CHAT);
        if ($info_chat = $resultadoCHAT->fetch_array()) {
            $id_chat = $info_chat['id_chat'];

            $SELECT = "SELECT * FROM chat inner join registro on chat.id_sendner=registro.id_registro WHERE id_chat = '$id_chat'";
            $resultado = mysqli_query($conn, $SELECT);
            if ($resultado->num_rows > 0) {
                while ($ms = $resultado->fetch_array()) {
                    if ($ms['id_sendner'] == $id_sendner) {
                        $output .= '<div class="chat outgoing">
                                    <div class="details">
                                        <p>' . $ms['mensaje'] . '</p>
                                    </div>
                                </div>';
                    } else {
                        $output .= '<div class="chat incoming">
                                    <img src="' . $ms['foto'] . '" alt="">
                                    <div class="details">
                                        <p>' . $ms['mensaje'] . '</p>
                                    </div>
                                </div>';
                    }
                }
                // echo $output;
            }
        }
    } else {
        $SELECT = "SELECT * FROM chat inner join registro on chat.id_sendner=registro.id_registro WHERE (id_sendner = '$id_sendner' OR id_sendner = '$id_reciver')
                             AND ( id_reciver = '$id_reciver' OR id_reciver = '$id_sendner') AND mgsprivate = $private";
        $resultado = mysqli_query($conn, $SELECT);
        if ($vista == 0) {
            if ($resultado->num_rows > 0) {
                while ($ms = $resultado->fetch_array()) {
                    if ($ms['id_sendner'] == $id_sendner) {
                        $output .= '<div class="chat outgoing">
                                    <div class="details">
                                        <p>' . $ms['mensaje'] . '</p>
                                    </div>
                                </div>';
                    } else {
                        $output .= '<div class="chat incoming">
                                    <img src="' . $ms['foto'] . '" alt="">
                                    <div class="details">
                                        <p>' . $ms['mensaje'] . '</p>
                                    </div>
                                </div>';
                    }
                }
                // echo $output;
            }
        } else {
            if ($resultado->num_rows > 0) {
                while ($ms = $resultado->fetch_array()) {
                    if ($ms['id_sendner'] == $id_sendner) {
                        $output .= '<div class="chat outgoing">
                                    <div class="details">
                                        <p>' . $ms['mensaje'] . '</p>
                                    </div>
                                </div>';
                    } else {
                        $output .= '<div class="chat incoming">
                                    <img src="img/usuario.png" alt="">
                                    <div class="details">
                                        <p>' . $ms['mensaje'] . '</p>
                                    </div>
                                </div>';
                    }
                }
                // echo $output;
            }
        }
    }
    if($output == ''){
        $output.= '<div class="details letter-comver">
                        <h3>No haz iniciado una converzacion</h3>
                   </div>';
    }
    echo $output;
} else {
    header("Location: ../login");
}
