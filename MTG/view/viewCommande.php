<?php $titre = 'Commande'; ?>

<?php ob_start(); ?>

<div class="pure-control-group">
    <div id="accordion">
      <?php
        $cptFirst = 0;
        $cpt = 0;
        $lastId[$cptFirst] = 0;
        while ($enregistrement = $resultOrders->fetch())
        {?>
        <?php
          $cpt += 1;
          $lastId[$cpt] = $enregistrement['orderid'];
          if ($lastId[$cptFirst] != $lastId[$cpt]) {
            if ($cptFirst != 0) {
        ?>
      </div>
        <?php
          }
        ?>
        <h3>Date de la commande: <?php echo $enregistrement['date'] ?>  Coût: <?php echo $enregistrement['totalprice'] ?></h3>
        <div>
        <?php
         $cptFirst = $cpt;
          }
        ?>
        <img src="<?php echo $enregistrement['picture']; ?>" class="img-fluid image" alt="<?php echo $enregistrement['edition']; ?>">
        <?php echo 'Quantité: '.$enregistrement['quantity'] ?>
          </br>
        <?php
          }
          $resultOrders->closeCursor();
        ?>
    </div>
    
<?php $contenu = ob_get_clean(); ?>

<?php require 'gabarit.php'; ?>
