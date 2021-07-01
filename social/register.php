<?php
  include 'elems/init.php' ;
  //include 'function.php' ;
  $title = 'Регистрация в social network' ;
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
          //проверяем формат даты рождения
          if(!empty($_POST['datebirth']) and (preg_match('#\d{1,2}.\d{1,2}.\d{4}#', $_POST['datebirth']) != 1)){
            $infoDateBirth['have_DateBirth'] = 'Введите дату рождения!';
            $flag = false;
            echo   $infoDateBirth['have_DateBirth'] ;
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

                $datebirth = date('Y-m-d', strtotime($_POST['datebirth'])) ;
                $email = $_POST['email'] ;
                $date = date('Y-m-d');
                $country = $_POST['country'] ;

                if(!empty($_POST['name']) and !empty($_POST['surname']) ) {

                  $name = $_POST['name'] ;
                  $surname = $_POST['surname'] ;

                }
                if(empty($user))  {
                    $query = " INSERT INTO users SET email = '$email', password='$password',
                              registration_date = '$date', birth_date = '$datebirth',
                              name = '$name', surname = '$surname', status_id='1',banned='0', country_id = '$country' " ;
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
          // Выбор страны
          $query = "SELECT * FROM `country`  " ;
          $result = mysqli_query($link, $query) or die(mysqli_error($link));
          for ($countries = []; $row = mysqli_fetch_assoc($result); $countries[] = $row);

          $content = "<form class=\"\" action=\"\" method=\"POST\">
            <p>Enter name</p>
            <input type=\"text\" name=\"name\" >
            <p>Enter surname</p>
            <input type=\"text\" name=\"surname\" >
            <p>Enter birth date</p>
            <input type=\"text\" name=\"datebirth\" value=\"\" placeholder=\"введите d.m.Y\">
            <p>Enter email</p>
            <input type=\"email\" name=\"email\" value=\"\" placeholder=\"введите email\">
            <p>Enter password</p>
            <input name=\"password\" type=\"password\">
            <p>Confirm your password</p>
            <input name=\"confirm\" type=\"password\"> <br>
            <p>Select country</p>
            <select name=\"country\"> " ;
                foreach ($countries as $country){
                  $content .= "<option value=\"{$country['id']}\" >{$country['name']}</option> " ;
                }
            $content .=  "</select>"."<br><br>" ;
            $content .= "<input type=\"submit\" name=\"submit\" value=\"Зарегистрироваться\">
          </form>   "  ;
          include "elems/layout.php" ;
