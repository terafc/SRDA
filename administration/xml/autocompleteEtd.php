<?php
	header ("content-type: text/xml");
	//IL FAUT INTEGRER LA CONNEXION SQL.
	require_once("../global/connexion.inc.php");
	//Connection à la BDD
	$bdd = connexionBase();
	$list = array();

	//Requetes pour enseignant et etudiant
	$req = "select num_etd, nom_etd, prenom_etd ";
	$req .= "from etudiant";
	$result = $bdd->prepare($req);//préparation
	$count = $result->execute();//exécution
	echo "<root>";
	if ($count != 0) {
		foreach ($result as $value) {
			echo "<element>".$value[1]." ".$value[2]." [".$value[0]."]</element>";
		}
	}
	//On ajoute les groupes d'étudiants et d'enseignant
	echo "<element>RT1 [RT1]</element>";
	echo "<element>RT1-TD1 [RT1-TD1]</element>";
	echo "<element>RT1-TD2 [RT1-TD2]</element>";
	echo "<element>RT1-TP1 [RT1-TP1]</element>";
	echo "<element>RT1-TP2 [RT1-TP2]</element>";
	echo "<element>RT1-TP3 [RT1-TP3]</element>";
	echo "<element>RT2 [RT2]</element>";
	echo "<element>RT2-TD1 [RT2-TD1]</element>";
	echo "<element>RT2-TD2 [RT2-TD2]</element>";
	echo "<element>RT2-TP1 [RT2-TP1]</element>";
	echo "<element>RT2-TP2 [RT2-TP2]</element>";
	echo "<element>RT2-TP3 [RT2-TP3]</element>";
	echo "<element>LP RT[LP RT]</element>";
	echo "<element>LP RT-TD1 [LP RT-TD1]</element>";
	echo "<element>LP RT-TD2 [LP RT-TD2]</element>";
	echo "<element>LP RT-TP1 [LP RT-TP1]</element>";
	echo "<element>LP RT-TP2 [LP RT-TP2]</element>";
	echo "<element>LP RT-TP3 [LP RT-TP3]</element>";
	echo "</root>";
?>
