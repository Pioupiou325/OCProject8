<?php
session_start();
include "connect.php";


if (!empty($_POST["user_mail"]) && !empty($_POST["object"]) && !empty($_POST["demande"])) {
$user_mail = htmlspecialchars($_POST["user_mail"], ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML5, 'UTF-8');
$object=htmlspecialchars($_POST['object'], ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML5, 'UTF-8');
$demande = htmlspecialchars($_POST['demande'], ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML5, 'UTF-8');


$to      = 'pierre8800@hotmail.fr';
$subject = $object;
$message = $demande;
$headers = array(
    'From' => $user_mail,
    'Reply-To' => $user_mail,
    'X-Mailer' => 'PHP/' . phpversion()
);

mail($to, $subject, $message, $headers);



}
