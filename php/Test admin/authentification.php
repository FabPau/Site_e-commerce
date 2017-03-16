<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
 <head>
  <link rel="stylesheet" type="text/css" href="styles.css"/>
  <meta charset="utf-8"/>
 </head>
 <body>
  <?php
  //récupère le message d'erreur (non admin OU erreur mdp ou ID)
   session_start();
   if(!empty($_SESSION['message_erreur'])) {
    $message = $_SESSION['message_erreur'];
    echo "<h2>".$message."</h2>";
   }
   unset($_SESSION['message_erreur']);
  ?>

  <h1>Authentification</h1>
  <form name="login" method="POST" action="verifAuthen.php">
   <table>
    <tr>
     <td><span>Mail</span></td>
     <td><input type="text" border='0' size="50" name="mail" value=""/></td>
    </tr>
    <tr>
     <td><span>Mot de passe </span></td>
     <td><input type="password" border='0' size="30" name="mdp" value=""/></td>
    </tr>
   </table>
   <input class="red" type="submit" value="Connexion"/>
   <a href='deconnexion.php'><input class="red" type="button" value="Quitter"/></a>
  </form>
 </body>
</html>