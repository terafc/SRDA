<?php if(!empty($liste)){ ?>
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
							echo ('<a href="javascript:void(0);"
							onMouseOver="return overlib(\'\',
								WIDTH, 84, HEIGHT, 113,LEFT,OFFSETX,30,OFFSETY,-50,BORDER,\'2\',
								BGCOLOR,\'#2F8CAE\',
								FGBACKGROUND,\'application/img/trombi/' . $valeur['promo'] . '/' . $valeur['id'] . '.png\');"
							onMouseOut="return nd();">'.$valeur['nom'].'');
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
<?php }else{?>
	<div><i>Filière inexistante...</i></div>
<?php }?>