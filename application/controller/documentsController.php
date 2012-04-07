<?php
	if(isset($action) || isset($_GET['action'])){
		switch($_GET['action']){
			//Permet d'afficher la liste des sujets d'un utilisateur
			case "documents":
				switch($_SESSION['login']['statut']){
					case 'ens':
						include_once(CHEMIN_MODEL."/documentsModel.php");
						$sujetDest = getSujetDest($_SESSION['login']);//Liste des sujet où il est destinataire
						$sujetCreator = getSujetCreator($_SESSION['login']);//Liste des sujet où il est créateur
						$_SESSION['sujetDest']=$sujetDest;
						$_SESSION['sujetCreator']=$sujetCreator;
						
						include_once(CHEMIN_VIEW."/documentsEnseignant.php");
						break;
					case 'etd':
						include_once(CHEMIN_MODEL."/documentsModel.php");
						$sujetDest = getSujetDest($_SESSION['login']);//Liste des sujet où il est destinataire
						$_SESSION['sujetDest']=$sujetDest;
						include_once(CHEMIN_VIEW."/documentsEtudiant.php");
						break;
					default:
						include_once(CHEMIN_VIEW."/404.php");
						break;
				}
				break;
			//Permet d'afficher la page d'upload pour un sujet
			case "upload":
				switch($_SESSION['login']['statut']){
					case 'etd':
						include_once(CHEMIN_MODEL."/documentsModel.php");
						$sujetDest = getSujetDest($_SESSION['login']);//Liste des sujet où il est destinataire
						$_SESSION['sujetDest']=$sujetDest;
						include_once(CHEMIN_VIEW."/uploadEtudiant.php");
						break;
					case 'ens':
						include_once(CHEMIN_VIEW."/uploadEnseignant.php");
						break;
					default:
						include_once(CHEMIN_VIEW."/404.php");
						break;
				}
				break;
			//Pour afficher la page de suppression d'un sujet
			case "deletePage":
				include_once(CHEMIN_MODEL."/documentsModel.php");
				$sujetCreator = getSujetCreator($_SESSION['login']);
				$_SESSION['sujetCreator'] = $sujetCreator;
				include_once(CHEMIN_VIEW."/deletePage.php");
				break;
			//Pour supprimer un sujet
			case "deleteSubject":
				//Vérification que la page a été appeler depuis deletePage.php
				if(!isset($_POST['id_creator']) || !isset($_POST['id_subject'])){
					include_once(CHEMIN_VIEW."/404.php");
					break;
				}
				require_once("../global/config.inc.php");//Il faut charger les variables GLOBALES car il s'agit d'un appel ajax
				require_once(CHEMIN_GLOBAL."/connexion.inc.php");
				include_once(CHEMIN_MODEL."/documentsModel.php");
				$id_creator = base64_decode($_REQUEST['id_creator']);
				$id_subject = base64_decode($_REQUEST['id_subject']);
				$html = deleteSubject($id_creator,$id_subject);
				include_once(CHEMIN_VIEW."/deleteSubject.php");
				break;
			//Si on accède au controller par AJAX pour le formulaire d'upload.
			case "uploadForm":	
				require_once("../global/config.inc.php");//Il faut charger les variables GLOBALES car il s'agit d'un appel ajax
				$id_subject = $_REQUEST['id'];
				$login = unserialize(base64_decode($_REQUEST['login']));
				$infoSubject = unserialize(base64_decode($_REQUEST['subject']));
				//On vérifie si un sujet a été uploadé :
				$chemin = CHEMIN_FILE."/".$infoSubject['createur']."/".$infoSubject['id']."/sujet/";
				if(is_dir($chemin)){
					//Fait partie de la classe SPL. Permet de faire une iteration d'un repertoire.
					foreach (new DirectoryIterator($chemin) as $fileInfo) {
						//Si il s'agit d'un fichier caché ou d'un fichier parent
						if($fileInfo->isDot()){continue;}
						//Si il s'agit du dossier
						if($fileInfo->isDir()){continue;}
						//Si il s'agit d'un fichier (sujet)
						if($fileInfo->isFile()){
							$name = $fileInfo->getFilename();
							$completePath = HTTP_FILE."/".$infoSubject['createur']."/".$infoSubject['id']."/sujet/".$name;
						}
					}
				}
				include_once(CHEMIN_VIEW."/uploadForm.php");//Chemin différent puisqu'on y accède depuis un appel ajax
				break;
			//Appeler lors de l'upload d'un réel fichier de rendu ou d'un sujet
			case "verifUpload": 
				require_once(CHEMIN_MODEL."/emailModel.php");
				include_once(CHEMIN_MODEL."/verifUploadModel.php");
				$login = $_SESSION['login'];
				$post = $_POST;
				//On regarde si il s'agit de l'upload d'un sujet ou d'un rendu
				switch($post['what']){
					case 'createSubject':
						//On insère le sujet en BDD
						if(insertSujet($login,$post)){
							$message = "Votre sujet a bien été enregistré !";
						}
						else{
							$erreur = "Une erreur s'est produite. Veuillez recommencez ultérieurement...";
						}
						break;
					case 'submitUpload':
						$file = $_FILES;//Infos du fichier à uploadé
						$sujetDest = $_SESSION['sujetDest']; //Liste des sujets
						//Permet : Upload sur serveur + insertion BDD + Notification + email
						if(uploadFile($login,$post,$sujetDest,$file)){
							$message = " Votre fichier de rendu a bien été uploadé !";
						}
						else{
							$erreur = "Une erreur s'est produite. Veuillez recommencez ultérieurement...";
						}
						break;
				}
				include_once(CHEMIN_VIEW."/verifUpload.php");
				break;
			//Pour afficher les détails d'un sujet
			case 'detailSubject':
				require_once("../global/config.inc.php");//Il faut charger les variables GLOBALES car il s'agit d'un appel ajax
				require_once(CHEMIN_GLOBAL."/connexion.inc.php");
				include_once(CHEMIN_MODEL."/documentsModel.php");
				$id_subject = $_POST['id_subject'];
				//On Récupère les infos sur ce sujet
				$currSujInfo = get_info_subject($id_subject);
				//On récupère la liste des id des personnes ayant déjà rendu un fichier
				$listeUploader = get_info_uploader($id_subject);
				//On récupère le liste des informations des users
				$listeInfoUser;
				$listeDest = explode('||',$currSujInfo['destinataire']);//liste des destinataires
				foreach ($listeDest as $key=>$value) {
					if(empty($value)){
						unset($listeDest[$key]);//On supprime les clés "vides"
						continue;
					}
					else{
						unset($listeDest[$key]);//On supprime les anciennes clés
						$listeDest[$value]=get_info_user($value);//Nom + Prénom
						//Condition ternaire : si il y a un rendu, alors on affecte la date
						$listeDest[$value]['datePostSubject'] = isset($listeUploader[$value]) ? $listeUploader[$value] : false;
						//Condition ternaire : si il y a un rendu, alors on affecte true				
						$listeDest[$value]['subjectValid'] = isset($listeUploader[$value]) ? true : false;
					}
				}
				include_once(CHEMIN_VIEW."/detailSubject.php");
				break;
			//Permet de télécharger tout les rendus actuel d'un sujet
			case 'downloadAllRendu':
				/*
				 * Création de l'archive ZIP
				 */
				require_once("../global/config.inc.php");//Il faut charger les variables GLOBALES car il s'agit d'un appel ajax
				require_once(CHEMIN_LIB_PHP."/zip.lib.php" ) ; // librairie ZIP
				$id_subject = $_POST['id_subject'];//ID sujet
				$id_creator = $_POST['id_creator'];//ID créateur
				$chemin = CHEMIN_FILE."/".$id_creator."/".$id_subject."/";
				$zip = new zipfile () ; //on crée une instance zip
				$files=array();// liste des fichiers à compresser
				
				//Fait partie de la classe SPL. Permet de faire une iteration d'un repertoire.
				foreach (new DirectoryIterator($chemin) as $fileInfo) {
					//Si il s'agit d'un fichier caché ou d'un fichier parent
					if($fileInfo->isDot()){continue;}
					//Si il s'agit du dossier qui contient les sujets, on l'inclue
					if($fileInfo->isDir() && $fileInfo->getFilename() == "sujet"){
						foreach (new DirectoryIterator($chemin."sujet/") as $fileInfo2) {
							if($fileInfo2->isDot()){continue;}
							if($fileInfo2->isDir()){continue;}
							if($fileInfo2->isFile()){
								$files[]=$chemin."sujet/".$fileInfo2->getFilename();
							}
						}
					}
					//Si il s'agit d'un dossier
					if($fileInfo->isDir()){continue;}
					//Sinon si c'est un fichier.
					if($fileInfo->isFile()){
						if(substr($fileInfo->getFilename(),-4) == '.zip'){continue;}//Si il s'agit d'un zip on continue
						$files[]=$chemin.$fileInfo->getFilename();
					}
				}
				
				$i = 0 ;
				while(count($files)>$i){
					$fo = fopen($files[$i],'r') ; //on ouvre le fichier
					$contenu = fread($fo, filesize($files[$i])) ; //on enregistre le contenu
					fclose($fo) ; //on ferme fichier
					$zip->addfile($contenu, basename($files[$i])) ; //on ajoute le fichier
					$i++; //on incrémente i
				}
				
				// on enregistre l'archive dans un fichier
				$archive = $zip->file() ; // on associe l'archive
				//on utilisera $completePath dans la vue pour afficher un lien
				$completePath = HTTP_FILE."/".$id_creator."/".$id_subject."/rendu.zip";
				$open = fopen($chemin.'rendu.zip' , "wb");
				fwrite($open, $archive);
				fclose($open);
				include_once(CHEMIN_VIEW."/downloadAllRendu.php");
				break;
			//Par défaut : Erreur
			default:
				include_once(CHEMIN_VIEW."/404.php");
				break;
		}
	}
?>
