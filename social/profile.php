<?php
include 'elems/init.php' ;
session_start() ;
$title = 'Profile';

if (!empty($_SESSION['auth'])) {
	if(isset($_GET['id'])) {
		$id = $_GET['id'] ;

		$query = "SELECT * FROM users WHERE id='$id' ";
		$result = mysqli_query($link, $query) or die(mysqli_error($link));
		$user = mysqli_fetch_assoc($result);

		if(!empty($user)) {
			$name =  $user['name'] ;
			$surname =  $user['surname'] ;
			$email = $user['email'] ;
			$datebirth =  $user['birth_date'] ;
			$dob = explode('-',   $datebirth  ) ;
			$dob = mktime(0,0,0, $datebirth[0],$datebirth[1],$datebirth[2]) ;
			$age = (time() - $dob)/ 31536000 ;
			list($agefromdob) = explode(".",$age);
		}
	}
	$content = 'Your name - ' . $name .'<br><br>'.
						 'Your surname - ' . $surname .'<br><br>'.
						 'Your date of birth - ' . $datebirth .'<br><br>'.
						 'Your age is - '. $agefromdob . '<br>';
  $id_friend = '' ;
} else {
	$content = '' ;
}
  include "elems/layout.php" ;
