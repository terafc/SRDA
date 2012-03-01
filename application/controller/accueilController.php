<?php
	include_once(CHEMIN_MODEL."/accueilModel.php");
	//on récupère la liste des notifications
	$notification = getNotif($_SESSION['login']['id']);
	//Création du message d'accueil
	switch($_SESSION['login']['statut']){
		case "ens":
			$resum_message = "<strong>".$_SESSION['login']['nom'].' '.$_SESSION['login']['prenom']."</strong>";
			break;
		case "etd":
			$resum_message = "<strong>".$_SESSION['login']['nom'].' '.$_SESSION['login']['prenom']."</strong> </br>".$_SESSION['login']['promo'];
			break;
		default:
			$resum_message;
			break;
	}
	include_once(CHEMIN_VIEW."/accueil.php");
?>