<?php $titre = 'Accueil';
$lien_ajax='type="text/javascript" src="jquery-3.4.1.min.js"';
$gestion_ajax='type="text/javascript" src="gestion_accueil.js"';
?>

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
				<table>
			<?php
				if (!empty($resultPacks))
				{?>
					<?php while ($enregistrement=$resultPacks->fetch())
			{ ?>
					<tr>
						<td>
							<div class = "form-group ">
									<img src="<?php echo $enregistrement['picture']; ?>" class="img-fluid image" alt="<?php echo $enregistrement['edition']; ?>">
									<p align="center"> <?php echo $enregistrement['description']; ?></p>
									<div id="ImagePanier<?php echo $enregistrement['packid']; ?>"></div>
									<input id="quantity<?php echo $enregistrement['packid']; ?>"type="number" name="quantity" min="1">
									<!-- <input id="quantity<?php echo $enregistrement['packid']; ?>" type="number" name="quantity" min="1" max="<?php echo $enregistrement['quantityStock']; ?>"> -->
									<button id="ImagePanier<?php echo $enregistrement['packid']; ?>" type="button" class="btn btn-light" value="<?php echo $enregistrement['packid']; ?>" onclick="AjouterPanier(<?php echo $enregistrement['packid']; ?>)">Ajouter au panier</button>
							</div>
						</td>
						<td>
							<?php 	if ($enregistrement=$resultPacks->fetch()) { ?>
								<div class = "form-group ">
										<img src="<?php echo $enregistrement['picture']; ?>" class="img-fluid image" alt="<?php echo $enregistrement['edition']; ?>">
										<p> <?php echo $enregistrement['description']; ?></p>
										<div id="ImagePanier<?php echo $enregistrement['packid']; ?>"></div>
										<input id="quantity<?php echo $enregistrement['packid']; ?>"type="number" name="quantity" min="1">
										<!-- <input id="quantity<?php echo $enregistrement['packid']; ?>" type="number" name="quantity" min="1" max="<?php echo $enregistrement['quantityStock']; ?>"> -->
										<button id="ImagePanier<?php echo $enregistrement['packid']; ?>" type="button" class="btn btn-light" value="<?php echo $enregistrement['packid']; ?>" onclick="AjouterPanier(<?php echo $enregistrement['packid']; ?>)">Ajouter au panier</button>
								</div>
							<?php } ?>
						</td>
					</tr>
			<?php }
			$resultPacks->closeCursor(); ?>
			</table>
			</div>
			<?php }?>
		</fieldset>

	</form>
</div>
<?php $contenu = ob_get_clean(); ?>

<?php require ('view/gabarit.php'); ?>
