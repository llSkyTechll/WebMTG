<?php $titre = 'Panier';
$lien_ajax='type="text/javascript" src="jquery-3.4.1.min.js"';
$gestion_ajax='type="text/javascript" src="gestion_accueil.js"';
?>

<?php ob_start() ?>


<div class="pure-control-group">
  <?php 
  for ($index=0;$index < count($panierAfficheArray);$index++) 
  {
  ?> 

    <div class = "form-group" id="Group<?php echo $panierAfficheArray[$index]['packid'];?>">
      <img src="<?php echo $panierAfficheArray[$index]['picture']; ?>" class="img-fluid image" alt="<?php echo $panierAfficheArray[$index]['edition']; ?>">
      <p > <?php echo $panierAfficheArray[$index]['description']; ?></p>
      
      <input id="quantity<?php echo $panierAfficheArray[$index]['packid']; ?>" type="number" name="quantity" min="1"value="<?php echo $quantiteAfficheArray[$index]; ?>" disabled>
      <button id="ImagePanier<?php echo $panierAfficheArray[$index]['packid']; ?>" type="button" class="btn btn-warning" value="<?php echo $panierAfficheArray[$index]['packid']; ?>" onclick="RetirerPanier(<?php echo $panierAfficheArray[$index]['packid']; ?>)">Retirer du panier</button>
    </div>
  <?php
  }
  ?>
    <input type="button" name="btnConvertCart" id="btnConvertCart" value="Passer la commande" onclick="window.location.href = 'index.php?action=AjouterCommmande'">
</div>
<?php $contenu = ob_get_clean(); ?>

<?php require 'gabarit.php'; ?>
