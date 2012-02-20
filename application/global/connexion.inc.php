<?php
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
?>