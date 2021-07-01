<?php
    include '../elems/init.php' ;

    $title = 'admin edit page' ;
    //открываем функцию и записываем $link , чтобы получать данные из БД
    function getArt($link, $info = '')
    {
      if(isset($_GET['id'] )){}
        $id = $_GET['id'] ;
        $query = "SELECT * FROM articles WHERE id='$id' ";
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        $art = mysqli_fetch_assoc($result);
        //var_dump($art) ;
        // данные из массива
        if (isset($_POST['nameart']) and isset($_POST['text'])) {
          $nameart = $_POST['nameart']  ;
          $text = $_POST['text'] ;
          $dateart = date('Y-m-d H:i:s', time());
          var_dump ($nameart) ;

          ob_start() ;
          include 'elems/formEdition.php ' ;
          $content = ob_get_clean() ;
        } else {
          $content = '';
        }
        
        $content = ''; //если статьи с таким id нет , то $ возвращает пустую строку, или статья не найдена
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
        }
    }
    $info = addArt($link);
    getArt($link);

    // $query = "UPDATE articles SET nameart = '$nameart', text = '$text', dateart = '$dateart' WHERE id = $id";
		// mysqli_query($link, $query) or die(mysqli_error($link));






    /*if (!empty($_SESSION['auth']))  {
    } else {
      header('Location: /admin/login.php') ; die() ;
    }





    function getArt($link)
    {


        if(isset($_GET['id'])) {
            $id = $_GET['id'] ;
            $query = "SELECT * FROM articles WHERE id='$id' ";
            $result = mysqli_query($link, $query) or die(mysqli_error($link));
            $art = mysqli_fetch_assoc($result);

            if ($art) {
                $artExists = true ;

                if (isset($_POST['nameart']) and isset($_POST['text'])) {
                    $nameart = $_POST['nameart']  ;
                    $text = $_POST['text'] ;
                    $dateart = date('Y-m-d H:i:s', time());

                    $artExists = true ;
                } else {
                  $nameart = $_POST['nameart']  ;
                  $text = $_POST['text'] ;
                  $dateart = date('Y-m-d H:i:s', time());

               }
                 //проверка существующих $page['title'],$page['url'] и $page['text'], после  нажатия "edit" и перехода на edit.php
                 //запись новые $title , $url , $text


            } else {
                $content = 'Notes not found ' ;
            }
        } else {
            $content = 'Article with this id not exists ' ;
        }

      include "elems/layout.php" ;
    }

    function addArt($link)
    {
      if (isset($_POST['nameart']) and isset($_POST['text'])) {
          $nameart = mysqli_real_escape_string($link,$_POST['nameart']) ;
          $text = mysqli_real_escape_string($link,$_POST['text']) ;
          $dateart = date('Y-m-d H:i:s', time());

          if(isset($_GET['id'])) {
            $id = $_GET['id'] ;

            $query = "SELECT * FROM articles WHERE id='$id' ";
            $result = mysqli_query($link, $query) or die(mysqli_error($link));
            $page = mysqli_fetch_assoc($result);
            //если текущий url не поменялся с новым $url
            if ($article['nameart'] !== $nameart) {
                $query = "SELECT COUNT(*) as count FROM articles WHERE `nameart`='$nameart' ";
                $result = mysqli_query($link, $query) or die(mysqli_error($link));
                $isArt = mysqli_fetch_assoc($result)['count'];

                if ($isArt == 1) {
                    $_SESSION['message'] = [
                        'text' => 'Page with this url already exists!',
                        'status' => 'error'
                    ] ;
                }
            }

            $query = "UPDATE pages SET dateart='$dateart', nameart='$nameart',text='$text' WHERE id='$id'";
            mysqli_query($link, $query) or die(mysqli_error($link));
                $_SESSION['message'] = [
                    'text' => "Page edited '{$article['nameart']}' successfully",
                    'status' => 'success'
              ] ;
              header('Location: /admin/') ; die() ;
          }

      } else {
        return '' ;
      }
    }
    addArt($link) ;
    getArt($link) ;
    */
