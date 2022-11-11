<?php

require_once('../php/Utils.php');

$utils = new Utils();

$password = $utils->randomPasswordGenerator();

echo($password);

?>
