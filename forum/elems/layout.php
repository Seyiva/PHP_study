<!DOCTYPE html>
<html>
  <head>
    <title><?= $title ?></title>
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css?v=7">
  </head>
  <body>
    <div id="wrapper">
      <header>
        <?php  include_once 'elems/header.php'   ?>
      </header>
      <main>
        <?php  include 'info.php';  ?>
        <?php  if($_SERVER['REQUEST_URI'] == "/index.php" and (!empty($_SESSION['auth']) ))  echo $hey_user ; ?>
        <?php if($_SERVER['REQUEST_URI'] == "/index.php" and (!empty($_SESSION['auth']) and $_SESSION['status'] == 'admin')) echo $link_admin ; ?>
        <?=  $content  ?>
        <?php  if(isset($_GET['id_theme'])) {
                $id_theme = $_GET['id_theme'] ;
                  if( (!empty($_SESSION['auth']) and $_SERVER['REQUEST_URI'] == "/topic.php?id_theme=$id_theme" and isset($show_comment) ) ) {
                    echo $show_comment ;
                    echo $topic_form ;
                 }
                }
        ?>
        
        <?php if($_SERVER['REQUEST_URI'] == "/login.php" ) include_once "login.php" ?>
      </main>
      <footer>
        <?php include 'elems/footer.php' ; ?>
      </footer>
    </div>
  <!--  <script type=\"text/javascript\" src=\"file.js\"></script> -->
  </body>
</html>
