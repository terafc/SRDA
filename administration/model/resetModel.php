<?php
	//Permet de r�initialiser l'application par d�faut (Sans aucun sujet, upload, notification, mail...)
	function resetApp(){
		$bdd = connexionBase();
		$countBDD = 0;//Nombre total de lignes supprim�s en BDD
		/*******************************************************************
		 * R�initialisation des tables sujet,upload,notification,log_email *
		 *******************************************************************/
		$req = "DELETE FROM sujet";//Table sujet
		$result = $bdd->prepare($req);
		$result->execute();
		$count = $result->rowCount();
		$countBDD += $count;
		$req = "DELETE FROM upload";//Table upload
		$result = $bdd->prepare($req);
		$result->execute();
		$count = $result->rowCount();
		$countBDD += $count;
		$req = "DELETE FROM notification";//Table notification
		$result = $bdd->prepare($req);
		$result->execute();
		$count = $result->rowCount();
		$countBDD += $count;
		$req = "DELETE FROM log_email";//Table log_email
		$result = $bdd->prepare($req);
		$result->execute();
		$count = $result->rowCount();
		$countBDD += $count;
		/*******************************************
		 * Suppressions du contenu du dossier file *
		 *******************************************/
		 if(!clearDirReset(CHEMIN_FILE.'/')){
			return false;//Erreur
		}
		return $countBDD;//Retourne le nombre de lignes supprim�es
	}
	//Permet de supprimer un dossier et son contenu du serveur
	function clearDirReset($dossier) {
		$ouverture=@opendir($dossier);
		if (!$ouverture) return false;
		while($fichier=readdir($ouverture)) {
			if ($fichier == '.' || $fichier == '..' || $fichier == ".htaccess") continue;
				if (is_dir($dossier."/".$fichier)) {
					$r=clearDirReset($dossier."/".$fichier);
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