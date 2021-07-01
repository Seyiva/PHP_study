<!DOCTYPE html>
<html>
  <head>
    <title><?= $title ?></title>
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css?v=2">
  </head>
  <body>
    <div id="wrapper">
      <header>
        <?php  include_once 'elems/header.php'   ?>
      </header>
        <main>
          <?php  include 'info.php';  ?>
          <?= $content ?>
          <?php // if($_SERVER['REQUEST_URI'] == "/messages.php?id=$id_user&typetofriend=$id_friend" and !empty($_SESSION['auth']) )  { echo $content_friend ; } else { echo $content_friend = '' ; }  ?>          
        </main>
      </div>
      <footer>
        <?php include 'elems/footer.php' ; ?>
      </footer>
    </div>
    </body>
</html>
