<?php
  require('model/ManagerSales.php');
  require('model/ManagerUsers.php');
  require('model/ManagerPictures.php');
  require('model/ManagerOrders.php');

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
    if (empty($result = $userInfo->fetch())) {
      echo "<script type=\"text/javascript\">alert('Email et/ou mot de passe incorrect.');</script>";
      require('view/viewConnexion.php');
    }else {
      $_SESSION['firstname'] = $result['firstname'];
      $_SESSION['lastname']  = $result['lastname'];
      $_SESSION['email']     = $result['email'];
      $_SESSION['custid']    = $result['custid'];
      require('view/viewAccueil.php');
    }
  }

  function ValiderInformationInscription(){
    if (!empty($_POST['email'])){
      $userEmail = new ManagerUsers;
      $resultEmail = $userEmail->GetEmails(htmlentities($_POST['email']));
      if (empty($resultEmail->fetch())){
        UserInscription();
      }else {
        echo "<script type=\"text/javascript\">alert('Email déjà utilisé.');</script>";
        Inscription(); //Possibilité d'amélioration avec AJAX
      }
    }
  }

  function Deconnexion(){
    $_SESSION = array();
    require('view/viewAccueil.php');
  }

  function Connexion(){
    require('view/viewConnexion.php');
  }

  function Inscription(){
     require('view/viewInscription.php');
  }

  function Accueil(){
    if (empty($_POST["packorder"])) {
      $order  = 'edition';
    }
    else {
      $order  = htmlentities($_POST["packorder"]);
    }
    $pack = new ManagerPictures;
      $resultPacks = $pack ->GetAllPictures($order);
    require('view/viewAccueil.php');
  }

  function Validation(){
     require('view/viewValidation.php');
  }

  function Panier(){
    $custid = 0;
    $panier = new ManagerOrders;
    if (!empty($_SESSION['custid'])) {
      $custid = $_SESSION['custid'];
      $resultPanier = $panier->GetCart($custid);
    } else {
      // code pour les cookies
    }
    require('view/viewPanier.php');
  }

  function Commande(){
    $commande = new ManagerOrders;
    $custid = $_SESSION['custid'];
    $resultOrders = $commande->GetOrders($custid);
    require('view/viewCommande.php');
  }
?>
