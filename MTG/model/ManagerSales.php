<?php

require_once("model/Connexion.php"); // on pourra utiliser dbConnexion

class ManagerSales extends Connexion // hérite de la classe connexion
{
   // Renvoie la liste des membres triés par nom dans l'ordre alphabétique
   public function getPacks($wishedOrder) {
     $sql = 'SELECT edition, price, releasedate, picture, description
             FROM tbl_packs
             ORDER BY '.$wishedOrder;
	   $packs = self::getConnexion()->prepare($sql);
     $packs->execute();
	   return $packs;
    }
}

?>
