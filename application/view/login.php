<?php
	if(isset($html)){
		echo $html;
	}
	else{?>
		<div id="articles">
		<center><h4>Tout d'abord, veuillez vous connecter.</h4></center>
		<form action="<?php echo HTTP_URL;?>/login/login" method="post" class="inscrire">
			<fieldset class="identification">
				<legend>Identification</legend>
				<ol>
					<li>
		    			<td><label for="id"><strong>Identifiant :</strong></label></td>
		    			<td><input type="text" name="id" id="id" size="25" required="required"/></td>
					</li>
					<li>
		    			<td><label for="mdp"><strong>Mot de Passe :</strong></label></td>
		    			<td><input type="password" name="mdp" id="mdp" size="25" required="required"/></td>
					</li>
					<?php
						if(isset($error)){?>
							<li>
								<td><?php echo $error;?></td>
							</li>
					<?php
						}
					?>
				</ol>
			</fieldset>
			<fieldset>
				<button type=submit>S&rsquo;identifier</button>
			</fieldset>
		</form>
		<br/>
		<form action="<?php echo HTTP_URL;?>/login/remindMdp" method="post" class="inscrire">
			<fieldset class="identification">
				<legend>Mot de passe oublié ?</legend>
				<ol>
					<li>
		    			<td><label for="id"><strong>Identifiant :</strong></label></td>
		    			<td><input type="text" name="idUser" size="25" required="required"/></td>
					</li>
					<?php
						if(isset($message2)){?>
							<li>
								<td><?php echo $message2;?></td>
							</li>
					<?php
						}
					?>
				</ol>
			</fieldset>
			<fieldset>
				<button type=submit>Envoyer</button>
			</fieldset>
		</form>
		</div>
	<?php }
?>