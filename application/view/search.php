<div id="articles">
<h4>Résultats de votre recherche</h4>
<h5>Etudiant</h5>
<?php if(!empty($search['Etudiant'])){?>
	<div class="tableDiv">
		<div class="scroll500">
			<table class="tableExemple">
				<tr>
					<th>Nom</th>
					<th>Prénom</th>
					<th>Email</th>
				</tr>
				<?php
					foreach($search["Etudiant"] as $value){
						echo "<tr>";
							echo "<td>".$value['nom']."</td>";
							echo "<td>".$value['prenom']."</td>";
							echo "<td><a href=mailto:".$value['email'].">".$value['email']."</a></td>";
						echo "</tr>";
					}
				?>
			</table>
		</div>
	</div>
	<?php }else{?>
	<div>Aucun résultat trouvé...</div>
	<?php }?>
<br/><hr>
<h5>Enseignant</h5>
<?php if(!empty($search['Enseignant'])){?>
	<div class="tableDiv">
		<div class="scroll500">
			<table class="tableExemple">
				<tr>
					<th>Nom</th>
					<th>Prénom</th>
					<th>Email</th>
				</tr>
				<?php
					foreach($search["Enseignant"] as $value){
						echo "<tr>";
							echo "<td>".$value['nom']."</td>";
							echo "<td>".$value['prenom']."</td>";
							echo "<td><a href=mailto:".$value['email'].">".$value['email']."</a></td>";
						echo "</tr>";
					}
				?>
			</table>
		</div>
	</div>
	<?php }else{?>
	<div>Aucun résultat trouvé...</div>
	<?php }?>
</div>