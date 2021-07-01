<?php
  include 'elems/init.php' ;
  session_start() ;

  if (!empty($_SESSION['auth'])) {
    // Сначала выводим темы, затем выводим комментарии, после выводим форму для новых комментарий к теме, (также можно сделать комментарии к комментариям)
    $title = 'topics and comments' ;

    if(isset($_GET['id_theme'])) {

      $id_theme = $_GET['id_theme'] ; //  $id темы

      $query = " SELECT themes.datenote, themes.theme, themes.note, users.login as login_user,
                 themes.id as id_theme, users.id as id_user FROM `themes`
                 LEFT JOIN `users` ON users.id = themes.user_id WHERE themes.id = '$id_theme' " ;

      $result = mysqli_query($link, $query) or die(mysqli_error($link));
      for($notes = []; $row = mysqli_fetch_assoc($result); $notes[] = $row);
      // вывод темы и записи
      $content = '' ;
      foreach ($notes as $note) {
        $content = " <div>
             <div>{$note['login_user']} </div>
             <div>{$note['datenote']} {$note['theme']} </div>
             <div>{$note['note']} </div>
             <div>---</div>
             </div>" ;
       }

       if ( isset($_POST['comment']) ) {
           $message = mysqli_real_escape_string($link, $_POST['comment']);
           $datemessage = date('Y-m-d H:i:s', time());
         } else {
           $message = '' ;
           $datemessage = '' ;
         }



       $query = " SELECT comments.datemessage, comments.message, users.login, themes.theme FROM `comments`
       LEFT JOIN `users` ON comments.user_id = users.id
       LEFT JOIN `themes` ON themes.id =  comments.theme_id WHERE comments.theme_id = '$id_theme' ORDER BY datemessage DESC" ;

       $result = mysqli_query($link, $query) or die(mysqli_error($link));
       for($comments = []; $row = mysqli_fetch_assoc($result); $comments[] = $row);
       // вывод комментариев
       $show_comment = '' ;
       foreach ($comments as $comment) {
         $show_comment .= " <div>
              <div>{$comment['login']} {$comment['datemessage']}</div>
              <div>{$comment['message']} </div>
              <div>---</div>
              </div>" ;
        }
      if ( isset($_POST['comment']) ) {
          $message = mysqli_real_escape_string($link, $_POST['comment']);
          $datemessage = date('Y-m-d H:i:s', time());

          $id_user = $_SESSION['id'] ; // $id_user id usera

          $query = "SELECT * FROM `users`   WHERE id = '$id_user' " ; // получаем юзера по логину
          $result = mysqli_query($link, $query) or die(mysqli_error($link));
          $user =  mysqli_fetch_assoc($result) ;

          $id_theme = $_GET['id_theme'] ; // $id темы

          $query = "INSERT INTO comments SET datemessage='$datemessage',  message='$message', theme_id = '$id_theme', user_id = '$id_user' ";
          $result = mysqli_query($link, $query) or die(mysqli_error($link));
          unset($_POST);
          header("Location: /topic.php?id_theme=$id_theme") ; die() ;
      }
      $topic_form = "<form action=\"\" method=\"POST\">
        to comment:<br><br>
        <textarea name=\"comment\" cols=\"50\" rows=\"5\" placeholder=\"Your answer\">$message</textarea><br><br>
        <input type=\"submit\" value=\"Комментировать\">
      </form> " ;


    }


} else {
  $content = 'Этот форум доступен только авторизованным пользователям' ;
}
include "elems/layout.php" ;
