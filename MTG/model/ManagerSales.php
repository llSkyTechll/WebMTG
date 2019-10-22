<?php

require_once("model/Connexion.php"); // on pourra utiliser dbConnexion

class ManagerSales extends Connexion // hérite de la classe connexion
{
   // Renvoie la liste des membres triés par nom dans l'ordre alphabétique
   public function getPacks($wishedOrder) {
     $sql = 'SELECT edition, price, releasedate, picture, description FROM tbl_packs order by :order';
	   $packs = self::getConnexion()->prepare($sql);
     $packs->bindparam('order',$wishedOrder,pdo::PARAM_STR);
     $packs->execute();
	   return $packs;
    }

	public function getNomProvince($codePays) {
		$sql = 'SELECT tbl_province.code_pays,nom_pays,nom_province FROM tbl_province inner join tbl_pays
		on tbl_pays.code_pays = tbl_province.code_pays
		where tbl_province.code_pays = :code_pays order by nom_province';
		$province = self::getConnexion()->prepare($sql);   // exécution directe
		$province->bindparam('code_pays',$codePays,pdo::PARAM_INT)  ;
		$province->execute();
		return $province;
	}
	public function getNomPays($codePays) {
		$sql = 'SELECT nom_pays FROM tbl_pays where code_pays = :code_pays ';
		$nomPays = self::getConnexion()->prepare($sql);   // exécution directe
		$nomPays->bindparam('code_pays',$codePays,pdo::PARAM_INT)  ;
		$nomPays->execute();
		return $nomPays;
	}

}

?>
