<?php

require_once("model/Connexion.php"); // on pourra utiliser dbConnexion

class ManagerUsers extends Connexion // hérite de la classe connexion
{
   // Renvoie la liste des membres triés par nom dans l'ordre alphabétique
   public function createUser($firstname, $lastname, $email, $password) {
     $sql = 'INSERT INTO tbl_customers (firstname, lastname, email, password)
             VALUES ("'.$firstname.'", "'.$lastname.'", "'.$email.'", "'.$password.'")';
	   $user = self::getConnexion()->prepare($sql);
     $user->execute();
	   return $user;
   }

   public function GetEmails($email){
     $sql = 'SELECT email FROM tbl_customers WHERE email = "'.$email.'"';
     $userEmail = self::getConnexion()->prepare($sql);
     $userEmail->execute();
	   return $userEmail;
   }

   public function GetUserInfo($email, $password){
     $sql = 'SELECT custid, firstname, lastname, email
             FROM tbl_customers
             WHERE email = ".$email."'
   }
}

?>
