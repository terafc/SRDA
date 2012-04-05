<?php if(!empty($liste)){ ?>
<div id="articles">
	<div class="tableDiv articles">
		<h4>Vos collègues</h4>
		<table class="tableExemple">
			<th width=125>Nom</th>
			<th width=125>Prenom</th>
			<th>Email</th>
			<?php foreach($liste as $valeur) { ?>
				<tr>
					<td>
						<?php
						if(!empty($valeur['promo'])){
							$half_path=strtolower($valeur['promo']).'/'.$valeur['id'].'.png';
							echo getTrombi($half_path,$valeur['nom']);
						}
						else{
							echo $valeur['nom'];
						}
						  ?>
					</td>
					<td><?php echo $valeur['prenom']?></td>
					<td><?php echo "<a href=mailto:" . $valeur['email'] . ">" . $valeur['email'] . "</a>";?></td>
				</tr>
			<?php }?>
		</table>
	</div>
</div>
<?php }else{?>
	<div><i>Filière inexistante...</i></div>
<?php }?>