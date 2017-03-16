<?php
	$choix = $_POST['choix'];
	$_SESSION['choix']=$choix;
	if($choix=='ajouter') {
		//afficher la page ajout produit
		header("location:ajoutProduit.php");
	}
	else if($choix=='modifier') {
		//afficher la page modifier produit
		header("location:modifProduit.php");
	}
	else if($choix=='retirer') {
		//afficher la page retirer produit
		header("location:retirerProduit.php");
	}
	else {
		session_start();
	      $_SESSION['message_erreur']="Cette page n'existe pas.";
	      header("location: gestion.php");
	}
?>