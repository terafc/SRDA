<?php
	include_once(CHEMIN_MODEL."/trombiModel.php");
	switch($action){
		case 'RT1':			
			$liste = getListe($action);
			include_once(CHEMIN_VIEW."/trombi.php");
			break;
		case 'RT2':
			$liste = getListe($action);
			include_once(CHEMIN_VIEW."/trombi.php");
			break;
		case 'LP':
			$liste = getListe($action);
			include_once(CHEMIN_VIEW."/trombi.php");
			break;
		case 'Enseignant':
			$liste = getListe($action);
			include_once(CHEMIN_VIEW."/trombi.php");
			break;
		default:
			include_once(CHEMIN_VIEW."/404.php");
			break;
	}
?>