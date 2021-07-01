<?php
  include 'elems/init.php' ;
    session_start() ;
    $title = 'Войти на форум' ;

  	if(isset($_POST['email']) and isset($_POST['password'])) {

  		$email = $_POST['email'] ;
      // Получаем юзера по логину и джойним статус:
  		$query="SELECT  users.* , statuses.name as status FROM `users` LEFT JOIN statuses ON users.status_id=statuses.id
              WHERE email = '$email' " ; // получаем юзера по логину
  		$result = mysqli_query($link, $query) or die(mysqli_error($link));
  		$user =  mysqli_fetch_assoc($result) ;

  		if ( !empty($user) ) {

            $hash = $user['password'] ; //соленый пароль из БД

            if(password_verify($_POST['password'], $hash) ) {
                if ($user['banned'] != 1 ) {
                  $_SESSION['auth'] = true ;
                  $_SESSION['email_user'] =  $user['email']; //делаем запись залогининого пользователя в сессию


                  $_SESSION['id'] = $user['id']; //записываем id пользователя из БД
            			$_SESSION['status'] = $user['status']; // записываем status пользователя из БД
                  $_SESSION['name_user'] = $user['name'];
                  $_SESSION['surname_user'] = $user['surname'];

                  //var_dump($_SESSION) ;
                  //var_dump($user) ;
        					$_SESSION['message'] = [
        						'text' => "Вы вошли успешно",
        						'status' => 'success'
        					] ;
        					header('Location: index.php') ; die() ;
                } else {
                  $_SESSION['message'] = [
                    'text' => "Вы забанены",
                    'status' => 'error'
                  ] ;
               }
              } else {
              $_SESSION['auth'] = false ;

              $_SESSION['message'] = [
                'text' => "Вы неверно ввели email или пароль",
                'status' => 'error'
              ] ;
            }
        }


    }

    $content = "<form  method=\"POST\">
  		<input type=\"email\" name=\"email\" >
  		<input type=\"password\" name=\"password\" >
  		<input type=\"submit\" name=\"submit\" value=\"Войти\">
  	</form>" ;


  include "elems/layout.php" ;
// var_dump($_SESSION) ;
