<?php
require('controller/Controllers.php');

try {
	if (isset($_GET['action'])) {
		switch ($_GET['action'] ) {
			case 'accueil':
				Accueil();
				break;
			case 'panier':
				ListeProvinces();
				break;
			case 'connexion':
				Connexion();
				break;
			case 'inscription':
				Inscription();
				break;
			case 'historique':
				UserConnexion();
				break;
			case 'validationInscription':
				ValiderInformationInscription();
				break;
			case 'userConnexion':
				UserConnexion();
				break;
			default :
				throw new Exception('Aucune page spécifique demandée');
		}
	}
	else {
		packList();
	}
}

catch (PDOException $e) {
  $msgErreur = $e->getMessage();
  require 'view/vueErreur.php';
 }
 catch (Exception $ex) {
  $msgErreur = $ex->getMessage();
  require 'view/vueErreur.php';
 }
?>
