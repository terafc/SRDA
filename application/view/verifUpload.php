<?php
	$time = 2000;//Temps avant la redirection.
	if(isset($erreur)){
		echo "<script>window.setTimeout(\"location=('".HTTP_INDEX."?page=documents&action=documents');\",".$time.");</script>";
		$text = $erreur;
	}
	elseif(isset($message)){
		echo "<script>window.setTimeout(\"location=('".HTTP_INDEX."?page=accueil&action=show');\",".$time.");</script>";
		$text = $message;
	}
?>
<div><?php echo $text;?></div>