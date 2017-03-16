<?php
	$choix = $_POST['choix'];
	$_SESSION['choix']=$choix;
	if($choix=='produits') {
		//afficher la page articles
		header("location:produits.php");
	}
	else if($choix=='membres') {
		//afficher la page membres
		header("location:membres.php");
	}
	else {
		session_start();
	      $_SESSION['message_erreur']="Cette page n'existe pas.";
	      header("location: gestion.php");
	}
?>