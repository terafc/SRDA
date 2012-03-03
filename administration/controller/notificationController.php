<?php
	switch($action){
		case 'show':
			include_once(CHEMIN_VIEW.'/notification.php');
			break;
		//Suppression des notifications en fonction de la deadline
		case 'deleteNotif':
			require_once(CHEMIN_MODEL.'/notificationModel.php');
			$date = $_REQUEST['Y']."-".$_REQUEST['m']."-".$_REQUEST['d']." 00:00:00";//Données formulaire
			$count = 0;//Nombres de lignes supprimés
			$count += deleteNotif($date); //Suppression dans la table notification
			//Redirection
			$message = "Suppression réussie ! ".$count." lignes affectées ! Redirection...";
			$url = HTTP_INDEX."?page=notification&action=show";
			$time = 2000;
			$html = "<div class='alignCenter bold'>".$message."</div>";
			$html .= "<script>window.setTimeout(\"location=('".$url."');\",".$time.");</script>";
			include_once(CHEMIN_VIEW.'/messRedirection.php');
			break; 
		//Suppression d'une notification en fonction du destinataire
		case 'deleteNotifFrom':
			require_once(CHEMIN_MODEL.'/aliasModel.php');
			require_once(CHEMIN_MODEL.'/notificationModel.php');
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
			$count += deleteNotifFrom($listeId);//Suppression dans notification
			//Redirection
			$message = "Suppression réussie ! ".$count." lignes affectées ! Redirection...";
			$url = HTTP_INDEX."?page=notification&action=show";
			$time = 2000;
			$html = "<div class='alignCenter bold'>".$message."</div>";
			$html .= "<script>window.setTimeout(\"location=('".$url."');\",".$time.");</script>";
			include_once(CHEMIN_VIEW.'/messRedirection.php');
			break;
		default://Par défaut 404 Not Found
			include_once(CHEMIN_VIEW.'/404.php');
			break;
	}
?>