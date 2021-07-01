<?php
  include 'elems/init.php' ;
  session_start() ;
  $title = 'forum';

  	if (!empty($_SESSION['auth'])) {
        $hey_user =  'Вы зашли как ' . $_SESSION['name_user'] .
       "<div> <a href=\"logout.php\">logout</a> </br> </div>" ;

         if($_SESSION['status'] == 'admin') {
           $link_admin = "<a href=\"/admin/index.php\"> admin </a> <br> " ;
         }

       $query = " SELECT themes.datenote,themes.theme,themes.note,users.name as name_user, users.surname as surname_user, statuses.name as status,
                  themes.id as id_theme, users.id as id_user, users.banned as user_banned FROM `themes`
                  LEFT JOIN `users` ON users.id = themes.user_id
                  LEFT JOIN  `statuses` ON statuses.id = users.status_id" ;

       $result = mysqli_query($link, $query) or die(mysqli_error($link));
       for($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);

       $content = '' ;
       foreach ($data as $note) {
         $content .= " <div>
              <p>{$note['name_user']} {$note['surname_user']} </p>
              <p>{$note['datenote']} {$note['theme']} </p>
              <p>{$note['note']} </p>
              <p>***</p>
              <p><a href=\"topic.php?id_theme={$note['id_theme']}\"> ответить по теме </a></p>
             </div>" ;
         if($_SESSION['status'] == 'moderator' ) {

              $content .= "<div><a href=\"?deletenote={$note['id_theme']}\">delete note</a></div>" ;

              if($note['user_banned'] == 1 ) {
                $content .= "<div><a href=\"?ban_id={$note['id_user']}\"> разблокировать пользователя </a></div>" ;
              } elseif  ($note['user_banned'] == 0 ) {
                $content .= "<div><a href=\"?ban_id={$note['id_user']}\"> заблокировать пользователя </a></div>" ;
              }
         }
       }



       function deleteNote($link)
       {
           if(isset($_GET['deletenote'])) {
             $id = $_GET['deletenote'] ;

             $query = "DELETE FROM `themes` WHERE id='$id' ";
             mysqli_query($link, $query) or die(mysqli_error($link));

             $_SESSION['message'] = [
               'text' => "Note deleted successfully",
               'status' => 'success'
             ] ;

           }
         }
       deleteNote($link) ;

       function banUser($link)
       {
         if(isset($_GET['ban_id'])) {
             $id = $_GET['ban_id'];

             $query = "SELECT id, banned FROM `users` WHERE id='$id' ";
             $result = mysqli_query($link, $query) or die(mysqli_error($link));
             $user = mysqli_fetch_assoc($result);
             $banned = $user['banned'];
             if($banned == 1) {
                 $query = "UPDATE users SET  banned='0' WHERE id='$id'";
                 mysqli_query($link, $query) or die(mysqli_error($link));
             } elseif($banned == 0) {
               $query = "UPDATE users SET  banned='1' WHERE id='$id'";
               mysqli_query($link, $query) or die(mysqli_error($link));
             }
             header('Location: index.php') ; die() ;
         }
       }
       banUser($link) ;

    } else {

      $content = "<div><p> Видеть полную информацию могут только зарегистрированные пользователи </p>
                  <a href=\"login.php\">login</a> OR
                  <a href=\"register.php\">register</a> </div>" ;
    }


  include "elems/layout.php" ;
