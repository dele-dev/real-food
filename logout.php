<?php
$dataLink = "double";

include "./functions/init.php";

session_destroy();

echo "<script> window.location.replace('./index.php');</script>";

?>