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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">

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
  <div class="container">
    <div class="anim">
      <p>PIERRE PICARD</p>
    </div>
  </div>
    
    <h1>Développeur de sites Web rapides, sécurisés</h1>
    <h2>et Green Code friendly</h2>  
    
    <section id="competences" class="competences">
      <h2>Mes Compétences</h2>
      <div class="fullstack">
      <section class="frontend">
         <h3>FRONTEND</h3>
        
        <img src="./datas/logo_html.png" alt="html">
        
        <img src="./datas/logo_css.png" alt="css">
        
        <img src="./datas/logo_js.webp" alt="js">
      </section>
      <section class="backend">
         <h3>BACKEND</h3>
        
        <img src="./datas/logo_nodejs.png" alt="nodejs">
      </section>
      <section class="bases_de_donnees">
         <h3>BASES DE DONNEES</h3>
        
        <img src="./datas/logo_mongodb.png" alt="mongodb">
        
        <img src="./datas/logo_sql.png" width="40px" alt="mysql">
      </section>
   </div>
    </section>

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
        <input type="text" name="lien_github" placeholder="Ecrivez ici" />        

        <input type="submit" value="envoyer" />
      </fieldset>
    </form>

      <?php
  if (!empty ($res) ){
    foreach ($res as $row) {
?>
<p><?= htmlspecialchars_decode($row["workname"])?></p>
<?php
    }
  }   
  ?>

    </section>
    <script src="script.js"></script>
  </body>
</html>




