<?php $titre = 'Accueil'; ?>

<?php ob_start(); ?>

<div class="pure-control-group">
	<form class="pure-form pure-form-aligned" action="index.php?action=accueil" method="post" >

		<fieldset>
			<div class="pure-control-group">
				<select name="packorder" onchange="submit()">
					<option value="edition">Edition</option>
					<option value="releasedate">Date de sortie</option>
					<option value="price">Prix</option>
				</select>
			<?php
				if (!empty($resultPacks))
				{?>
					<?php while ($enregistrement=$resultPacks->fetch())
			{ ?>
				<div class = "form-group d-block"> 
						<img src="<?php echo $enregistrement['picture']; ?>" class="img-fluid" alt="<?php echo $enregistrement['edition']; ?>">

						<button type="button" class="btn btn-primary" value="<?php echo $enregistrement['packid']; ?>">Ajouter au panier</button>
				</div>
				
			<?php }
			$resultPacks->closeCursor(); ?>
			</div>


			<?php }?>
			
 
			
		</fieldset>

	</form>
</div>
<?php $contenu = ob_get_clean(); ?>

<?php require ('view/gabarit.php'); ?>
