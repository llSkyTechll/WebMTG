<?php
require('model/ManagerSales.php');

function packList()
{
  $wishedOrder = 'edition';
  if (!empty($_POST['packorder'])){
    $wishedOrder = htmlentities($_POST['packorder']);
  }
  $packs = new ManagerSales;
  $resultPacks=$packs->getPacks($wishedOrder);
  require('view/viewAccueil.php');
}

function ListeProvinces(){
   if (!empty($_POST['pays'])){
      $codePays = htmlentities($_POST['pays']);
      $NomPays = new ManagerSales;
      $resultatNomPays =$NomPays->getNomPays($codePays);
      $NomProvince = new ManagerSales;
      $resultatProvince =$NomProvince->getNomProvince($codePays);
      require('view/ViewProvince.php');
   }
   else {
      if (!empty($_COOKIE['pays'])) {
         $message = "Dernière Recherche : ".$_COOKIE['pays'];
      }
      else {
         $message = "Aucune historique. Faire une recherche au préalable";
      }

      require('view/ViewHistorique.php');
   }
}

function inscription(){
   require('view/ViewInscription.php');
}

function validation(){
   require('view/ViewValidation.php');
}
function videHistorique(){
   setcookie("pays", false, time() - 3600);
   $Pays = new ManagerSales;
   $resultatPays=$Pays->getPays();
   require('view/ViewPays.php');
}
?>
