<?php

$fullname = htmlspecialchars($_GET['fullname']);
$username = htmlspecialchars($_GET['username']);
$password = htmlspecialchars($_GET['password']);
$email = htmlspecialchars($_GET['email']);
$role = htmlspecialchars($_GET['role']);

$sql = "INSERT INTO `users` (`fullname`, `username`, `password`, `email`, `role`, `change_password`)
        VALUES ('$fullname', '$username', '$password', '$email', '$role', '1')";

$result = $db->query($sql);

header('Location: ?p=user');

?>
