<?php
require('model/ManagerPays.php');

function choixPays()
{
   $Pays = new ManagerPays;
   $resultatPays=$Pays->getPays();
   require('view/ViewPays.php');   
}

function ListeProvinces(){
   if (!empty($_POST['pays'])){
      $codePays = htmlentities($_POST['pays']);
      $NomPays = new ManagerPays;
      $resultatNomPays =$NomPays->getNomPays($codePays);
      $NomProvince = new ManagerPays;
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
   $Pays = new ManagerPays;
   $resultatPays=$Pays->getPays();
   require('view/ViewPays.php');  
}
?>