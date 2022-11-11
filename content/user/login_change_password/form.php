<?php

$id = htmlspecialchars($_GET['id']);

?>
<div class="row">
  <div class="col-md-4"></div>

  <div class="col-md">
    <div id="login_form">
      <form action="?p=user&s=login_change_password&ss=process" method="POST">
        <label for="password">New password: </label>
        <br>
        <input type="password" name="password" maxlength="255" required>
        <br>
        <br>

        <input type="text" name="id" value="<?php echo($id); ?>" hidden>

        <input type="submit" value="Update password">
      </form>
    </div>
  </div>

  <div class="col-md-4"></div>
</div>
