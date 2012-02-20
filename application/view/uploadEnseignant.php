<div id="articles">
	<form class="inscrire" action="<?php echo HTTP_INDEX;?>?page=documents&action=verifUpload" method="post" enctype="multipart/form-data">
		<fieldset class="information">
			<legend> Sujet à rendre </legend>
			<ol>
				<li>
					<td><label for="sujet"><strong>Sujet :</strong></label></td>
					<td><label for="sujet"><input type="text" required="required" name="title" placeholder="Titre du sujet" /></label></td>
				</li>
				<li>
					<td><label for="format"><strong>Format :</strong></label></td>
					<td>
						<label for="format">
							<select name="format">
								<option value=".pdf">PDF</option>
								<option value=".doc">Microsof Word</option>
								<option value=".docx">Microsoft Word 2007</option>
								<option value=".jpeg">JPEG</option>
								<option value=".gif">GIF</option>
								<option value=".png">PNG</option>
								<option value=".zip">ZIP</option>
								<option value=".rar">RAR</option>
								<option value=".wav">WAV</option>
							</select>
						</label>
					</td>
				</li>
				<li>
					<td><label for="syntaxe"><strong>Syntaxe :</strong></label></td>
					<td><label for="syntaxe"><input name="syntaxe" type="text" required="required" placeholder="[RT]@Prenom_@Nom[@ID]" value="[RT]@Prenom_@Nom[@ID]"/></label></td>
				</li>
		<div class="NB">NB : Utilisez les mots clés @Prenom, @Nom, @ID, et @Date (Format : JJ-MM-AAAA) pour désigner automatiquement les caractéristiques des destinataires et la date.</div>
		</ol>
		</fieldset>
			<fieldset>
			<legend>Deadline</legend>
				<ol>
					<li>
						<td><label for="day"><strong>Date :</strong></label></td>
						<td><label for="day"><select class="dateSubmit" name="d">
						<?php 
						for ($i=1; $i <= 31; $i++) {
							$i<10?$a=0:$a="";
							$i==date("d")+1?$select=" selected='selected'":$select="";
							echo "<option".$select.">".$a.$i."</option>";
						}
						?> </select>
						<select class="dateSubmit" name="m">
						<?php 
						for ($i=1; $i <= 12; $i++) { 
							$i<10?$a=0:$a="";
							$i==date("m")?$select=" selected='selected'":$select="";
							echo "<option".$select.">".$a.$i."</option>";
						}
						?> </select>
						<select class="dateSubmit" name="Y">
						<?php 
						for ($i=date("Y"); $i <= date("Y")+1; $i++) { 
							$i<10?$a=0:$a="";
							$i==date("Y")?$select=" selected='selected'":$select="";
							echo "<option".$select.">".$a.$i."</option>";
						}
						?>
						</select></label></td>
					</li>
					<li>
						<td><label for="hour"><strong>Heure :</strong></label></td>
						<td><label for="hour"><select class="dateSubmit" name="H">
						<?php 
						for ($i=0; $i <= 23; $i++) { 
							$i<10?$a=0:$a="";
							$i==date("H")?$select=" selected='selected'":$select="";
							echo "<option".$select.">".$a.$i."</option>";
						}
						?> </select>
						<select class="dateSubmit" name="i">
						<?php 
						for ($i=0; $i <= 59; $i++) { 
							$i<10?$a=0:$a="";
							$i==date("i")?$select=" selected='selected'":$select="";
							echo "<option".$select.">".$a.$i."</option>";
						}
						?> </select></label></td>
					</li>
				</ol>
			</fieldset>
			<fieldset>
				<legend>Autres Informations</legend>
					<ol>
						<li>
							<td><label for="description"><strong>Description :</strong></label></td>
							<td><label for="description"><textarea class="textareaListe" name="description" required="required"></textarea></label></td>
						</li>
						<li>
							<td><label for="destinataire"><strong>Destinataire :</strong></label></td>
							<td><label for="destinataire"><textarea name="destinataire" id="destinataire" required="required"></textarea></label></td>
						</li>
			</fieldset>
			<fieldset>
				<input name="what" type="hidden" required="required" value="createSubject"/>
				<button type="submit" value="Soummettre">Soumettre</button>
			</fieldset>
	</form>
</div>

<script type="text/javascript">
	/*
	 * SCRIPT POUR L'AUTOCOMPLETE
	 */
	// Lorsque la totalité de la page est chargée
	$(document).ready(function() {
		$.ajax({ // Requete ajax
			type: "POST", // envoie en POST
			url: "<?php echo HTTP_XML;?>/autocompleteName.php", // url cible du script PHP
			async: true, // mode asynchrone
			data: "", // données envoyées
			
			success: function(xml){ // Lorsque le PHP à renvoyé une réponse
				elementsArray = new Array();
				$(xml).find('element').each(function(){ // pour chaque "element"
					elementsArray.push($(this).text()); // ajout dans le tableau
				});
				$("#destinataire").autocomplete(elementsArray,{
					multiple: true,
					mustMatch: true,
					autoFill: true
				}); 
			}
		});
	});
</script>