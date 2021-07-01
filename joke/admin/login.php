<?php
include '../elems/init.php' ;

session_start();

if(!empty($_GET['login'])){

    $login = $_GET['login'];
    $password = $_GET['password'];

$query = "SELECT * FROM admins WHERE login='$login' AND password='$password'";
$result = mysqli_query($link, $query);
$admin = mysqli_fetch_assoc($result);

if(!empty($admin)){
    $_SESSION['auth'] = true;
    header('Location: index.php');

} else {
  $_SESSION['message'] = [
    'text' => "No right login or password",
    'status' => 'error'
  ] ;
    header('Location: login.php');
}

} else {

    ?>
    <form action="" method="GET">
        <input type="text" name="login" placeholder="логин">
        <input type="password" name="password" placeholder="пароль">
        <input type="submit" value="Войти">
    </form>
<?php }
