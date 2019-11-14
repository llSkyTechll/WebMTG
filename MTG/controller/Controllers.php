<?php
  require('model/ManagerSales.php');
  require('model/ManagerUsers.php');
  require('model/ManagerPictures.php');
  require('model/ManagerOrders.php');

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

  function Disconnect(){
    session_destroy();
    require('view/viewAccueil.php');
  }

  function Connexion(){
    require('view/viewConnexion.php');
  }

  function Inscription(){
     require('view/viewInscription.php');
  }

  function Accueil(){
    // echo "<script type=\"text/javascript\">alert('Email et/ou mot de passe incorrect.');</script>";
    require('view/viewAccueil.php');
  }

  function Article(){
if (!empty($_POST["packorder"])) {
 $pack = new ManagerPictures;
    $resultPacks = $pack ->GetAllPictures(htmlentities($_POST["packorder"]));
    // echo "<script type=\"text/javascript\">alert('Email et/ou mot de passe incorrect.');</script>";
    require('view/viewArticle.php');
}
   
  }

  function Validation(){
     require('view/viewValidation.php');
  }

  function Panier(){
    $panier = new ManagerOrders;
    $custid = $_SESSION['custid'];
    $resultPanier = $panier->GetCart($_SESSION['custid']);
    require('view/viewPanier.php');
  }
?>
