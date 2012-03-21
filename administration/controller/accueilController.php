<?php
	switch($action){
		case 'show':
			include_once(CHEMIN_VIEW.'/accueil.php');
			break;
		default://Par défaut 404 Not Found
			include_once(CHEMIN_VIEW.'/404.php');
			break;
	}
?>