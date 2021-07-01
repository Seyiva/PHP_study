<?php
include 'elems/init.php' ;
session_start() ;
$title = 'messages';

if (!empty($_SESSION['auth'])) {
		// вывод сообщений со всеми юзерами
		if( isset($_GET['id']) and !isset($_GET['typetofriend'])) {
			$id_user = $_GET['id'] ;

			// запрос на сообщения с разными юзерами
			$query = " SELECT addressee_id, sender_id FROM `messages` WHERE $id_user = sender_id or $id_user = addressee_id " ;
			$result = mysqli_query($link, $query) or die(mysqli_error($link));
			for($messages = []; $row = mysqli_fetch_assoc($result); $messages[] = $row);

			$res = [];
			foreach ($messages as $message) {
				$res[] = $message['sender_id'];
				$res[] = $message['addressee_id'];
			}

			$res = array_unique($res);

			var_dump($res) ; echo "<br>";

			$content = '' ;
		}

		// если есть id usera и есть id друга, значит это личный диалог с конкретным юзером
		if( isset($_GET['id']) and isset($_GET['typetofriend']) ) {
			$id_user = $_GET['id'] ;
			$id_friend = $_GET['typetofriend'] ;
			var_dump($id_user) ; echo "id_user"."<br>";
			var_dump($id_friend) ; echo "id_friend"."<br>";
			// запрос на диалог с конкретным юзером
			// $query = " SELECT  users.name,users.surname, messages.sender_id,messages.addressee_id,
			// 					 messages.dt_message, messages.message FROM `messages`
			// 					 LEFT JOIN `users` ON users.id = messages.sender_id AND messages.addressee_id
			// 				 	 WHERE $id_user = sender_id and $id_friend = addressee_id or
			// 					 $id_user = addressee_id and $id_friend = sender_id " ; //   ORDER BY messages.dt_message ASC
		 $query = " SELECT * FROM `messages` WHERE $id_user = sender_id and $id_friend = addressee_id or
		 						$id_user = addressee_id and $id_friend = sender_id " ;
			$result = mysqli_query($link, $query) or die(mysqli_error($link));
			for($dialogues = []; $row = mysqli_fetch_assoc($result); $dialogues[] = $row); // var_dump($dialogues) ; echo "<br>";

			$query = " SELECT users.id, users.name, users.surname FROM `users`
									WHERE $id_user = id or $id_friend = id " ;
			$result = mysqli_query($link, $query) or die(mysqli_error($link));
			for($users = []; $row = mysqli_fetch_assoc($result);  $users[] = $row) ; // var_dump($users) ; echo "<br>";
			$for_users = [];
			foreach ($users as $user) {
				$for_users[$user['id']] = $user;
			}
			var_dump($for_users) ; echo "<br>";

			$content = '' ;
			foreach ($dialogues as $dialogue) {
				$user = $for_users[ $dialogue['sender_id'] ];

				$content .= " <div>
												<div> {$user['name']} {$user['surname']} {$dialogue['dt_message']}</div>
												<div>{$dialogue['message']} </div>
											</div><br> " ;
			}

		}
} else {
		$content = '' ;
}
  include "elems/layout.php" ;

/* 	// запрос на диалог с конкретным юзером
	$query = " SELECT * FROM `messages` WHERE $id_user = sender_id and $id_friend = addressee_id or
							$id_user = addressee_id and $id_friend = sender_id " ;
	$query = " SELECT  users.name,users.surname, messages.sender_id,messages.addressee_id,
							messages.dt_message,messages.message FROM `messages`
							LEFT JOIN `users` ON users.id = messages.sender_id AND messages.addressee_id
							WHERE $id_user = sender_id and $id_friend = addressee_id or	$id_user = addressee_id and $id_friend = sender_id " ;
	$query = " SELECT users.id as id_user, users.name as name_user, users.surname as surname_user,
						friend.id as id_friend, friend.name as name_friend, friend.surname as surname_friend,
						messages.message as message, messages.dt_message FROM `messages`
						LEFT JOIN `users` ON messages.sender = users.id
						LEFT JOIN `users` as friend ON messages.addressee = friend.id
						WHERE users.id = '$id_user' and friend.id = '$id_friend' ORDER BY messages.dt_message DESC" ;*/
