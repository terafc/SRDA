<?php
	//Permet de supprimer les notifications ant�rieur � $date
	function deleteNotif($date){
		$bdd = connexionBase();
		$req = "DELETE FROM notification WHERE datePost < :date";
		$result = $bdd->prepare($req);
		$result->bindParam(':date', $date);
		$result->execute();
		$count = $result->rowCount();
		return $count;
	}
	
	//Permet de supprimer les notifications en fonction de l'id du destinataire (si on supprime le destinataire)
	function deleteNotifFrom($id_dest){
		//On met en forme la liste d'id pour la passer ? la requ?te
		$inQuery = implode(',', array_fill(0, count($id_dest), '?'));
		$bdd = connexionBase();
		$req = "DELETE FROM notification WHERE id_destinataire IN (".$inQuery.")";
		$result = $bdd->prepare($req);
		foreach ($id_dest as $k => &$idD){
			$result->bindParam($k+1, $idD);//$k+1 car l'index commence ? 1 pour bindParam
		}
		$result->execute();
		$count = $result->rowCount();
		return $count;
	}
?>