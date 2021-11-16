<?php

// localhost
$host = "localhost";
$dbusername = "root";
$dbpassword =  "";
$dbname = "aycoro";

// hostserver
// $host = "localhost";
// $dbusername = "u811483169_aycoro";
// $dbpassword =  "Siempreteamare007";
// $dbname = "u811483169_aycoro";

// $host = "$2y$10$ra9Id./msMGNKyVoOJ41QOXT1nNkTsnzWxQJ6IqgqbXZQ/muxDZ/e";
// $dbusername = "$2y$10$T9oHJHlXH/fOnp8XtIQITOlJA76Z5Dy6a1r32PDJkd8.Hx3FWDREe";
// $dbpassword =  "$2y$10$Mqj5ZPzos5W8Kumi2H5vM.dDaG086tEVZ80C32BviFG8OFJtG1UTu";
// $dbname = "$2y$10$T9oHJHlXH/fOnp8XtIQITOlJA76Z5Dy6a1r32PDJkd8.Hx3FWDREe";

$conn = new mysqli($host,$dbusername,$dbpassword,$dbname);

?>