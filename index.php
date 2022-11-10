<?php

require_once('php/Database.php');
require_once('php/Utils.php');

$db = new Database();
$utils = new Utils();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" name="CHARSET" content="UTF-8">

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">

    <title>Helpdesk</title>

    <script type="text/javascript" src="js/jquery-3.6.1.min.js"></script>
  </head>
  <body>
    <?php

    if(isset($_GET['err'])) {
      $err = htmlspecialchars($_GET['err']);

      $error = $utils->resolveErrorCode($err);

      echo('<script type="text/javascript">alert("' . $error . '");</script>');
    }

    if(isset($_GET['p'])) {
      $p = htmlspecialchars($_GET['p']);

      if($p == "home" && !isset($_COOKIE['user_id'])) {
        header('Location: ?p=user&s=login&ss=form');
      }

      if(isset($_GET['s'])) {
        $s = htmlspecialchars($_GET['s']);

        if(isset($_GET['ss'])) {
          $ss = htmlspecialchars($_GET['ss']);

          $url_php = 'content/' . $p . '/' . $s . '/' . $ss . '.php';
          $url_html = 'content/' . $p . '/' . $s . '/' . $ss . '.html';

          if(file_exists($url_php)) {
            include($url_php);
          } else if(file_exists($url_html)) {
            include($url_html);
          } else {
            header('Location: ?p=error&eid=404');
          }
        } else {
          $url_php = 'content/' . $p . '/' . $s . '/index.php';
          $url_html = 'content/' . $p . '/' . $s . '/index.html';

          if(file_exists($url_php)) {
            include($url_php);
          } else if(file_exists($url_html)) {
            include($url_html);
          } else {
            header('Location: ?p=error&eid=404');
          }
        }
      } else {
        $url_php = 'content/' . $p . '/index.php';
        $url_html = 'content/' . $p . '/index.html';

        if(file_exists($url_php)) {
          include($url_php);
        } else if(file_exists($url_html)) {
          include($url_html);
        } else {
          header('Location: ?p=error&eid=404');
        }
      }
    } else {
      header('Location: ?p=home');
    }

    ?>
  </body>
</html>
