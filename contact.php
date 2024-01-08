<?php
session_start();
include "connect.php";


if (!empty($_POST["user_mail"]) && !empty($_POST["object"]) && !empty($_POST["demande"])) {
    $user_mail = htmlspecialchars($_POST["user_mail"], ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML5, 'UTF-8');
    $object = htmlspecialchars($_POST['object'], ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML5, 'UTF-8');
    $demande = htmlspecialchars($_POST['demande'], ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML5, 'UTF-8');


    $to = 'pierre8800@hotmail.fr';
    $subject = $object;


    $headers[] = 'MIME-Version: 1.0';
    $headers[] = 'Content-type: text/html; charset=iso-8859-1';

    // En-têtes additionnels
    $headers[] = 'To: pierre8800@hotmail.fr';
    $headers[] = `From: $user_mail`;


    if (mail($to, $subject, $demande, $headers)) {

        $message="Votre demande a été envoyé et sera traitée dans les plus brefs délais";
        $_SESSION["message"] = $message;
        header("location:/portfolio/index.php#contact");
    } else {
        $message = "Votre demande n' a pas pu être envoyée, veuillez essayer un peu plus tard";
        $_SESSION["message"] = $message;
        header("location:/portfolio/index.php#contact");
    }
}else{
    $message = "Veuillez remplir tous les champs";
    $_SESSION["message"] = $message;
    header("location:/portfolio/index.php#contact");

}