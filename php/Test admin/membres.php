<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<style>
		table {
			font-size: 75%;
		}
	</style>
</head>
<body>
<?php
session_start();
	include("PDOConnexion.php");
	//connexion bdd
	PDOConnexion::setParameters("bdd_21501308","21501308","");
    $db = PDOConnexion::getInstance();


	echo "<h1>Liste des membres inscrits</h1>";

	//requete sql : récupere tous les utilisateurs
	$req1="SELECT * FROM utilisateur";
    $sth = $db->prepare($req1);
    $sth->setFetchMode(PDO::FETCH_ASSOC);
    $sth->execute();
    $res1 = $sth->fetchAll();
    //affichage du tableau
    echo "<table border=\"1\"><tr>
    			<th>N° ID</th>
    			<th>Mail</th>
    			<th>Mot de passe</th>
    			<th>Nom</th>
    			<th>Prénom</th>
    			<th>Adresse</th>
    			<th>Téléphone</th>
    			<th>Civilité</th>
    			<th>Date de naissance</th>
    			<th>Admin</th>
    			<th>Commandes en cours</th>
    			<th>Historique des commandes</th>
    	</tr>";

		//pour chaque ligne utilisateur
		foreach($res1 as $user){
			echo "<tr>";
			echo "<td>".$user["id_u"]."</td>";
			echo "<td>".$user["mail"]."</td>";
			echo "<td>".$user["mdp"]."</td>";
			echo "<td>".$user["nom"]."</td>";
			echo "<td>".$user["prenom"]."</td>";
			echo "<td>".$user["numero"]." ".$user["adresse"]." ".$user["cp"]." ".$user["ville"]."</td>";
			echo "<td>".$user["tel"]."</td>";
			echo "<td>".$user["civilite"]."</td>";
			echo "<td>".$user["dateNaiss"]."</td>";
			if ($user["admin"]==0){
				echo "<td>Non admin</td>";
			}else{
				echo "<td>Admin</td>";
			}
			echo "<td><a href=\"#\">Voir les commandes</a></td>";
			echo "<td><a href=\"#\"> Voir l'historique</a></td>";
			echo "</tr>";
		}
	 
    	echo "</table>";

    echo "<p><a href='gestion.php'>Retour</a></p>";
	echo "<p><a href='deconnexion.php'>Deconnexion</a></p>";

?>
</body>
</html>