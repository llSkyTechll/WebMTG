<?php
require('controller/Controllers.php');

try {
	if (isset($_GET['action'])) {
		switch ($_GET['action'] ) {
			case 'choixPays':
				choixPays();
				break;
			case 'ListeProvinces':	
				ListeProvinces();
				break;
			case 'videHistorique':	
				videHistorique();
				break;
			case 'inscription':	
				inscription();
				break;
			case 'validation':	
				validation();
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
