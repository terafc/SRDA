<?php

//Renvoie les informations utilisateurs si authentification validé sous forme de tableau , renvoie FALSE sinon
function login($login, $mdp) {
	$bdd = connexionBase();
	$log_on = array();

	//Requetes préparées pour enseignant et etudiant

	$req_ens = $bdd -> prepare("select * from enseignant where num_ens=:id");
	$req_etd = $bdd -> prepare("select * from etudiant where num_etd=:id");
	$req_ens -> bindParam(':id', $login);
	$req_etd -> bindParam(':id', $login);
	$req_ens -> execute();
	$req_etd -> execute();

	//Resultat des requetes
	
	$enseignant = $req_ens -> fetch();
	$etudiant = $req_etd -> fetch();
	
	//Vérification correspondance mot de passe
	if ($enseignant) {
		if ($enseignant['pass'] == md5($mdp)) {
			$log_on['statut'] = 'ens';
			$log_on['id'] = $enseignant['num_ens'];
			$log_on['nom'] = $enseignant['nom_ens'];
			$log_on['prenom'] = $enseignant['prenom_ens'];
			$log_on['email'] = $enseignant['email_ens'];
			return $log_on;
		}
		else {
			return FALSE;
		}
	}
	elseif ($etudiant) {
		if ($etudiant['pass'] == md5($mdp)) {
			$log_on['statut'] = 'etd';
			$log_on['id'] = $etudiant['num_etd'];
			$log_on['nom'] = $etudiant['nom_etd'];
			$log_on['prenom'] = $etudiant['prenom_etd'];
			$log_on['email'] = $etudiant['email_etd'];
			$log_on['promo'] = $etudiant['promo'];
			$log_on['td'] = $etudiant['td'];
			$log_on['tp'] = $etudiant['tp'];
			return $log_on;
		}
		else {
			return FALSE;
		}
	}
	else {
		return FALSE;
	}
}

//Permet de confirmer la réinitialisation d'un mot de passe
function resetPassword($idUser,$idReset){
	//On vérifie tout d'abord que l'email de confirmation est correct
	$idReset = "%".$idReset."%";
	$bdd = connexionBase();//Connection à la BDD
	$req = "SELECT COUNT(id) FROM log_email WHERE id_destinataire = :idUser AND message LIKE :idReset";
	$result = $bdd->prepare($req);//préparation
	$result->bindParam(':idUser', $idUser);
	$result->bindParam(':idReset', $idReset);
	$count = $result->execute();//exécution
	if($count == 0){return false;}//Si aucune ligne n'est retournée alors l'email de confirmation est faux.
	//On réinitialise le mot de passe
	$pass = md5("1234");
	//Requête ENS
	$req_ens = "UPDATE enseignant SET pass = :pass WHERE num_ens = :idUser";
	$result1 = $bdd->prepare($req_ens);//préparation
	$result1->bindParam(':pass', $pass);
	$result1->bindParam(':idUser', $idUser);
	$count1 = $result1->execute();//exécution
	//Requête ETD
	$req_etd = "UPDATE etudiant SET pass = :pass WHERE num_etd = :idUser";
	$result2 = $bdd->prepare($req_etd);//préparation
	$result2->bindParam(':pass', $pass);
	$result2->bindParam(':idUser', $idUser);
	$count2 = $result2->execute();//exécution
	//On vérifie si il y a au moins une ligne modifier
	if($count1 == 0 && $count2 == 0){return false;}
	return true;
}
?>
