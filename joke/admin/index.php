<?php
session_start();
if($_SESSION['auth'] == true){
    include '../elems/init.php' ;
    $title = 'admin panel';

    $query = "SELECT * FROM jokes WHERE status='0'";
     $result = mysqli_query($link, $query);
     for($data = []; $row = mysqli_fetch_assoc($result); $data[]=$row);

     $content = '<table>
           <tr>
             <th>name of user</th>
             <th>joke</th>
             <th>Agree</th>
             <th>delete</th>
           </tr>' ;
     foreach ($data as $elem) {
       $content .= " <tr>
             <td>{$elem['name']} </td>
             <td>{$elem['joke']} </td>
             <td><a href=\"?add={$elem['id']}\"> Одобрить </a></td>
             <td><a href=\"?delete={$elem['id']}\">Удалить </a></td>
           </tr>" ;
     }
     $content .= '</table>' ;

     function deleteJoke($link)
     {
         if(isset($_GET['delete'])) {
           $id = $_GET['delete'] ;
           $query = "DELETE FROM jokes WHERE id=$id";
           mysqli_query($link, $query) or die(mysqli_error($link));

           $_SESSION['message'] = [
             'text' => "Joke deleted successfully",
             'status' => 'success'
           ] ;
           header('Location: /admin/') ; die() ;
         }
       }

       function addJoke($link)
       {
           if(isset($_GET['add'])) {
             $id = $_GET['add'] ;
             $query = "UPDATE jokes SET status='1' WHERE id='$id'";
             mysqli_query($link, $query) or die(mysqli_error($link));

             $_SESSION['message'] = [
               'text' => "Joke added successfully",
               'status' => 'success'
             ] ;
             header('Location: /admin/') ; die() ;
           }
         }

     deleteJoke($link) ;
     addJoke($link) ;

    include 'elems/layout.php' ;
  } else {
    header('Location: login.php');
} 
