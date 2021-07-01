<!DOCTYPE html>
<html>
  <head>
    <title><?= $title ?></title>
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css?v=3">
  </head>
  <body>
    <div id="wrapper">
      <header>
        <?php include 'elems/header.php' ; ?>
      </header>
      <main>
        <?php if($_SERVER['REQUEST_URI'] == "/index.php"  or isset($_GET['rubric']) ){ include 'elems/rubric.php' ;} ?>
        <?php if($_SERVER['REQUEST_URI'] == "/add.php") include_once "add.php" ?>
        <?= $content ?>
      </main>
      <footer>
        <?php include 'elems/footer.php' ; ?>
      </footer>
    </div>
    <script type=\"text/javascript\" src=\"file.js\"></script>
  </body>
</html>
