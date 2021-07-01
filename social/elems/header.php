<?php
include 'init.php' ;
if (!empty($_SESSION['auth']))  {
  $id_user = $_SESSION['id'] ;

  $query = "SELECT id,name,surname,email FROM users WHERE id = '$id_user' ";
  $result = mysqli_query($link, $query) or die(mysqli_error($link));
  $user = mysqli_fetch_assoc($result);

  $head = " <nav>
     <ul>
        <li><a href=\"index.php?id={$user['id']}\"> Главная</a></li>
        <li><a href=\"profile.php?id={$user['id']}\"> Профиль </a></li>
        <li><a href=\"friends.php?id={$user['id']}\"> Друзья </a></li>
        <li><a href=\"messages.php?id={$user['id']}\"> Сообщения </a></li>
        <li><a href=\"logout.php\"> Выход из профиля</a></li>
    </ul>
  </nav> " ;

  echo $head ;
}
