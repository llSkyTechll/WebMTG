<?php $titre = 'Accueil'; ?>

<?php ob_start(); ?>

<div class="pure-control-group">
<form class="pure-form pure-form-aligned" action="index.php?action=article" method="post" >

	 <fieldset>
        <div class="pure-control-group">
					<select name="packorder" onchange="submit()">
						<option value="edition">Edition</option>
						<option value="releasedate">Date de sortie</option>
						<option value="price">Prix</option>
					</select>

          <select name="packs" onchange="">
            <?php /*while ($enregistrement=$resultPacks->fetch())
            { ?>
                <option value="<?php echo $enregistrement['edition']; ?>"><?php echo $enregistrement['edition']; ?></option>
        		<?php }
        		$resultPacks->closeCursor(); */?>
					</select>
        </div>
    </fieldset>

</form>
<?php $contenu = ob_get_clean(); ?>

<?php require ('view/gabarit.php'); ?>
