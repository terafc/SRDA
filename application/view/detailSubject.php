<div class="tableDiv articles">
	<div id="subjInfo">
		<h4>Titre : <i><?php echo $currSujInfo['titre'];?></i></h4>
	</div>
	<div class="scroll500">
		<table class="tableExemple">
			<tr>
				<th>Nom & Prénom</th>
				<th>DatePost</th>
				<th>Statut</th>
			</tr>
			<?php
				foreach ($listeDest as $value) {
					//On ajoute une class en fonction si du destinataire, si il a rendu un sujet ou pas.
					if($value['subjectValid']){
						$attrTR = " class=\"submitedRow\" ";
					}
					else{
						$attrTR = "  class=\"unsubmitedRow\" ";
					}
					echo "<tr ".$attrTR.">";
						echo "<td>".$value['nom']." ".$value['prenom']."</td>";
						if($value['subjectValid']){
							echo "<td class='alignCenter'>".$value['datePostSubject']."</td>";
							echo "<td>Rendu =)</td>";
						}
						else{
							echo "<td class='alignCenter'>-</td>";
							echo "<td>Non Rendu X</td>";
						}
					echo "</tr>";
				}
			?>
		</table>
	</div>
	<br/>
	<div class="alignCenter">
		<input type='button' value='Télécharger' onclick="downloadAllRendu('<?php echo $currSujInfo['id'];?>','<?php echo $currSujInfo['createur'];?>')"/>
	</div>
</div>
<div class="downloadAllRendu"></div>
