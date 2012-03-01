<?php
	//Permet de supprimer les log d'email antérieur à $date
	function deleteEmail($date){
		$bdd = connexionBase();
		$req = "DELETE FROM log_email WHERE datePost < :date";
		$result = $bdd->prepare($req);
		$result->bindParam(':date', $date);
		$result->execute();
		$count = $result->rowCount();
		return $count;
	}
	//Permet de supprimer les log d'email de l'id_destinataire passer en param�tre
	function deleteEmailFromDest($id_dest){
		//On met en forme la liste d'id pour la passer ? la requ?te
		$inQuery = implode(',', array_fill(0, count($id_dest), '?'));
		$bdd = connexionBase();
		$req = "DELETE FROM log_email WHERE id_destinataire IN (".$inQuery.")";
		$result = $bdd->prepare($req);
		foreach ($id_dest as $k => &$idD){
			$result->bindParam($k+1, $idD);//$k+1 car l'index commence ? 1 pour bindParam
		}
		$result->execute();
		$count = $result->rowCount();
		return $count;
	}
	//Permet d'afficher les log email (all)
	function getAllLogEmail(){
		$bdd = connexionBase();
		$req = "SELECT * FROM log_email";
		$result = $bdd->prepare($req);
		$result->execute();
		$log = $result->fetchAll();
		return $log;
	}
	//Permet d'afficher les log email d'une personne en particulier
	function getLogEmailOf($id_dest){
		//On met en forme la liste d'id pour la passer ? la requ?te
		$inQuery = implode(',', array_fill(0, count($id_dest), '?'));
		$bdd = connexionBase();
		$req = "SELECT * FROM log_email WHERE id_destinataire IN (".$inQuery.")";
		$result = $bdd->prepare($req);
		foreach ($id_dest as $k => &$idD){
			$result->bindParam($k+1, $idD);//$k+1 car l'index commence à 1 pour bindParam
		}
		$result->execute();
		$log = $result->fetchAll();
		return $log;
	}
?>