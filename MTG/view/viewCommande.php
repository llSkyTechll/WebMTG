<?php $titre = 'Commande'; ?>

<?php ob_start(); ?>

<div class="pure-control-group">
  <form class="pure-form pure-form-aligned" action="index.php?action=commande" method="post" >
    <table style="width:100%;" border="1">
      <?php while ($enregistrement = $resultOrders->fetch())
                { ?>
                    <tr>
                      <td width="30%">
                        <img src="<?php echo $enregistrement['picture']; ?>" alt="<?php echo $enregistrement['edition']; ?>">
                      </td>
                      <td width="30%">
                        <?php echo $enregistrement['edition'] ?>
                      </td>
                      <td width="10%">
                        <?php echo $enregistrement['quantity'] ?>
                      </td>
                      <td width="30%">
                        <input type="button" name="btnRemovePack" value="Retirer l'article"></input>
                      </td>
                    </tr>

                    </div>

                <?php }
                $resultPanier->closeCursor(); ?>
    </table>
    <input type="button" name="btnConvertCart" id="btnConvertCart" value="Passer la commande">
  </form>
<?php $contenu = ob_get_clean(); ?>

<?php require 'gabarit.php'; ?>
