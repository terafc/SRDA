//Déclaration de variable globale
var HTTP_CONTROLLER = "http://"+window.location.hostname+"/administration/controller";
var HTTP_INDEX = "http://"+window.location.hostname+"/administration/indexAdministration.php";


//Permet de confirmer la réinitialisation de l'application :
function confirmReset(){
	if (confirm("Voulez-vous vraiment réinitialiser l'application ? \nCette action videra les tables (sujet, notification, log_email et upload), videra le dossier '/file' et sera irréversible. \n\nContinuer ?")) { // Clic sur OK
		window.location = HTTP_INDEX+"?page=reset&action=resetApp";
	}
}
