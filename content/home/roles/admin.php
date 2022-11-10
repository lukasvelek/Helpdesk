<div class="row">
  <div class="col-md-2">
    <!-- MENU -->
  </div>

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
        <table id="ticketlist">
          <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Date created</th>
            <th>Author</th>
            <th>Status</th>
          </tr>
          <?php

          $sql = "SELECT * FROM `tickets`
                  WHERE
                    `current_status` LIKE 'opened'
                  OR
                    `current_status` LIKE 'waiting_for_author'
                  OR
                    `current_status` LIKE 'waiting_for_solver'
                  ORDER BY `id`";

          $tickets = $db->query($sql);
          $ticket_count = $db->numRows($sql);

          if($ticket_count > 0) {
            foreach($tickets as $t) {
              $t_id = $t['id'];
              $t_title = $t['title'];
              $t_description = $t['description'];
              $t_author_id = $t['author_id'];
              $t_current_status = $t['current_status'];
              $t_date_created = $t['date_created'];

              $t_author_name = "";

              $sql_author = "SELECT `fullname` FROM `users` WHERE `id` LIKE '$t_author_id'";

              $author = $db->query($sql_author);

              foreach($author as $a) {
                $t_author_name = $a['fullname'];
              }

              $t_shortened_text = $utils->shortenText($t_description);
              $t_formatted_date = $utils->createNormalDate($t_date_created);
              $t_formatted_status = $utils->resolveStatus($t_current_status);

              echo('<tr>
                      <td>' . $t_id . '</td>
                      <td>' . $t_title . '</td>
                      <td>' . $t_shortened_text . '</td>
                      <td>' . $t_date_created . '</td>
                      <td>' . $t_author_name . '</td>
                      <td>' . $t_formatted_status . '</td>
                    </tr>');
            }
          }

          ?>
        </table>
      </div>
    </div>
  </div>
</div>
