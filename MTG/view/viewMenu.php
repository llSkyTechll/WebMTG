<div class="container-fluid">
    <ul class="list-group list-group-horizontal">
        <li class="list-group-item"><a href="index.php?action=accueil" class="btn btn-primary">Accueil</a></li>
        <li class="list-group-item"><a href="index.php?action=panier" class="btn btn-primary">Panier</a></li>
        <?php if (!empty($_SESSION['custid'])) { ?>
          <li class="list-group-item"><a href="index.php?action=commande" class="btn btn-primary">Commande</a></li>
          <li class="list-group-item"><a href="index.php?action=deconnexion" class="btn btn-primary">Deconnexion</a></li>
        <?php }else{ ?>
          <li class="list-group-item"><a href="index.php?action=connexion" class="btn btn-primary">Connexion</a></li>
          <li class="list-group-item"><a href="index.php?action=inscription" class="btn btn-primary">Inscription</a></li>
        <?php } ?>
    </ul>
</div>
