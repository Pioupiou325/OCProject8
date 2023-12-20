<?php
$user="root";
$password="root";

$link = new PDO('mysql:host=localhost;dbname=db_portfolio;charset=utf8', $user, $password);

if($link){
   
}else{
   die(mysqli_connect_error());
}


?>