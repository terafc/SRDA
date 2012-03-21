<?php
	switch($action){
		case 'resetApp':
			require_once(CHEMIN_MODEL.'/resetModel.php');
			$count = 0;//Nombres de lignes supprimés
			$count += resetApp(); //Permet de vider les tables : notification,sujet,upload,log_email et le dossier /file sur le serveur.
			//Redirection
			$message = "Suppression réussie ! ".$count." lignes affectées ! Redirection...";
			$url = HTTP_URL."/accueil/show";
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