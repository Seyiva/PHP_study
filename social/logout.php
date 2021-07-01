<?php
	session_start(); // обязательно стартуем сессию, чтобы с ней далее работать
	$_SESSION['auth'] = null;
	$_SESSION['guest'] = true ;
	$_SESSION['message'] = [
		'text' => "Вы вышли из профиля",
		'status' => 'warning'
	] ;
 	header('Location: index.php') ; die() ;
