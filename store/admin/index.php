<?php
    include '../elems/init.php' ;
    session_start() ;

    if (!empty($_SESSION['auth']) and $_SESSION['status'] == 'admin' ) {
      // сделать страницу всех тем и записей в каждом пользователе отдельно

        function showUsersTable($link)
        {
          $title = 'main/users' ;

          $query = "SELECT users.id as id, users.email, users.name, users.surname, statuses.name as status, users.banned as banned
            FROM `users` LEFT JOIN statuses ON users.status_id=statuses.id ";
          $result = mysqli_query($link, $query) or die(mysqli_error($link));
          for($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);

          $content = '<table>
                <tr>
                  <th>name and surname</th>
                  <th>email</th>
                  <th>status</th>
                  <th>delete of user</th>
                  <th>status of user</th>
                  <th>give/take off ban</th>
                </tr>' ;
          foreach ($data as $user) {
                  $content .= " <tr>
                    <td>{$user['name']} {$user['surname']} </td>
                    <td>{$user['email']} </td>
                    <td>{$user['status']} </td>
                    <td><a href=\"?delete={$user['id']}\">delete </a></td>
                    <td><a href=\"?change={$user['id']}\"> change status </a></td>" ;
                    if($user['banned'] == 1 ) {
                      $content .= "<td><a href=\"?ban_id={$user['id']}\"> ban off </a></td>" ;
                    } elseif  ($user['banned'] == 0 ) {
                      $content .= "<td><a href=\"?ban_id={$user['id']}\"> to ban </a></td>" ;
                    }
                    $content .= "</tr>" ;
          }
          $content .= '</table>' ;

          include "elems/layout.php" ;
      }
      showUsersTable($link) ;

      function changeStatus($link)
      {
        if(isset($_GET['change'])) {
          $id = $_GET['change'] ;

          $query = "SELECT users.id as `id`, users.status_id as `status_id`, statuses.name as `status`
                    FROM `users`  LEFT JOIN `statuses` ON users.status_id = statuses.id WHERE users.id='$id' ";

          $result = mysqli_query($link, $query) or die(mysqli_error($link));
          $user = mysqli_fetch_assoc($result);

            if ($user['status']   == 'user') {
              $query = "UPDATE `users` SET status_id='2' WHERE id='$id'";
              mysqli_query($link, $query) or die(mysqli_error($link));
            } elseif ($user['status']  == 'admin') {
              $query = "UPDATE `users` SET status_id='1' WHERE id='$id' ";
              mysqli_query($link, $query) or die(mysqli_error($link));
            }
          }
      }
      changeStatus($link);

      function deleteUser($link)
      {
          if(isset($_GET['delete'])) {
            $id = $_GET['delete'] ;
            $query = "DELETE FROM `users` WHERE id=$id";
            mysqli_query($link, $query) or die(mysqli_error($link));

            $_SESSION['message'] = [
              'text' => "User deleted successfully",
              'status' => 'success'
            ] ;

          }
        }
      deleteUser($link) ;

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
            //header("Location: /admin/index.php") ; die() ;
        }
      }
      banUser($link) ;

    } else {
        header('Location: ../login.php') ; die() ;
    }
