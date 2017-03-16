<?php

session_start();
if (isset($_POST['nom_c']) && $_POST['nom_c']!="" && ($_POST['poids']) && $_POST['poids']!="" && ($_POST['prix']) && $_POST['prix']!="" && ($_POST['nom_c']) && $_POST['nom_c']!=""){   
  include("PDOConnexion.php"); // connexion à la base de données

  try {
  	//recupere les données du formulaire
    $marque=$_POST['marque'];
    $nom_c=$_POST['nom_c'];
    $poids=$_POST['poids'];
    $pointure_38=$_POST['pointure_38'];
    $pointure_39=$_POST['pointure_39'];
    $pointure_40=$_POST['pointure_40'];
    $pointure_41=$_POST['pointure_41'];
    $pointure_42=$_POST['pointure_42'];
    $pointure_43=$_POST['pointure_43'];
    $pointure_44=$_POST['pointure_44'];
    $pointure_45=$_POST['pointure_45'];
    $foulee=$_POST['foulee'];
    $surface=$_POST['surface'];
    $prix=$_POST['prix'];
    date_default_timezone_set('Europe/Paris');
    $today = date("Y-m-d H:i:s");
    $reduction=$_POST['reduction'];
    $genre=$_POST['genre'];
    $image=$_POST['image'];


    //connexion a la bdd
    PDOConnexion::setParameters("bdd_21501308","21501308","");
    $db = PDOConnexion::getInstance();


    //requete sql : cherche l'utilisateur avec id et mdp rentrés
    $req="INSERT INTO `chaussure` (`id_c`, `marque`, `nom_c`, `poids`, `pointure_38`, `pointure_39`, `pointure_40`, `pointure_41`, `pointure_42`, `pointure_43`, `pointure_44`, `pointure_45`, `foulee`, `surface`, `prix`, `datePubli`, `reduction`, `genre`, `img`) VALUES (NULL, :marque, :nom_c, :poids, :pointure_38, :pointure_39, :pointure_40, :pointure_41, :pointure_42, :pointure_43, :pointure_44, :pointure_45, :foulee, :surface, :prix, :today, :reduction, :genre, :image);";
    $sth = $db->prepare($req);
    $sth->execute(array(":marque"=>$marque, ":nom_c"=>$nom_c, ":poids"=>$poids, ":pointure_38"=>$pointure_38, ":pointure_39"=>$pointure_39, ":pointure_40"=>$pointure_40, ":pointure_41"=>$pointure_41, ":pointure_42"=>$pointure_42, ":pointure_43"=>$pointure_43, ":pointure_44"=>$pointure_44, ":pointure_45"=>$pointure_45, ":foulee"=>$foulee, ":surface"=>$surface, ":prix"=>$prix, ":today"=>$today, ":reduction"=>$reduction, ":genre"=>$genre, ":image"=>$image));

    $_SESSION['produitAjoute']="Votre produit a bien été ajouté.";
    header("location: gestion.php");

    

  } catch (PDOException $e) {
    echo "<p> Erreur : ".$e->getMessage()."</p>";
    die();
  }
}
else {  
  $_SESSION['erreurProduit']="Il manque une donnée.";
  header("location: ajoutProduit.php");
}
?>