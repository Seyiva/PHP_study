<!DOCTYPE html>
<html>
  <head>
    <title><?= $title ?></title>
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <div id="wrapper">
      <header>
        <?php include 'elems/header.php' ; ?>
      </header>
      <main>
        <?php  include 'elems/info.php'; ?>
        <?= $content ?>
      </main>
      <footer>
        <?php include 'elems/footer.php' ; ?>
      </footer>
    </div>
  </body>
</html>
