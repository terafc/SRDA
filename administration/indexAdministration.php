<?php
	/**************************************************
	 * Initialisation des constantes et de la session *
	 **************************************************/
	require_once("./global/config.inc.php");
	require_once("./global/connexion.inc.php");
	//On démarre la session
	session_start();
	//Permet de définir l'heure dub serveur avec les fuseaux horaire de la réunion
	date_default_timezone_set('Indian/Reunion');
	
	/****************************
	 * Affichage de la page web *
	 ****************************/
	//On inclut le header
	include_once(CHEMIN_VIEW.'/header.php');
	//On inclut le contrôleur s'il existe, s'il est spécifié et si l'action est spécifié
	if (!empty($_REQUEST['page']) && is_file(CHEMIN_CONTROLLER.'/'.$_REQUEST['page'].'Controller.php') && !empty($_REQUEST['action'])){
		$action = $_REQUEST['action'];
		include_once(CHEMIN_CONTROLLER.'/'.$_REQUEST['page'].'Controller.php');
	}
	//Sinon on le redirige vers la page de login
	else{
		$action = "show";
		include_once(CHEMIN_CONTROLLER.'/accueilController.php');
	}
	//On inclut le footer
	include_once(CHEMIN_VIEW.'/footer.php');
?>
