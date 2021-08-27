<?php
$mjs = $_POST["mensaje"];
$id_sendner = $_POST["id_sendner"];
$id_reciver = $_POST["id_reciver"];
$opc = $_POST["opc"];
$readdate = 0;
$private = 0;

if($opc == 0){
    $mensaje = "Sugerencia: ".$mjs;
}
else{
    $mensaje = "Ayuda: ".$mjs;
}


$eso = require("conection.php");

if (!empty($mensaje) || !empty($id_sendner) || !empty($id_reciver) || !empty($readdate)) {

    if ($eso) {
        $SELECT_CHAT = "SELECT * FROM idchat WHERE (id_usu1 = $id_sendner AND id_usu2 = $id_reciver) OR (id_usu1 = $id_reciver AND id_usu2 = $id_sendner)";
        $resultadoCHAT = mysqli_query($conn, $SELECT_CHAT);
        $numCHAT = $resultadoCHAT->num_rows;
        if ($numCHAT == 0) {
            $INSERT_idChat = "INSERT INTO idchat (id_usu1,id_usu2)values('$id_sendner','$id_reciver')";
            $resultado_insChat = mysqli_query($conn, $INSERT_idChat);
            if ($resultado_insChat) {
                $SELECT_CHAT = "SELECT * FROM idchat WHERE (id_usu1 = $id_sendner AND id_usu2 = $id_reciver) OR (id_usu1 = $id_reciver AND id_usu2 = $id_sendner)";
                $resultadoCHAT = mysqli_query($conn, $SELECT_CHAT);
                if ($resultadoCHAT) {
                    $idchat = $resultadoCHAT->fetch_array();
                    $id_chat = $idchat['id_chat'];
                    $INSERT = "INSERT INTO chat (id_sendner,id_reciver,mensaje,readdate,id_chat,mgsprivate)values('$id_sendner','$id_reciver','$mensaje','$readdate','$id_chat','$private')";
                    $resultado = mysqli_query($conn, $INSERT);
                    if ($resultado) {
                        // echo "enviado";
                        if($opc == 0){
                            echo "<script>
                                alert('Su sugerencia a sido enviada.');
                                window.location='../index';
                                </script>";
                        }
                        else{
                            echo "<script>
                                alert('Tu solicitud de ayuda a sido enviada.');
                                window.location='../index';
                                </script>";
                        }
                    } else {
                        echo "valio verga";
                    }
                }
            }
        } else {
            $SELECT_CHAT = "SELECT * FROM idchat WHERE (id_usu1 = $id_sendner AND id_usu2 = $id_reciver) OR (id_usu1 = $id_reciver AND id_usu2 = $id_sendner)";
            $resultadoCHAT = mysqli_query($conn, $SELECT_CHAT);
            if ($resultadoCHAT) {
                $idchat = $resultadoCHAT->fetch_array();
                $id_chat = $idchat['id_chat'];
                $INSERT = "INSERT INTO chat (id_sendner,id_reciver,mensaje,readdate,id_chat,mgsprivate)values('$id_sendner','$id_reciver','$mensaje','$readdate','$id_chat','$private')";
                $resultado = mysqli_query($conn, $INSERT);
                if ($resultado) {
                    // echo "enviado";
                    // header("Location: ../dm.php?usu=$id_reciver");
                    if($opc == 0){
                        echo "<script>
                            alert('Su sugerencia a sido enviada.');
                            window.location='../index';
                            </script>";
                    }
                    else{
                        echo "<script>
                            alert('Tu solicitud de ayuda a sido enviada.');
                            window.location='../index';
                            </script>";
                    }
                } else {
                    echo "valio verga";
                }
            }
        }
    } else {
        echo "la connecion fallo";
    }
}
