<?php if(!empty($liste)){ ?>
	<div class="tableDiv articles">
		<h4>Vos collègues</h4>
		<table class="tableExemple">
			<th width=125>Nom</th>
			<th width=125>Prenom</th>
			<th>Email</th>
			<?php foreach($liste as $valeur) { ?>
				<tr>
					<td><?php echo $valeur['nom']?></td>
					<td><?php echo $valeur['prenom']?></td>
					<td><?php echo "<a href=mailto:".$valeur['email'].">".$valeur['email']."</a>"; ?></td>
				</tr>
			<?php } ?>
		</table>
	</div>
<?php }else{ ?>
	<div><i>Filière inexistante...</i></div>
<?php } ?>