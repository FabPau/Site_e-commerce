<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
 <head>
  <link rel="stylesheet" type="text/css" href="styles.css"/>
  <meta charset="utf-8"/>
 </head>
 <body>
  <?php
  //affiche le message d'erreur récupéré depuis verifProduit.php
   session_start();
   if(!empty($_SESSION['message_erreur'])) {
    $message = $_SESSION['message_erreur'];
    echo "<h2>".$message."</h2>";
   }
   unset($_SESSION['message_erreur']);
  ?>

  <h1>Retirer un produit</h1>

  <!-- Rechercher un produit via formulaire -->
  <p>Rechercher un produit par : <p>
  <form name="retirerP" method="post" action="retirerProduit.php">
    <table>
      <tr>
        <td><span>Marque : </span></td>
        <td><select name="marque"><option value="">Tout</option><option value="Adidas">Adidas</option><option value="Asics">Asics</option><option value="Mizuno">Mizuno</option><option value ="Nike">Nike</option></select></td>
        <td><span>ou Nom : </span></td>
        <td><input type="text" border='0' size="30" name="nom_c" value=""/></td>
        <td><input type="submit" value="Recherche"/></td>
        <td><input type="reset" value="Effacer"/></td>
      </tr>
    </table>
  </form>


  <?php
    include("PDOConnexion.php");
    //connexion bdd
    PDOConnexion::setParameters("bdd_21501308","21501308","");
      $db = PDOConnexion::getInstance();

    //Si une rechercher a été effectuée, récupère les chaussures correspndantes
    if(isset($_POST['marque']) && isset($_POST['nom_c'])){
      $marque = $_POST['marque'];
      $nom_c = $_POST['nom_c'];
      $req1="SELECT * FROM chaussure WHERE marque LIKE :marque AND nom_c LIKE :nom_c";
      $sth = $db->prepare($req1);
      $sth->setFetchMode(PDO::FETCH_ASSOC);
      $sth->execute(array(":marque"=>"%".$marque."%", ":nom_c"=>"%".$nom_c."%"));
      $res1 = $sth->fetchAll();
    }

    else {
      $req1="SELECT * FROM chaussure";
      $sth = $db->prepare($req1);
      $sth->setFetchMode(PDO::FETCH_ASSOC);
      $sth->execute();
      $res1 = $sth->fetchAll();
    }
      echo "<table border=\"1\"><tr>
            <th>Image</th>
            <th>N° ID</th>
            <th>Marque</th>
            <th>Nom</th>
            <th>Foulée</th>
            <th>Surface</th>
            <th>Prix</th>
        </tr>";

      //pour chaque ligne chaussure
      foreach($res1 as $chaus){
        echo "<tr>";
        echo "<td><img src=\"..".$chaus["img"]."\" style=\" width:100px;\"></td>";
        echo "<td>".$chaus["id_c"]."</td>";
        echo "<td>".$chaus["marque"]."</td>";
        echo "<td>".$chaus["nom_c"]."</td>";
        echo "<td>".$chaus["foulee"]."</td>";
        echo "<td>".$chaus["surface"]."</td>";
        echo "<td>".$chaus["prix"]." €</td>";
        echo "<td><form name=\"retirer\" method=\"post\" action=\"verifRetirer.php\">
                    <input type=\"hidden\" value=\"".$chaus["id_c"]."\" name =\"id\">
                    <input type=\"submit\" value=\"Retirer ce produit\"> 
                  </form>
                </td>";
        echo "</tr>";
      }
     
        echo "</table>";
  ?>
   <a href='produits.php'><input class="red" type="button" value="Retour"/></a>
 
 </body>
</html>