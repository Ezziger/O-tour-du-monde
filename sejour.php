<?php
include "header.php";
?>

<?php
var_dump($_POST["sejourId"]);
include "functions.php";
getSejour($_POST["sejourId"]);
showSejour($_POST["sejourId"]);

?>