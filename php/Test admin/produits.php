<?php
	session_start();
	if(!empty($_SESSION['message_erreur'])) {
    $message = $_SESSION['message_erreur'];
    echo "<h2>".$message."</h2>";
   }
   unset($_SESSION['message_erreur']);
	echo "<h1>Que voulez-vous g&eacute;rer avec les produits ?</h1>";
	echo "<form action='analyseProduit.php' method='POST'>
			<label>Choisissez :</label>
			<select name='choix'><option value='ajouter'>Ajouter un produit</option><option value='modifier'>Modifier un produit</option><option value='retirer'>Retirer un produit</option></select>
			<input type='submit' value='Valider'/>
		</form>";

	echo "<p><a href='gestion.php'>Retour</a></p>";
	echo "<p><a href='deconnexion.php'>Deconnexion</a></p>";
?>