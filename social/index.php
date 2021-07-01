<?php
  include 'elems/init.php' ;
  session_start() ;
  $title = 'social network';

  	if (!empty($_SESSION['auth'])) {
        $hey_user =  'Вы зашли как ' . $_SESSION['name_user'] . ' ' . $_SESSION['surname_user'] .
       "<div> <a href=\"logout.php\">logout</a> </br> </div>" ;

       if($_SESSION['status'] == 'admin') {
           $link_admin = "<a href=\"/admin/index.php\"> admin </a> <br> " ;
         }

       if(isset($_GET['id'])) {
         $id = $_GET['id'] ;
          // предложения дружбы
         $query = " SELECT users.id, users.name, users.surname, users.email,  relations.name as status_relation,
                     friend.name as name_friend, friend.surname as surname_friend, friend.email as email_friend,
                     friend.birth_date as dob_friend, country.name as country,friends.user2_id as id_friends	FROM `friends`
                    LEFT JOIN `users` ON users.id = friends.user1_id
                    LEFT JOIN `users` as `friend` ON friend.id = friends.user2_id
                    LEFT JOIN `relations` ON relations.id = friends.relations_id
                    LEFT JOIN `country` ON country.id = friend.country_id
                     WHERE (relations.name = 'request_sent' OR relations.name = 'awaiting_confirmation')  AND friends.user1_id = '$id' " ;

         $result = mysqli_query($link, $query) or die(mysqli_error($link));
         for($friends = []; $row = mysqli_fetch_assoc($result); $friends[] = $row);
         $id_friend = '' ;
         $content = '' ;
         foreach ($friends as $friend) {
           $content .= " <div>
                         <div>{$friend['name_friend']} {$friend['surname_friend']}</div>
                         <div>{$friend['email_friend']}</div>
                         <div>{$friend['dob_friend']}</div>
                         <div>{$friend['country']}</div>
                         <div>{$friend['status_relation']}</div>
                         <div><a href=\"?id=$id&adding={$friend['id_friends']}\">Добавить в друзья</a></div>
                      </div><br><br>" ;
         }

         function addFriend($link)
     		{
     			if(isset($_GET['adding'])) {
     					$id_friend = $_GET['adding'];

     					$query = "SELECT users.id as id_user,users.name, relations.id as id_relation,relations.name as status_relation,
                        friends.user2_id as id_friend, friend.name as name_friend, friend.surname as surname_friend
                        FROM `friends`
                        LEFT JOIN `users` ON users.id = friends.user1_id
                        LEFT JOIN `users` as `friend` ON friend.id = friends.user2_id
                        LEFT JOIN `relations` ON relations.id = friends.relations_id
                         WHERE friends.user2_id = '$id_friend' ";
                        
     					$result = mysqli_query($link, $query) or die(mysqli_error($link));
     					$user = mysqli_fetch_assoc($result);
     					$rel = $user['status_relation'];

     					if($rel != 'friends') {
     							$query = "UPDATE friends SET  relations_id='2' WHERE friends.user2_id='$id_friend'";
     							mysqli_query($link, $query) or die(mysqli_error($link));

                  $_SESSION['message'] = [
        						'text' => "У вас появился новый друг",
        						'status' => 'success'
        					] ;
     					}
              $user_id = $_SESSION['id'] ;
     					header("Location: index.php?id=$user_id") ; die() ;
     			}
     		}
     		addFriend($link) ;
       }

    } else {

      $content = "<div><p> Для входа в социальную сеть войдите или зарегистрируйтесь </p>
                  <a href=\"login.php\">login</a> OR
                  <a href=\"register.php\">register</a> </div>" ;
    }


  include "elems/layout.php" ;
