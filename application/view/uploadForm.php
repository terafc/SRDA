<div id="articles">
	<form class="inscrire" action="<?php echo HTTP_URL;?>/documents/verifUpload" method="post" enctype="multipart/form-data">
		<fieldset>
			<legend>Rendre un document</legend>
			<ol>
				<li>
					<td><label for="titre"><strong>Titre :</strong></label></td> 
					<td><label for="titre"><?php echo $infoSubject['titre'];?></label></td>
				</li>
				<li>
					<td><label for="syntaxe"><strong>Syntaxe :</strong></label></td> 
					<td><label for="syntaxe"><?php echo $infoSubject['syntaxe'];?></label></td>
				</li>
				<li>
					<td><label for="format"><strong>Format :</strong></label></td> 
					<td><label for="format"><?php echo $infoSubject['format'];?></label></td>
				</li>
				<li>
					<td><label for="deadline"><strong>Deadline :</strong></label></td> 
					<td><label for="deadline"><?php echo $infoSubject['deadline'];?></label></td>
				</li>
				<input type="hidden" name="id_subject" value="<?php echo base64_encode($infoSubject['id']);?>" />
				<li>
					<td><label for="fichier"><strong>Fichier :</strong></label></td>
	    			<td>
	    				<label for="fichier">
	   						<input type="hidden" name="MAX_FILE_SIZE" value="20971520" />
	    					<input type="file" name="mon_fichier" id="mon_fichier" />
	    				</label>
	    			</td>
				</li>
			</ol>	
		</fieldset>
		<fieldset>
	    	<input type="hidden" name="what" value="submitUpload" /><br />
			<button type="submit" name="submit" value="Envoyer">Envoyer</button>
		</fieldset>
	</form>
</div>