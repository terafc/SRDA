<?php
	//IL FAUT INTEGRER LA CONNEXION SQL.
	require_once("./application/global/config.inc.php");
	require_once("./application/global/connexion.inc.php");
	//On démarre la session
	session_start();
	//Permet de définir l'heure dub serveur avec les fuseaux horaire de la réunion
	date_default_timezone_set('Indian/Reunion');
	/***************************************************************************************************
	 * On protège l'application en redirigeant l'utilisateur vers le login si il n'est pas authentifié *
	 ***************************************************************************************************/
	$testAction = array('login','logout','show','remindMdp');//Liste des actions possible dans la page login.
	if(!isset($_SESSION['login'])//SI L'utilisateur n'est pas authentifié
		&& ((!isset($_REQUEST['page']) || $_REQUEST['page']!='login')// { ET ($page n'existe pas OU différent de 'login')
			|| (!isset($_REQUEST['action']) || !in_array($_REQUEST['action'], $testAction)))//OU ($action n'existe pas OU différent des actions possibles) } 
		){
		header("Location: ".HTTP_URL."/login");//Alors on le redirige vers la page de login
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>SRDA - Service de Rangement de Documents Automatisé</title>
		<base href="/SRDA/">
		<meta charset="UTF-8"/>
		<meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
		<META NAME="description" CONTENT="Plateforme de rendu pour les enseignants et étudiants.">
		<META NAME="keywords" CONTENT="SRDA  service de rangement de documents automatisé  IUT Saint Pierre Projet 2012 TP3 RT2 didier hoareau serge rivière francel marcoz florent baillif loïc toulcanon réseaux télécoms télécommunications enseignants étudiants plateforme">
		<META NAME="Robots" CONTENT="Index,follow">
		<META NAME="revisit-after" CONTENT="1 Day">
		<META http-equiv="Content-Language" content="FR">
		<META NAME="copyright" CONTENT="©">
		<META NAME="Rating" CONTENT="Global">
		<META NAME=="reply-to" content="serge-974@franceserv.com">
		<META NAME="author" CONTENT="Serge Rivière, Francel Marcoz, Loïc Toulcanon, Florent Baillif">
		<link rel="icon" type="image/png" href="<?php echo HTTP_IMG;?>/favicon.png" />
		<link rel="shortcut icon" href="favicon.ico">
		<link rel="stylesheet" type="text/css" href="<?php echo HTTP_CSS;?>/style.css"/>
		<link href="<?php echo HTTP_CSS;?>/jquery-ui-1.8.14.custom.css" rel="stylesheet" type="text/css" />
		<script src="<?php echo HTTP_JS;?>/jquery-1.6.2.min.js" type="text/javascript"></script>
		<script src="<?php echo HTTP_JS;?>/jquery-ui-1.8.14.custom.min.js" type="text/javascript"></script>
		<script src="<?php echo HTTP_JS;?>/jquery.autocomplete.min.js" type="text/javascript"></script>
		<script type="text/javascript" src="<?php echo HTTP_JS;?>/dropmenu.js"></script>
		<script type="text/javascript" src="<?php echo HTTP_JS;?>/function.js"></script>
		<script type="text/javascript" src="<?php echo HTTP_JS;?>/overlib.js"></script>
		<script>
		$(document).ready(function(){
			$("#nav-one").dropmenu();
		});
		</script>
	</head>
	<body>
		<div id="all">
			<?php if(isset($_SESSION['login'])){include_once(CHEMIN_VIEW.'/header.php');} ?>
			<div id="contenu">
				<?php
					//On inclut le contrôleur s'il existe, s'il est spécifié et si l'action est spécifié
					if (!empty($_REQUEST['page']) && is_file(CHEMIN_CONTROLLER.'/'.$_REQUEST['page'].'Controller.php') && !empty($_REQUEST['action'])){
						$action = $_REQUEST['action'];
						include_once(CHEMIN_CONTROLLER.'/'.$_REQUEST['page'].'Controller.php');
					}
					//Sinon si l'utilisateur est logé et qu'il y a aucune variable en paramètre
					elseif(isset($_SESSION['login']) && empty($_REQUEST['page']) && empty($_REQUEST['action'])){
						include_once(CHEMIN_CONTROLLER.'/accueilController.php');
					}
					//Sinon si l'utilisateur est logé on indique une erreur 404
					elseif(isset($_SESSION['login'])){
						header("Location: ".HTTP_URL."/accueil");
						include_once(CHEMIN_VIEW.'/404.php');
					}
					//Sinon on le redirige vers la page de login
					else{
						$action = "show";
						include_once(CHEMIN_CONTROLLER.'/loginController.php');
					}
				?>
			</div>
			<?php if(isset($_SESSION['login'])){include_once(CHEMIN_VIEW.'/footer.php');} ?>
		</div>
	</body>
</html>
