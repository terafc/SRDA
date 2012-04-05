<?php	
	//Permet de creer un dossier avec les droits
	function create_dir($path){
		if (!mkdir($path, 0777, true)) {
			echo '6';
			exit;
			return 0;//Erreur
		}else{
			return 1;//Succès
		}
	}
	
	//Permet de transformer tout les alias en une liste de destinataire
	function convertAlias($listeId){
		$copyListeId=array();
		$copyListeId=$listeId;
		//Array des alias
		$arrayAlias = array('Enseignant',
							'RT1',
							'RT1-TD1',
							'RT1-TD2',
							'RT1-TP1',
							'RT1-TP2',
							'RT1-TP3',
							'RT2',
							'RT2-TD1',
							'RT2-TD2',
							'RT2-TP1',
							'RT2-TP2',
							'RT2-TP3',
							'LP RT',
							'LP RT-TD1',
							'LP RT-TD2',
							'LP RT-TP1',
							'LP RT-TP2',
							'LP RT-TP3'
		);
		//On prépare la liste des requêtes
		$queries=array();
		foreach ($copyListeId as $key=>$value) {
			if(in_array($value, $arrayAlias)){
				$tmp = explode('-', $value);
				if($tmp[0]=='Enseignant'){//Si il s'agit de la liste des enseignants
					$queries[] = "SELECT num_ens FROM enseignant";
					unset($copyListeId[$key]);
					continue;
				}
				else{//Sinon il s'agit d'un groupe d'étudiant
					$q = "SELECT num_etd FROM etudiant WHERE promo='".$tmp[0]."' ";
					if(isset($tmp[1])){
						$q .= "AND (td='".$tmp[1]."' OR tp='".$tmp[1]."')";
					}
					unset($copyListeId[$key]);
					$queries[]=$q;
					continue;
				}
			}
		}
		//On exécute la liste des requêtes
		$bdd = connexionBase();//Connection à la BDD
		foreach ($queries as $value) {
			$result = $bdd->prepare($value);//préparation
			$result->execute();//exécution
			foreach ($result as $id){
				$copyListeId[]=$id[0];
			}
		}
		return $copyListeId;//retourne la nouvelle liste de destinataire
	}
	
	//Permet à un professeur d'uploader un sujet en BDD
	function insertSujet($login,$post){
		$bdd = connexionBase();//Connection à la BDD
		/*On récupère les données*/
		$id_subject = uniqid(null,TRUE);
		$title = $post['title'];
		$creator = $login['id'];
		$format = $post['format'];
		$syntaxe = $post['syntaxe'];
		$deadline = $post['Y']."-".$post['m']."-".$post['d']." ".$post['H'].":".$post['i'].":00";
		$datePost = date("Y-m-d H:i:s");
		$description = $post['description'];
		//On récupère uniquement la liste des ID
		$tempDest = explode(',',$post['destinataire']);
		$listeId=array();
		foreach ($tempDest as $value) {
			$pos1 = strpos($value, "[")+1;
			if($pos1==1){continue;}//Pour éviter les champs vide dans l'array
			$pos2 = strpos($value, "]");
			$length=$pos2-$pos1;
			$listeId[] = substr($value,$pos1,$length);
		}
		$listeId=array_unique($listeId);//On supprime les doublons de destinataire
		//On vérifie si il n'y a pas des alias dans la liste des destinataires :
		$listeId=convertAlias($listeId);
		$finalListeId = '||'.implode('||',$listeId).'||';
		//On vérifie si l'enseignant possède déjà un dossier, sinon on en crée un.
		if(!create_dir(CHEMIN_FILE."/".$creator."/".$id_subject)){
			return 0;//Erreur
		}
		//Si il y a un fichier de sujet uploader
		$file = isset($_FILES) ? $_FILES : FALSE;
		if($file != FALSE && $file['mon_fichier']['error'] != 4){
			$maxsize = 20971520;//20Mo
			if($file['mon_fichier']['error'] > 0){
				return 0;//Erreur
			}
			elseif($file['mon_fichier']['size'] > $maxsize){
				return 0;//Erreur
			}
			else{
				//On récupère les infos du fichier
				$infoPath = pathinfo(($file['mon_fichier']['name']));//pathinfo retourne les infos sur le chemin passer en argument, par ex : l'extension.
				$extension = strtolower (".".$infoPath['extension']);//L'extension du fichier. Ex : .rar
				$name = $infoPath['filename'];//Nom du fichier
				$type = $file['mon_fichier']['type'];//Le type du fichier. Par exemple, cela peut être « image/png ».
				$size = $file['mon_fichier']['size'];//La taille du fichier en octets
				$tmp_name = $file['mon_fichier']['tmp_name'];//L'adresse vers le fichier uploadé dans le répertoire temporaire.
			}
			//Création du dossier contenant le fichier sujet si existe
			if(!create_dir(CHEMIN_FILE."/".$creator."/".$id_subject."/sujet")){
				return 0;//Erreur
			}
			//On déplace le fichier
			if(!move_uploaded_file($file['mon_fichier']['tmp_name'], CHEMIN_FILE."/".$creator."/".$id_subject."/sujet/".$name.$extension)){
				return 0;//Erreur
			}
			else{
				//On redéfinie le chemin d'accès au fichier pour lenvoi de mail puisqu'il a été déplacer
				$file['mon_fichier']['tmp_name']=CHEMIN_FILE."/".$creator."/".$id_subject."/sujet/".$name.$extension;
			}
		}
		else{
			$file['mon_fichier']="";
		}
	    //Insertion SQL du sujet
		$req = "INSERT INTO sujet ";
		$req .= "VALUES (:id_subject,:title,:creator,:format,:syntaxe,:deadline,:datePost,:description,:finalListeId)";
	    $result = $bdd->prepare($req);//préparation
		$result->bindParam(':id_subject', $id_subject);
		$result->bindParam(':title', $title);
		$result->bindParam(':creator', $creator);
		$result->bindParam(':format', $format);
		$result->bindParam(':syntaxe', $syntaxe);
		$result->bindParam(':deadline', $deadline);
		$result->bindParam(':datePost', $datePost);
		$result->bindParam(':description', $description);
		$result->bindParam(':finalListeId', $finalListeId);
	    $count = $result->execute();//$count contient le nombre de ligne inséré dans la BDD.
		if($count!=""){
			/*
			 * On crée à présent les notifications et l'envoi d'email
			 * Note : On ne vérifie pas les valeurs de retour des notifications
			 * et de l'envoi d'email car leur réussite ne sont pas indispensable !!!
			 * (L'upload ayant déjà été réalisé !)
			 */				
			 
			 /*
			  * Notifications et email pour les destinataires du sujet
			  */
			//Texte de la notification
			$textNotif = "Nouveau Sujet de Rendu (<strong>".$title."</strong>) crée par <strong>".$login['nom']." ".$login['prenom']."</strong>";
			//Texte de l'email
			$message=array();
			foreach ($listeId as $value) {
				createNotif($value,$textNotif);//Création notification
				$sujet = "Notification : Nouveau Sujet de Rendu reçu.";
				$message['text']="Nouveau Sujet de Rendu (".$title.") crée par ".$login['nom']." ".$login['prenom'];
				$message['html']="<html><body><p>Nouveau Sujet de Rendu (<strong>".$title."</strong>) crée par <strong>".$login['nom']." ".$login['prenom']."</strong></p></body></html>";
				sendEmail(getEmail($value),$sujet,$message,$file['mon_fichier']);//Création email
				$logEmail = logEmail($value,$sujet,$message['text'],$datePost);//Log des emails
			}
			/*
			 * Email pour le créateur du sujet
			 */
			 //Texte de l'email
			$message=array();
			$sujet = "Notification : Création d'un sujet.";
			$message['text']="Nouveau Sujet de Rendu (".$title.") crée par ".$login['nom']." ".$login['prenom'].".";
			$message['html']="<html><body><p>Nouveau Sujet de Rendu (<strong>".$title."</strong>) crée par <strong>".$login['nom']." ".$login['prenom']."</strong>.</p></body></html>";
			sendEmail($login['email'],$sujet,$message,"");//Création email
			$logEmail = logEmail($login['id'],$sujet,$message['text'],$datePost);//Log des emails
			
			return 1;//Insertion réussie !
		}
		else{
			return 0;//Erreur
		}
	}
	
	//Permet à un étudiant ou un professeur d'uploader un fichier de rendu en BDD
	function insertFile($idLogin,$id_subject,$url,$size,$type,$datePost){
		$bdd=connexionBase();//Connexion BDD
		$id_upload = uniqid(null,TRUE);//Création d'un id pour l'upload
		$reqUpload = "INSERT INTO upload ";
		$reqUpload .= "VALUES (:id_upload,:idLogin,:id_subject,:url,:size,:type,:datePost)";
		$result = $bdd->prepare($reqUpload);//préparation
		$result->bindParam(':id_upload', $id_upload);
		$result->bindParam(':idLogin', $idLogin);
		$result->bindParam(':id_subject', $id_subject);
		$result->bindParam(':url', $url);
		$result->bindParam(':size', $size);
		$result->bindParam(':type', $type);
		$result->bindParam(':datePost', $datePost);
		$count = $result->execute();//$count contient le nombre de ligne inséré dans la BDD.	
		if($count!=1){
			return 0;//Erreur
		}
		else{
			return 1;//Succès
		}
	}

	/* Permet à un étudiant ou un professeur d'uploader un fichier de rendu sur le serveur & en BDD,
	 *  et de créer les notifications et l'envoi de mail */
	function uploadFile($login,$post,$sujetDest,$file){
		$id_subject = base64_decode($post['id_subject']);
		$infoCurrSubject = array();
		foreach ($sujetDest as $value) {
			if($value['id'] == $id_subject){
				$infoCurrSubject = $value;
				break;
			}
			else{continue;}
		}
		$maxsize=20971520;//20Mo
		$formatS[] = $infoCurrSubject['format'];
		$creatorS = $infoCurrSubject['createur'];
		$datePost = date("Y-m-d H:i:s");
		$datePostSyntaxe = date("d-m-Y");
		$infoCurrSubject['syntaxe'] = str_replace("@Date",$datePostSyntaxe,$infoCurrSubject['syntaxe']);//On remplace les @date uniquement ici pour obtenir l'heure réel d'upload
		$idS = $infoCurrSubject['id'];
		$dossier = CHEMIN_FILE."/".$creatorS."/".$idS;
		
		//Si la date de post est supérieur à la deadline, on retourne une erreur
		if($datePost>$infoCurrSubject['deadline']){
			return 0;
		}
		//On vérifie si il y a une erreur
		if($file['mon_fichier']['error'] > 0){
			return 0;//Erreur
		}
		elseif($file['mon_fichier']['size'] > $maxsize){
			return 0;//Erreur
		}
		else{
			//On récupère les infos du fichier
			$infoPath = pathinfo(($file['mon_fichier']['name']));//pathinfo retourne les infos sur le chemin passer en argument, par ex : l'extension.
			$extension = strtolower (".".$infoPath['extension']);//L'extension du fichier. Ex : .rar
			$type = $file['mon_fichier']['type'];//Le type du fichier. Par exemple, cela peut être « image/png ».
			$size = $file['mon_fichier']['size'];//La taille du fichier en octets
			$tmp_name = $file['mon_fichier']['tmp_name'];//L'adresse vers le fichier uploadé dans le répertoire temporaire.
			
			//On vérifie que le type du fichier est correcte.
			if(!in_array($extension, $formatS)){
				return 0;//Erreur
			}
			else{
				//On déplace le fichier
				if(!move_uploaded_file($file['mon_fichier']['tmp_name'], $dossier."/".$infoCurrSubject['syntaxe'].$extension)){
					return 0;//Erreur
				}
				else{
					//On change son chemin d'accès
					$file['mon_fichier']['tmp_name']=$dossier."/".$infoCurrSubject['syntaxe'].$extension;
					$file['mon_fichier']['name']=$infoCurrSubject['syntaxe'].$extension;
					//Le Fichier est Uploadé !
					$url = $dossier."/".$infoCurrSubject['syntaxe'].$extension;//URL du fichier
					if(!insertFile($login['id'], $id_subject,$url,$size,$type,$datePost)){//Insertion en BDD des détails de l'upload				
						return 0;//Echec de la sauvegarde en BDD
					}
					else{
						/*
						 * On crée à présent les notifications et l'envoi d'email
						 * Note : On ne vérifie pas les valeurs de retour des notifications
						 * et de l'envoi d'email car leur réussite ne sont pas indispensable !!!
						 * (L'upload ayant déjà été réalisé !)
						 */		
						 
						 /*
						  * Notifications pour le créateur du sujet
						  */
						//Texte de la notification
						$textNotif = "Rendu de <strong>".$login['nom']." ".$login['prenom']."</strong> reçu pour le sujet <strong>".$infoCurrSubject['titre']."</strong>.";
						createNotif($creatorS,$textNotif);//Création de la notification					
						/*
						 * Email pour l'uploader du fichier de rendu
						 */
						//Texte de l'email
						$message=array();
						$sujet = "Notification : Rendu reçu.";
						$message['text']="Rendu de ".$login['nom']." ".$login['prenom']." reçu pour le sujet ".$infoCurrSubject['titre'].".";
						$message['html']="<html><body><p>Rendu de <strong>".$login['nom']." ".$login['prenom']."</strong> reçu pour le sujet <strong>".$infoCurrSubject['titre']."</strong>.</p></body></html>";
						sendEmail($login['email'],$sujet,$message,$file['mon_fichier']);//Création email
						$logEmail = logEmail($login['id'],$sujet,$message['text'],$datePost);//Log des emails
						
						return 1;//Succès !
					}
				}
			}
		}
	}
	
	//Permet de créer une notification
	function createNotif($idDest,$message){
		$bdd = connexionBase();//Connection à la BDD
		$idNotif = uniqid(null,TRUE);//Création d'un id pour la notification
		$datePost = date("Y-m-d H:i:s");
		$reqNotif = "INSERT INTO notification VALUES (:idNotif,:idDest,:message,:datePost)";
		$result = $bdd->prepare($reqNotif);//préparation
		$result->bindParam(':idNotif', $idNotif);
		$result->bindParam(':idDest', $idDest);
		$result->bindParam(':message', $message);
		$result->bindParam(':datePost', $datePost);
		$count = $result->execute();//exécution
	    //$count contient le nombre de ligne inséré dans la BDD.
		if($count!=1){
			echo '7';
			exit;
			return 0;//Erreur
		}
		else{
			return 1;//Succès
		}
	}
?>