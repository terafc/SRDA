</br>
<div class="articles">
	<form class="inscrire" action="<?php echo HTTP_INDEX;?>?page=enseignant&action=create" method="post">
		<fieldset>
			<legend>Créer un nouvel enseignant</legend>
			<ol>
				<li>
					<td><label for="num_ens" class="inlineBlockMiddle"><strong>Numéro Enseignant :</strong></label></td> 
					<td><input type="text" class="inlineBlockMiddle" name="num_ens" required="required" placeholder="ID"/></td>
				</li>
				<li>
					<td><label for="nom_ens" class="inlineBlockMiddle"><strong>Nom :</strong></label></td> 
					<td><input type="text" class="inlineBlockMiddle" name="nom_ens" required="required" placeholder="Nom"/></td>
				</li>
				<li>
					<td><label for="prenom_ens" class="inlineBlockMiddle"><strong>Prénom :</strong></label></td> 
					<td><input type="text" class="inlineBlockMiddle" name="prenom_ens" required="required" placeholder="Prénom"/></td>
				</li>
				<li>
					<td><label for="email_ens" class="inlineBlockMiddle"><strong>Email :</strong></label></td> 
					<td><input type="email" class="inlineBlockMiddle" name="email_ens" required="required" placeholder="Email"/></td>
				</li>
				<li>
					<td><label for="pass" class="inlineBlockMiddle"><strong>Password :</strong></label></td> 
					<td><input type="password" class="inlineBlockMiddle" name="pass" required="required" placeholder="Password"/></td>
				</li>
			</ol>	
		</fieldset>
		<fieldset>
	    	<input type="hidden" name="what" value="createEns" /><br />
			<button type="submit" value="Créer">Créer</button>
		</fieldset>
	</form>
</div>
<br/>
<div class="articles">
	<form class="inscrire" action="<?php echo HTTP_INDEX;?>?page=enseignant&action=delete" method="post">
		<fieldset>
			<legend>Supprimer des enseignants :</legend>
			<ol>
				<li>
					<td><label for="listeId" class="inlineBlockTop"><strong>Liste d'enseignants :</strong></label></td> 
					<td><textarea id="autoEns" class="inlineBlockTop" placeholder="Entrer un id, un nom, ou un prénom..." name="listeId" required="required"></textarea></td>
				</li>
			</ol>	
		</fieldset>
		<fieldset>
	    	<input type="hidden" name="what" value="deleteEns" /><br />
			<button type="submit" value="Supprimer">Supprimer</button>
		</fieldset>
	</form>
</div>
<br/>

<script type="text/javascript">
	/*
	 * SCRIPT POUR L'AUTOCOMPLETE
	 */
	// Lorsque la totalité de la page est chargée
	$(document).ready(function() {
		$.ajax({ // Requete ajax
			type: "POST", // envoie en POST
			url: "<?php echo HTTP_XML;?>/autocompleteEns.php", // url cible du script PHP
			async: true, // mode asynchrone
			data: "", // données envoyées
			
			success: function(xml){ // Lorsque le PHP à renvoyé une réponse
				elementsArray = new Array();
				$(xml).find('element').each(function(){ // pour chaque "element"
					elementsArray.push($(this).text()); // ajout dans le tableau
				});
				$("#autoEns").autocomplete(elementsArray,{
					multiple: true,
					mustMatch: true,
					autoFill: true
				}); 
			}
		});
	});
</script>