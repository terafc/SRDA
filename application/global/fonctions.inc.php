<?php
include_once('config.inc.php');
include_once('connexion.inc.php');

function modif_mdp(){
	
}

function new_user(){
	
}

function search($key){
	$bdd=connexionBase();
	$req_ens = "select * from enseignant where nom_ens COLLATE utf8_unicode_ci like '%" . $key . "%' or prenom_ens  COLLATE utf8_unicode_ci like '%" . $key . "%'";
	$req_etd = "select * from etudiant where nom_etd  COLLATE utf8_unicode_ci like'%" . $cle . "%' or prenom_etd COLLATE utf8_unicode_ci like '%" . $cle . "%' or promo COLLATE utf8_unicode_ci like '%" . $cle . "%' or num_etd like '%" . $cle . "%'";
	
	
}


?>