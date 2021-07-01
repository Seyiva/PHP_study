<!DOCTYPE html>
<html>
  <head>
    <title><?= $title ?></title>
    <link rel="stylesheet" href="/assets/style.css?v=6">
  </head>
  <body>
    <div id="wrapper">
      <header>
        <?php include 'elems/header.php' ; ?>
      </header>
      <aside>
        <?php if ($_SERVER['REQUEST_URI'] == '/') echo $sidebar ; ?>
      </aside>
      <main>
        <?=  $content  ?>
        <?php  if (!empty($uri) && $uri === 'blog')  echo 	$newArticle;    ?>
      </main>
      <footer>
        <?php include 'elems/footer.php' ; ?>
      </footer>
    </div>
  </body>
</html>
