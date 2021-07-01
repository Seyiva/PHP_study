<?php
include 'elems/init.php' ;
session_start() ;
$title = 'friends';

if (!empty($_SESSION['auth'])) {

	if(isset($_GET['id'])) {
		$id = $_GET['id'] ;
		//покажем моих друзей

		$query = " SELECT users.id, users.name, users.surname, users.email,  relations.name as status_relation,
								friend.id as id_friend,friend.name as name_friend, friend.surname as surname_friend, friend.email as email_friend,
								friend.birth_date as dob_friend, country.name as country	FROM `friends`
							 LEFT JOIN `users` ON users.id = friends.user1_id
							 LEFT JOIN `users` as `friend` ON friend.id = friends.user2_id
							 LEFT JOIN `relations` ON relations.id = friends.relations_id
							 LEFT JOIN `country` ON country.id = friend.country_id
               WHERE relations.name = 'friends' AND friends.user1_id = '$id' " ;
		$result = mysqli_query($link, $query) or die(mysqli_error($link));
		for($friends = []; $row = mysqli_fetch_assoc($result); $friends[] = $row);

		$content = '' ;
		foreach ($friends as $friend) {
		$content .= " <div>
										<div>{$friend['name_friend']} {$friend['surname_friend']}</div>
										<div>{$friend['email_friend']}</div>
										<div>{$friend['dob_friend']}</div>
										<div>{$friend['country']}</div>
										<div>{$friend['status_relation']}</div>
									  <div><a href=\"messages.php?id=$id&typetofriend={$friend['id_friend']}\">Написать сообщение</a></div>
									</div><br><br>" ;
		}
	}
	$id_friend = $friend['id_friend'] ;





} else {
		$content = '' ;
}
  include "elems/layout.php" ;
