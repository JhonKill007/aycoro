<?php
$mensaje = $_POST["mensaje"];
$id_sendner = $_POST["id_sendner"];
$id_reciver = $_POST["id_reciver"];
$private = $_POST["mgsprivate"];
$vista = $_POST["vista"];
date_default_timezone_set('America/Santo_Domingo');
$fecha = date('d-m-Y');
$hora = date('h:i a');
$readdate = 0;

$eso = require("conection.php");

if ($mensaje != "") {
    if ($vista == 1) {
        $id_chat = $_POST["id_chat"];
        $readdate = $_POST["id_chat"];
        $INSERT = "INSERT INTO chat (id_sendner,id_reciver,mensaje,readdate,id_chat,mgsprivate,day,hour)values('$id_sendner','$id_reciver','$mensaje','$readdate','$id_chat','$private','$fecha','$hora')";
        $resultado = mysqli_query($conn, $INSERT);
        if ($resultado) {
            echo "enviado";
            // header("Location: ../dm.php?usu=$id_reciver");
        } else {
            echo "valio verga";
        }
    } else {
        if (!empty($mensaje) || !empty($id_sendner) || !empty($id_reciver) || !empty($readdate)) {

            if ($eso) {
                if ($private == 0) {
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
                                $INSERT = "INSERT INTO chat (id_sendner,id_reciver,mensaje,readdate,id_chat,mgsprivate,day,hour)values('$id_sendner','$id_reciver','$mensaje','$readdate','$id_chat','$private','$fecha','$hora')";
                                $resultado = mysqli_query($conn, $INSERT);
                                if ($resultado) {
                                    echo "enviado";
                                    // header("Location: ../dm.php?usu=$id_reciver");
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
                            $INSERT = "INSERT INTO chat (id_sendner,id_reciver,mensaje,readdate,id_chat,mgsprivate,day,hour)values('$id_sendner','$id_reciver','$mensaje','$readdate','$id_chat','$private','$fecha','$hora')";
                            $resultado = mysqli_query($conn, $INSERT);
                            if ($resultado) {
                                echo "enviado";
                                // header("Location: ../dm.php?usu=$id_reciver");
                            } else {
                                echo "valio verga";
                            }
                        }
                    }
                } else {
                    $SELECT_CHAT = "SELECT * FROM idchat WHERE id_usu1 = $id_sendner AND id_usu2 = $id_reciver AND private = $private";
                    $resultadoCHAT = mysqli_query($conn, $SELECT_CHAT);
                    $numCHAT = $resultadoCHAT->num_rows;
                    if ($numCHAT == 0) {
                        $INSERT_idChat = "INSERT INTO idchat (id_usu1,id_usu2,private)values('$id_sendner','$id_reciver',$private)";
                        $resultado_insChat = mysqli_query($conn, $INSERT_idChat);
                        if ($resultado_insChat) {
                            $SELECT_CHAT = "SELECT * FROM idchat WHERE id_usu1 = $id_sendner AND id_usu2 = $id_reciver AND private = $private";
                            $resultadoCHAT = mysqli_query($conn, $SELECT_CHAT);
                            if ($resultadoCHAT) {
                                $idchat = $resultadoCHAT->fetch_array();
                                $id_chat = $idchat['id_chat'];
                                $INSERT = "INSERT INTO chat (id_sendner,id_reciver,mensaje,readdate,id_chat,mgsprivate,day,hour)values('$id_sendner','$id_reciver','$mensaje','$readdate','$id_chat',$private,'$fecha','$hora')";
                                $resultado = mysqli_query($conn, $INSERT);
                                if ($resultado) {
                                    echo "enviado";
                                    // header("Location: ../dm.php?usu=$id_reciver");
                                } else {
                                    echo "valio verga";
                                }
                            }
                        }
                    } else {
                        $SELECT_CHAT = "SELECT * FROM idchat WHERE id_usu1 = $id_sendner AND id_usu2 = $id_reciver AND private = $private";
                        $resultadoCHAT = mysqli_query($conn, $SELECT_CHAT);
                        if ($resultadoCHAT) {
                            $idchat = $resultadoCHAT->fetch_array();
                            $id_chat = $idchat['id_chat'];
                            $INSERT = "INSERT INTO chat (id_sendner,id_reciver,mensaje,readdate,id_chat,mgsprivate,day,hour)values('$id_sendner','$id_reciver','$mensaje','$readdate','$id_chat',$private,'$fecha','$hora')";
                            $resultado = mysqli_query($conn, $INSERT);
                            if ($resultado) {
                                echo "enviado";
                                // header("Location: ../dm.php?usu=$id_reciver");
                            } else {
                                echo "valio verga";
                            }
                        }
                    }
                }
            } else {
                echo "la connecion fallo";
            }
        }
    }
}
