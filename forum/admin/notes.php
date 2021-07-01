<?php
    include '../elems/init.php' ;
    session_start() ;
    if (!empty($_SESSION['auth']) and $_SESSION['status'] == 'admin' ) {

      $title = 'notes user for admin' ;
      // Получить все записи одного выбранного юзера
      if(isset($_GET['id'])) {

          $id = $_GET['id'] ;

          $query = " SELECT themes.datenote,themes.theme,themes.note,users.name as name_user, users.surname as surname_user, users.login as login_user,
                     statuses.name as status, themes.id as id_theme, users.id as id_user, users.banned as user_banned FROM `themes`
                     LEFT JOIN `users` ON users.id = themes.user_id
                     LEFT JOIN  `statuses` ON statuses.id = users.status_id WHERE users.id = '$id '" ;
                     
           $result = mysqli_query($link, $query) or die(mysqli_error($link));
           for($notes = []; $row = mysqli_fetch_assoc($result); $notes[] = $row);

           $content = '<table>
                 <tr>
                   <th>login_user</th>
                   <th>name_user</th>
                   <th>surname_user</th>
                   <th>datenote</th>
                   <th>theme</th>
                   <th>note</th>
                  </tr>' ;
           foreach ($notes as $note) {
                   $content .= " <tr>
                     <td>{$note['login_user']} </td>
                     <td>{$note['name_user']} </td>
                     <td>{$note['surname_user']} </td>
                     <td>{$note['datenote']} </td>
                     <td>{$note['theme']} </td>
                     <td>{$note['note']} </td>
                   </tr>" ;
           }
           $content .= '</table>' ;
     }
     include "elems/layout.php" ;
    }
