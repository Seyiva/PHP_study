<?php
  include 'elems/init.php' ;


    function getAnnounce($info = '') {
      $title = 'Подать объявление';
      if ( isset($_POST['name']) and isset($_POST['joke']) ) {
          $name = $_POST['name'];
          $announce = $_POST['announce'];
          $detail = $_POST['detail'] ;
          $datead = date('Y-m-d H:i:s', time()); //time() - вернет текущий момент времени, date() - устанавоивает формат
          $rubric = $_POST['rubric'];
      } else {
          $name = '' ;
          $announce = '' ;
          $detail = '' ;
          $datead = '' ;
          $rubric = '' ;
      }

      ob_start() ;
      include 'elems/formAddition.php ' ;
      $content = ob_get_clean() ;
      include "elems/layout.php" ;

    }

    function addAnnounce($link)
    {
      if ( isset($_POST['name']) and isset($_POST['detail']) ) {
          $name = mysqli_real_escape_string($link, $_POST['name']);
          $announce = mysqli_real_escape_string($link, $_POST['announce']);
          $detail = mysqli_real_escape_string($link, $_POST['detail']);
          $datead = date('Y-m-d H:i:s', time()); //time() - вернет текущий момент времени, date() - устанавоивает формат
          $rubric = $_POST['rubric'];

          $query = "INSERT INTO advertisement SET datead='$datead', rubric_id = $rubric,  name='$name', announce='$announce', detail='$detail' ";
          $result = mysqli_query($link, $query) or die(mysqli_error($link));
          unset($_POST);
          header('Location: index.php');
        }
    }
    $info = addAnnounce($link) ;
    getAnnounce($info) ;
