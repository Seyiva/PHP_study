<?php
    error_reporting(E_ALL) ;
    ini_set('display_errors', 'on') ;

  //  session_start() ;

    $host = 'localhost';
    $user = 'root';
    $password = '';
    $db_name = 'social_network';

    $link = mysqli_connect($host, $user, $password, $db_name);
    mysqli_query($link, "SET NAMES 'utf8'");
