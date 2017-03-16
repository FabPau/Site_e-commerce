<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
<?php
	require_once("PDOConnexion.php");
			//connexion a la bdd
			PDOConnexion::setParameters("bdd_21501308","21501308","");
			$db = PDOConnexion::getInstance();

			//requete sql : 3 dernieres chaussures avec datePubli
			$sql="SELECT * FROM chaussure order by datePubli DESC limit 0,3";
			$sth = $db->prepare($sql);
			$sth->setFetchMode(PDO::FETCH_ASSOC);
			$sth->execute();
			$res=$sth->fetchAll();


			//pour chaque chaussure du tableau 
			foreach($res as $val){
				//afficher tous les attributs de la chaussures
				foreach($val as $key => $v){
					echo $key." : ".$v."</br>";
				}
				echo "</br>";
			}

?>
</body>
</html>