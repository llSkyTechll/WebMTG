<?php $titre = 'Panier'; ?>

<?php ob_start(); ?>

<div class="pure-control-group">
  <form class="pure-form pure-form-aligned" action="index.php?action=accueil" method="post" >
    <table>
      <?php while ($enregistrement=$resultPanier->fetch())
                { ?>
                    <tr>
                      <td>
                        <img src="<?php echo $enregistrement['picture']; ?>" alt="<?php echo $enregistrement['edition']; ?>">
                      </td>
                      <td>
                        <?php echo $enregistrement['edition'] ?>
                      </td>
                      <td>
                        <?php echo $enregistrement['quantity'] ?>
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
