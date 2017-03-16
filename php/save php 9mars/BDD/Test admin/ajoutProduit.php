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
   if(!empty($_SESSION['erreurProduit'])) {
    $message = $_SESSION['erreurProduit'];
    echo "<h2>".$message."</h2>";
   }
   unset($_SESSION['erreurProduit']);
  ?>

  <h1>Ajouter un nouveau produit</h1>
  <form name="login" method="POST" action="verifProduit.php">
   <table>
    <tr>
    <!-- liste déroulante pour les marques -->
     <td><span>Marque</span></td>
     <td><select name="marque"><option value="Adidas">Adidas</option><option value="Asics">Asics</option><option value="Mizuno">Mizuno</option><option value ="Nike">Nike</option></select></td>
    </tr>
    <tr>
     <td><span>Nom</span></td>
     <td><input type="text" border='0' size="50" name="nom_c" value=""/></td>
    </tr>
    <tr>
     <td><span>Poids</span></td>
     <td><input type="text" border='0' size="50" name="poids" value=""/></td>
    </tr>
    <tr>
     <td><span>Pointures</span></td>
     <td>
     <!-- tableau pour les pointures, avec 0 par défaut -->
          <table>
            <tr>
              <td>38</td>
              <td><input type="text" border='0' size="10" name="pointure_38" value="0"/></td>
            </tr>
            <tr>
              <td>39</td>
              <td><input type="text" border='0' size="10" name="pointure_39" value="0"/></td>
            </tr>
            <tr>
              <td>40</td>
              <td><input type="text" border='0' size="10" name="pointure_40" value="0"/></td>
            </tr>
            <tr>
              <td>41</td>
              <td><input type="text" border='0' size="10" name="pointure_41" value="0"/></td>
            </tr>
            <tr>
              <td>42</td>
              <td><input type="text" border='0' size="10" name="pointure_42" value="0"/></td>
            </tr>
            <tr>
              <td>43</td>
              <td><input type="text" border='0' size="10" name="pointure_43" value="0"/></td>
            </tr>
             <tr>
              <td>44</td>
              <td><input type="text" border='0' size="10" name="pointure_44" value="0"/></td>
            </tr>
            <tr>
              <td>45</td>
              <td><input type="text" border='0' size="10" name="pointure_45" value="0"/></td>
            </tr>
          </table>
        </td>
    </tr>
    <tr>
    <!-- liste déroulante pour les foulées -->
     <td><span>Foulée</span></td>
     <td><select name="foulee"><option value="Universel">Universel</option><option value="Pronateur">Pronateur</option><option value="Supinateur">Supinateur</option></select></td>
    </tr>
    <tr>
    <!-- liste déroulante pour les surface -->
     <td><span>Surface</span></td>
     <td><select name="surface"><option value="Asphalte">Asphalte</option><option value="Chemin">Chemin</option><option value="Piste">Piste</option></select></td>
    </tr>
    <tr>
     <td><span>Prix</span></td>
     <td><input type="text" border='0' size="50" name="prix" value=""/></td>
    </tr>
    <tr>
     <td><span>Réduction</span></td>
     <td><input type="text" border='0' size="50" name="reduction" value="0"/></td>
    </tr>
    <tr>
    <!-- liste déroulante pour le genre -->
     <td><span>Genre</span></td>
     <td><select name="genre"><option value="F">Femme</option><option value="H">Homme</option></select></td>
    </tr>
    <tr>
     <td><span>Image</span></td>
     <td><input type="text" border='0' size="50" name="image" value=""/></td>
    </tr>
   </table>
   <input class="red" type="submit" value="Ajouter"/>
   <input class="red" type="reset" value="Effacer"/>
   <a href='produits.php'><input class="red" type="button" value="Retour"/></a>
  </form>
 </body>
</html>