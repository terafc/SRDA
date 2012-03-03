<?php	
	//Permet de supprimer les uploads antérieur à $date
	function deleteUpload($date){
		$bdd = connexionBase();
		//Tout d'abord on r�cup�re la liste des uploads afin de les supprimer du serveur (plus loin dans la fonction)
		$req = "SELECT path FROM upload WHERE datePost < :date";
		$result = $bdd->prepare($req);
		$result->bindParam(':date', $date);
		$result->execute();
		$toDelete = $result->fetchAll();
		//Suppression en BDD
		$req = "DELETE FROM sujet WHERE datePost < :date";
		$result = $bdd->prepare($req);
		$result->bindParam(':date', $date);
		$result->execute();
		$count = $result->rowCount();
		//Suppression du serveur
		foreach ($toDelete as $value){
			clearDirUpload(dirname($value['path']));
		}
		return $count;
	}
	//Permet de supprimer les uploads en fonction de l'id de l'uploader du fichier (si on supprime l'uploader)
	function deleteUploadFromUploader($id_uploader){
		//On met en forme la liste d'id pour la passer � la requ�te
		$inQuery = implode(',', array_fill(0, count($id_uploader), '?'));
		$bdd = connexionBase();
		//Tout d'abord on r�cup�re la liste des uploads afin de les supprimer du serveur (plus loin dans la fonction)
		$req = "SELECT path FROM upload WHERE idUploader IN (".$inQuery.")";
		$result = $bdd->prepare($req);
		foreach ($id_uploader as $k => &$idU){
			$result->bindParam($k+1, $idU);//$k+1 car l'index commence � 1 pour bindParam
		}
		$result->execute();
		$toDelete = $result->fetchAll();
		//Suppression en BDD
		$req = "DELETE FROM sujet WHERE idUploader IN (".$inQuery.")";
		$result = $bdd->prepare($req);
		foreach ($id_uploader as $k => &$idU){
			$result->bindParam($k+1, $idU);//$k+1 car l'index commence � 1 pour bindParam
		}
		$result->execute();
		$count = $result->rowCount();
		//Suppression du serveur
		foreach ($toDelete as $value){
			clearDirUpload(dirname($value['path']));
		}
		return $count;
	}
	//Permet de supprimer les uploads en fonction de l'id du sujet (si on supprime le sujet)
	function deleteUploadFromSubject($id_subject){
		//On met en forme la liste d'id pour la passer � la requ�te
		$inQuery = implode(',', array_fill(0, count($id_subject), '?'));
		$bdd = connexionBase();
		//Suppression en BDD
		$req = "DELETE FROM upload WHERE idSubject IN (".$inQuery.")";
		$result = $bdd->prepare($req);
		foreach ($id_subject as $k => &$idS){
			$result->bindParam($k+1, $idS);//$k+1 car l'index commence � 1 pour bindParam
		}
		$result->execute();
		$count = $result->rowCount();
		return $count;
	}
	
	//Permet de supprimer un dossier et son contenu du serveur
	function clearDirUpload($dossier) {
		$ouverture=@opendir($dossier);
		if (!$ouverture) return false;
		while($fichier=readdir($ouverture)) {
			if ($fichier == '.' || $fichier == '..' || $fichier == ".htaccess") continue;
				if (is_dir($dossier."/".$fichier)) {
					$r=clearDirUpload($dossier."/".$fichier);
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