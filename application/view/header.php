<?php
	if(isset($_SESSION['login'])){
		switch($_SESSION['login']['statut']){
			case 'ens':
				$doc = "Vos documents";
				$upl = "Soummettre un sujet";
				$del = "Supprimer un sujet";
				break;
			case 'etd':
				$doc = "Vos documents";
				break;
			default:
				$doc = "Vos documents";
				$upl = "Envoyer un fichier";
				break;
		}
	}
	else{
		$doc = "Vos documents";
		$upl = "Envoyer un fichier";
	}
?>
<div id="header">
	<div id="connexion">
		<input type="text" name="search" class="search" placeholder="Recherche" onKeyPress="if(event.keyCode==13){getListe($(this).val());}">
	</div>
	<a href="<?php echo HTTP_INDEX;?>"><img src="<?php echo HTTP_IMG;?>/SRDA_Final.png" height=60 style="padding-left:3px;"/></a> <br/>
	<h3>
		Service de rangement de documents automatisé 
		<?php if (isset($_SESSION['login'])){
			echo '<a class="aLogout" href="'.HTTP_URL.'/login/logout"><img src="'.HTTP_IMG.'/croix2.png"/></a>';
		}?>
	</h3>
		
	<hr>
</div>
<ul id="nav-one" class="dropmenu">
	<li><a href="<?php echo HTTP_URL;?>/accueil/show" class="lien1">Accueil</a></li>
	<li><a href="javascript:void(0);" class="lien3">Documents</a>
		<ul> 
			<li><a href="<?php echo HTTP_URL;?>/documents/documents"><?php echo $doc;?></a></li> 
			<?php if(isset($upl)){ ?>
				<li><a href="<?php echo HTTP_URL;?>/documents/upload"><?php echo $upl;?></a></li> 
			<?php } ?>
			<?php if(isset($del)){?>
				<li><a href="<?php echo HTTP_URL;?>/documents/deletePage"><?php echo $del;?></a></li> 
			<?php } ?>
		</ul>
	</li>
	<li><a href="javascript:void(0);" class="lien3">Etd/Ens</a>
		<ul> 
			<li><a href="<?php echo HTTP_URL;?>/trombi/RT1">RT1</a></li> 
			<li><a href="<?php echo HTTP_URL;?>/trombi/RT2">RT2</a></li> 
			<li><a href="<?php echo HTTP_URL;?>/trombi/LP">Licence Pro RT</a></li>
			<li><a href="<?php echo HTTP_URL;?>/trombi/Enseignant">Enseignant</a></li>
		</ul>
	</li>
	<li><a href="<?php echo HTTP_URL;?>/compte/show" class="lien2">Compte</a></li>
</ul>
