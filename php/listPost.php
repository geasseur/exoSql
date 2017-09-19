<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php try{
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
          <form class="" action="commentaire.php" method="post">
            <input type="number" name="id_billet" value="<?php echo $donnees['id'] ?>">
            <input type="submit" value="voir commentaires">
          </form>
        </article>
      <?php } ?>
    </div>
  </body>
</html>
