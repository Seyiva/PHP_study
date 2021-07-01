<?php
  include 'elems/init.php' ;
  if ($_SERVER['REQUEST_URI'] == "/404.php" and (!empty($_SESSION['auth'])) {
      $content = " Вы не туда забрели ! Вернитесь обратно <a href=\"index.php\">Главная</a>" ;
  } else {
    $content = '' ;
  }


  include "elems/layout.php" ;

// для индекс
/* if(isset($_GET['page'])) {
  $page = $_GET['page'];
} else {
  $page = 'index' ;
}

$dir_file = "pages/$page.php";
if(file_exists($dir_file)) {
    $get_content = file_get_contents($dir_file) ;
  } else {
    $get_content = file_get_contents("pages/404.php") ;
    header("HTTP/1.0 404 Not Found") ;
  } */
