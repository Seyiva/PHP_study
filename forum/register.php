<?php
  include 'elems/init.php' ;
  //include 'function.php' ;
  $title = 'Регистрация на формуме' ;
      if (!empty($_POST)) {

          $flag = true;

          // проверяем ввел ли пользователь логин

          if(empty($_POST['login'])) {
            $infoLogin['have_login'] = 'Придумайте и введите логин!';
            $flag = false;
            echo   $infoLogin['have_login'] ;
          }
          // проверяем длину логина от 4 до 10 символов
          if(!empty($_POST['login']) AND (strlen($_POST['login']) < 4 or strlen($_POST['login']) > 10) )  {
            $infoLogin['long'] = 'Длина логина может быть от 4 до 10 символов';
            $flag = false;
            echo     $infoLogin['long'] ;
          }
          // проверяем формат введенного логина
          if(!empty($_POST['email']) AND (preg_match('#^[A-Za-z0-9]*$#', $_POST['login']) != 1) ){
            $infoLogin['login_format'] = 'Логин может содержать только латинские буквы и цифры';
            $flag = false;
            echo   $infoLogin['login_format'] ;
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
          // проверяем формат введенного email
          if(!empty($_POST['email']) and (preg_match('#^[A-Za-z0-9_.-]+@[a-z_.-]+\.[a-z]{2,4}$#',$_POST['email']) != 1) ) {
            $infoEmail['email_format'] = 'Вы ввели некорректный email';
            $flag = false;
            echo   $infoEmail['email_format'] ;
          }

          if(!empty($_POST['datebirth']) and (preg_match('#\d{1,2}.\d{1,2}.\d{4}#', $_POST['datebirth']) != 1)){
            $infoDateBirth['have_DateBirth'] = 'Введите дату рождения!';
            $flag = false;
            echo   $infoDateBirth['have_DateBirth'] ;
          }



          if ($flag == true) {

                $login = $_POST['login'] ;

                $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                // Пробуем получить юзера с таким логином
                $query = "SELECT * FROM users WHERE login='$login'";
                $user = mysqli_fetch_assoc(mysqli_query($link, $query));

                $datebirth = date('Y-m-d', strtotime($_POST['datebirth'])) ;
                $email = $_POST['email'] ;
                $date = date('Y-m-d');

                if(!empty($_POST['name']) and !empty($_POST['surname']) ) {

                  $name = $_POST['name'] ;
                  $surname = $_POST['surname'] ;

                }
                if(empty($user))  {
                    $query = " INSERT INTO users SET login='$login', password='$password',
                              birth_date = '$datebirth',  email = '$email', registration_date = '$date'
                              , name = '$name', surname = '$surname', status_id='1',banned='0' " ;
                    mysqli_query($link, $query) or die(mysqli_error($link));

                    $_SESSION['auth'] = true ;
                    $_SESSION['name_user'] = $_POST['login'];

                    $id = mysqli_insert_id($link);
                    $_SESSION['id'] = $id;
                    

                    $_SESSION['message'] = [
                      'text' => "Вы зарегистрировались успешно",
                      'status' => 'success'
                    ] ;

                   //header('Location: index.php') ; die() ;

                    } else {
                      $_SESSION['message'] = [
                        'text' => "Пользователь с таким логином уже существует",
                        'status' => 'error'
                      ] ;
                    }
                }
          }
          $for_form = date('d.m.Y') ;
          $content = "<form class=\"\" action=\"\" method=\"POST\">
            <p>Enter login</p>
            <input type=\"text\" name=\"login\" >
            <p>Enter name</p>
            <input type=\"text\" name=\"name\" >
            <p>Enter surname</p>
            <input type=\"text\" name=\"surname\" >
            <p>Enter password</p>
            <input name=\"password\" type=\"password\">
            <p>Confirm your password</p>
            <input name=\"confirm\" type=\"password\">
            <p>Enter birth date</p>
            <input type=\"text\" name=\"datebirth\" value=\"$for_form\" placeholder=\"введите день месяц год\">
            <p>Enter email</p>
            <input type=\"email\" name=\"email\" value=\"\" placeholder=\"введите email\">
            <input type=\"submit\" name=\"submit\" value=\"Зарегистрироваться\">
          </form>   "  ;
          include "elems/layout.php" ;
