<?php 
	//Si l'enseignant à des documents à rendre
	if(!empty($sujetDest)){?>
		<div class="tableSubject articles">
			<h4>Vos Sujets de Rendu :</h4>
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
		<div class="tableSubject articles"><i>Vous n'avez aucun documents à envoyer...</i></div>
	<?php }
	//Si l'enseignant à crée des sujets.
	if(!empty($sujetCreator)){?>
		<div class="tableSubject articles">
			<h4>Vos Sujets :</h4>
			<div class="tableDiv">
				<div class="scroll500">
					<table class="tableExemple">
						<tr>
							<th>Titre</th>
							<th>Syntaxe</th>
							<th>Format</th>
							<th>Deadline</th>
							<th>Description</th>
						</tr>
						<?php
							foreach ($sujetCreator as $value) {
								$attrTRS = " class=\"clickRow\" onclick=\"getDetailSubject('".$value['id']."')\" onmouseover=\"$(this).addClass('clickRowHover');\" onmouseout=\"$(this).removeClass('clickRowHover')\" ";
								echo "<tr ".$attrTRS.">";
									echo "<td>".$value['titre']."</td>";
									echo "<td>".$value['syntaxe']."</td>";
									echo "<td>".$value['format']."</td>";
									echo "<td>".$value['deadline']."</td>";
									echo "<td>".$value['description']."</td>";
								echo "</tr>";
							}
						?>
					</table>
				</div>
			</div>
		</div>
		<div class="detailSubject articles"></div>
	<?php }
	else{?>
		<div class="tableSubject articles"><i>Vous n'avez soumis aucun sujet...</i></div>
	<?php }
?>
