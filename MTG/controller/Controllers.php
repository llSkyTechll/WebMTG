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
    $firstname   = htmlentities($_POST['firstName']);
    $lastname    = htmlentities($_POST['lastName']);
    $email       = htmlentities($_POST['email']);
    $password    = htmlentities($_POST['password']);
    $user        = new ManagerUsers;
    $user->CreateUser($firstname,$lastname, $email, $password);
    UserConnexion();
    require('view/viewAccueil.php');
  }

  function UserConnexion(){
    $email = htmlentities($_POST['email']);
    $password = htmlentities($_POST['password']);
    $user = new ManagerUsers;
    $userInfo = $user->GetUserInfo($email, $password);
  }

  function ValiderInformationInscription(){
    if (!empty($_POST['email'])){
      $userEmail = new ManagerUsers;
      $resultEmail = $userEmail->GetEmails(htmlentities($_POST['email']));
      if (empty($resultEmail->fetch())){
        UserInscription();
      }else{
        echo "<script type=\"text/javascript\">alert('Email déjà utilisé.');</script>";
        Inscription(); //Possibilité d'amélioration avec AJAX
      }
    }
  }

  function Inscription(){
     require('view/viewInscription.php');
  }

  function Validation(){
     require('view/viewValidation.php');
  }
?>
