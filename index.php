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
    <link rel="stylesheet" href="styleindex.css" />
    
  </head>
  <header>
    <nav>
      <ul>
        <li><a href="#competences">COMPETENCES</a></li>
        <li><a href="#projets">PROJETS</a></li>
        <li><a href="#contact">CONTACT</a></li>
      </ul>
    </nav>
  </header>
  <body>

    <h1>Pierre PICARD</h1>
    <h2>Développeur de sites Web rapides, sécurisés et Green Code friendly</h3>
    <section id="competences" class="competences">
      <h2>Mes Compétences</h2>
      <div class="fullstack">
      <section class="frontend">
         <h3>FRONTEND</h3>
        <p>HTML</p>
        <p>CSS</p>
        <p>JS</p>
      </section>
      <section class="backend">
         <h3>BACKEND</h3>
        <p>NODE.JS</p>
      </section>
      <section class="bases_de_donnees">
         <h3>BASES DE DONNEES</h3>
        <p>MongoDB</p>
        <p>MySQL</p>
      </section>
   </div>
    </section>

    <section id="projets" class="projets">
      <h2>Mes projets</h2>
      <div id="gallery" class="gallery"></div>
    </section>

    <section id="contact" class="contact">
      <h2>Contact</h2>
    </section>
    <script src="script.js"></script>
  </body>
</html>