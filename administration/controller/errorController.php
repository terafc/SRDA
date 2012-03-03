<?php
	switch($action){
		case '403'://Forbidden
			include_once(CHEMIN_VIEW."/403.php");
			break;
		case '404'://Not Found
			include_once(CHEMIN_VIEW."/404.php");
			break;
		case "500"://Internal Server Error
			include_once(CHEMIN_VIEW."/500.php");
			break;
		default://Par défaut 404
			include_once(CHEMIN_VIEW."/404.php");
			break;
	}
?>