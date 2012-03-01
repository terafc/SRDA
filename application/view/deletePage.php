<?php 
	//Si des sujets ont été crées.
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
								$attrTRS = " class=\"clickRow\" onclick=\"deleteSubject('".base64_encode($value['createur'])."','".base64_encode($value['id'])."')\" onmouseover=\"$(this).addClass('clickRowHover');\" onmouseout=\"$(this).removeClass('clickRowHover')\" ";
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
		<div class="deleteSubject articles"></div>
	<?php }
	else{?>
		<div class="tableSubject articles"><i>Vous n'avez soumis aucun sujet...</i></div>
	<?php }
?>
