<?php
	//Permet d'obtenir la liste des notifications pour un id donné.
	function getNotif($id){
		$bdd=connexionBase();//Connexion à la BDD
		$reqNotif = "SELECT * FROM notification WHERE id_destinataire=:id ORDER BY datePost DESC";
		$result = $bdd->prepare($reqNotif);//préparation
		$result->bindParam(':id', $id);
		$result->execute();//exécution
		$notification = array();
		$notification = $result->fetchAll();
		return $notification;
	}
?>