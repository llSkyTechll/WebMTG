<?php $titre = 'Pays'; ?>

<?php ob_start(); ?>

<div class="pure-control-group">
<form class="pure-form pure-form-aligned" action="index.php?action=accueil" method="post" >
	<fieldset>
        <div class="pure-control-group">
					<select name="order" onchange="submit()">
						<option value="releasedate">Date de sortie</option>
						<option value="edition">Edition</option>
						<option value="price DESC">Prix</option>
					</select>

          <select name="packs" onchange="">
            <?php while ($enregistrement=$resultPacks->fetch())
            { ?>
                <option value="<?php echo $enregistrement['edition']; ?>"><?php echo $enregistrement['edition']; ?></option>
        		<?php }
        		$resultPacks->closeCursor(); ?>
					</select>
        </div>
    </fieldset>
<?php $contenu = ob_get_clean(); ?>

<?php require 'gabarit.php'; ?>
