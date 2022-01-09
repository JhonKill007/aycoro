<?php
session_start();
if (isset($_COOKIE["IgtX9000"])) {
    $_SESSION['id'] = $_COOKIE["IgtX9000"];
}
if (!isset($_SESSION['id'])) {
    header("Location: login");
}
?>