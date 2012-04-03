<?php
	$time = 2000;//Temps avant la redirection.
	if(isset($erreur)){
		echo "<script>window.setTimeout(\"location=('".HTTP_URL."/documents/documents');\",".$time.");</script>";
		$text = $erreur;
	}
	elseif(isset($message)){
		echo "<script>window.setTimeout(\"location=('".HTTP_URL."/accueil/show');\",".$time.");</script>";
		$text = $message;
	}
?>
<div><?php echo $text;?></div>