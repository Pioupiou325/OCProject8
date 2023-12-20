<?php
include "connect.php";

if (!empty($_POST["workname"]) && !empty($_POST["lien_github"]) && isset($_FILES["lien_picture"])) {
    $workname = htmlspecialchars($_POST["workname"], ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML5, 'UTF-8');
    $lien_github = htmlspecialchars($_POST["lien_github"], ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML5, 'UTF-8');

    
    if ($_FILES["lien_picture"]["error"] === UPLOAD_ERR_OK) {
        $uploadDir = 'images/'; 
        $uploadFile = $uploadDir . basename($_FILES["lien_picture"]["name"]);

        
        if (move_uploaded_file($_FILES["lien_picture"]["tmp_name"], $uploadFile)) {
            $lien_picture = $uploadFile;

            $req = $link->prepare('INSERT INTO works (workname, lien_github, lien_picture) VALUES (:workname, :lien_github, :lien_picture)');
            $res = $req->execute([
                'workname' => $workname,
                'lien_github' => $lien_github,
                'lien_picture' => $lien_picture
            ]);

            if ($res) {
                $message = "Requête OK";
                echo $message;
            } else {
                $message = "La requête n'a pas été exécutée";
                echo $message;
            }
        } else {
            echo "Une erreur s'est produite lors du téléchargement du fichier.";
        }
    } else {
        echo "Sélectionner un fichier à télécharger.";
    }
} else {
    echo "Certains champs sont vides ou manquants.";
}
?>
