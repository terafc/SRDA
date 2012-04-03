</br>
<div class="articles">
	<form class="inscrire" action="<?php echo HTTP_URL;?>/etudiant/create" method="post">
		<fieldset>
			<legend>Créer un nouvel étudiant</legend>
			<ol>
				<li>
					<td><label for="num_etd" class="inlineBlockMiddle"><strong>Numéro étudiant :</strong></label></td> 
					<td><input type="text" class="inlineBlockMiddle" name="num_etd" required="required" placeholder="ID"/></td>
				</li>
				<li>
					<td><label for="nom_etd" class="inlineBlockMiddle"><strong>Nom :</strong></label></td> 
					<td><input type="text" class="inlineBlockMiddle" name="nom_etd" required="required" placeholder="Nom"/></td>
				</li>
				<li>
					<td><label for="prenom_etd" class="inlineBlockMiddle"><strong>Prénom :</strong></label></td> 
					<td><input type="text" class="inlineBlockMiddle" name="prenom_etd" required="required" placeholder="Prénom"/></td>
				</li>
				<li>
					<td><label for="promo" class="inlineBlockMiddle"><strong>Promo :</strong></label></td> 
					<td><input type="text" class="inlineBlockMiddle" name="promo" required="required" placeholder="Promo"/></td>
				</li>
				<li>
					<td><label for="td" class="inlineBlockMiddle"><strong>TD :</strong></label></td> 
					<td><input type="text" class="inlineBlockMiddle" name="td" required="required" placeholder="TD"/></td>
				</li>
				<li>
					<td><label for="tp" class="inlineBlockMiddle"><strong>TP :</strong></label></td> 
					<td><input type="text" class="inlineBlockMiddle" name="tp" required="required" placeholder="TP"/></td>
				</li>
				<li>
					<td><label for="email_etd" class="inlineBlockMiddle"><strong>Email :</strong></label></td> 
					<td><input type="email" class="inlineBlockMiddle" name="email_etd" required="required" placeholder="Email"/></td>
				</li>
				<li>
					<td><label for="pass" class="inlineBlockMiddle"><strong>Password :</strong></label></td> 
					<td><input type="password" class="inlineBlockMiddle" name="pass" required="required" placeholder="Password"/></td>
				</li>
			</ol>	
		</fieldset>
		<fieldset>
	    	<input type="hidden" name="what" value="createEtd" /><br />
			<button type="submit" value="Créer">Créer</button>
		</fieldset>
	</form>
</div>
<br/>
<div class="articles">
	<form class="inscrire" action="<?php echo HTTP_URL;?>/etudiant/delete" method="post">
		<fieldset>
			<legend>Supprimer des étudiants :</legend>
			<ol>
				<li>
					<td><label for="listeId" class="inlineBlockTop"><strong>Liste d'étudiants :</strong></label></td> 
					<td><textarea id="autoEtd" class="inlineBlockTop" placeholder="Entrer un nom suivi d'un prénom ou une promotion..." name="listeId" required="required"></textarea></td>
				</li>
			</ol>	
		</fieldset>
		<fieldset>
	    	<input type="hidden" name="what" value="deleteEtd" /><br />
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
			url: "<?php echo HTTP_XML;?>/autocompleteEtd.php", // url cible du script PHP
			async: true, // mode asynchrone
			data: "", // données envoyées
			
			success: function(xml){ // Lorsque le PHP à renvoyé une réponse
				elementsArray = new Array();
				$(xml).find('element').each(function(){ // pour chaque "element"
					elementsArray.push($(this).text()); // ajout dans le tableau
				});
				$("#autoEtd").autocomplete(elementsArray,{
					multiple: true,
					mustMatch: true,
					autoFill: true
				}); 
			}
		});
	});
</script>