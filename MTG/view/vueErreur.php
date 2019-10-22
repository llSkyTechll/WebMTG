<?php $titre = 'Message erreur'; ?>

<?php ob_start() ?>
<p>Une erreur est survenue : <?php echo $msgErreur ?></p>
<?php $contenu = ob_get_clean(); ?>

<?php require 'gabarit.php'; ?>