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
    $SELECT_CHAT = "SELECT * FROM idchat WHERE (id_usu1 = $id_sendner AND id_usu2 = $id_reciver) OR (id_usu1 = $id_reciver AND id_usu2 = $id_sendner) AND private = $private";
    $resultadoCHAT = mysqli_query($conn, $SELECT_CHAT);
    if ($info_chat = $resultadoCHAT->fetch_array()) {
        $id_chat = $info_chat['id_chat'];

        $SELECT = "SELECT * FROM chat inner join registro on chat.id_sendner=registro.id_registro WHERE id_chat = '$id_chat' order by id_message desc";
        $resultado = mysqli_query($conn, $SELECT);
        if ($resultado->num_rows > 0) {
            if ($ms = $resultado->fetch_array()) {
                $output .= '' . $ms['mensaje'] . ' ' . $ms['hour'] . ' ' . $ms['day'] . '';
            }
        }
    }
    if ($output == '') {
        $output .= 'No haz iniciado una conversacion';
    }
    echo $output;
} else {
    header("Location: ../login");
}
