<?php
session_start();

if (!empty($_POST["identifiant"])&& !empty($_POST["mot_de_passe"])){
$name = $_POST["identifiant"];
$pass = $_POST["mot_de_passe"];



   if (($name === "paul") && ($pass === "paul40")) {
      $token = 1234;
      $_SESSION["token"] = $token;
      header("location:/portfolio/form.php");
   }else{
      $message = "identifiants inconnus";
   $_SESSION["message"] = $message;
   header("location:/portfolio/login.php");
   }
}else{
   $message = "veuillez rentrer vos identifiants";
   $_SESSION["message"] = $message;
   header("location:/portfolio/login.php");
}

?>