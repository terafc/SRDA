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
	//Permet d'ajouter un étudiant
	function createEtd($num,$nom,$prenom,$email,$promo,$pass,$td,$tp){
		$pass = md5($pass);
		if(isExistEtd($num,$email)){//Si l'id ou l'email existe déjà
			return false;//Erreur
		}
		$bdd = connexionBase();
		$req = "INSERT INTO etudiant VALUES (:num,:nom,:prenom,:email,:promo,:pass,:td,:tp)";
		$result = $bdd->prepare($req);
		$result->bindParam(':num', $num);
		$result->bindParam(':nom', $nom);
		$result->bindParam(':prenom', $prenom);
		$result->bindParam(':email', $email);
		$result->bindParam(':promo', $promo);
		$result->bindParam(':pass', $pass);
		$result->bindParam(':td', $td);
		$result->bindParam(':tp', $tp);
		$result->execute();
		$count = $result->rowCount();
		$count = $count != 0 ? true : false;
		return $count;
	}
	//Permet de supprimer un ou plusieurs étudiant
	function deleteEtd($id){
		//On met en forme la liste d'id pour la passer � la requ�te
		$inQuery = implode(',', array_fill(0, count($id), '?'));
		$bdd = connexionBase();
		$req = "DELETE FROM etudiant WHERE num_etd IN (".$inQuery.")";
		$result = $bdd->prepare($req);
		foreach ($id as $k => &$idEtd){
			$result->bindParam($k+1, $idEtd);//$k+1 car l'index commence � 1 pour bindParam
		}
		$result->execute();
		$count = $result->rowCount();
		$count = $count != 0 ? true : false;
		return $count;
	}
?>