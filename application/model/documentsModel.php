<?php
	//Permet de mettre en forme la syntaxe en traitant les mots clés !
	function getSyntaxe($syntaxe,$login){
		$newSyntaxe = str_replace("@Nom", $login['nom'], $syntaxe);
		$newSyntaxe = str_replace("@Prenom", $login['prenom'], $newSyntaxe);
		$newSyntaxe = str_replace("@ID", $login['id'], $newSyntaxe);
		return $newSyntaxe;
	}
	
	//Permet d'obtenir la liste des sujets du professeur ou de l'élèves
	function getSujetCreator($login){
		$bdd=connexionBase();//Connexion BDD
		//On récupère l'ensemble des informations de ses sujets.
		$id = $login['id'];
		$req_suj = "SELECT * FROM sujet WHERE createur=:id";
		$result = $bdd->prepare($req_suj);//préparation
		$result->bindParam(':id', $id);
		$result->execute();//exécution
		$sujetCreator = array();
		$sujetCreator = $result->fetchAll();
		return $sujetCreator;
	}
	
	//Permet de récupérer les sujets dont l'enseignant  ou l'étudiant EST destinataire
	function getSujetDest($login){
		$bdd=connexionBase();//Connexion BDD
		//On définit la date actuel, pour ne récupérer que les sujets encore ne cours.
		$datePost = date("Y-m-d H:i:s");
		$id = $login['id'];
		$idLike = "%||".$id."||%";
		$req_suj = "SELECT * FROM sujet ";
		$req_suj .= "WHERE destinataire LIKE :id ";
		$req_suj .= "AND deadline > :datePost";
		$result = $bdd->prepare($req_suj);//préparation
		$result->bindParam(':id', $idLike);
		$result->bindParam(':datePost', $datePost);
		$result->execute();//exécution
		$sujetDest = array();
		$sujetDest = $result->fetchAll();

		//On récupère la liste des rendu ayant déjà été uploadé par le destinataire:
		$req_verifUp = "SELECT id,idSubject FROM upload ";
		$req_verifUp .= "WHERE idUploader = :id";
		$result2 = $bdd->prepare($req_verifUp);//préparation
		$result2->bindParam(':id', $id);
		$result2->execute();//exécution
		$upload = array();
		foreach ($result2 as $value) {
			$upload[$value[0]]=$value[1];//[ID_UPLOAD]=>ID_SUBJECT
		}

		//On met en forme la syntaxe du sujet et on vérifie si le rendu à déjà été uploadé
		foreach($sujetDest as $key=>$value){
			$sujetDest[$key]['syntaxe'] = getSyntaxe($value['syntaxe'], $login);
			$sujetDest[$key]['submit']= (in_array($value['id'], $upload)) ? true:false;//return true si déjà uploadé, sinon false.
		}
		
		return $sujetDest;
	}
	
	//Permet d'obtenir la liste des uploader pour un sujet donné et leur information
	function get_info_uploader($id_subject){
		$bdd=connexionBase();//Connexion BDD
		$req_upload = "SELECT idUploader,datePost FROM upload WHERE idSubject =:id";
		$result = $bdd->prepare($req_upload);//préparation
		$result->bindParam(':id', $id_subject);
		$result->execute();//exécution
		$info_uploader = array();
		foreach ($result as $value) {
			$info_uploader[$value[0]]=$value[1];
		}
		return $info_uploader;		
	}
	
	//Permet d'obtenir les infos de plusieurs tilisateurs en fct de leur id
	function get_info_user($id_user){
		$bdd=connexionBase();//Connexion BDD
		$req_user = "SELECT nom_etd,prenom_etd FROM etudiant WHERE num_etd = :id ";
		$req_user .= " UNION ALL SELECT nom_ens,prenom_ens FROM enseignant WHERE num_ens = :id ";
		$result = $bdd->prepare($req_user);//préparation
		$result->bindParam(':id', $id_user);
		$result->execute();//exécution
		$info_user = array();
		foreach ($result as $value) {
			$info_user['nom'] =$value[0];
			$info_user['prenom'] = $value[1];
		}
		return $info_user;
	}
	
	//Permet d'obtenir les informations sur un sujet
	function get_info_subject($id_subject){
		$bdd=connexionBase();//Connexion BDD
		$req_subj = "SELECT * FROM sujet WHERE id = :id";
		$result = $bdd->prepare($req_subj);//préparation
		$result->bindParam(':id', $id_subject);
		$result->execute();//exécution
		$info_subj = array();
		$info_subj = $result->fetchAll();
		return $info_subj[0];
	}
	
	//Permet de supprimer un sujet
	function deleteSubject($id_creator,$id_subject){
		/*
		 * Suppression en BDD
		 */
		$bdd=connexionBase();//Connexion BDD
		//de la table sujet
		$req1 = "DELETE FROM sujet WHERE id = :id ";
		$result1 = $bdd->prepare($req1);//préparation
		$result1->bindParam(':id', $id_subject);
		$result1->execute();//exécution
		//de la table upload
		$req2 = "DELETE FROM upload WHERE idSubject = :id ";
		$result2 = $bdd->prepare($req2);//préparation
		$result2->bindParam(':id', $id_subject);
		$result2->execute();//exécution
		/*
		 * Suppresion du sujet sur le serveur
		 */
		if(clearDir(CHEMIN_FILE."/".$id_creator."/".$id_subject)){
			//Réponse pour la vue
			$url = HTTP_INDEX."?page=accueil&action=show";
			$time = 2000;
			$message = "Suppression réussie ! Redirection...";
			$html = "<div style='display:inline-block;'>".$message."</div>";
			$html .= "<script>window.setTimeout(\"location=('".$url."');\",".$time.");</script>";
			return $html;
		}
		else{return false;}
	}
	
	//Permet de supprimer un dossier et son contenu du serveur
	function clearDir($dossier) {
		$ouverture=@opendir($dossier);
		if (!$ouverture) return false;
		while($fichier=readdir($ouverture)) {
			if ($fichier == '.' || $fichier == '..') continue;
				if (is_dir($dossier."/".$fichier)) {
					$r=clearDir($dossier."/".$fichier);
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