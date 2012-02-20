<div id="articles">
<div class="alignCenter">
	Bienvenue <?php echo $resum_message;?> !
</div>
<br/>
<?php 
	if(!empty($notification)){ ?>
		<div>
			<fieldset class="notification">
				<legend><b>Vos notifications :</b></legend>
				<div class="tableDiv">
					<div class="scroll500">
						<table class="tableExemple">
							<tr>
								<th>Message</th>
								<th>Date Post</th>
							</tr>
							<?php
								foreach ($notification as $value) {
									echo "<tr>";
										echo "<td>".$value['message']."</td>";
										echo "<td>".$value['datePost']."</td>";
									echo "</tr>";
								}
							?>
						</table>
					</div>
				</div>
			</fieldset>
		</div>
	<?php } 
	else{ ?>
		<div class="notification">
			<i>Aucune notification.</i>
		</div>
		</div>
	<?php } ?>
