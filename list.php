<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Liste des projets</title>
   <link rel="stylesheet" href="style.css">
</head>
<body>
   <header>
      <nav>
         <ul>
            <li><a href="/portfolio/form.php">Admin</a></li>
            <li><a href="/portfolio/list.php">Portfolio</a></li>
            <li><a href="">Contact</a></li>
         </ul>
      </nav>
   </header>
   <div class="message">
      <?php
      if (isset($_SESSION["message"])&& !empty( $_SESSION["message"])) {
        $message=$_SESSION["message"];
        unset($_SESSION["message"]);
      }else{

        $message= "";
      }
      ?>

  <p><?php echo $message  ?></p>    
  </div>
   <h1>Liste des projets réalisés</h1>
   <table>
      <tr>
         <th>Identifiant</th>
         <th>Workname</th>
         <th>Lien Github</th>
         <th>Lien Picture</th>
         <th>lien Site</th>
         <th>Commentaires</th>
         <th>Action</th>
      </tr>
      <?php
      include "connect.php";
      $req = $link->prepare("SELECT * FROM works");
      $req->execute();
      $res = $req->fetchAll(PDO::FETCH_ASSOC);

      if (!empty($res)) {
         foreach ($res as $value) {
            echo "<tr>";
            foreach ($value as $v) {
               echo "<td>$v</td>";
            }
            // Ajout du lien d edition pour chaque projet avec son ID
            echo "<td><a href='modify.php?id={$value['idworks']}'><img src='./datas/edit.png' width=10px alt='Modifier' /></a></td>";

            // Ajout du lien de suppression pour chaque projet avec son ID
            echo "<td><a href='delete.php?id={$value['idworks']}'><img src='./datas/cross.webp' width=10px alt='Supprimer' /></a></td>";
            echo "</tr>";
         }
      }
      ?>
   </table>
</body>
</html>