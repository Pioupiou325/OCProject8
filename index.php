<?php
include "connect.php";
$req = $link->prepare("SELECT * FROM works");
$req->execute();
$res = $req->fetchAll(PDO::FETCH_ASSOC);
echo "<script>";
echo "const content = " . json_encode($res) . ";";
echo "</script>";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Je suis développeur fullstack, je crée des pages ou des sites
    web.Je peux réaliser le frontend de votre site, comme le backend.Si vous cherchez un développeur 
    pour lier votre site web avec une base de données, je réalise le front et le back ainsi que 
    la gestion de votre base de données clients ou produits">
    <title>Test js php</title>
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap"> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;700&family=Montserrat:wght@500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styleindex.css" />
    
  </head>
  <header id="home">
    <nav>
      <ul>
        <li><a href="#home">PORTFOLIO</a></li>
        <li><a href="#projets">PROJETS</a></li>
        <li><a href="#contact">CONTACT</a></li>
      </ul>
    </nav>
  </header>
  <body>
  <div class="container">
    <div class="anim">
      <p>PIERRE PICARD</p>
    </div>
  </div>
    
    <h1>Développeur fullstack de sites Web rapides sécurisés</h1>
    <p>et Green Code friendly</p>  
    
 

    <section id="projets" class="projets">
      <h2>Mes projets</h2>
      
      
      <div id="gallery" class="gallery"></div>
      
      

    </section>





    <section id="contact" class="contact">
      <h2>Contact</h2>
      <form action="contact.php" method="POST" >
      <fieldset>
        <legend>Formulaire de contact</legend>

        <label>Votre email</label>
        <input type="email" name="user_mail" placeholder="user_mail" />

        <label>Votre demande</label>
        <textarea name="demande" placeholder="Ecrivez ici"></textarea>      

        <input type="submit" value="envoyer" />
      </fieldset>
    </form>

      

    </section>
    <script src="script.js"></script>
  </body>
</html>




