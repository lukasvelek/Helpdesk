<div class="row">
  <?php

  include('content/_menus/admin_menu.html');

  ?>

  <div class="col-md">
    <div class="row">
      <div class="col-md"></div>

      <div class="col-md-3">
        <form action="?" method="GET">
          <input type="text" name="q" placeholder="Search">
          <input type="submit" value="Search">

          <input type="text" name="p" value="home" hidden>
        </form>
      </div>
    </div>

    <div class="row">
      <div class="col-md">
        <table id="userlist">
          <tr>
            <th>ID</th>
            <th>Full name</th>
            <th>Username</th>
            <th>Email</th>
            <th>Role</th>
            <th>Created by</th>
            <th>Is blocked</th>
          </tr>
          <?php

          $sql = "";

          if(isset($_GET['f'])) {
            $f = htmlspecialchars($_GET['f']);

            switch($f) {
              case "blocked":
                $sql = "SELECT * FROM `users`
                        WHERE
                          `is_blocked` LIKE '1'
                        ORDER BY `id`";

                break;
              case "users":
                $sql = "SELECT * FROM `users`
                        WHERE
                          `role` LIKE 'user'
                        ORDER BY `id`";

                break;
              case "technicians":
                $sql = "SELECT * FROM `users`
                        WHERE
                          `role` LIKE 'technician'
                        ORDER BY `id`";

                break;
              case "admins":
                $sql = "SELECT * FROM `users`
                        WHERE
                          `role` LIKE 'admin'
                        ORDER BY `id`";

                break;
            }
          } else {
            $sql = "SELECT * FROM `users`
                    ORDER BY `id`";
          }

          $users = $db->query($sql);
          $user_count = $db->numRows($sql);

          if($user_count > 0) {
            foreach($users as $u) {
              $u_id = $u['id'];
              $u_fullname = $u['fullname'];
              $u_username = $u['username'];
              $u_email = $u['email'];
              $u_role = $u['role'];
              $u_author_id = $u['author_id'];
              $u_is_blocked = $u['is_blocked'];

              if(is_null($u_author_id) || $u_author_id == "" || $u_author_id == NULL) {
                $u_author_id = "-";
              }

              if(is_null($u_is_blocked) || $u_is_blocked == "" || $u_is_blocked == NULL) {
                $u_is_blocked = "false";
              } else {
                if($u_is_blocked == "1") {
                  $u_is_blocked = "true";
                } else {
                  $u_is_blocked = "false";
                }
              }

              if(is_null($u_email) || $u_email == "" || $u_email == NULL) {
                $u_email = "-";
              }

              $u_author_name = "-";

              if($u_author_id != "-") {
                $sql_author = "SELECT `fullname` FROM `users` WHERE `id` LIKE '$u_author_id'";

                $author = $db->query($sql_author);

                foreach($author as $a) {
                  $u_author_name = $a['fullname'];
                }
              }

              echo('<tr>
                      <td>' . $u_id . '</td>
                      <td>' . $u_fullname . '</td>
                      <td>' . $u_username . '</td>
                      <td>' . $u_email . '</td>
                      <td>' . $u_role . '</td>
                      <td>' . $u_author_id . '</td>
                      <td>' . $u_is_blocked . '</td>
                    </tr>');
            }
          }

          ?>
        </table>
      </div>
    </div>
  </div>
</div>
