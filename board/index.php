<?php
  include 'elems/init.php' ;
  $title = 'Доска объявлений';

  if ( empty($_GET['rubric'])) {
    // Вывод объявлений из БД по статусу
     $query = "SELECT * FROM advertisement ORDER BY datead DESC ";
     $result = mysqli_query($link, $query) or die(mysqli_error($link));
     for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);

     $content = '' ;
     foreach ($data as $elem) {
       $datead = explode(' ', $elem['datead'] ) ;

       $part_date = explode('-', $datead[0] ) ;
       $year = $part_date[0];
       $month = $part_date[1];
       $day = $part_date[2];

       $part_time = explode(':', $datead[1] ) ;
       $seconds = $part_time[2] ;
       $minutes = $part_time[1] ;
       $hour = $part_time[0] ;

       $day_on = date('Y-m-j H:i:s', mktime($hour, $minutes,$seconds,$month,$day,$year ) ) ;
      
       $content .=  '<p>'.$day.'.'.$month.'.'. $year.' '. '</p>' ;
       $content .=  "<p> {$elem['name']} </p>";
       $content .=  "<p> {$elem['announce']} </p>";
       $content .= "<p> {$elem['detail']} </p>";
       $content .= "<a href=\"?raise={$elem['id']}\"> raise </a><br><br>" ; //поднять - to raise
       $content .= "***<br>";
     }

  } elseif ( !empty($_GET['rubric'])) {
    $rubric = $_GET['rubric'] ;

    // Вывод  из БД по статусу и категории
     $query = "SELECT * FROM advertisement WHERE rubric_id = '$rubric' ORDER BY datead DESC ";
     $result = mysqli_query($link, $query) or die(mysqli_error($link));
     for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);

     $content = '' ;
     foreach ($data as $elem) {
       $datead = explode(' ', $elem['datead'] ) ;

       $part_date = explode('-', $datead[0] ) ;
       $year = $part_date[0];
       $month = $part_date[1];
       $day = $part_date[2];

       $part_time = explode(':', $datead[1] ) ;
       $seconds = $part_time[2] ;
       $minutes = $part_time[1] ;
       $hour = $part_time[0] ;

       $day_on = date('Y-m-j H:i:s', mktime($hour, $minutes,$seconds,$month,$day,$year ) ) ;

       $content .=  '<p>'.$day.'.'.$month.'.'. $year .' '. '</p>' ;
       $content .=  "<p> {$elem['name']} </p>";
       $content .=  "<p> {$elem['announce']} </p>";
       $content .= "<p> {$elem['detail']} </p>";
       $content .= "<a href=\"?raise={$elem['id']}\"> raise </a><br><br>" ; //поднять - to raise
       $content .= "***<br>";
     }

  }

    //ограничение поднятия объявления раз в сутки
    if (isset($_GET['raise'])) {
        $id = $_GET['raise'] ;
        if ( (strtotime($day_on) + 86400) < time() ) {
          $query = "UPDATE advertisement SET datead = NOW() WHERE id='$id' ";
          echo $query;
          mysqli_query($link, $query) or die(mysqli_error($link));

          //header('Location: /index.php') ; die() ;
        } else {
          echo "В течение суток вы уже поднимали объявление";
        }
    }



// $date = strtotime(date("Y-m-d", strtotime($date)) . " +1 day");
// date("Y-m-d H:i:s", time()+((60*60)*24));

   include "elems/layout.php" ;
