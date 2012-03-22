<?php
	switch($action){
		//Pour vérifier le login
		case 'login':
			include_once(CHEMIN_MODEL."/loginModel.php");
			$login = login($_POST['id'],$_POST['mdp']);
			//Si le login est réussi
			if($login != false){
				foreach ($login as $key => $value) {
					$_SESSION['login'][$key]=$value;
				}
				$url = HTTP_URL."/accueil/show";
				header('Location: '.$url);
			}
			else{
				//Sinon on affiche une erreur
				$url = HTTP_URL."/login/show";
				$time = 2000;
				$html = "<div>Identifiants incorrects !</div>";
				$html .= "<script>window.setTimeout(\"location=('".$url."');\",".$time.");</script>";
			}
			//Ajout de la vue
			include_once(CHEMIN_VIEW."/login.php");
			break;
		//Pour se déconnecter
		case 'logout':
			session_destroy();
			$url = HTTP_URL."/login/show";
			$time = 2000;
			$message = "Déconnexion réussi ! Redirection...";
			$html =  "<div style='display:inline-block;'>".$message."</div>";
			$html .= "<script>window.setTimeout(\"location=('".$url."');\",".$time.");</script>";
			include_once(CHEMIN_VIEW."/login.php");
			break;
		//Sinon on affiche la vue seulement.
		case "show":
			include_once(CHEMIN_VIEW."/login.php");
			break;
		case "remindMdp":
			//Si il s'agit d'une confirmation de la réinitialisation d'un password
			if(isset($_REQUEST['idReset'])){
				include_once(CHEMIN_MODEL."/emailModel.php");
				include_once(CHEMIN_MODEL."/loginModel.php");
				if(resetPassword($_REQUEST['idUser'],$_REQUEST['idReset'])){
					$message2 = "Votre mot de passe a bien été réinitialisée.";
				}
				else{
					$message2 = "Erreur : Lien incorrect";
				}
				include_once(CHEMIN_VIEW."/login.php");
				
			}
			//Sinon il s'agit d'une demande de réinitialisation d'un password
			else{
				include_once(CHEMIN_MODEL."/emailModel.php");
				$mail = getEmail($_REQUEST['idUser']);
				if($mail == false){$message2 = "Identifiant incorrect.";}//l'id n'existe pas.
				$sujet = "Réinitialisation du mot de passe";
				$mess['text'] = "Une demande de réinitialisation du mot de passe a été effectuée. ";
				$mess['text'] .= "Si cette requête ne vient pas de vous, veuillez ne pas tenir compte de cette email. ";
				$mess['text'] .= "Sinon veuillez cliquer sur le lien suivant pour réinitialiser votre mot de passe à 1234 : --->";
				$mess['text'] .= HTTP_INDEX."?page=login&action=remindMdp&idUser=".$_REQUEST['idUser']."&idReset=".uniqid(null,TRUE)."<---";
				$mess['html'] = "<html><body><p>Une demande de réinitialisation du mot de passe a été effectuée. </p>";
				$mess['html'] .= "<p>Si cette requête ne vient pas de vous, veuillez ne pas tenir compte de cette email. </p>";
				$mess['html'] .= "<p>Sinon veuillez cliquer sur le lien suivant pour réinitialiser votre mot de passe à <strong>1234</strong>: </p><br/>--->";
				$mess['html'] .= "<a href='".HTTP_INDEX."?page=login&action=remindMdp&idUser=".$_REQUEST['idUser']."&idReset=".uniqid(null,TRUE)."'>Reset Password.</a><---</body></html>";
				/* Ligne a Décommenter lors du transfert sur le serveur 
				if(sendEmail($mail,$sujet,$mess,"")){*/
					$datePost = date("Y-m-d H:i:s");
					logEmail($_REQUEST['idUser'],$sujet,$mess['text'],$datePost);
					$message2 = "Un mail de confirmation vous a été envoyer !";
				/*}
				else{
					$message2 = "Erreur. Veuillez recommencer ultérieurement.";
				}*/
				include_once(CHEMIN_VIEW."/login.php");
			}
			break;
		default:
			include_once(CHEMIN_VIEW."/404.php");
			break;
	}
?>