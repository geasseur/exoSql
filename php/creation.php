<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>creation</title>
  </head>
  <body>
    <?php try{
      $bdd = new PDO('mysql:host=localhost;dbname=ExoSql;charset=utf8', 'root', 'root');
      array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch (Exception $e)
    {
    die('Erreur : ' . $e->getMessage());
    }
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

    echo 'Le jeu a bien été ajouté !';
    $req->closeCursor();

    ?>
  </body>
</html>
