<?php
session_start();
if (isset($_POST['mail']) && $_POST['mail']!="") {   
  include("PDOConnexion.php"); // connexion à la base de données

  try {
  	//recupere les données du formulaire
    $mail=$_POST['mail'];
    $mdp=$_POST['mdp'];

    //connexion a la bdd
    PDOConnexion::setParameters("bdd_21501308","21501308","");
    $db = PDOConnexion::getInstance();


    //requete sql : cherche l'utilisateur avec id et mdp rentrés
    $req="SELECT * FROM utilisateur WHERE mail = :mail AND mdp = :mdp";
    $sth = $db->prepare($req);
    $sth->execute(array(":mail"=>$mail, ":mdp"=>$mdp));
    $res = $sth->fetch();

    //si l'utilisateur n'existe pas, message erreur
    if(is_null($res["id_u"])){
    	session_start();
        $_SESSION['message_erreur']="Erreur de mdp ou id";
        header("location: authentification.php");
    }else{
    	//si l'utilisateur existe, vérifie s'il est admin et ouvre gestion.php
    	if($res["admin"]==1){
	      session_start();
	      $_SESSION['login']=$_POST['login'];
	      $_SESSION['mdp']=$_POST['mdp'];
	      header("location: gestion.php");
	    }
	    else { //sinon message d'erreur 
	      session_start();
	      $_SESSION['message_erreur']="Vous n'êtes pas admin !";
	      header("location: authentification.php");
	    }
    }

  } catch (PDOException $e) {
    echo "<p> Erreur : ".$e->getMessage()."</p>";
    die();
  }
}
else {
  header("location: authentification.php");
}
?>