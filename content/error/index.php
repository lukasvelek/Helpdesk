<div class="row">
  <div class="col-md">
    <?php

    if(isset($_GET['eid'])) {
      $eid = htmlspecialchars($_GET['eid']);

      $p = htmlspecialchars($_GET['p']);

      include('content/' . $p . '/codes/' . $eid . '.html');
    }

    ?>
  </div>
</div>
