<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>minichat</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <!-- Place favicon.ico in the root directory -->

    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/main.css">
    <script src="../js/vendor/modernizr-2.8.3.min.js"></script>
  </head>
  <body>
    <h1>mini  Chat</h1>
    <div id="listMessages">
      <?php
      try{
          $bdd = new PDO('mysql:host=localhost;dbname=exoSql;charset=utf8', 'root', 'root');
          array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
        }
      catch (Exception $e){
          die('Erreur : ' . $e->getMessage());
        }

      $reponse = $bdd->query('SELECT upper(pseudo) as g_pseudo, message,date_message FROM message_miniChat order by id Desc') or die(print_r($bdd->errorInfo()));
      while ($donnees = $reponse->fetch()){

        ?>
        <p class="message"><?php echo $donnees['g_pseudo']. ' écrit à '.$donnees['date_message'].' : '. $donnees['message']; ?></p>
        <?php
      }
        $reponse->closeCursor(); // Termine le traitement de la requête
?>
    </div>
    <form class="" action="miniChat_post.php" method="post">
      <label for="">pseudo</label>
      <input type="text" name="pseudo" value=""><br>
      <label for="">message</label>
      <input type="text" name="message" value=""><br>
      <input type="submit" value="envoyer">
    </form>
  </body>
</html>
