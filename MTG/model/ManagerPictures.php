<?php

require_once("model/Connexion.php"); // on pourra utiliser dbConnexion

class ManagerPictures extends Connexion // hérite de la classe connexion
{
  //  // Renvoie la liste des membres triés par nom dans l'ordre alphabétique
  //  public function CreateUser($firstname, $lastname, $email, $password) {
  //    $sql = 'INSERT INTO tbl_customers (firstname, lastname, email, password)
  //            VALUES ("'.$firstname.'", "'.$lastname.'", "'.$email.'", "'.$password.'")';
	//    $user = self::getConnexion()->prepare($sql);
  //    $user->execute();
	//    return $user;
  //  }
  public function GetAllPictures($order){
    $sql = 'SELECT * FROM tbl_packs WHERE packid = "'.$order.'"';
    $Pack = self::getConnexion()->prepare($sql);
    $Pack->execute();
    return $Pack;
  }
   public function GetSpecificPicture($packId){
     $sql = 'SELECT * FROM tbl_packs WHERE packid = "'.$packId.'"';
     $Pack = self::getConnexion()->prepare($sql);
     $Pack->execute();
	   return $Pack;
   }


  //  public function GetUserInfo($email, $password){
  //    $sql = 'SELECT custid, firstname, lastname, email
  //            FROM tbl_customers
  //            WHERE email = "'.$email.'" AND  password = "'.$password.'"';
  //    $userInfo = self::getConnexion()->prepare($sql);
  //    $userInfo->execute();
  //    return $userInfo;
  //  }
}

?>
