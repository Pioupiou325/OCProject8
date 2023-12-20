<?php
include "connect.php"; 

if (isset($_GET['id'])) {
    $id_fichier = $_GET['id']; // Récupère l'ID du fichier à supprimer depuis l'URL
   // var_dump($id_fichier);    
    
    $req = $link->prepare('SELECT lien_picture FROM works WHERE idworks = :id');
    $req->execute(['id' => $id_fichier]);
    $fichier = $req->fetch();

    if ($fichier) {
        $chemin_fichier = $fichier['lien_picture'];
        
        if (file_exists($chemin_fichier)) {
          
            if (unlink($chemin_fichier)) {
                
                $req = $link->prepare('DELETE FROM works WHERE idworks = :id');
                $res = $req->execute(['id' => $id_fichier]);

                if ($res) {
                    echo 'Le fichier et son entrée dans la base de données ont été supprimés avec succès.';
                } else {
                    echo 'Erreur lors de la suppression de l\'entrée dans la base de données.';
                }
            } else {
                echo 'Erreur lors de la suppression du fichier.';
            }
        } else {
            echo 'Le fichier n\'existe pas.';
        }
    } else {
        echo 'Fichier non trouvé dans la base de données.';
    }
} else {
    echo 'Aucun ID de fichier spécifié.';
}
?>
