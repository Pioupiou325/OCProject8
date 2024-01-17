<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Je suis développeur fullstack, je crée des pages ou des sites
    web.Je peux réaliser le frontend de votre site, comme le backend.Si vous cherchez un développeur 
    pour lier votre site web avec une base de données, je réalise le front et le back ainsi que 
    la gestion de votre base de données clients ou produits ainsi que le déploiement">
    <title>Pierre PICARD developpement</title>    
    <link rel="icon" href="favicon.ico" />    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;700&family=Montserrat:wght@500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css" />
    <meta property="og:title" content="Pierre PICARD developpement" />
    <meta property="og:description" content="Je suis développeur fullstack, je crée des pages ou des sites
    web.Je peux réaliser le frontend de votre site, comme le backend.Si vous cherchez un développeur 
    pour lier votre site web avec une base de données, je réalise le front et le back ainsi que 
    la gestion de votre base de données clients ou produits ainsi que le déploiement" />
    <meta property="og:image" content="https://pierrepicarddev.fr/images/laptop.jpg" />
    <meta property="og:url" content="https://pierrepicarddev.fr" />
    <?php session_start(); ?>
    <?php
include "connect.php";
$req = $link->prepare("SELECT * FROM works");
$req->execute();
$res = $req->fetchAll(PDO::FETCH_ASSOC);
echo "<script>";
echo "const content = " . json_encode($res) . ";";
echo "</script>";
?>
</head>
<body>
  <header id="home">
    <nav>
      <ul>
        <li class="desktop"><a href="#home">PORTFOLIO</a></li>
        <li class="desktop"><a href="#projets">PROJETS</a></li>
        <li class="desktop"><a href="#contact">CONTACT</a></li>

        <li class="mobile"><a href="#home"><img src="./datas/logo_home.png" alt="portfolio"></a></li>
        <li class="mobile"><a href="#projets"><img src="./datas/logo_projets.png" alt="projets"></a></li>
        <li class="mobile"><a href="#contact"><img src="./datas/logo_contact.png" alt="contact"></a></li>
      </ul>
    </nav>
  </header>
  
  <div class="container">
    <div class="anim">
      <h1>PIERRE</h1>
    </div>
    <h2>Développeur fullstack</h2>
  </div>
  
  <h3 class="presentation">
  Je suis là pour concrétiser tous vos projets et donner une visibilité exceptionnelle à votre entreprise en ligne.<br>
   Que vous ayez besoin d'une simple page vitrine, d'un site de e-commerce complet, ou encore d'améliorer le référencement (SEO) et les performances de votre site, je suis prêt à répondre à toutes vos demandes.<br>
    Mon engagement envers le développement respectueux de l'environnement se reflète dans l'adoption des bonnes pratiques du Green Code.<br>
  N'hésitez pas à partager vos besoins, je suis là pour créer la solution parfaite pour vous.<br>Je suis là pour vous accompagner dès le début de votre projet jusqu'à sa mise en ligne et son hébergement final.
</h3>

    <section id="projets" class="projets">
      <h3>Mes projets</h3>
            
      <div id="gallery" class="gallery">
      </div>       
    </section>
<section class=competences_section>
  <h3>Mes Compétences</h3>
  <div class="competences-container">
<div class="competences">
        <img src="./datas/logo_html.png" alt="html">
        <img src="./datas/logo_css.png" alt="css">
        <img src="./datas/logo_js.webp" alt="js">  
        <img src="./datas/logo_nodejs.png" alt="nodejs">      
        <img src="./datas/logo_mongodb.png" alt="mongo">
        <img src="./datas/logo_php.jpg" alt="php">
        <img src="./datas/logo_sql.png" alt="sql">
        <img src="./datas/logo_react.png" alt="react">
      </div> 
<div class="competences">
        <img src="./datas/logo_html.png" alt="html">
        <img src="./datas/logo_css.png" alt="css">
        <img src="./datas/logo_js.webp" alt="js">   
        <img src="./datas/logo_nodejs.png" alt="nodejs">       
        <img src="./datas/logo_mongodb.png" alt="mongo">
        <img src="./datas/logo_php.jpg" alt="php">
        <img src="./datas/logo_sql.png" alt="sql">
        <img src="./datas/logo_react.png" alt="react">
      </div>       
      </div>
</section>
    <section id="contact" class="contact">
      <h3>Contact</h3>
      <div class="form_contact">
      <form action="contact.php" method="POST" >
      <fieldset>
        <legend>Formulaire de contact</legend>

        <label for="email">Votre email</label>
        <input type="email" name="user_mail" placeholder="Entrez votre email" id="email"/>

        <label for ="object">Objet de la demande</label>
        <input type="text" name="object" placeholder="objet de la demande" id="object"/>

        <label for="demande">Votre demande</label>
        <textarea name="demande" placeholder="Ecrivez ici" id="demande"></textarea>      

        <input type="submit" value="ENVOYER" />
      </fieldset>
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
</form> 
</div>
    </section>
    <footer>
      <div class="liens_socials">
        <a href="https://github.com/Pioupiou325"><img src="./datas/logo_git.png" alt="github"></a>
        <a href="https://www.linkedin.com/in/pierre-picard-30809a297/"><img src="./datas/logo_linkedin.png" alt="linkedin"></a>
        <a href="https://en.wikipedia.org/wiki/Green_computing"><img src="./datas/logo_greencode.png" alt="greencode"></a>
      </div>
      <p>Portfolio réalisé avec HTML/CSS, Javascript et PHP/MySQL @ 2024 Pierre PICARD</p>
    </footer>
    <script src="script.js"></script>
  </body>
</html>




