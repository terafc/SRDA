<div class="alignCenter formTitle"><h1>Gestion des Emails</h1></div>
<hr />
<div class="alignCenter formTitle"><h2>Suppressions des Logs d'email</h2></div>
<div class="formTitle">En fonction de la date d'envoi :</div>
<br/>
<div class="formContainer">
	<div id="deleteEmailDate">
		<form action="<?php echo HTTP_INDEX;?>?page=email&action=deleteEmail" method="post">
			<div>
				<div class="inlineBlockMiddle formTd1">Supprimer tout les Emails dont la date d'envoi est antérieur à :</div>
				<div class="inlineBlockMiddle formTd2">
					<select class="dateSubmit inlineBlockMiddle" name="d">
						<?php 
							for ($i=1; $i <= 31; $i++) {
								$i<10?$a=0:$a="";
								$i==date("d")?$select=" selected='selected'":$select="";
								echo "<option".$select.">".$a.$i."</option>";
							}
						?> 
					</select>
					<select class="dateSubmit inlineBlockMiddle" name="m">
						<?php 
							for ($i=1; $i <= 12; $i++) { 
								$i<10?$a=0:$a="";
								$i==date("m")?$select=" selected='selected'":$select="";
								echo "<option".$select.">".$a.$i."</option>";
							}
						?> 
					</select>
					<select class="dateSubmit inlineBlockMiddle" name="Y">
						<?php 
							for ($i=date("Y"); $i <= date("Y")+1; $i++) { 
								$i<10?$a=0:$a="";
								$i==date("Y")?$select=" selected='selected'":$select="";
								echo "<option".$select.">".$a.$i."</option>";
							}
						?>
					</select>
				</div>
			</div>
			<div class="alignCenter marginTop10">
				<input class="formSubmit" type="submit" value="Supprimer"/>
			</div>
		</form>
	</div>
</div>
<hr />
<div class="alignCenter formTitle"><h2>Afficher les Logs</h2></div>
<div class="formTitle">Afficher TOUT les logs :</div>
<br/>
<div class="formContainer">
	<div id="showLogAll">
			<a href="<?php echo HTTP_INDEX;?>?page=email&action=getAllLogEmail">SHOW !</a>
	</div>
</div>
<br/>
<div class="formTitle">Afficher des Logs particuliers :</div>
<br/>
<div class="formContainer">
	<div id="showLogOf">
		<form method="post" action="<?php echo HTTP_INDEX;?>?page=email&action=getLogEmailOf">
			<div class="formRow">
				<div class="inlineBlockTop formTd1">Afficher tout les Logs de :</div>
				<div class="inlineBlockTop formTd2">
					<textarea class="autoAll" class="inlineBlockTop" name="listeId" required="required" placeholder="Entrer un nom suivi d'un prénom ou une promotion..."></textarea>
				</div>
			</div>
			<div class="alignCenter marginTop10">
				<input class="formSubmit" type="submit" value="Afficher"/>
			</div>
		</form>
	</div>
</div>
<hr />
<div class="alignCenter formTitle"><h2>Envoyer un Email</h2></div>
<br/>
<div class="formContainer">
	<div id="sendEmail">
		<form method="post" action="<?php echo HTTP_INDEX;?>?page=email&action=sendEmail" enctype="multipart/form-data">
			<div class="formRow">
				<div class="inlineBlockTop formTd2">Destinataire :</div>
				<div class="inlineBlockTop formTd1">
					<textarea class="autoAll" class="inlineBlockTop" name="listeId" required="required" placeholder="Entrer un nom suivi d'un prénom ou une promotion..."></textarea>
				</div>
			</div>
			<div class="formRow">
				<div class="inlineBlockMiddle formTd2">Sujet :</div>
				<div class="inlineBlockMiddle formTd1">
					<input type="text" class="inlineBlockMiddle" name="sujet" required="required" placeholder="Titre..."/>
				</div>
			</div>
			<div class="formRow">
				<div class="inlineBlockTop formTd2">Message :</div>
				<div class="inlineBlockTop formTd1">
					<textarea name="mess" required="required" placeholder="Corps du message..." class="inlineBlockTop"></textarea>
				</div>
			</div>
			<div class="formRow">
				<div class="inlineBlockMiddle formTd2">Pièce jointe :</div>
	   			<div class="inlineBlockMiddle formTd1">
	   				<input type="hidden" name="MAX_FILE_SIZE" value="20971520" />
	    			<input type="file" class="inlineBlockMiddle" name="fichier" id="fichier" />
				</div>
			</div>
			<div class="alignCenter marginTop10">
				<input class="formSubmit" type="submit" value="Envoyer"/>
			</div>
		</form>
	</div>
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
			url: "<?php echo HTTP_XML;?>/autocompleteAll.php", // url cible du script PHP
			async: true, // mode asynchrone
			data: "", // données envoyées
			
			success: function(xml){ // Lorsque le PHP à renvoyé une réponse
				elementsArray = new Array();
				$(xml).find('element').each(function(){ // pour chaque "element"
					elementsArray.push($(this).text()); // ajout dans le tableau
				});
				$(".autoAll").autocomplete(elementsArray,{
					multiple: true,
					mustMatch: true,
					autoFill: true
				}); 
			}
		});
	});
</script>