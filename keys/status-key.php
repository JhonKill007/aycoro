<?php
// session_start();
// if (isset($_SESSION['id'])) {
//     require("conection.php");
//     $id_usu = $_POST['id_reciver'];
//     $output = "";

//     $SELECT = "SELECT * FROM registro WHERE id_registro = $id_usu";
//     $resultado = mysqli_query($conn, $SELECT);
//     if ($resultado) {
//         while ($usu = $resultado->fetch_array()) {
//             $status_usu = $usu['status'];
//             if ($status_usu == 'Online') {
//                 $output .= '<p class="status_online">' . $status_usu . '</p>';
//             } else {
//                 $output .= '<p>' . $status_usu . '</p>';
//             }
//         }
//     }
// } else {
//     header("Location: ../login");
// }
