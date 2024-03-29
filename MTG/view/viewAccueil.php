<?php $titre = 'Accueil';
$lien_ajax='type="text/javascript" src="jquery-3.4.1.min.js"';
$gestion_ajax='type="text/javascript" src="js\gestion_accueil.js"';
?>

<?php ob_start(); ?>

<div class="form-group">
	<form class="form-group" action="index.php?action=accueil" method="post" >

		<fieldset>
			<div class="form-group">
				<table>
			<?php
				if (!empty($resultPacks))
				{?>
					<?php while ($enregistrement=$resultPacks->fetch())
			{ ?>
					<tr>
						<td>
							<div class = "form-group">
									<img align="center" src="<?php echo $enregistrement['picture']; ?>" class="img-fluid image" alt="<?php echo $enregistrement['edition']; ?>">
									<p align="center"> <?php echo $enregistrement['description']; ?></p>
									<p align="center">Prix: <?php echo $enregistrement['price'] ?> $</p>
									<div id="ImagePanier<?php echo $enregistrement['packid']; ?>"><?php for ($index=0;$index < count($lePanierDID);$index++) {
										if ($lePanierDID[$index] == $enregistrement['packid']) {
											echo"<i class='fas fa-shopping-cart'></i>";
										}
										}?></div>
									<button id="ImagePanier<?php echo $enregistrement['packid']; ?>" type="button" class="btn btn-light" value="<?php echo $enregistrement['packid']; ?>" onclick="AjouterPanier(<?php echo $enregistrement['packid']; ?>)">Ajouter au panier</button>
							</div>
						</td>
						<td>
							<?php 	if ($enregistrement=$resultPacks->fetch()) { ?>
								<div class = "form-group ">
										<img align="center" src="<?php echo $enregistrement['picture']; ?>" class="img-fluid image" alt="<?php echo $enregistrement['edition']; ?>">
										<p align="center"> <?php echo $enregistrement['description']; ?></p>
										<p align="center">Prix: <?php echo $enregistrement['price'] ?> $</p>
										<div id="ImagePanier<?php echo $enregistrement['packid']; ?>"><?php for ($index=0;$index < count($lePanierDID);$index++) {
											if ($lePanierDID[$index] == $enregistrement['packid']) {
												echo"<i class='fas fa-shopping-cart'></i>";
											}
											}?></div>
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
