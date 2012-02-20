<?php 
	if(!empty($sujetDest)){?>
		<div class="tableSubject articles">
			<h4>A rendre :</h4>
			<div class="tableDiv">
				<div class="scroll500">
					<table class="tableExemple">
						<tr>
							<th>Titre</th>
							<th>Créateur</th>
							<th>Deadline</th>
							<th>Description</th>
							<th>Statut</th>
						</tr>
						<?php
							foreach ($sujetDest as $value) {
								//Si le fichier a déjà été rendu, on enlève les mouseover
								if($value['submit']){
									$attrTR = " class=\"submitedRow\" ";
								}
								else{//Sinon il est à rendre donc on ajoute les mouseover
									$attrTR = "  class=\"clickRow unsubmitedRow\" onclick=\"getUploadForm('".$value['id']."','".base64_encode(serialize($_SESSION['login']))."','".base64_encode(serialize($value))."')\" onmouseover=\"$(this).addClass('clickRowHover');\" onmouseout=\"$(this).removeClass('clickRowHover')\" ";
								}
								echo "<tr".$attrTR.">";
									echo "<td>".$value['titre']."</td>";
									echo "<td>".$value['createur']."</td>";
									echo "<td>".$value['deadline']."</td>";
									echo "<td>".$value['description']."</td>";
									if($value['submit']){
										echo "<td>Rendu ;)</td>";
									}
									else{
										echo "<td>Non Rendu X</td>";
									}
								echo "</tr>";
							}
						?>
					</table>
				</div>
			</div>
		</div>
		<div class="form_upload"></div>
	<?php }
	else{?>
		<div class="tableSubject articles"><i>Vous n'avez aucun sujet en cours, ni aucun sujet précédent...</i></div>
	<?php }
?>
