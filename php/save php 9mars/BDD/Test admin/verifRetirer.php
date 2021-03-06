<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
 <head>
  <link rel="stylesheet" type="text/css" href="styles.css"/>
  <meta charset="utf-8"/>
 </head>
 <body>
    <h2>Retirer cette chaussure ?</h2>
<?php

if(isset($_POST['id']) && !empty($_POST['id'])){
	include("PDOConnexion.php");
	    //connexion bdd
	    PDOConnexion::setParameters("bdd_21501308","21501308","");
	    $db = PDOConnexion::getInstance();

	    //Affiche la chaussure choisie pour retirer
	      $id_c = $_POST['id'];
	      $req1="SELECT * FROM chaussure WHERE id_c = :id_c";
	      $sth = $db->prepare($req1);
	      $sth->setFetchMode(PDO::FETCH_ASSOC);
	      $sth->execute(array(":id_c"=>$id_c));
	      $res1 = $sth->fetchAll();
	
	foreach($res1 as $chaus){
        echo "<p><img src=\"..".$chaus["img"]."\" style=\" width:100px;\"></p>";
        echo "<p> ID : ".$chaus["id_c"]."</p>";
        echo "<p>Marque : ".$chaus["marque"]."</p>";
        echo "<p>Nom : ".$chaus["nom_c"]."</p>";
        echo "<p>Genre : ".$chaus["genre"]."</p>";
        echo "<p>Poids : ".$chaus["poids"]."</p>";
        echo "<p>Foulée : ".$chaus["foulee"]."</p>";
        echo "<p>Surface : ".$chaus["surface"]."</p>";
        echo "<p>Prix : ".$chaus["prix"]." €</p>";
        echo "<p>Réduction : ".$chaus["reduction"]."</p>";
        echo "<p>Pointure 38 : ".$chaus["pointure_38"]."</p>";
        echo "<p>Pointure 39 : ".$chaus["pointure_39"]."</p>";
        echo "<p>Pointure 40 : ".$chaus["pointure_40"]."</p>";
        echo "<p>Pointure 41 : ".$chaus["pointure_41"]."</p>";
        echo "<p>Pointure 42 : ".$chaus["pointure_42"]."</p>";
        echo "<p>Pointure 43 : ".$chaus["pointure_43"]."</p>";
        echo "<p>Pointure 44 : ".$chaus["pointure_44"]."</p>";
        echo "<p>Pointure 45 : ".$chaus["pointure_45"]."</p>";
      }

      //valider le retrait de la chaussure
      echo "<form action=\"verifRetirer.php\" method=\"post\">
                <input type=\"hidden\" value=\"yes\" name =\"yes\">
                <input type=\"hidden\" value=\"".$chaus["id_c"]."\" name =\"idYes\">
                <input type=\"submit\" value=\"Oui\">
            </form>";

        //annuler le retrait de la chaussure
      echo  "<form action=\modifProduit.php\" method=\"post\">
            <input type=\"submit\" value=\"Non\">
        </form>";





    }

    //Si le retrait est confirmé
    if(isset($_POST["yes"])){

        $idChauss=$_POST["idYes"];

        include("PDOConnexion.php");
        PDOConnexion::setParameters("bdd_21501308","21501308","");
        $db = PDOConnexion::getInstance();


        //requete sql : supprime la chuassure correspondante de la bdd
        $req="DELETE FROM chaussure WHERE id_c = :idChauss";
        $sth = $db->prepare($req);
        $sth->execute(array(":idChauss"=>$idChauss));

        $_SESSION['produit']="Votre produit a bien été retiré.";
        header("location: gestion.php");
    }



?>




</body>
</html>