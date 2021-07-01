<!DOCTYPE html>
<html>
  <head>
    <title><?= $title ?></title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div id="wrapper">
      <header>
          <a href="/admin/logout.php">logout</a>
          <a href="/admin/index.php">Main or users</a>
          <a href="/admin/goods.php">Goods</a>
          <a href="/admin/statistics.php">Purchase statistics</a>
          <?php  if(!empty($_SESSION['auth']) and $_SERVER['REQUEST_URI'] == "/admin/goods.php")  { echo "<a href=\"/admin/add.php\">Add Goods</a>" ; } else { echo '' ; } ?>
      </header>
      <main>
        <?php  include 'elems/info.php'; ?>
        <?= $content ?>
      </main>
      <footer>
        footer
      </footer>
    </div>
  </body>
</html>
