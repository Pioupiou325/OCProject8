<?php
session_start();
include "connect.php";

if (!empty($_POST["workname"]) && !empty($_POST["lien_github"]) && !empty($_POST["lien_site"]) && isset($_FILES["lien_picture"])) {
    $workname = htmlspecialchars($_POST["workname"], ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML5, 'UTF-8');
    $lien_github = htmlspecialchars($_POST["lien_github"], ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML5, 'UTF-8');
    $lien_site = htmlspecialchars($_POST["lien_site"], ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML5, 'UTF-8');

    
    if ($_FILES["lien_picture"]["error"] === UPLOAD_ERR_OK) {
        $uploadDir = 'images/'; 
        $uploadFile = $uploadDir . basename($_FILES["lien_picture"]["name"]);

        
        if (move_uploaded_file($_FILES["lien_picture"]["tmp_name"], $uploadFile)) {
            $lien_picture = $uploadFile;

            $req = $link->prepare('INSERT INTO works (workname, lien_github, lien_picture,lien_site) VALUES (:workname, :lien_github, :lien_picture, :lien_site)');
            $res = $req->execute([
                'workname' => $workname,
                'lien_github' => $lien_github,
                'lien_picture' => $lien_picture,
                'lien_site' => $lien_site
            ]);

            if ($res) {
                $message = "Requête OK";
                
            } else {
                $message = "La requête n'a pas été exécutée";
                
            }
            
        } else {
            $message = "Erreur de téléchargement du fichier.";
        }
    } else {
        $message = "Sélectionner un fichier à télécharger.";
    }
    $_SESSION["message"] = $message;
header("location:/portfolio/form.php");
} else {
    $message = "Certains champs sont vides ou manquants.";
    $_SESSION["message"] = $message;
header("location:/portfolio/form.php");
}

?>
