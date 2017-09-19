<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    try{
        $bdd = new PDO('mysql:host=localhost;dbname=exoSql;charset=utf8', 'root', 'root');
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
      }
    catch (Exception $e){
        die('Erreur : ' . $e->getMessage());
      }
      $pseudo =  htmlspecialchars($_POST['pseudo']);
      $message = htmlspecialchars($_POST['message']);
      $req = $bdd->prepare('INSERT INTO message_miniChat(pseudo, message, date_message) VALUES(:pseudo, :message, now())');
      $req->execute(array(
        'pseudo'=>$pseudo,
        'message'=>$message
      ));
      header('Location: miniChat.php');
      ?>
  </body>
</html>
