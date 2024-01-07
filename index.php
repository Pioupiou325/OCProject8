<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<?php
include "connect.php";
$req = $link->prepare("SELECT * FROM works");
$req->execute();
$res = $req->fetchAll(PDO::FETCH_ASSOC);
echo "<script>";
echo "const content = " . json_encode($res) . ";";
echo "</script>";
?>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Je suis développeur fullstack, je crée des pages ou des sites
    web.Je peux réaliser le frontend de votre site, comme le backend.Si vous cherchez un développeur 
    pour lier votre site web avec une base de données, je réalise le front et le back ainsi que 
    la gestion de votre base de données clients ou produits ainsi que le déploiement">
    <title>Pierre PICARD developpement</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;700&family=Montserrat:wght@500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styleindex.css" />
    <!-- rajouter les og et cie -->
  </head>
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
  <body>
  <div class="container">
    <div class="anim">
      <p>PIERRE PICARD</p>
    </div>
  </div>
    <div class="presentation">
    <h1>Développeur fullstack de sites Web rapides sécurisés</h1>
    <p>et Green Code friendly</p>  
    
    </div>

    <section id="projets" class="projets">
      <h2>Mes projets</h2>
            
      <div id="gallery" class="gallery">
      </div>  
    </section>

    <section id="contact" class="contact">
      <h2>Contact</h2>
      <div class="form_contact">
      <form action="contact.php" method="POST" >
      <fieldset>
        <legend>Formulaire de contact</legend>

        <label>Votre email</label>
        <input type="email" name="user_mail" placeholder="Entrez votre email" />

        <label>Objet de la demande</label>
        <input type="text" name="object" placeholder="objet de la demande" />

        <label>Votre demande</label>
        <textarea name="demande" placeholder="Ecrivez ici"></textarea>      

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
<p> greencode</p>
<p>linkedin</p>
<p>github</p>
<p>malt</p>
<p></p>
<p></p>

    </footer>
    <script src="script.js"></script>
  </body>
</html>




