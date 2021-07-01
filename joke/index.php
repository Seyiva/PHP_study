<?php
  include 'elems/init.php' ;
  $title = 'Анекдоты';


  //проверка страниц для пагинации
  if (isset($_GET['page'])) {
    $page = $_GET['page'];
  } else {
    $page = 1 ;
  }
  //кол-во записей на одной странице
  $notesOnPage = 3 ;
  $from = ($page - 1) * $notesOnPage ;

  $query = "SELECT COUNT(*) as count FROM jokes" ;
  $result = mysqli_query($link, $query) or die(mysqli_error($link));
  $count =  mysqli_fetch_assoc($result)['count'];
  $pagesCount = ceil($count / $notesOnPage) ;

  if ( empty($_GET['category'])) {
    // Вывод анекдотов из БД по статусу
     $query = "SELECT * FROM jokes WHERE status='1'  LIMIT $from, $notesOnPage";
     $result = mysqli_query($link, $query) or die(mysqli_error($link));
     for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);

     $content = '' ;
     foreach ($data as $elem) {
       $content .=  "<p> {$elem['name']} </p>";
       $content .= "<p> {$elem['joke']} </p>";
       $content .= "***<br>";
     }

  } elseif ( !empty($_GET['category'])) {
    $category = $_GET['category'] ;

    // Вывод анекдотов из БД по статусу и категории
     $query = "SELECT * FROM jokes WHERE status='1' AND category_id = '$category' LIMIT $from, $notesOnPage";
     $result = mysqli_query($link, $query) or die(mysqli_error($link));
     for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);

     $content = '' ;
     foreach ($data as $elem) {
       $content .=  "<p> {$elem['name']} </p>";
       $content .= "<p> {$elem['joke']} </p>";
       $content .= "***<br>";
     }
    
  }


   include "elems/layout.php" ;
