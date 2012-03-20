<div class="alignCenter formTitle"><h2>Suppression des notifications</h2></div>
<div class="formTitle">En fonction de la deadline :</div>
<br/>
<div class="formContainer">
	<div id="notifDeadline">
		<form action="<?php echo HTTP_INDEX;?>?page=notification&action=deleteNotif" method="post">
				<div class="formRow">
					<div class="inlineBlockMiddle formTd1">Supprimer toutes les notifications dont la deadline est antérieur à :</div>
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
					<input type="submit" class="formSubmit" value="Supprimer"/>
				</div>
		</form>
	</div>
</div>
<br/>
<div class="formTitle">En fonction du(des) destinataire(s) des notifications :</div>
<br/>
<div class="formContainer">
	<div id="notifDest">
		<form action="<?php echo HTTP_INDEX;?>?page=notification&action=deleteNotifFrom" method="post">
				<div class="formRow">
					<div class="inlineBlockTop formTd1">Supprimer toutes les notifications dont le(s) destinataire(s) sont:</div>
					<div class="inlineBlockTop formTd2">
						<textarea id="autoAll" class="inlineBlockTop" name="listeId" required="required" placeholder="Entrer un nom suivi d'un prénom ou une promotion..."></textarea>
					</div>
				</div>
				<div class="alignCenter marginTop10">
					<input type="submit" class="formSubmit" value="Supprimer"/>
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
				$("#autoAll").autocomplete(elementsArray,{
					multiple: true,
					mustMatch: true,
					autoFill: true
				}); 
			}
		});
	});
</script>