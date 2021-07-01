<?php
  include 'elems/init.php' ;

  // if(isset($_GET['page'])) {
  //   $page = $_GET['page'];
  // } else {
  //   $page = '/' ;
  // }  var_dump($page) ;
  $uri = trim($_SERVER['REQUEST_URI'], '/') ; //обрезаем слешы
//  var_dump($uri) ;
  if(empty($uri)) {
      $uri = '/' ;
  }


  $query = "SELECT * FROM pages WHERE url = '$uri' ";
  $result = mysqli_query($link, $query) or die(mysqli_error($link));
  $page = mysqli_fetch_assoc($result) ;

  if(!$page) {
    $query = "SELECT * FROM pages WHERE url = '404' ";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    $page = mysqli_fetch_assoc($result) ;
    header("HTTP/1.0 404 Not Found") ;
  }

  $title = $page['title'] ;
  $content = $page['textforpage'] ;

  if (isset($_POST['nameart'])) {
    $nameart = $_POST['nameart'] ;
  }
  $query = "SELECT nameart FROM articles WHERE id>0 ORDER BY dateart DESC";
  $result = mysqli_query($link, $query) or die(mysqli_error($link));
  for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
  //  var_dump($data)  ;
  $sidebar = '' ;
  foreach ($data as $elem) {
    $sidebar .=  "<a href=\"\"> {$elem['nameart']} </a>" . '</br>' ; //надо еще передать get параметр в href
  }

  include "assets/blog.php" ;
  include "elems/layout.php" ;
