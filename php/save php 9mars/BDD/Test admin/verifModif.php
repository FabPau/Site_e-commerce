<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
 <head>
  <link rel="stylesheet" type="text/css" href="styles.css"/>
  <meta charset="utf-8"/>
 </head>
 <body>
 <h2>Modifier cette chaussure ?</h2>
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
	



          echo"<form name=\"ajout\" method=\"POST\" action=\"verifModif.php\">
                <table>";



	foreach($res1 as $chaus){

        echo "<tr><td></td><td><img src=\"..".$chaus["img"]."\" style=\" width:120px;\"></td></tr>";
        echo "<tr><td>ID</td><td>".$chaus["id_c"]."</td></tr>";
        echo "<tr><td>Marque</td><td><select name=\"marque\">
                    <option value=\"Adidas\" ";
                    if($chaus["marque"]=="Adidas"){
                        echo"selected=\"selected\"";
                    }
        echo            ">Adidas</option>
                    <option value=\"Asics\"";
                    if($chaus["marque"]=="Asics"){
                        echo"selected=\"selected\"";
                    }
        echo            ">Asics</option>
                    <option value=\"Mizuno\"";
                    if($chaus["marque"]=="Mizuno"){
                        echo"selected=\"selected\"";
                    }
        echo            ">Mizuno</option>
                    <option value=\"Nike\"";
                    if($chaus["marque"]=="Nike"){
                        echo"selected=\"selected\"";
                    }
        echo            ">Nike</option>
                </select></td></tr>";


        echo "<tr><td>Nom</td><td><input type=\"text\" border='0' size=\"50\" name=\"nom_c\" value=\"".$chaus["nom_c"]."\"/></td></tr>";


        echo "<tr><td>Genre</td><td><select name=\"genre\">
                    <option value=\"F\" ";
                    if($chaus["genre"]=="F"){
                        echo"selected=\"selected\"";
                    }
        echo            ">Femme</option>
                    <option value=\"H\"";
                    if($chaus["genre"]=="H"){
                        echo"selected=\"selected\"";
                    }
        echo            ">Homme</option>
                </select></td></tr>";

        echo "<tr><td>Poids</td><td><input type=\"text\" border='0' size=\"50\" name=\"poids\" value=\"".$chaus["poids"]."\"/></td></tr>";


        echo "<tr><td>Foulée</td><td><select name=\"foulee\">
                    <option value=\"Universel\" ";
                    if($chaus["foulee"]=="Universel"){
                        echo"selected=\"selected\"";
                    }
        echo            ">Universel</option>
                    <option value=\"Pronateur\"";
                    if($chaus["foulee"]=="Pronateur"){
                        echo"selected=\"selected\"";
                    }
        echo            ">Pronateur</option>
                    <option value=\"Supinateur\"";
                    if($chaus["foulee"]=="Supinateur"){
                        echo"selected=\"selected\"";
                    }
        echo            ">Supinateur</option>
                </select></td></tr>";


        echo "<tr><td>Surface</td><td><select name=\"surface\">
                    <option value=\"Asphalte\" ";
                    if($chaus["surface"]=="Asphalte"){
                        echo"selected=\"selected\"";
                    }
        echo            ">Asphalte</option>
                    <option value=\"Chemin\"";
                    if($chaus["surface"]=="Chemin"){
                        echo"selected=\"selected\"";
                    }
        echo            ">Chemin</option>
                    <option value=\"Piste\"";
                    if($chaus["surface"]=="Piste"){
                        echo"selected=\"selected\"";
                    }
        echo            ">Piste</option>
                </select></td></tr>";

        echo "<tr><td>Prix</td><td><input type=\"text\" border='0' size=\"50\" name=\"prix\" value=\"".$chaus["prix"]."\"/></td></tr>";

        echo "<tr><td>Réduction</td><td><input type=\"text\" border='0' size=\"50\" name=\"reduction\" value=\"".$chaus["reduction"]."\"/></td></tr>";




        echo"<tr><td>Pointures</td><td>
            <table>
                <tr>
                  <td>38</td>
                  <td><input type=\"text\" border='0' size=\"10\" name=\"pointure_38\" value=\"".$chaus["pointure_38"]."\"/></td>
                </tr>
                <tr>
                  <td>39</td>
                  <td><input type=\"text\" border='0' size=\"10\" name=\"pointure_39\" value=\"".$chaus["pointure_39"]."\"/></td>
                </tr>
                <tr>
                  <td>40</td>
                  <td><input type=\"text\" border='0' size=\"10\" name=\"pointure_40\" value=\"".$chaus["pointure_40"]."\"/></td>
                </tr>
                <tr>
                  <td>41</td>
                  <td><input type=\"text\" border='0' size=\"10\" name=\"pointure_41\" value=\"".$chaus["pointure_41"]."\"/></td>
                </tr>
                <tr>
                  <td>42</td>
                  <td><input type=\"text\" border='0' size=\"10\" name=\"pointure_42\" value=\"".$chaus["pointure_42"]."\"/></td>
                </tr>
                <tr>
                  <td>43</td>
                  <td><input type=\"text\" border='0' size=\"10\" name=\"pointure_43\" value=\"".$chaus["pointure_43"]."\"/></td>
                </tr>
                 <tr>
                  <td>44</td>
                  <td><input type=\"text\" border='0' size=\"10\" name=\"pointure_44\" value=\"".$chaus["pointure_44"]."\"/></td>
                </tr>
                <tr>
                  <td>45</td>
                  <td><input type=\"text\" border='0' size=\"10\" name=\"pointure_45\" value=\"".$chaus["pointure_45"]."\"/></td>
                </tr>
            </table></td></tr>";        
      }


      echo "</table>
            <input type=\"hidden\" value=\"yes\" name =\"yes\">
            <input type=\"hidden\" value=\"".$chaus["id_c"]."\" name =\"idYes\">
            <input class=\"red\" type=\"submit\" value=\"Modifier\"/>
            <input class=\"red\" type=\"reset\" value=\"Effacer\"/>
            <a href='produits.php'><input class=\"red\" type=\"button\" value=\"Retour\"/></a>
      </form>";





    }

    if(isset($_POST["yes"])){

        $idChauss=$_POST["idYes"];
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
        $reduction=$_POST['reduction'];
        $genre=$_POST['genre'];


        include("PDOConnexion.php");
        PDOConnexion::setParameters("bdd_21501308","21501308","");
        $db = PDOConnexion::getInstance();


        //requete sql : modifie la chuassure correspondante de la bdd
        $req="UPDATE chaussure SET marque = :marque, nom_c = :nom_c, genre = :genre, poids = :poids, foulee = :foulee, surface = :surface, prix = :prix, reduction = :reduction, pointure_38 = :pointure_38, pointure_39 = :pointure_39, pointure_40 = :pointure_40, pointure_41 = :pointure_41, pointure_42 = :pointure_42, pointure_43 = :pointure_43, pointure_44 = :pointure_44, pointure_45 = :pointure_45 WHERE id_c = :idChauss";
        $sth = $db->prepare($req);
        $sth->execute(array(":marque"=>$marque, ":nom_c"=>$nom_c, ":genre"=>$genre, ":poids"=>$poids, ":foulee"=>$foulee,  ":surface"=>$surface, ":prix"=>$prix, ":reduction"=>$reduction, ":pointure_38"=>$pointure_38, ":pointure_39"=>$pointure_39, ":pointure_40"=>$pointure_40, ":pointure_41"=>$pointure_41, ":pointure_42"=>$pointure_42, ":pointure_43"=>$pointure_43, ":pointure_44"=>$pointure_44, ":pointure_45"=>$pointure_45, ":idChauss"=>$idChauss));

        $_SESSION['produit']="Votre produit a bien été modifié.";
        header("location: gestion.php");
    }



?>




</body>
</html>