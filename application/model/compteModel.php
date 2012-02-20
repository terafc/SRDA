<?php
//le champ 'pass',contenant le nouveau mot de passe doit etre ajouté dans la variable session 'login'

//Renvoie true ou false
function editCompte($pass) {
	if (!empty($_SESSION['login'])) {
		switch ($_SESSION['login']['statut']){
			case 'etd' :
				$req = "update etudiant set pass=md5(:pass) where num_etd = :id";
				break;
			case 'ens' :
				$req = "update enseignant set pass=md5(:pass) where num_ens = :id";
				break;
			default :
				return false;
				break;
		}
		$bdd = connexionBase();
		try {
			$result = $bdd->prepare($req);//préparation
			$result->bindParam(':pass', $pass);
			$result->bindParam(':id', $_SESSION['login']['id']);
			$result->execute();//exécution
			return true;
		}
		catch(Exception $e) {
			return false;
		}
	}
	else{
		return false;
	}
}
?>