<?php
  include 'elems/init.php' ;


    function getJoke($info = '') {
      $title = 'Записываем анекдот';
      if ( isset($_POST['name']) and isset($_POST['joke']) ) {
          $name = $_POST['name'];
          $joke = $_POST['joke'];
          $datenote = date('Y-m-d H:i:s', time()); //time() - вернет текущий момент времени, date() - устанавоивает формат
          $category = $_POST['category'];
      } else {
          $name = '' ;
          $joke = '' ;
          $datenote = '' ;
          $category = '' ;
      }

      ob_start() ;
      include 'elems/formAddition.php ' ;
      $content = ob_get_clean() ;
      include "elems/layout.php" ;

    }

    function addJoke($link)
    {
      if ( isset($_POST['name']) and isset($_POST['joke']) ) {
          $name = mysqli_real_escape_string($link, $_POST['name']);
          $joke = mysqli_real_escape_string($link, $_POST['joke']);
          $datenote = date('Y-m-d H:i:s', time()); //time() - вернет текущий момент времени, date() - устанавоивает формат
          $category = $_POST['category'];

          $query = "INSERT INTO jokes SET datenote='$datenote', category_id = $category,  name='$name', joke='$joke', status='0' ";
          $result = mysqli_query($link, $query) or die(mysqli_error($link));
          unset($_POST);
          header('Location: index.php');
          echo "<script type=\"text/javascript\" src=\"file.js\"></script>";// для записи о сохранении
      }
    }
    $info = addJoke($link) ;
    getJoke($info) ;
