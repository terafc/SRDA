<?php
	switch($action){
		//Afficher la page simple
		case 'show':
			include_once(CHEMIN_VIEW.'/email.php');
			break;
		//Envoyer un email
		case 'sendEmail':
			require_once(CHEMIN_MODEL.'/emailModel.php');
			require_once(CHEMIN_MODEL.'/aliasModel.php');
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
			$pj = isset($_FILE['fichier']) ? $_FILE['fichier'] : "";//Piece Jointe
			$datePost = date("Y-m-d H:i:s");//Date d'envoi des mails
			$a = array();
			$i=0;
			foreach ($listeId as $key => $value) {
				//$a[] = sendEmail(getEmail($value), $_REQUEST['sujet'], $_REQUEST['mess'], $pj);//Envoi de mail
				logEmail($value,$_REQUEST['sujet'],$_REQUEST['mess'],$datePost);//ajout des logs email
			}
			//Redirection
			$url = HTTP_URL."/email/show";
			$time = 2000;
			$message = in_array(false,$a) ? "Une erreur s'est produite lors de l'envoi d'email... Redirection..." : count($a)." Email(s) envoyé(s). Redirection...";
			$html = "<div class='inlineBlock alignCenter'>".$message."</div>";
			$html .= "<script>window.setTimeout(\"location=('".$url."');\",".$time.");</script>";
			include_once(CHEMIN_VIEW.'/messRedirection.php');
			break;
		//Supprimer des emails antérieur à une $date
		case 'deleteEmail':
			require_once(CHEMIN_MODEL.'/log_emailModel.php');
			$date = $_REQUEST['Y']."-".$_REQUEST['m']."-".$_REQUEST['d']." 00:00:00";//Données formulaire
			$count = deleteEmail($date);
			//Redirection
			$url = HTTP_URL."/email/show";
			$time = 2000;
			$message = "Suppression réussie ! ".$count." lignes affectées ! Redirection...";
			$html = "<div class='inlineBlock alignCenter'>".$message."</div>";
			$html .= "<script>window.setTimeout(\"location=('".$url."');\",".$time.");</script>";
			include_once(CHEMIN_VIEW.'/messRedirection.php');
			break;
		//Afficher tout les logs email
		case 'getAllLogEmail':
			require_once(CHEMIN_MODEL.'/log_emailModel.php');
			$log = getAllLogEmail();
			include_once(CHEMIN_VIEW.'/showLog.php');
			break;
		//Obtenir les logs email d'une personne en particulier
		case 'getLogEmailOf':
			require_once(CHEMIN_MODEL.'/log_emailModel.php');
			require_once(CHEMIN_MODEL.'/aliasModel.php');
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
			$listeId=array_values($listeId);//On réinitialise les clés de l'array à partir de 0
			$log = getLogEmailOf($listeId);
			include_once(CHEMIN_VIEW.'/showLog.php');
			break;
		default://Par défaut 404 Not Found
			include_once(CHEMIN_VIEW.'/404.php');
			break;
	}
?>