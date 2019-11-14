<?php
  require_once("model/Connexion.php"); // on pourra utiliser dbConnexion

  class ManagerOrders extends Connexion // hérite de la classe connexion
  {
     // Renvoie la liste des membres triés par nom dans l'ordre alphabétique
     public function GetCart($custid) {
       $sql = 'SELECT cartcontentid, cartid, quantity, packid, edition, picture, description
               FROM tbl_cartcontent
               INNER JOIN tbl_cart ON tbl_cart.cartid = tbl_cartcontent.cartid
               INNER JOIN tbl_packs ON tbl_packs.packid = tbl_cartcontent.packid
               WHERE custid = "'.$custid.'"';
  	   $cart = self::getConnexion()->prepare($sql);
       $cart->execute();
  	   return $cart;
      }
  }
?>
