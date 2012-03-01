<?php
	//Permet de supprimer les sujets dont la deadline est antérieur à $date
	//Retourne un array contenant le nbre de lignes supprimés ainsi que les id des sujets supprimés
	function deleteSubject($date){
		$bdd = connexionBase();
		//Tout d'abord on récupère la liste des sujets afin de les supprimer du serveur (plus loin dans la fonction)
		$req = "SELECT id,createur FROM sujet WHERE deadline < :date";
		$result = $bdd->prepare($req);
		$result->bindParam(':date', $date);
		$result->execute();
		$toDelete = $result->fetchAll();
		//Suppression en BDD
		$req = "DELETE FROM sujet WHERE deadline < :date";
		$result = $bdd->prepare($req);
		$result->bindParam(':date', $date);
		$result->execute();
		$return['count'] = $result->rowCount();
		//Suppression du serveur
		foreach ($toDelete as $value){
			clearDirSubject(CHEMIN_FILE."/".$value['createur']."/".$value['id']);
			$return['id_subject'][] = $value['id'];
		}
		return $return;
	}
	
	//Permet de supprimer les sujets en fonction de l'id du cr�ateur (si on supprime le cr�ateur)
	function deleteSubjectFrom($id_creator){
		//On met en forme la liste d'id pour la passer � la requ�te
		$inQuery = implode(',', array_fill(0, count($id_creator), '?'));
		$bdd = connexionBase();
		//Tout d'abord on r�cup�re la liste des sujets afin de les supprimer du serveur (plus loin dans la fonction)
		$req = "SELECT id,createur FROM sujet WHERE createur IN (".$inQuery.")";
		$result = $bdd->prepare($req);
		foreach ($id_creator as $k => &$idC){
			$result->bindParam($k+1, $idC);//$k+1 car l'index commence � 1 pour bindParam
		}
		$result->execute();
		$toDelete = $result->fetchAll();
		//Suppression en BDD
		$req = "DELETE FROM sujet WHERE createur IN (".$inQuery.")";
		$result = $bdd->prepare($req);
		foreach ($id_creator as $k => &$idC){
			$result->bindParam($k+1, $idC);//$k+1 car l'index commence � 1 pour bindParam
		}
		$result->execute();
		$count = $result->rowCount();
		//Suppression du serveur
		foreach ($toDelete as $value){
			clearDirSubject(CHEMIN_FILE."/".$value['createur']."/".$value['id']);
		}
		return $count;
	}
	//Permet de supprimer un dossier et son contenu du serveur
	function clearDirSubject($dossier) {
		$ouverture=@opendir($dossier);
		if (!$ouverture) return false;
		while($fichier=readdir($ouverture)) {
			if ($fichier == '.' || $fichier == '..' || $fichier == ".htaccess") continue;
				if (is_dir($dossier."/".$fichier)) {
					$r=clearDirSubject($dossier."/".$fichier);
					if (!$r) return false;
				}
				else {
					$r=@unlink($dossier."/".$fichier);
					if (!$r) return false;
				}
		}
		closedir($ouverture);
		$r=@rmdir($dossier);
		if (!$r) return false;
		return true;
	}
?>