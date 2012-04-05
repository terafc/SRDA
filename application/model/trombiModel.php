<?php
//Retourne UN tableau numerotée contenant des tableaux associatif avec comme champ, le nom, prenom et le mail
//Retourn false sinon
function getListe($promo) {
	$bdd = connexionBase();
	$promo = strtoupper($promo);
	$listePromo = array('RT1', 'RT2', 'LP');
	$result = array();
	$i = 0;
	//Si il s'agit des enseignants
	if ($promo == "ENSEIGNANT") {
		$requete = "select nom_ens, prenom_ens,email_ens from enseignant ";
		//Requete
		$res = $bdd -> prepare($requete);
		//préparation
		$res -> execute();
		//exécution
		foreach ($res as $valeur) {
			$result[$i]['nom'] = $valeur['nom_ens'];
			$result[$i]['prenom'] = $valeur['prenom_ens'];
			$result[$i]['email'] = $valeur['email_ens'];
			$i++;
		}
	}
	//Si il s'agit des étudiants
	elseif (in_array($promo, $listePromo)) {
		$bdd = connexionBase();
		//Connexion BDD
		$requete = "select nom_etd, prenom_etd,email_etd,num_etd,promo from etudiant where promo=:promo";
		//Requete
		$res = $bdd -> prepare($requete);
		//préparation
		$res -> bindParam(':promo', $promo);
		$res -> execute();
		//exécution
		foreach ($res as $valeur) {
			$result[$i]['nom'] = $valeur['nom_etd'];
			$result[$i]['prenom'] = $valeur['prenom_etd'];
			$result[$i]['email'] = $valeur['email_etd'];
			$result[$i]['id'] = $valeur['num_etd'];
			$result[$i]['promo'] = $valeur['promo'];
			$i++;
		}
	}
	return $result;
	//On retourne le jeu de résultat.
}

function getTrombi($half_path, $nom) {
	$url = '';
	//var_dump($half_path);
	$path=HTTP_IMG.'/trombi/'.$half_path;
	$test=CHEMIN_IMG.'/trombi/'.$half_path;
	//var_dump($path);
	//var_dump(is_file('srda.franceserv.com/application/img/trombi/rt2/27001248.png'));
	if (is_file($test)) {
		$url = '<a class="photo_trombi" href="javascript:void(0);"
				onMouseOver="return overlib(\'\',
				WIDTH, 84, HEIGHT, 113,LEFT,OFFSETX,30,OFFSETY,-50,BORDER,\'2\',
				BGCOLOR,\'#2F8CAE\',
				FGBACKGROUND,\'' . $path . '\');"
				onMouseOut="return nd();">' . $nom . '</a>';
		return $url;
	}
	else {
		$path = HTTP_IMG.'/trombi/profil.png';
		$url = '<a class="photo_trombi" href="javascript:void(0);"
				onMouseOver="return overlib(\'\',
				WIDTH, 84, HEIGHT, 113,LEFT,OFFSETX,30,OFFSETY,-50,BORDER,\'2\',
				BGCOLOR,\'#2F8CAE\',
				FGBACKGROUND,\'' . $path . '\');"
				onMouseOut="return nd();">' . $nom . '</a>';
		return $url;
	}
}
?>
