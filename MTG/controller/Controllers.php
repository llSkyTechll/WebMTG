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
    $firstname   = htmlentities($_POST['firstname']);
    $lastname    = htmlentities($_POST['lastname']);
    $email       = htmlentities($_POST['email']);
    $password    = htmlentities($_POST['password']);
    $user        = new ManagerUsers;
    $resultPacks = $user->CreateUser($firstname,$lastname, $email, $password);
    require('view/viewAccueil.php');
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
