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
    public function AddOrderContent($customerorder,$selectedpack,$chosenquantity){
      $sql =  'call AddOrderContent(:customerorder,:selectedpack,:chosenquantity)'; 
      $OrderContent = self::getConnexion()->prepare($sql);
      $OrderContent->bindparam('customerorder',$customerorder,pdo::PARAM_STR,999);
      $OrderContent->bindparam('selectedpack',$selectedpack,pdo::PARAM_STR,999);
      $OrderContent->bindparam('chosenquantity',$chosenquantity,pdo::PARAM_STR,999);
      $OrderContent->execute();
      return $OrderContent;
    }
    public function CreateOrder($customerid){
      $sql =  'call CreateOrder(:customerid)'; 
      $Customer = self::getConnexion()->prepare($sql);
      $Customer->bindparam('customerid',$customerid,pdo::PARAM_STR,999);
      $Customer->execute();
      return $Customer;
    }
    public function UpdateOrder($customerid){
      $sql =  'call UpdateOrder(:customerid)'; 
      $UpdateOrder = self::getConnexion()->prepare($sql);
      $UpdateOrder->bindparam('customerid',$customerid,pdo::PARAM_STR,999);
      $UpdateOrder->execute();
      return $UpdateOrder;
    }
  }
?>
