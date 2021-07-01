<?php
    include '../elems/init.php' ;


      function getArt($info = '') {
        $title = 'admin add new article' ;

        if (isset($_POST['nameart']) and isset($_POST['text'])) {
            $nameart = $_POST['nameart']  ;
            $text = $_POST['text'] ;
          } else {
            $nameart = '' ;
            $text = '' ;
          }


        ob_start() ;
        include 'elems/formEdition.php ' ;
        $content = ob_get_clean() ;
        include "elems/layout.php" ;
    }

    function addArt($link)
    {
        if (isset($_POST['nameart']) and isset($_POST['text'])) {
            $nameart = mysqli_real_escape_string($link,$_POST['nameart']) ;
            $text = mysqli_real_escape_string($link,$_POST['text']) ;
            $dateart = date('Y-m-d H:i:s', time());

            $query = "SELECT COUNT(*) as count FROM articles WHERE `nameart` = '$nameart' ";
            $result = mysqli_query($link, $query) or die(mysqli_error($link));
            $isArt = mysqli_fetch_assoc($result)['count'];

            if($isArt) {
              $_SESSION['message'] = [
                'text' => 'Article with this name already exists!',
                'status' => 'error'
              ] ;

            } else {
              $query = "INSERT INTO articles (`nameart`, `text`, `dateart`) VALUES ('$nameart','$text','$dateart') ";
              mysqli_query($link, $query) or die(mysqli_error($link));

              $_SESSION['message'] = [
                  'text' => 'Article added successfully!',
                  'status' => 'success'
                ] ;

              header('Location: /admin/') ; die() ;
            }
        } else {
          return '' ;
        }
      }
      $info = addArt($link) ;
      getArt($info) ;





  /*  if (!empty($_SESSION['auth']))  {
    } else {
        header('Location: /admin/login.php') ; die() ;
    } */
