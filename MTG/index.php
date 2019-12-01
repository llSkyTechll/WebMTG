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
			case 'deconnexion':
				Deconnexion();
				break;
			case 'commande':
				Commande();
				break;
			case 'AjouterPanier':
			AjouterPanier();
				break;
			case 'RetirerPanier':
			RetirerPanier();
				break;
			case 'AjouterCommmande':
			AjouterCommmande();
				break;
			default :
				throw new Exception('Aucune page spécifique demandée');
		}
	}
	else {
		Accueil();
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
