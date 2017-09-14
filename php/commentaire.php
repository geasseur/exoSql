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
    $id_billetEnvois = $_POST['id_billet'];
    echo $id_billetEnvois;
    $reponse = $bdd->prepare('SELECT id, titre, contenu, date_creation FROM billets where id = ?');
    $reponse->execute(array($id_billetEnvois));
    ?>
    <section>
      <?php $donnees = $reponse->fetch() ?>
        <article class="billet">
          <h2><?php echo $donnees['titre'].' '.$donnees['date_creation']; ?></h2>
          <p><?php echo $donnees['contenu']; ?></p>
        </article>
        <article class="listeCommentaires">
          <?php $reponse = $bdd-> prepare('SELECT auteur, date_commentaire, commentaire FROM commentaires where id_billet = ?');
          $reponse->execute(array($id_billetEnvois));
          while($donnees = $reponse->fetch()){ ?>
          <p><?php echo $donnees['commentaire'] ?></p>
          <small><?php echo 'ecrit par '.$donnees['auteur'].' à '.$donnees['date_commentaire'] ?></small>
          <?php } ?>
        </article>
    </section>
  </body>
</html>
