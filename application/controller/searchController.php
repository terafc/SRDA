<?php
	switch($action){
		case "search":
			if(isset($_REQUEST['entry'])){
				$entry = $_REQUEST['entry'];
				include_once(CHEMIN_MODEL."/searchModel.php");
				$search = search($entry);
				include_once(CHEMIN_VIEW."/search.php");
			}
			else{
				include_once(CHEMIN_VIEW."/404.php");
			}
			break;
		default:
			include_once(CHEMIN_VIEW."/404.php");
			break;
	}
?>