<?php
	switch($action){
		case 'show':
			include_once(CHEMIN_VIEW.'/enseignant.php');
			break;
		case 'create':
			require_once(CHEMIN_MODEL.'/enseignantModel.php');
			//On récupère les données du formulaire
			$num_ens = $_REQUEST['num_ens'];
			$nom_ens = $_REQUEST['nom_ens'];
			$prenom_ens = $_REQUEST['prenom_ens'];
			$email_ens = $_REQUEST['email_ens'];
			$pass = $_REQUEST['pass'];
			if(createEns($num_ens,$nom_ens,$prenom_ens,$email_ens,$pass)){//Succès
				$message = "Nouvel enseignant ".$nom_ens." ".$prenom_ens." crée !";
			}
			else{//Erreur
				$message = "ID ou Email déjà utilisé ! Redirection...";
			}
			//Redirection
			$url = HTTP_URL."/enseignant/show";
			$time = 2000;
			$html = "<div style='display:inline-block;'>".$message."</div>";
			$html .= "<script>window.setTimeout(\"location=('".$url."');\",".$time.");</script>";
			include_once(CHEMIN_VIEW.'/messRedirection.php');
			break;
		case 'delete':
			require_once(CHEMIN_MODEL.'/aliasModel.php');
			require_once(CHEMIN_MODEL.'/log_emailModel.php');
			require_once(CHEMIN_MODEL.'/notificationModel.php');
			require_once(CHEMIN_MODEL.'/uploadModel.php');
			require_once(CHEMIN_MODEL.'/sujetModel.php');
			require_once(CHEMIN_MODEL.'/enseignantModel.php');
			//On récupère uniquement la liste des ID
			$tempId = explode(',',$_REQUEST['listeId']);
			$listeId=array();
			foreach ($tempId as $value) {
				$pos1 = strpos($value, "[")+1;
				if($pos1==1){continue;}//Pour éviter les champs vide dans l'array
				$pos2 = strpos($value, "]");
				$length=$pos2-$pos1;
				$listeId[] = substr($value,$pos1,$length);
			}
			$listeId=array_unique($listeId);//On supprime les doublons de destinataire
			$listeId=convertAlias($listeId);//On convertie les alias
			$count = 0; //Nombre total de lignes supprimées
			$count += deleteEns($listeId);//Suppression dans enseignant
			if($count != 0){
				$count += deleteUploadFromUploader($listeId);//Suppression dans upload
				$count += deleteSubjectFrom($listeId);//Suppression dans sujet
				$count += deleteNotifFrom($listeId);//Suppression dans notification	
				$count += deleteEmailFromDest($listeId);//Suppression dans log_email
			}
			//Redirection
			$url = HTTP_URL."/enseignant/show";
			$time = 2000;
			$message = "Suppression réussie ! ".$count." lignes affectées ! Redirection...";
			$html = "<div class='inlineBlock alignCenter'>".$message."</div>";
			$html .= "<script>window.setTimeout(\"location=('".$url."');\",".$time.");</script>";
			include_once(CHEMIN_VIEW.'/messRedirection.php');
			break;
		default://Par défaut 404 Not Found
			include_once(CHEMIN_VIEW.'/404.php');
			break;
	}
?>