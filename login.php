<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login-admin</title>
   <link rel="stylesheet" href="./styleadmin.css">
</head>
<body>
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
<form action="control.php" method="POST">
   <fieldset>
        <label>identifiant</label>
        <input type="text" name="identifiant" placeholder="identifiant" />

        <label>mot_de_passe</label>
        <input type="text" name="mot_de_passe" placeholder="mot de passe" />            
        
        <input type="submit" value="envoyer" />
      </fieldset>
    </form>
</body>
</html>