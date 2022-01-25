<?php

// localhost

$host = "localhost";
$dbusername = "root";
$dbpassword =  "";
$dbname = "aycoro";

// hostserver

$dato1 = "8v28lZG7cl0e49JwHLQFdg==";
$dato2 = "Y5EI7XESOneJe+x8J0h0FYLuFpM9rkWoF9vLyXBxca0=";
$dato3 = "MIKDKY//D5oylhPCJxqPE56fS1HZGbLOrCS/y0gQJeY=";
$dato4 = "Y5EI7XESOneJe+x8J0h0FYLuFpM9rkWoF9vLyXBxca0=";


$clave  = 'Como usar las funciones para encriptar y desencriptar, Una cadena, muy, muy larga para mejorar la encriptacion';
$obj = "asdfghjklqwertyuiopzxcvbnm1234567890mnbvcxzlkjhgfdsapoiuytrewq0987654321";
$method = 'aes-256-cbc';
$iv = base64_decode($obj);

$desencriptar = function ($valor) use ($method, $clave, $iv) {
    $encrypted_data = base64_decode($valor);
    return openssl_decrypt($valor, $method, $clave, false, $iv);
};


// $host = $desencriptar($dato1);
// $dbusername = $desencriptar($dato2);
// $dbpassword =  $desencriptar($dato3);
// $dbname = $desencriptar($dato4);


$conn = new mysqli($host,$dbusername,$dbpassword,$dbname);

?>