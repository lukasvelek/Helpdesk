<?php

$username = htmlspecialchars($_POST['username']);
$password = htmlspecialchars($_POST['password']);

$password_hash = hash('sha512', $password);

$sql = "SELECT * FROM `users`
        WHERE
          `username` LIKE '$username'
        AND
          `password` LIKE '$password_hash'";

$users = $db->query($sql);

$users_count = $db->numRows($sql);

if($users_count == 1) {
  foreach($users as $u) {
    $id = $u['id'];
    $fullname = $u['fullname'];
    $role = $u['role'];
    $is_blocked = $u['is_blocked'];

    if($is_blocked == "1" || $is_blocked == 1) {
      header('Location: ?p=user&s=login&ss=form&err=100');
    }

    if($change_password == "1" || $change_password == 1) {
      header('Location: ?p=user&s=login_change_password&ss=form&id=' . $id);
    }

    setcookie('user_id', $id);
    setcookie('user_fullname', $fullname);
    setcookie('user_role', $role);
    setcookie('user_username', $username);
    setcookie('user_password', $password);

    header('Location: ?p=home');
  }
} else {
  header('Location: ?p=user&s=login&ss=form&err=101');
}

?>
