<?php
	header ("content-type: text/xml");
	//IL FAUT INTEGRER LA CONNEXION SQL.
	require_once("../global/connexion.inc.php");
	//Connection à la BDD
	$bdd = connexionBase();

	//Requetes pour automatiser les créations des alias
	$reqA = "select distinct promo,td,tp ";
	$reqA .= "from etudiant";
	$alias = $bdd->prepare($reqA);//préparation
	$countA = $alias->execute();//exécution
	
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
	//Ajout des alias
	if($countA != 0){
		foreach ($alias as $value) {
			echo "<element>".strtoupper($value[0])." [".strtoupper($value[0])."]</element>";
			if(!empty($value[1])){
				echo "<element>".strtoupper($value[0])."-".strtoupper($value[1])." [".strtoupper($value[0])."-".strtoupper($value[1])."]</element>";
			}
			if(!empty($value[2])){
				echo "<element>".strtoupper($value[0])."-".strtoupper($value[2])." [".strtoupper($value[0])."-".strtoupper($value[2])."]</element>";
			}
		}
	}
	//On ajoute les groupes d'enseignant
	echo "<element>Enseignant [Enseignant]</element>";
	echo "</root>";
?>
