<?php
session_start();

require('controller/Controllers.php');

try {
	if (isset($_GET['action'])) {
		switch ($_GET['action'] ) {
			case 'accueil':
				Accueil();
				break;
			case 'panier':
				Panier();
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
			case 'article':
				Article();
				break;
			case 'deconnexion':
				Deconnexion();
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
  require 'view/viewErreur.php';
 }
 catch (Exception $ex) {
  $msgErreur = $ex->getMessage();
  require 'view/viewErreur.php';
 }
?>
