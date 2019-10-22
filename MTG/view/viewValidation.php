<?php $titre = 'validation'; ?>

<?php ob_start(); ?>

<div class="pure-controls">		
        <?php echo 'Les champs ont été acceptés' ?>
</div>	


<?php $contenu = ob_get_clean(); ?>

<?php require 'gabarit.php'; ?>