<?php
	//Permet de définir l'heure du serveur avec les fuseaux horaire de la réunion
	date_default_timezone_set('Indian/Reunion');
	
	/*****************************************************************************************
	 * BUT : Envoyer des mails de notification pour un professeur si la deadline est dépassé *
	 *****************************************************************************************/
	$subject = getSubjectAfterDeadline();
	if(!empty($subject)){
		foreach ($subject as $value) {
			$sujet = "SRDA - Rendu du Sujet : ".$value['titre'];
			$tmpMess="Bonjour, <br/>";
			$tmpMess.="Veuillez trouver en pièce-jointe une archive de tout les comptes rendues reçuent pour le sujet intitulé <".$value['titre'].">. <br/>";
			$tmpMess.="Cordialement.";
			$mess['html']=$tmpMess;
			$mess['text']=str_replace("<br/>", "", $tmpMess);
			sendEmail(getEmail($value['createur']), $sujet, $mess, '');
			$datePost = date("Y-m-d H:i:s");
			logEmail($value['createur'],$sujet,$mess['text'],$datePost);
		}
	}
?>
<?php
	/***************************************************************
	 * Définition de la configuration et des fonctions nécessaire. *
	 ***************************************************************/
	/*
	// Identifiants pour la base de données. Nécessaires a PDO2.
	define('SQL_DSN', 'mysql:dbname=SRDA;host=localhost');
	//Définit le nom de la base et l'adresse du serveur mysql
	define('SQL_USERNAME', 'root');
	define('SQL_PASSWORD', '');
	*/
	/*********************************************
	 * Classe implémentant le singleton pour PDO *
	 *********************************************/
	/*class PDO2 extends PDO {
		private static $_instance;
		//Constructeur : héritage public obligatoire par héritage de PDO 
		public function __construct( ) {}
		public static function getInstance() {
			if (!isset(self::$_instance)) {
				try {
					self::$_instance = new PDO(SQL_DSN, SQL_USERNAME, SQL_PASSWORD);
				} catch (PDOException $e) {
					echo $e;
				}
			} 
			return self::$_instance; 
		}
	}

	function connexionBase() {
		require_once ('config.inc.php');
		require_once ('pdo2.class.php');
	
		try {
			$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
			$bdd = PDO2::getInstance();
			$bdd->exec('SET CHARACTER SET utf8');
		}
		catch (Exception $e) {
			die('Erreur : ' . $e -> getMessage());
		}
		return $bdd;
	}
	*/
	//Permet d'obtenir la liste des notifications pour un id donné.
	function getSubjectAfterDeadline(){
		$bdd=connexionBase();//Connexion à la BDD
		//On récupère la date actuelle soustrait de 12H
		$date = date("Y-m-d H:i:s");
		$req = "SELECT * FROM sujet WHERE deadline < '".$date."'";
		foreach ($bdd->query($req) as $value) {
			$return[] = $value;
		}
		$return = empty($return) ? FALSE : $return;
		return $return;
	}
?>