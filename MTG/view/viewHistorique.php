<?php $titre = 'historique'; ?>

<?php ob_start(); ?>

<div class="pure-controls">		
        <?php echo $message; ?>
</div>	
<div class="pure-u-1 pure-u-md-3-3 pure-u-lg-1">
</div>
<div class="pure-u-1 pure-u-md-3-3 pure-u-lg-1">
</div>
<div class="pure-control-group">
    <form id="frmFormulaire" class= "pure-form pure-form-aligned" action="index.php?action=videHistorique" method="post">	   	
        <div class="pure-control-group">
            <input class="submit pure-button pure-button-primary" type="submit" value="vider l'historique"/>
        </div>
    </form>
</div>

<?php $contenu = ob_get_clean(); ?>

<?php require 'gabarit.php'; ?>