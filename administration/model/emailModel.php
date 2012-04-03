<?php
	//Permet d'envoyer un email de notification
	function sendEmail($mail,$sujet,$mess,$fichier){
		if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)){ // On filtre les serveurs qui présentent des bogues.
			$passage_ligne = "\r\n";
		}
		else{
			$passage_ligne = "\n";
		}
		//=====Déclaration des messages au format texte et au format HTML.
		$message_txt = $mess['text'];
		$message_html = $mess['html'];
		//==========
		 
		//=====Lecture et mise en forme de la pièce jointe si existe
		if(!empty($fichier)){
			$fichierPath   = fopen($fichier['tmp_name'], "r");
			$attachement = fread($fichierPath, filesize($fichier['tmp_name']));
			$attachement = chunk_split(base64_encode($attachement));
			fclose($fichierPath);
		}
		//==========
		 
		//=====Création de la boundary.
		$boundary = "-----=".md5(rand());
		$boundary_alt = "-----=".md5(rand());
		//==========
		 
		//=====Création du header de l'e-mail.
		$header = "From: \"SRDA\"<serge-974@franceserv.com>".$passage_ligne;
		$header.= "Reply-to: \"SRDA\" <no-reply@franceserv.com>".$passage_ligne;
		$header.= "MIME-Version: 1.0".$passage_ligne;
		$header.= "Content-Type: multipart/mixed;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
		//==========
		 
		//=====Création du message.
		$message = $passage_ligne."--".$boundary.$passage_ligne;
		$message.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary_alt\"".$passage_ligne;
		$message.= $passage_ligne."--".$boundary_alt.$passage_ligne;
		//=====Ajout du message au format texte.
		$message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
		$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
		$message.= $passage_ligne.$message_txt.$passage_ligne;
		//==========
		 
		$message.= $passage_ligne."--".$boundary_alt.$passage_ligne;
		 
		//=====Ajout du message au format HTML.
		$message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
		$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
		$message.= $passage_ligne.$message_html.$passage_ligne;
		//==========
		 
		//=====On ferme la boundary alternative.
		$message.= $passage_ligne."--".$boundary_alt."--".$passage_ligne;
		//==========
		 
		 
		 
		$message.= $passage_ligne."--".$boundary.$passage_ligne;
		 
		//=====Ajout de la pièce jointe si existe
		if(!empty($fichier)){
			$message.= "Content-Type: ".$fichier['type']."; name=\"".$fichier['type']."\"".$passage_ligne;
			$message.= "Content-Transfer-Encoding: base64".$passage_ligne;
			$message.= "Content-Disposition: attachment; filename=\"".$fichier['name']."\"".$passage_ligne;
			$message.= $passage_ligne.$attachement.$passage_ligne.$passage_ligne;
			$message.= $passage_ligne."--".$boundary."--".$passage_ligne; 
		}
		//========== 
		//=====Envoi de l'e-mail.
		if(mail($mail,$sujet,$message,$header)){return true;}
		else{return false;}
		//==========
	}

	//Permet d'avoir un log des emails envoyés
	function logEmail($id_dest,$sujet,$message,$datePost){
		$bdd = connexionBase();//Connection à la BDD
		$idNotif = uniqid(null,TRUE);//Création d'un id pour l'email
		$datePost = date("Y-m-d H:i:s");
		$reqNotif = "INSERT INTO log_email VALUES (:idNotif,:id_dest,:sujet,:message,:datePost)";
		$result = $bdd->prepare($reqNotif);//préparation
		$result->bindParam(':idNotif', $idNotif);
		$result->bindParam(':id_dest', $id_dest);
		$result->bindParam(':sujet', $sujet);
		$result->bindParam(':message', $message);
		$result->bindParam(':datePost', $datePost);
		$count = $result->execute();//exécution
	    //$count contient le nombre de ligne inséré dans la BDD.
		if($count!=1){
			return 0;//Erreur
		}
		else{
			return 1;//Succès
		}
	}
	//Permet d'obtenir une adresse email 
	function getEmail($id){
		$bdd=connexionBase();//Connexion BDD
		$email=false;
		$req_user = "SELECT email_etd FROM etudiant WHERE num_etd = :id ";
		$req_user .= " UNION ALL SELECT email_ens FROM enseignant WHERE num_ens = :id ";
		$result = $bdd->prepare($req_user);//préparation
		$result->bindParam(':id', $id);
		$count = $result->execute();//exécution
		if($count==0){return false;}
		foreach ($result as $value) {
			$email = $value[0];
		}
		return $email;
	}
?>