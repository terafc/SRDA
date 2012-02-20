<?php
//Retourne UN tableau numerotée contenant des tableaux associatif avec comme champ, le nom, prenom et le mail
//Retourn false sinon
function getListe($promo) {
	$bdd=connexionBase();	
	$promo = strtoupper($promo);
	$listePromo = array('RT1','RT2','LP RT');
	$result = array();
	$i = 0;
	//Si il s'agit des enseignants
	if($promo=="ENSEIGNANT"){
		$requete = "select nom_ens, prenom_ens,email_ens from enseignant ";//Requete
		$res = $bdd->prepare($requete);//préparation
		$res->execute();//exécution
		foreach ($res as $valeur) {
			$result[$i]['nom'] = $valeur['nom_ens'];
			$result[$i]['prenom'] = $valeur['prenom_ens'];
			$result[$i]['email'] = $valeur['email_ens'];
			$i++;
		}
	}
	//Si il s'agit des étudiants
	elseif(in_array($promo, $listePromo)){
		$bdd = connexionBase();//Connexion BDD
		$requete = "select nom_etd, prenom_etd,email_etd from etudiant where promo=:promo";//Requete
		$res = $bdd->prepare($requete);//préparation
		$res->bindParam(':promo', $promo);
		$res->execute();//exécution
		foreach ($res as $valeur) {
			$result[$i]['nom'] = $valeur['nom_etd'];
			$result[$i]['prenom'] = $valeur['prenom_etd'];
			$result[$i]['email'] = $valeur['email_etd'];
			$i++;
		}
	}
	return $result;//On retourne le jeu de résultat.
}
?>
