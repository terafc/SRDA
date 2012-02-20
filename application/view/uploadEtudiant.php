<?php
	if(!empty($sujetDest)){?>
		<div class="tableSubject" id="articles">
			<h4> Envoyer un fichier </h4>
			<div class="tableDiv">
				<div class="scroll500">
					<table class="tableExemple">
						<tr>
							<th>Titre</th>
							<th>DeadLine</th>
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
									echo "<td>".$value['deadline']."</td>";
									echo "<td>".$value['createur']."</td>";
									if($value['submit']){
										echo "<td>Rendu =)</td>";
									}else{
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
		<div id="articles">Aucun sujet... Vous n'avez aucun documents à rendre ! =)</div>
		<?php
	}
?>
