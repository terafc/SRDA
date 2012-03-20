<?php
// Identifiants pour la base de données. Nécessaires a PDO2.
define('SQL_DSN', 'mysql:dbname=SRDA;host=localhost');
//Définit le nom de la base et l'adresse du serveur mysql
define('SQL_USERNAME', 'root');
define('SQL_PASSWORD', '');
//Définit une liste de chemins(Chemin sur le serveur)
define('CHEMIN_GLOBAL', $_SERVER['DOCUMENT_ROOT'].'SRDA/administration/global');
define('CHEMIN_VIEW',$_SERVER['DOCUMENT_ROOT'].'SRDA/administration/view');
define('CHEMIN_MODEL',$_SERVER['DOCUMENT_ROOT'].'SRDA/administration/model');
define('CHEMIN_CONTROLLER',$_SERVER['DOCUMENT_ROOT'].'SRDA/administration/controller');
define('CHEMIN_FILE',$_SERVER['DOCUMENT_ROOT'].'SRDA/application/file');
//Définit une liste de lien HTTP
define('HTTP_VIEW','http://'.$_SERVER['SERVER_NAME'].'SRDA/administration/view');
define('HTTP_MODEL','http://'.$_SERVER['SERVER_NAME'].'SRDA/administration/model');
define('HTTP_CONTROLLER','http://'.$_SERVER['SERVER_NAME'].'SRDA/administration/controller');
define('HTTP_JS','http://'.$_SERVER['SERVER_NAME'].'SRDA/administration/js');
define('HTTP_CSS','http://'.$_SERVER['SERVER_NAME'].'SRDA/administration/css');
define('HTTP_FILE','http://'.$_SERVER['SERVER_NAME'].'SRDA/administration/file');
define('HTTP_IMG','http://'.$_SERVER['SERVER_NAME'].'SRDA/administration/img');
define('HTTP_XML','http://'.$_SERVER['SERVER_NAME'].'SRDA/administration/xml');
define('HTTP_INDEX','http://'.$_SERVER['SERVER_NAME'].'SRDA/administration/indexAdministration.php');
?>
