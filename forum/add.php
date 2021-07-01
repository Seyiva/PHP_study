<?php
  include 'elems/init.php' ;
  session_start() ;

  if (!empty($_SESSION['auth'])) {

    function getNote($info = '') {
      $title = 'Подать объявление';
      $log_Session = $_SESSION['name_user'] ;

      if ( isset($_POST['theme']) and isset($_POST['note']) ) {
          $theme = $_POST['theme'];
          $text = $_POST['note'];
          $datead = date('Y-m-d H:i:s', time()); //time() - вернет текущий момент времени, date() - устанавоивает формат

      } else {
          $theme = '' ;
          $note = '' ;
          $datead = '' ;
      }

      ob_start() ;
      echo  'Вы зашли как ' . $log_Session ;
      include 'elems/formAddition.php ' ;
      $content = ob_get_clean() ;
      include "elems/layout.php" ;

    }

    function addNote($link)
    {
      //var_dump($_POST) ; // делаем проверку ключей из поля name = ".." инпутов и текстареа
      if ( isset($_POST['theme']) and isset($_POST['note']) ) {
          $theme = mysqli_real_escape_string($link, $_POST['theme']);
          $note = mysqli_real_escape_string($link, $_POST['note']);
          $datenote = date('Y-m-d H:i:s', time()); //time() - вернет текущий момент времени, date() - устанавоивает формат

          $id = $_SESSION['id'] ;

          $query = "SELECT * FROM `users`   WHERE id = '$id' " ; // получаем юзера по логину
          $result = mysqli_query($link, $query) or die(mysqli_error($link));
          $user =  mysqli_fetch_assoc($result) ;

          $query = "INSERT INTO themes SET datenote='$datenote',  theme='$theme', note='$note', user_id = '$id' ";
          $result = mysqli_query($link, $query) or die(mysqli_error($link));
          unset($_POST);
          header('Location: index.php');
        }
    }
    $info = addNote($link) ;
    getNote($info) ;
  }
