//Déclaration de variable globale
var HTTP_CONTROLLER = "http://localhost/SRDA/application/controller";
var HTTP_INDEX = "http://localhost/SRDA/index.php";

function getListe(search) {
	if(search == null || search == false || search == "") {
		alert("Erreur : Champ vide !");
	} else {
		window.location = HTTP_INDEX + "?page=search&action=search&entry=" + search;
	}
}

//Ajax : Permet d'obtenir le forumlaire d'upload
function getUploadForm(id, login, subject) {
	//Appel Ajax qui permet d'obtenir le formulaire et la liste d'info d'un sujet
	$.ajax({
		type : "POST",
		cache : false,
		data : "id=" + id + "&login=" + login + "&subject=" + subject,
		url : HTTP_CONTROLLER + "/documentsController.php?action=uploadForm",
		success : function(html) {
			$('.form_upload').html(html);
			$('.tableSubject').hide();
		}
	});
}

//Ajax : Permet d'obtenir les détails d'un sujet.
function getDetailSubject(id_subject) {
	//Appel Ajax qui permet d'obtenir le formulaire et la liste d'info d'un sujet
	$.ajax({
		type : "POST",
		cache : false,
		data : "id_subject=" + id_subject,
		url : HTTP_CONTROLLER + "/documentsController.php?action=detailSubject",
		success : function(html) {
			$('.detailSubject').html(html);
			$('.tableSubject').hide();
		}
	});
}

//Permet de downloader tout les fichiers de rendu dans une archive
function downloadAllRendu(id_subject, id_creator) {
	$.ajax({
		type : "POST",
		cache : false,
		data : "id_subject=" + id_subject + "&id_creator=" + id_creator,
		url : HTTP_CONTROLLER + "/documentsController.php?action=downloadAllRendu",
		success : function(html) {
			$('.downloadAllRendu').hide();
			//On cache la div qui contiendra la réponse du serveur
			$('.downloadAllRendu').html(html);
			//On ajoute la réponse dans la div
			document.getElementById("uploadZip").click();
			//On simule un click sur le lien
		}
	});
}

//Ajax : Permet de supprimer un sujet.
function deleteSubject(id_creator, id_subject) {
	if(confirm("Voulez-vous vraiment supprimer ce fichier ? Cette action sera irréversible.")) {// Clic sur OK
		$.ajax({
			type : "POST",
			cache : false,
			data : "id_creator=" + id_creator + "&id_subject=" + id_subject,
			url : HTTP_CONTROLLER + "/documentsController.php?action=deleteSubject",
			success : function(html) {
				$('.deleteSubject').html(html);
				$('.tableSubject').hide();
			}
		});
	}
}

//Permet d'afficher un pop up au passage de la souris

function ShowPicture(id, Source) {
	if(Source == "1") {
		if(document.layers)
			document.layers['' + id + ''].visibility = "show"
		else if(document.all)
			document.all['' + id + ''].style.visibility = "visible"
		else if(document.getElementById)
			document.getElementById('' + id + '').style.visibility = "visible"
	} else if(Source == "0") {
		if(document.layers)
			document.layers['' + id + ''].visibility = "hide"
		else if(document.all)
			document.all['' + id + ''].style.visibility = "hidden"
		else if(document.getElementById)
			document.getElementById('' + id + '').style.visibility = "hidden"
	}
}