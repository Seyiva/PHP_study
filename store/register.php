<?php
  include 'elems/init.php' ;
  //include 'function.php' ;
  $title = 'Регистрация в онлайн магазине' ;
      if (!empty($_POST)) {

          $flag = true;
          // проверяем ввел ли пользователь email
          if(empty($_POST['email'])) {
            $infoEmail['have_email'] = 'Введите Ваш email !';
            $flag = false;
            echo   $infoEmail['have_email'] ;
          }

          // проверяем формат введенного email
          if(!empty($_POST['email']) and (preg_match('#^[A-Za-z0-9_.-]+@[a-z_.-]+\.[a-z]{2,4}$#',$_POST['email']) != 1) ) {
            $infoEmail['email_format'] = 'Вы ввели некорректный email';
            $flag = false;
            echo   $infoEmail['email_format'] ;
          }

          // проверяем ввел ли пользователь пароль
          if(empty($_POST['password'])) {
            $infoPassword['have_password'] = 'Придумайте и введите пароль!';
            $flag = false;
            echo   $infoPassword['have_password'] ;
          }
          // проверяем длину пароля от 6 до 12 символов
          if(!empty($_POST['password']) AND (strlen($_POST['password']) < 6 or strlen($_POST['password']) > 12)) {
            $infoPassword['long'] = 'Длина пароля может быть от 6 до 12 символов';
            $flag = false;
            echo   $infoPassword['long'] ;
          }
          // проверяем пароль и подтверждение
          if (!empty($_POST['password']) and !empty($_POST['confirm']) and ($_POST['password'] !== $_POST['confirm']) ){
            $infoPassword['right'] = 'Пароли не совпадают' ;
            $flag = false;
            echo  $infoPassword['right']  ;
          }



          if ($flag == true) {

                $email = $_POST['email'] ;

                $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                // Пробуем получить юзера с таким емайлом
                $query = "SELECT * FROM users WHERE email='$email'";
                $user = mysqli_fetch_assoc(mysqli_query($link, $query));

                $email = $_POST['email'] ;
                $date = date('Y-m-d');

                if(!empty($_POST['name']) and !empty($_POST['surname']) ) {

                  $name = $_POST['name'] ;
                  $surname = $_POST['surname'] ;

                }
                if(empty($user))  {
                    $query = " INSERT INTO users SET email = '$email', password='$password',
                              registration_date = '$date',
                              name = '$name', surname = '$surname', status_id='1',banned='0' " ;
                    mysqli_query($link, $query) or die(mysqli_error($link));

                    $_SESSION['auth'] = true ;
                    $_SESSION['email_user'] = $_POST['email'];

                    $id = mysqli_insert_id($link);
                    $_SESSION['id'] = $id;


                    $_SESSION['message'] = [
                      'text' => "Вы зарегистрировались успешно",
                      'status' => 'success'
                    ] ;

                   //header('Location: index.php') ; die() ;

                    } else {
                      $_SESSION['message'] = [
                        'text' => "Пользователь с таким email уже существует",
                        'status' => 'error'
                      ] ;
                    }
                }
          }


          $content = "<form class=\"\" action=\"\" method=\"POST\">
            <p>Enter name</p>
            <input type=\"text\" name=\"name\" >
            <p>Enter surname</p>
            <input type=\"text\" name=\"surname\" >
            <p>Enter email</p>
            <input type=\"email\" name=\"email\" value=\"\" placeholder=\"введите email\">
            <p>Enter password</p>
            <input name=\"password\" type=\"password\">
            <p>Confirm your password</p>
            <input name=\"confirm\" type=\"password\"> <br><br>
            <input type=\"submit\" name=\"submit\" value=\"Зарегистрироваться\">
          </form>   "  ;
          include "elems/layout.php" ;
