<?php
// Identifiants pour la base de données. Nécessaires a PDO2.
define('SQL_DSN', 'mysql:dbname=SRDA;host=localhost');
//Définit le nom de la base et l'adresse du serveur mysql
define('SQL_USERNAME', 'root');
define('SQL_PASSWORD', '');
//Définit une liste de chemins(Chemin sur le serveur)
define('CHEMIN_GLOBAL', $_SERVER['DOCUMENT_ROOT'].'SRDA/application/global');
define('CHEMIN_VIEW',$_SERVER['DOCUMENT_ROOT'].'SRDA/application/view');
define('CHEMIN_MODEL',$_SERVER['DOCUMENT_ROOT'].'SRDA/application/model');
define('CHEMIN_CONTROLLER',$_SERVER['DOCUMENT_ROOT'].'SRDA/application/controller');
define('CHEMIN_LIB_PHP',$_SERVER['DOCUMENT_ROOT'].'SRDA/application/lib_php');
define('CHEMIN_FILE',$_SERVER['DOCUMENT_ROOT'].'SRDA/application/file');
//Définit une liste de lien HTTP
define('HTTP_VIEW','http://'.$_SERVER['SERVER_NAME'].'/SRDA/application/view');
define('HTTP_MODEL','http://'.$_SERVER['SERVER_NAME'].'/SRDA/application/model');
define('HTTP_CONTROLLER','http://'.$_SERVER['SERVER_NAME'].'/SRDA/application/controller');
define('HTTP_JS','http://'.$_SERVER['SERVER_NAME'].'/SRDA/application/js');
define('HTTP_CSS','http://'.$_SERVER['SERVER_NAME'].'/SRDA/application/css');
define('HTTP_FILE','http://'.$_SERVER['SERVER_NAME'].'/SRDA/application/file');
define('HTTP_IMG','http://'.$_SERVER['SERVER_NAME'].'/SRDA/application/img');
define('HTTP_LIB_PHP','http://'.$_SERVER['SERVER_NAME'].'/SRDA/application/lib_php');
define('HTTP_XML','http://'.$_SERVER['SERVER_NAME'].'/SRDA/application/xml');
define('HTTP_INDEX','http://'.$_SERVER['SERVER_NAME'].'/SRDA/index.php');
?>
