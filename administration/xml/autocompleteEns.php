<?php
	header ("content-type: text/xml");
	//IL FAUT INTEGRER LA CONNEXION SQL.
	require_once("../global/connexion.inc.php");
	//Connection à la BDD
	$bdd = connexionBase();

	//Requetes pour enseignant et etudiant
	$req = "select num_ens, nom_ens, prenom_ens ";
	$req .= "from enseignant ";
	$result = $bdd->prepare($req);//préparation
	$count = $result->execute();//exécution
	echo "<root>";
	if ($count != 0) {
		foreach ($result as $value) {
			echo "<element>".$value[1]." ".$value[2]." [".$value[0]."]</element>";
		}
	}
	//On ajoute les groupes d'étudiants et d'enseignant
	echo "<element>Enseignant [Enseignant]</element>";
	echo "</root>";
?>
