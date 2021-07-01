<!DOCTYPE html>
<html>
  <head>
    <title><?= $title ?></title>
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css?v=8">
  </head>
  <body>
    <div id="wrapper">
      <header>
        <?php  include_once 'elems/header.php'   ?>
      </header>
      <?php  if(!empty($_SESSION['auth']) and $_SERVER['REQUEST_URI'] != "/login.php")  { echo $hey_user ; } else { echo $hey_user = '' ; } ?>
      <?php if($_SERVER['REQUEST_URI'] == "/index.php" and (!empty($_SESSION['auth']) and $_SESSION['status'] == 'admin')){ echo $link_admin ; } else { echo $link_admin = '' ; }?>
      <div id="side_main">
        <sidebar>
        <?php if($_SERVER['REQUEST_URI'] == "/index.php" or isset($_GET['category']) ) { include 'elems/category.php' ;} ?>
        </sidebar>
        <main>
          <?php  include 'info.php';  ?>
          <div class="parent_for_flex">
            <?=  $content  ?>
          </div>
          <?php  if($_SERVER['REQUEST_URI'] == "/basket.php" and (!empty($_SESSION['auth']) )) { echo $order ; } else { echo $order = '' ; } ?>
          <?php if($_SERVER['REQUEST_URI'] == "/login.php" ) include_once "login.php" ?>
        </main>
      </div>
      <footer>
        <?php include 'elems/footer.php' ; ?>
      </footer>
    </div>
    </body>
</html>
