<?php

$role = $_COOKIE['user_role'];

$p = htmlspecialchars($_GET['p']);

switch($role) {
  case "user":
    include('content/' . $p . '/roles/user.php');
    break;

  default:
    include('content/' . $p . '/roles/admin.php');
    break;
}

?>
