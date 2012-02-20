<?php 
$infoUser=$_SESSION['login'];
//print_r($infoUser);
?>
<div id="articles">
	<form class="inscrire" method="POST" action="<?php echo HTTP_INDEX;?>?page=compte&action=edit">
		<fieldset class="information">
			<legend>Vos informations</legend>
			<ol>
				<li>
	    			<td><label for="statut"><strong>Status :</strong></label></td>
					<td><label for="statut"><?php if ($infoUser['statut']=="ens") {
						echo "Enseignant";
					} else {
						echo "Etudiant";
					}
					?></label></td>
				</li>
				<?php if ($infoUser['statut']=="etd") {
					echo "<li>
		    			<td><label for='id'><strong>N° Etudiant :</strong></label></td>
		    			<td><label for='id'>"; echo $infoUser['id']; "</label></td>
					</li>";
				} ?>

				<li>
	    			<td><label for="nom"><strong>Nom :</strong></label></td>
	    			<td><label for="nom"><?php echo $infoUser['nom']; ?></label></td>
				</li>
				<li>
	    			<td><label for="prenom"><strong>Prenom :</strong></label></td>
	    			<td><label for="prenom"><?php echo $infoUser['prenom']; ?></label></td>
				</li>
				<li>
	    			<td><label for="mail"><strong>Mail :</strong></label></td>
	    			<td><label for="mail"><?php echo $infoUser['email']; ?></label></td>
				</li>
				<?php if (isset($infoUser['promo'])) {
					echo '<li>
		    			<td><label for="promo"><strong>Promo :</strong></label></td>
		    			<td><label for="promo">';
						echo $infoUser['promo'];
					echo '</label></td></li>';
				} ?>

			</ol>
		</fieldset>
		<fieldset>
			<legend>Mot de passe</legend>
			<ol>
				<li>
	    			<td><label for="id"><strong>Nouveau MDP :</strong></label></td>
	    			<td><input type="password" name="pass1" id="id" size="25" required="required"/></td>
				</li>
				<li>
	    			<td><label for="mdp"><strong>Comfirmation :</strong></label></td>
	    			<td><input type="password" name="pass2" id="mdp" size="25" required="required"/></td>
				</li>
					<?php if (isset($result)) {
						echo '<li>';
						echo $result;
						echo  '</li>';
					} ?>
			</ol>
		</fieldset>
		<fieldset>
			<button type=submit>Modifier</button>
		</fieldset>
	</form>
</div>		

