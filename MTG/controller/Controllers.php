<?php
  require('model/ManagerSales.php');
  require('model/ManagerUsers.php');

  function PackList()
  {
    $wishedOrder = 'edition';
    if (!empty($_POST['packorder'])){
      $wishedOrder = htmlentities($_POST['packorder']);
    }
    $packs = new ManagerSales;
    $resultPacks=$packs->GetPacks($wishedOrder);
    require('view/viewAccueil.php');
  }

  function UserInscription(){
    $firstname = 'test';
    $lastname = 'test2';
    $email    = 'test3@hotmail.com';
    $password = 'test4';
    $user = new ManagerUsers;
    $resultPacks = $user->CreateUser($firstname,$lastname, $email, $password);
    require('view/viewAccueil.php');
  }

  function ValiderInformationInscription(){
    if (!empty($_POST['email'])){
      $userEmail = new ManagerUsers;
      $resultEmail = $userEmail->GetEmails(htmlentities($_POST['email']));
      if (feof($resultEmail)){ // Si les infos correspondent...
        echo "email_inexistant";
      }else{
        echo "email_existant";
      }
    }
    require('view/viewAccueil.php');
  }

  function inscription(){
     require('view/ViewInscription.php');
  }

  function validation(){
     require('view/ViewValidation.php');
  }
?>
