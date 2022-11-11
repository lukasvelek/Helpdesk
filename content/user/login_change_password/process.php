<?php

$id = htmlspecialchars($_POST['id']);
$password = htmlspecialchars($_POST['password']);

$password_hash = hash('sha512', $password);

$sql = "UPDATE `users` SET `password` = '$password_hash', `change_password` = '0' WHERE `id` LIKE '$id'";

$result = $db->query($sql);

header('Location: ?');

?>
