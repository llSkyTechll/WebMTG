<?php
require('controller/Controllers.php');

try {
	if (isset($_GET['action'])) {
		switch ($_GET['action'] ) {
			case 'accueil':
				choixPays();
				break;
			case 'panier':
				ListeProvinces();
				break;
			case 'connexion':
				videHistorique();
				break;
			case 'inscription':
				inscription();
				break;

			default :
				throw new Exception('Aucune page spécifique demandée');
		}
	}
	else {
		choixPays();
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
