<?php
include 'init.php' ;
if(!empty($_POST)) {
  // проверяем ввел ли пользователь логин
  if(empty($_POST['login'])) {
    $infoLogin['have_login'] = 'Придумайте и введите логин!';
    echo   $infoLogin['have_login'] ;
  }
  // проверяем длину логина от 4 до 10 символов
  if(strlen($_POST['login']) < 4 or strlen($_POST['login']) > 10) {
    $infoLogin['long'] = 'Длина логина может быть от 4 до 10 символов';
    echo     $infoLogin['long'] ;
  }
  // проверяем формат введенного логина
  if(preg_match('#^[A-Za-z0-9]*$#', $_POST['login']) != 1 ){
    $infoLogin['login_format'] = 'Логин может содержать только латинские буквы и цифры';
    echo   $infoLogin['login_format'] ;
  }

  // проверяем ввел ли пользователь пароль
  if(empty($_POST['password'])) {
    $infoPassword['have_password'] = 'Придумайте и введите пароль!';
    echo   $infoPassword['have_password'] ;
  }
  // проверяем длину пароля от 6 до 12 символов
  if(strlen($_POST['password']) < 6 or strlen($_POST['password']) > 12) {
    $infoPassword['long'] = 'Длина пароля может быть от 6 до 12 символов';
    echo   $infoPassword['long'] ;
  }
  //проверяем совпадают ли пароль и подтверждение пароля
   if ($_POST['confirm'] != $_POST['password']) {
       $infoPasswordConfirm['confirm'] = 'Пароль и потверждение не совпадают';
   }
  // проверяем формат введенного email
  if(preg_match('#^[A-Za-z0-9_.-]+@[a-z_.-]+\.[a-z]{2,4}$#',$_POST['email']) != 1 ) {
    $infoEmail['email_format'] = 'Вы ввели некорректный email';
    echo   $infoEmail['email_format'] ;
  }

} else {

  echo "<form class='' action='' method=POST>" ;
  echo "<ul style='list-style-type: none;'></ul>";
  //Логин
  if(empty($infoLogin)) {
    echo "<li>Enter login</li>" ;
    echo "Только латинские буквы и цифры. От 4 до 10 символов";
    echo " <li><input type=\"text\" name=\"login\" ></li> " ;
  } else {
    foreach ($infoLogin as $error) {
      echo "<li style='color:red;'>$error</li>" ;
    }
    echo " <li> <input type=\"text\" name=\"login\" > </li> " ;
  }
  //Пароль
  if(empty($infoPassword)) {
    echo "<li>Enter password</li>" ;
    echo "От 6 до 12 символов";
    echo " <li><input type=\"password\" name=\"password\" ></li> " ;
  } else {
    foreach ($infoPassword as $error) {
      echo "<li style='color:red;'>$error</li>" ;
    }
    echo " <li> <input type=\"password\" name=\"password\" > </li> " ;
  }
  //Подтверждение пароля
  if(empty($infoPasswordConfirm)) {
    echo "<li>Confirm password</li>" ;
    echo " <li><input type=\"password\" name=\"confirm\" ></li> " ;
  } else {
    foreach ($infoPasswordConfirm as $error) {
      echo "<li style='color:red;'>$error</li>" ;
    }
    echo " <li> <input type=\"password\" name=\"confirm\" > </li> " ;
  }
  //email
  if(empty($infoEmail)) {
    echo "<li>Enter email</li>" ;
    echo "In the right format user@mail.ru";
    echo " <li><input type=\"email\" name=\"email\"  placeholder='Enter email' ></li> " ;
  } else {
    foreach ($infoEmail as $error) {
      echo "<li style='color:red;'>$error</li>" ;
    }
    echo " <li> <input type=\"email\" name=\"email\"  placeholder='Enter email'> </li> " ;
  }

  //Делаем запрос
    $query = "SELECT * FROM country";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    for($country = []; $row = mysqli_fetch_assoc($result); $country[] = $row);

    echo "<li>Выберите страну проживания</li> ;
          <select name='country'>";
    foreach ($country as $elem){
        echo "<option value=\"{$elem['id']}\">{$elem['name']}</option>";
    }
       echo "</select>" ;

  echo " <input type=\"submit\" name=\"submit\" value=\"Registration\"> " ;
  echo "</form>" ;
}

// 1 не работает style='list-style-type: none;'
// 2 не работает различие подтверждения паролей
// 3 Как настроить работу даты с формы
// 4 Как настроить отправку города в БД? Поле страна в колонке пользователь ?

// https://github.com/bald-cat/php-study/commit/ae5061bd72d80f6d320c0b79202f4eb4e258e60a#
// 1) Почему  в $error  ничего не лежит? или как он понимает елемент массива?
// 2)  Зачем нужна в /functions.php   function registrationForm(){echo }вывод формы 39-58 строки?
// 3) Зачем нужно так value=\"{$_POST['login']}\" ? Для получения из БД {$elem['id']} , {$elem['name']} ?
// 4) Почему в пароле вывод echo "<li><input name=\"password\" type=\"password\"></li>";
// 	а в логине echo " <li><input name=\"login\" value=\"{$_POST['login']}\"></li>";

/*  <p>Enter birth date</p>
  <input type="text" name="datebirth" value="<?php date('d.m.Y')?>" placeholder="введите d.m.Y">
  <p></p> */
