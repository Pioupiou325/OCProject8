<?php session_start();

if ($_SESSION["token"] != 1234){
  echo ($_SESSION["token"]);
  $message = "Accès interdit sans identifiants";
  $_SESSION["message"] = $message;
  header("location:/portfolio/login.php");
} else {
  
  ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="styleadmin.css" />
    <title>Portfolio_test</title>
  </head>
  <body>
    <header>
      <nav>
        <ul>
          <li><a href="/portfolio/form.php">Admin</a></li>
          <li><a href="/portfolio/list.php">Portfolio</a></li>
          </ul>
      </nav>
    </header>
    <div class="message">
      <?php
      if (isset($_SESSION["message"]) && !empty($_SESSION["message"])) {
        $message = $_SESSION["message"];
        unset($_SESSION["message"]);
      } else {

        $message = "";
      }
      ?>

  <p><?php echo $message ?></p>    
  </div>
    <form action="insert.php" method="POST" enctype="multipart/form-data">
      <fieldset>
        <legend>Enregistrer un projet dans la base de données</legend>

        <label>projet</label>
        <input type="text" name="workname" placeholder="nom_projet" />

        <label>lien github</label>
        <input type="text" name="lien_github" placeholder="lien github" />
               
        <label>lien site</label>
        <input type="text" name="lien_site" placeholder="lien site" />

        <label>Commentaires</label>
        <textarea name="comments" placeholder="Ecrivez ici"></textarea>
          
        <label class="button_file" >illustration</label>
        <input type="file" name="lien_picture"  />

        <input type="submit" value="envoyer" />
      </fieldset>
    </form>
  </body>
</html>
<?php
}
?>