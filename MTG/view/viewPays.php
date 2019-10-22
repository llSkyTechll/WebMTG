<?php $titre = 'Pays'; ?>

<?php ob_start(); ?>

<div class="pure-control-group">
<form class="pure-form pure-form-aligned" action="index.php?action=ListeProvinces" method="post" >
	<fieldset>
        <div class="pure-control-group">
            <select name="pays" onchange="submit()">	
            <?php while ($enregistrement=$resultatPays->fetch())
            { ?>                
                <option value="<?php echo $enregistrement['code_pays']; ?>"><?php echo $enregistrement['nom_pays']; ?></option>  
        <?php }	
        $resultatPays ->closeCursor(); ?>
    
        </div> 
    </fieldset>
<?php $contenu = ob_get_clean(); ?>

<?php require 'gabarit.php'; ?>

