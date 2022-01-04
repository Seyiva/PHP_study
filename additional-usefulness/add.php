<meta charset="utf-8">
<?php
header('Content-Type: text/html; charset=utf-8');

error_reporting(E_ALL) ;
ini_set('display_errors', 'on') ;

$host = 'localhost';
$user = 'root';
$password = '';
$db_name = 'justcode';

$link = mysqli_connect($host, $user, $password, $db_name);
mysqli_query($link, "SET NAMES 'utf8'");

$dataCSV = '10.08.21_viz.ru.csv';

if(($file = fopen($dataCSV, 'r')) !== false ) {
    $res = [] ;
    while (($data = fgetcsv($file, 512, ";")) !== false ) {
        $res[] = $data ;
    }

    fclose($file) ;
} 
$newRes = array_splice($res, 0, 2);
$res = array_slice($res,0,5) ;
var_dump($res) ;


foreach($res as $arr) {
    $address = $arr[2]. ' ' .$arr[5]. ' ' . $arr[6]  ;   

    $query = "SELECT * FROM addresses WHERE `address`='$address' ";
    $result = mysqli_fetch_assoc(mysqli_query($link, $query));
    //var_dump($result) ;

    if(empty($result)) {
        $query = " INSERT INTO addresses SET `address` = '$address' " ;
        mysqli_query($link, $query) or die(mysqli_error($link));

    } else {
        echo "<b>$address - Такой адрес уже существует в базе данных </b> <br>" ;

        /* RESTfull API
        $answer = [
        'status' => 'false',
        'message' => 'This address already exists' ,
        ];
        echo json_encode($answer) .'<br>';
        */
    }
} 