<?php $titre = 'Commande'; ?>

<?php ob_start(); ?>

<div class="pure-control-group">
  <form class="pure-form pure-form-aligned" action="index.php?action=commande" method="post" >
    <div id="accordion">
      <?php
        while ($enregistrement = $resultOrders->fetch())
        {?>
            <h3><?php echo $enregistrement['date'] ?></h3>
            <div><?php echo 'Province: '.$enregistrement['cartid'] ?>
            </br><?php echo 'Capitale: '.$enregistrement['totalprice'] ?></div>
        <?php
        }
        $resultOrders->closeCursor();
      ?>
    </div>
    <input type="button" name="btnConvertCart" id="btnConvertCart" value="Passer la commande">
  </form>
<?php $contenu = ob_get_clean(); ?>

<?php require 'gabarit.php'; ?>
