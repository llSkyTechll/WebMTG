<?php
  require_once("model/Connexion.php"); // on pourra utiliser dbConnexion

  class ManagerOrders extends Connexion // hérite de la classe connexion
  {
    public function GetOrders($custid){
      $sql = 'SELECT *
              FROM tbl_order
              INNER JOIN tbl_ordercontent ON tbl_ordercontent.orderid = tbl_order.orderid
              INNER JOIN tbl_packs ON tbl_packs.packid = tbl_ordercontent.packid
              WHERE custid = '.$custid.'
              ORDER BY date DESC';
      $orders = self::getConnexion()->prepare($sql);
      $orders->execute();
      return $orders;
    }
  }
?>
