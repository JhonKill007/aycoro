<?php
// require("../keys/identification.php");
session_start();
session_destroy();
header("Location:../login");
?>