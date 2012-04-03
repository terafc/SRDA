<!DOCTYPE html>
<html>
	<head>
		<title>SRDA</title>
		<meta charset="UTF-8"/>
		<meta http-equiv="Content-type" content="text/html;charset=UTF-8"/> 
		<link rel="stylesheet" type="text/css" href="<?php echo HTTP_CSS;?>/style.css"/>
		<script src="<?php echo HTTP_JS;?>/jquery-1.6.2.min.js" type="text/javascript"></script>
		<script src="<?php echo HTTP_JS;?>/jquery.autocomplete.min.js" type="text/javascript"></script>
		<script type="text/javascript" src="<?php echo HTTP_JS;?>/function.js"></script>
	</head>
	<body>
		<div id="all">
			<div id="header">
				<div class="inlineBlockMiddle">
					<img src="<?php echo HTTP_IMG;?>/SRDA1.png"/> 
					<br/>
					<h3>
						Espace Administrateur
					</h3>
				</div>
				<a href="http://fakeuser:fakepass@localhost/srda/administration/logout/">Déconnexion</a>
				<div class="lol">
					<img src="<?php echo HTTP_IMG;?>/admin.gif"/>
				</div>
					
				<hr>
			</div>
			<ul id="nav-one" class="dropmenu">
				<li><a href="<?php echo HTTP_URL;?>/accueil/show" class="lien1 aNormal" onmouseover="$(this).removeClass('aNormal').addClass('aHover')" onmouseout="$(this).removeClass('aHover').addClass('aNormal')">Accueil</a></li>
				<li><a href="<?php echo HTTP_URL;?>/etudiant/show" class="lien3 aNormal" onmouseover="$(this).removeClass('aNormal').addClass('aHover')" onmouseout="$(this).removeClass('aHover').addClass('aNormal')">Etudiants</a></li>
				<li><a href="<?php echo HTTP_URL;?>/enseignant/show" class="lien3 aNormal" onmouseover="$(this).removeClass('aNormal').addClass('aHover')" onmouseout="$(this).removeClass('aHover').addClass('aNormal')">Enseignants</a></li>
				<li><a href="<?php echo HTTP_URL;?>/sujet/show" class="lien3 aNormal" onmouseover="$(this).removeClass('aNormal').addClass('aHover')" onmouseout="$(this).removeClass('aHover').addClass('aNormal')">Sujets</a></li>
				<li><a href="<?php echo HTTP_URL;?>/notification/show" class="lien3 aNormal" onmouseover="$(this).removeClass('aNormal').addClass('aHover')" onmouseout="$(this).removeClass('aHover').addClass('aNormal')">Notifications</a></li>
				<li><a href="<?php echo HTTP_URL;?>/email/show" class="lien3 aNormal" onmouseover="$(this).removeClass('aNormal').addClass('aHover')" onmouseout="$(this).removeClass('aHover').addClass('aNormal')">Email</a></li>
				<li><a href="javascript:void()" class="lien2 aNormal" onclick="confirmReset();return false;" onmouseover="$(this).removeClass('aNormal').addClass('aHover')" onmouseout="$(this).removeClass('aHover').addClass('aNormal')">Reset App</a></li>
			</ul>
			<div id="contenu">

