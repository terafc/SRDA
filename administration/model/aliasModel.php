<?php	
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
?>