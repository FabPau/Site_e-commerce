<?php
	session_start();
   if(!empty($_SESSION['message_erreur'])) {
    $message = $_SESSION['message_erreur'];
    echo "<h2>".$message."</h2>";
   }
   if(!empty($_SESSION['produit'])) {
    $message = $_SESSION['produit'];
    echo "<h2>".$message."</h2>";
   }
   unset($_SESSION['produit']);

   
	echo "<h1>Que voulez-vous g&eacute;rer ?</h1>";
	echo "<form action='analyse.php' method='POST'>
			<label>Choisissez :</label>
			<select name='choix'><option value='produits'>Produits</option><option value='membres'>Membres</option></select>
			<input type='submit' value='Valider'/>
		</form>";
	echo "<p><a href='deconnexion.php'>Deconnexion</a></p>";
?>