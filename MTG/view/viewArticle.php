<?php $titre = 'Articles'; ?>

<?php ob_start(); ?>

<div class="pure-control-group">

<?php while ($enregistrement=$resultPacks->fetch())
            { ?>
                <div class = "form-group"> 
										<img src="<?php echo $enregistrement['picture']; ?>" alt="<?php echo $enregistrement['edition']; ?>">
										<button type="button" class="btn btn-primary" value="<?php echo $enregistrement['packid']; ?>">Ajouter au panier</button>
								</div>
								
        		<?php }
        		$resultPacks->closeCursor(); ?>
</div>

<!--<form class="pure-form pure-form-aligned" action="index.php?action=accueil" method="post" >
	 <fieldset>  
        <div class="pure-control-group">
					<select name="packorder" onchange="submit()">
						<option value="edition">Edition</option>
						<option value="releasedate">Date de sortie</option>
						<option value="price">Prix</option>
					</select>

          <select name="packs" onchange="">
            <?php while ($enregistrement=$resultPacks->fetch())
            { ?>
                <div>	
								
								</div>
								<option value="<?php echo $enregistrement['edition']; ?>"><?php echo $enregistrement['edition']; ?></option>
        		<?php }
        		$resultPacks->closeCursor(); ?>
					</select>
        </div>
    </fieldset>  

</form>-->
<?php $contenu = ob_get_clean(); ?>

<?php require 'gabarit.php'; ?>
