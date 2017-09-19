<?php
    try{
        $bdd = new PDO('mysql:host=localhost;dbname=exoSql;charset=utf8', 'root', 'root');
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
      }
    catch (Exception $e){
        die('Erreur : ' . $e->getMessage());
      }
      $auteur =  htmlspecialchars($_POST['auteur']);
      $commentaire = htmlspecialchars($_POST['commentaire']);
      $req = $bdd->prepare('INSERT INTO commentaires(id_billet,auteur, commentaire, date_commentaire) VALUES (:id_billet ,:auteur, :commentaire, now())');
      $req->execute(array(
        'id_billet'=>$_POST['id_comm'],
        'auteur'=>$auteur,
        'commentaire'=>$commentaire
      ));
       header('Location: listPost.php');
      ?>
