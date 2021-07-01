<!DOCTYPE html>
<html>
  <head>
    <title><?= $title ?></title>
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.css?v=2">
    <link rel="stylesheet" href="css/style.css?v=3">
  </head>
  <body>
    <div id="wrapper">
      <header>
        <?php include 'elems/header.php' ; ?>
      </header>
      <main>
        <?php if($_SERVER['REQUEST_URI'] == "/index.php" or !empty($_GET['page']) or isset($_GET['category']) ){ include 'elems/category.php' ;} ?>
        <?php if($_SERVER['REQUEST_URI'] == "/add.php") include_once "add.php" ?>
        <?= $content ?>
        <?php if($_SERVER['REQUEST_URI'] == "/index.php" or !empty($_GET['page']) or isset($_GET['category'])  ) { include 'elems/pagination.php' ; }  ?>
        <div id="text_block">
          Ваш анекдот передан модератору на проверку!
        </div>

      </main>
      <footer>
        <?php include 'elems/footer.php' ; ?>
      </footer>
    </div>
    <script type=\"text/javascript\" src=\"file.js\"></script>
  </body>
</html>
