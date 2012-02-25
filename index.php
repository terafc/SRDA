<?php
	//IL FAUT INTEGRER LA CONNEXION SQL.
	require_once("./application/global/config.inc.php");
	require_once("./application/global/connexion.inc.php");
	//On démarre la session
	session_start();
	//Permet de définir l'heure dub serveur avec les fuseaux horaire de la réunion
	date_default_timezone_set('Indian/Reunion');
	
	/*
	 * On protège l'application en redirigeant l'utilisateur vers le login si il n'est pas authentifié
	 */
	$testAction = array('login','logout','show','remindMdp');//Liste des actions possible dans la page login.
	if(!isset($_SESSION['login'])//SI L'utilisateur n'est pas authentifié
		&& ((!isset($_REQUEST['page']) || $_REQUEST['page']!='login')// { ET ($page n'existe pas OU différent de 'login')
			|| (!isset($_REQUEST['action']) || !in_array($_REQUEST['action'], $testAction)))//OU ($action n'existe pas OU différent des actions possibles) } 
		){
		header("Location: ".HTTP_INDEX."?page=login&action=show");//Alors on le redirige vers la page de login
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>SRDA</title>
		<base href="/SRDA/">
		<meta charset="UTF-8"/>
		<meta http-equiv="Content-type" content="text/html;charset=UTF-8"/> 
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
					//Sinon si l'utilisateur est logé on indique une erreur 404
					elseif(isset($_SESSION['login'])){
						include_once(CHEMIN_VIEW.'/404NotFound.php');
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
