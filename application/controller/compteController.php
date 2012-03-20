<?php
	switch($action){
		case "show":
			include_once(CHEMIN_VIEW."/compte.php");
			break;
		case "edit":
			include_once(CHEMIN_MODEL."/compteModel.php");
			$pass1 = $_REQUEST['pass1'];
			$pass2 = $_REQUEST['pass2'];
			if ($pass1 == $pass2) {
				$result = editCompte($pass1);
				if($result){
					$result = "Votre mot de passe a bien été modifié !";
					/*
					 * Envoi d'email de notification
					 */
					include_once(CHEMIN_MODEL."/emailModel.php");
					$mail = getEmail($_SESSION['login']['id']);
					$sujet = "Notification : Modification du mot de passe.";
					$mess['text'] = "Votre mot de passe a bien été modifié.";
					$mess['html'] = "<html><body><p>Votre mot de passe a bien été modifié.</p></body></html>";
					//sendEmail($mail,$sujet,$mess,"");
					$datePost = date("Y-m-d H:i:s");
					logEmail($_SESSION['login']['id'],$sujet,$mess['text'],$datePost);
				}
				else{
					$result = "Une erreur s'est produite. Veuillez recommencer.";
				}
			} else {
				$result = "Les mots de passes ne correspondent pas.";
			}
			include_once(CHEMIN_VIEW."/compte.php");
			break;
		default:
			include_once(CHEMIN_VIEW."/404.php");
			break;
	}
?>