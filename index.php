<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>index</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
      <?php try{
          $bdd = new PDO('mysql:host=localhost;dbname=ExoSql;charset=utf8', 'root', 'root');
          array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
        }
      catch (Exception $e){
          die('Erreur : ' . $e->getMessage());
        }
        $reponse = $bdd->query('SELECT j.nom as nom_jeu, p.prenom as prenom_proprietaire
        FROM proprietaire as p
        INNER JOIN jeux_video as j
        ON j.id_proprietaire = p.id
        where j.console = \'pc\'
        order by possesseur')
        ?>
        <div class="">
          <?php while($donnees = $reponse->fetch()){ ?>
            <article class="">
              <p><?php echo 'nom du jeu: '.$donnees['nom_jeu'] .' et son possesseur: '.$donnees['prenom_proprietaire']; ?></p>
            </article>
          <?php } ?>
        </div>
        <a href="php/commentaire.php">vers commentaire</a>
        <a href="php/miniChat.php">vers miniChat</a>
      <!--
      <?php/* try{
          $bdd = new PDO('mysql:host=localhost;dbname=exoSql;charset=utf8', 'root', 'root');
          array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
        }
      catch (Exception $e){
          die('Erreur : ' . $e->getMessage());
        }
      $reponse = $bdd->query('SELECT id, titre, contenu, date_creation FROM billets')?>
      <div id="blog">
        <?php while($donnees = $reponse->fetch()){ ?>
          <article class="billet">
            <h2><?php echo $donnees['titre'].' '.$donnees['date_creation']; ?></h2>
            <p><?php echo $donnees['contenu']; ?></p>
            <form class="" action="php/commentaire.php" method="post">
              <input type="number" name="id_billet" value="<?php echo $donnees['id'] ?>">
              <input type="submit" value="voir commentaires">
            </form>
          </article>
        <?php } */?>
      </div>-->




        <!--<form class="" action="index.php" method="post">
          <label for="nom">nom</label>
          <input type="text" name="nom" value=""><br>
          <label for="possesseur">possesseur</label>
          <input type="text" name="possesseur" value=""><br>
          <label for="console">console</label>
          <input type="text" name="console" value=""><br>
          <label for="prix">prix</label>
          <input type="number" name="prix" value=""><br>
          <label for="nb_joueur">nombre joueurs</label>
          <input type="number" name="nb_joueur" value=""><br>
          <label for="commentaires">commentaires</label>
          <input type="text" name="commentaires" value=""><br>
          <input type="submit" value="valider">
        </form>
      <?php
      /*

        $reponse = $bdd->query('SELECT avg(prix) as moyenne_prix, console FROM jeux_video WHERE possesseur=\'florent\' group by console') or die(print_r($bdd->errorInfo()));
        while($donnees = $reponse->fetch()){

        ?>

        <p><?php echo $donnees['moyenne_prix'] .' : '. $donnees['console']; ?></p>

<?php

}

$reponse->closeCursor(); // Termine le traitement de la requête


?>
<?php
        $nom = $_POST['nom'];
        $possesseur = $_POST['possesseur'];
        $console = $_POST['console'];
        $prix = $_POST['prix'];
        $nbre_joueurs_max = $_POST['nb_joueur'];
        $commentaires = $_POST['commentaires'];
        $req = $bdd->prepare('INSERT INTO jeux_video(nom, possesseur, console, prix, nbre_joueurs_max, commentaires) VALUES(:nom, :possesseur, :console, :prix, :nbre_joueurs_max, :commentaires)');
        $req->execute(array(
        'nom' => $nom,
        'possesseur' => $possesseur,
        'console' => $console,
        'prix' => $prix,
        'nbre_joueurs_max' => $nbre_joueurs_max,
        'commentaires' => $commentaires
        ));

        echo 'Le jeu '.$nom. ' a bien été ajouté !';
        $req->closeCursor();*/
?>
-->
        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.12.0.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
    </body>
</html>
