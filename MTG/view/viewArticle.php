<?php $titre = 'Pays'; ?>

<?php ob_start(); ?>

<div class="pure-control-group">
<form class="pure-form pure-form-aligned" action="index.php?action=accueil" method="post" >

<?php while ($enregistrement=$resultPacks->fetch())
            { ?>
                <div>
								<img src="<?php echo $enregistrement['picture']; ?>" alt="<?php echo $enregistrement['edition']; ?>">
								</div>
								
        		<?php }
        		$resultPacks->closeCursor(); ?>

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

		 <img src="/WebMTG/Images/Gatecrash.jpg" alt="Gatecrash">
</form>
<?php $contenu = ob_get_clean(); ?>

<?php require 'gabarit.php'; ?>
