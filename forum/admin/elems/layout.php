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
          <a href="/admin/index.php">Main</a>
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
