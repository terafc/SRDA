<?php
	//Permet de vérifier si un étudiant existe
	function isExistEtd($num,$email){
		$bdd = connexionBase();
		$req = "SELECT num_etd FROM etudiant WHERE num_etd = :num OR email_etd = :email";
		$result = $bdd->prepare($req);
		$result->bindParam(':num', $num);
		$result->bindParam(':email', $email);
		$result->execute();
		$count=0;
		foreach($result as $value){
			$count++;
		}
		$count = $count != 0 ? true : false;
		return $count;
	}
	
	//Permet de vérifier si un enseignant existe
	function isExistEns($num,$email){
		$bdd = connexionBase();
		$req = "SELECT num_ens FROM enseignant WHERE num_ens = :num OR email_ens = :email";
		$result = $bdd->prepare($req);
		$result->bindParam(':num', $num);
		$result->bindParam(':email', $email);
		$result->execute();
		$count=0;
		foreach($result as $value){
			$count++;
		}
		$count = $count != 0 ? true : false;
		return $count;
	}
	//Permet d'ajouter un enseignant
	function createEns($num,$nom,$prenom,$email,$pass){
		$pass = md5($pass);
		if(isExistEns($num,$email) || isExistEtd($num,$email)){//Si l'id ou l'email existe d�j�
			return false;//Erreur
		}
		$bdd = connexionBase();
		$req = "INSERT INTO enseignant VALUES (:num,:nom,:prenom,:email,:pass)";
		$result = $bdd->prepare($req);
		$result->bindParam(':num', $num);
		$result->bindParam(':nom', $nom);
		$result->bindParam(':prenom', $prenom);
		$result->bindParam(':email', $email);
		$result->bindParam(':pass', $pass);
		$result->execute();
		$count = $result->rowCount();
		$count = $count != 0 ? true : false;
		return $count;
	}
	//Permet de supprimer un ou plusieurs enseignant
	function deleteEns($id){
		//On met en forme la liste d'id pour la passer � la requ�te
		$inQuery = implode(',', array_fill(0, count($id), '?'));
		//Requ�te
		$bdd = connexionBase();
		$req = "DELETE FROM enseignant WHERE num_ens IN (".$inQuery.")";
		$result = $bdd->prepare($req);
		foreach ($id as $k => &$idDest){
			$result->bindParam($k+1, $idDest);//$k+1 car l'index commence � 1 pour bindParam
		}
		$result->execute();
		$count = $result->rowCount();
		$count = $count != 0 ? true : false;
		return $count;
	}
?>