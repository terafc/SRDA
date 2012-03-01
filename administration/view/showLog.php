<br/>
<div class="tableDiv articles">
	<?php if(isset($log) && !empty($log)){?>
		<h2>Log des Emails</h2>
		<table class="tableExemple">
			<tr>
				<th>ID Destinataire</th>
				<th>Sujet</th>
				<th>Message</th>
				<th>Date d'envoi</th>
			</tr>
			<?php foreach ($log as $value) { ?>
			<tr>
				<td><?php echo $value['id_destinataire'];?></td>
				<td><?php echo $value['sujet'];?></td>
				<td><?php echo $value['message'];?></td>
				<td><?php echo $value['datePost'];?></td>
			</tr>	
			<?php }	?>
		</table>
	<?php } 
	else{ ?>
		<div>Aucun Email enregistré...</div>
	<?php } ?>
</div>
<br/>