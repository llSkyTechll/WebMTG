<?php $titre = 'Provinces'; ?>

<?php ob_start(); ?>

<div class="pure-control-group">
    <?php
    if ($enregistrement=$resultatNomPays->fetch()){
        echo "<H1>Pays " . $enregistrement['nom_pays']. "</H1>" ;
    }
    ?>
</div> 

<div class="pure-control-group">
<H2>Provinces :</H2>
<?php while ($enregistrement=$resultatProvince->fetch())
        { ?>
            <legend><?php echo $enregistrement['nom_province'] ?></legend>	
    <?php }	
    $resultatProvince->closeCursor(); ?>
</div> 

<?php $contenu = ob_get_clean(); ?>

<?php require 'gabarit.php'; ?>

