<?php
function search($key) {
	$key = "%".$key."%";
	$bdd = connexionBase();//Connexion BDD
	//Les Requêtes
	$req_ens = "SELECT * FROM enseignant WHERE nom_ens LIKE :key OR	prenom_ens LIKE :key";
	$req_etd = "SELECT * FROM etudiant WHERE nom_etd LIKE :key OR prenom_etd LIKE :key OR promo LIKE :key OR num_etd LIKE :key";
	//Execution des requêtes ens
	$result1 = $bdd->prepare($req_ens);
	$result1->bindParam(':key', $key);
	$result1->execute();
	$result_ens = array();
	$i = 0;
	foreach ($result1 as $valeur) {
		$result_ens[$i]['nom'] = $valeur['nom_ens'];
		$result_ens[$i]['prenom'] = $valeur['prenom_ens'];
		$result_ens[$i]['email'] = $valeur['email_ens'];
		$i++;
	}
	//Execution des requêtes etd
	$result2 = $bdd->prepare($req_etd);
	$result2->bindParam(':key', $key);
	$result2->execute();
	$result_etd = array();
	$c=0;
	foreach ($result2 as $valeur) {
		$result_etd[$c]['nom'] = $valeur['nom_etd'];
		$result_etd[$c]['prenom'] = $valeur['prenom_etd'];
		$result_etd[$c]['email'] = $valeur['email_etd'];
		$c++;
	}
	//Mise en forme des résultats
	$resultat = array();
	$resultat["Enseignant"]=$result_ens;
	$resultat["Etudiant"]=$result_etd;
	return $resultat;

}
?>