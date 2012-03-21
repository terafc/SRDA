<div class="alignCenter formTitle"><h2>Suppression de sujet</h2></div>
<div class="formTitle">En fonction de la deadline :</div>
<br/>
<div class="formContainer">
	<div id="sujetDeadline">
		<form action="<?php echo HTTP_URL;?>/sujet/deleteSubject" method="post">
			<div class="formRow">
				<div class="inlineBlockMiddle formTd1">Supprimer tout les sujets dont la deadline est antérieur à :</div>
				<div class="inlineBlockMiddle formTd2">
					<select class="dateSubmit  inlineBlockMiddle" name="d">
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
<br/>
<div class="formTitle">En fonction de la créateur du sujet :</div>
<br/>
<div class="formContainer">
	<div id="sujetCreateur">
		<form action="<?php echo HTTP_URL;?>/sujet/deleteSubjectFrom" method="post">
				<div class="formRow">
					<div class="inlineBlockTop formTd1">Supprimer tout les sujets dont le(s) créateur(s) sont :</div>
					<div class="inlineBlockTop formTd2">
						<textarea id="autoEns" class="inlineBlockTop" name="listeId" required="required" placeholder="Entrer un nom suivi d'un prénom ou une promotion..."></textarea>
					</div>
				</div>
				<div class="alignCenter marginTop10">
					<input class="formSubmit" type="submit" value="Supprimer"/>
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