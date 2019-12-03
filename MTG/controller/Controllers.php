<?php
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
      Accueil();
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
    echo "<script type=\"text/javascript\">alert('Déconnexion effectuée avec succès');</script>";
    Accueil();
  }

  function Connexion(){
    require('view/viewConnexion.php');
  }

  function Inscription(){
     require('view/viewInscription.php');
  }

  function Accueil(){
    // if (empty($_POST["packorder"])) {
    //   $order  = 'edition';
    // }
    // else {
    //   $order  = htmlentities($_POST["packorder"]);
    // }
    $pack = new ManagerPictures;
      $resultPacks = $pack ->GetAllPictures();
    require('view/viewAccueil.php');
  }

  function Validation(){
     require('view/viewValidation.php');
  }

  function Panier(){
    $panierArrayPourPanier=array();
    $quantiteArrayPourPanier=array();
    $panierAfficheArray=array();
    $quantiteAfficheArray=array();
    if(!empty($_COOKIE["panier"]) && !empty($_COOKIE["quantite"]))
    {
        $panierArrayPourPanier=unserialize($_COOKIE["panier"]);
        $quantiteArrayPourPanier=unserialize($_COOKIE["quantite"]);
    }
    $Pack= new ManagerPictures;
    for ($index=0;$index < count($panierArrayPourPanier);$index++) {
        $temp=$Pack->GetSpecificPicture($panierArrayPourPanier[$index]);
        $produit=$temp->fetch();
        array_push($panierAfficheArray,$produit);
        array_push($quantiteAfficheArray,$quantiteArrayPourPanier[$index]);
        $temp->closeCursor();
    }
    require('view/viewPanier.php');
  }

  function Commande(){
    $commande = new ManagerOrders;
    $custid = $_SESSION['custid'];
    $resultOrders = $commande->GetOrders($custid);
    require('view/viewCommande.php');
  }

  function AjouterPanier(){
    $panier = !Empty($_POST['panier']) ? htmlentities($_POST['panier']):'';
    $quantite = !Empty($_POST['quantite']) ? htmlentities($_POST['quantite']):'';

    $panierArray=array();
    $quantiteArray=array();
    if(!empty($_COOKIE["panier"]) && !empty($_COOKIE["quantite"]))
    {
        $panierArray=unserialize($_COOKIE["panier"]);
        $quantiteArray=unserialize($_COOKIE["quantite"]);
    }
    $HasBeenAdded=false;
        for ($index=0; $index < count($panierArray) ; $index++) {
            if($panierArray[$index]==$panier && !$HasBeenAdded)
            {
                $quantiteArray[$index]+= $quantite;
                $HasBeenAdded=true;
            }
        }
    if (!$HasBeenAdded) {
        array_push($panierArray,$panier);
        array_push($quantiteArray,$quantite);
    }
    $panierArray_serialize = serialize($panierArray);
    $quantiteArray_serialize = serialize($quantiteArray);
    setcookie("panier",$panierArray_serialize,Time()*365*24*3600,null,null,false,true);
    setcookie("quantite",$quantiteArray_serialize,Time()*365*24*3600,null,null,false,true);
    echo implode('","',$panierArray);
    echo"|||";
    echo implode(":",$quantiteArray);
}
function RetirerPanier(){
  $panier = !Empty($_POST['panier']) ? htmlentities($_POST['panier']):'';

  $AllPanierArray=array();
  $AllQuantiteArray=array();
  $panierArrayTemp=array();
  $quantiteArrayTemp=array();
  if(!empty($_COOKIE["panier"]) && !empty($_COOKIE["quantite"]))
  {
      $AllPanierArray=unserialize($_COOKIE["panier"]);
      $AllQuantiteArray=unserialize($_COOKIE["quantite"]);
  }
      for ($index=0; $index < count($AllPanierArray) ; $index++) {
          if($AllPanierArray[$index]!=$panier)
          {
              array_push($panierArrayTemp,$AllPanierArray[$index]);
              array_push($quantiteArrayTemp,$AllQuantiteArray[$index]);
          }
      }

  $panierArray_serialize = serialize($panierArrayTemp);
  $quantiteArray_serialize = serialize($quantiteArrayTemp);
  setcookie("panier",$panierArray_serialize,Time()*365*24*3600,null,null,false,true);
  setcookie("quantite",$quantiteArray_serialize,Time()*365*24*3600,null,null,false,true);
  echo implode('","',$panierArrayTemp);
  echo"|||";
  echo implode(":",$quantiteArrayTemp);
}
function AjouterCommmande(){
    $custid = 0;
    $panier = new ManagerOrders;
    if (!empty($_SESSION['custid']))
    {
      $custid = $_SESSION['custid'];
      if(!empty($_COOKIE["panier"]) && !empty($_COOKIE["quantite"]))
        {
          $AllPanierArray=unserialize($_COOKIE["panier"]);
          $AllQuantiteArray=unserialize($_COOKIE["quantite"]);
          $Customer = $panier->CreateOrder($custid);
          $CustomerID =$Customer->fetch();
          for ($index=0; $index < count($AllPanierArray) ; $index++) {
            $OrderContent = $panier->AddOrderContent($CustomerID["CustomerId"],$AllPanierArray[$index],$AllQuantiteArray[$index]);
          }
          $updateOrder = $panier->UpdateOrder($CustomerID["CustomerId"]);
          setcookie("panier","", time() - 3600,null,null,false,true);
          setcookie("quantite","", time() - 3600,null,null,false,true);
        }
      Accueil();
    }
    else
    {
      Connexion();
    }

}
?>
