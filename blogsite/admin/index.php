<?php
    include '../elems/init.php' ;


        function showArtTable($link)
        {
          $query = "SELECT `id`,`dateart`,`nameart` FROM articles  ";
          $result = mysqli_query($link, $query) or die(mysqli_error($link));
          for($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);

          $content = '<table>
                <tr>
                  <th>name articles</th>
                  <th>date upgrade</th>
                  <th>edit</th>
                  <th>delete</th>
                </tr>' ;
          foreach ($data as $article) {
            $content .= " <tr>
                  <td>{$article['nameart']} </td>
                  <td>{$article['dateart']} </td>
                  <td><a href=\"/admin/edit.php?id={$article['id']}\">edit </a></td>
                  <td><a href=\"?delete={$article['id']}\">delete </a></td>
                </tr>" ;
          }
          $content .= '</table>' ;

          $title = 'admin main page' ;

          include "elems/layout.php" ;
        }
        function deleteArt($link)
        {
            if(isset($_GET['delete'])) {
              $id = $_GET['delete'] ;
              $query = "DELETE FROM articles WHERE id=$id";
              mysqli_query($link, $query) or die(mysqli_error($link));

              $_SESSION['message'] = [
                'text' => "Article deleted successfully",
                'status' => 'success'
              ] ;
              header('Location: /admin/') ; die() ;
            }
          }

        deleteArt($link) ;

        showArtTable($link) ;
      /* for auth
      if (!empty($_SESSION['auth']))  {
      } else {
          header('Location: /admin/login.php') ; die() ;
      } */
