<?php $titre = 'Inscription'; ?>

<?php ob_start(); ?>


<form id="formulaire_validation" class="pure-form pure-form-aligned" action="index.php?action=validation" method="post" >	 
    <fieldset>
        <div class="pure-control-group">
            <label for="Pseudo">Pseudo</label>
            <input type="text" name="Pseudo" id="Pseudo" />  
        </div> 
        <div class="pure-control-group">  
            <label for="email_membre">Email</label>
            <input type="text" name="email_membre" id="email_membre"  /> 
        </div>
        <div class="pure-control-group">
            <label for="motpasse_membre">Mot de passe</label>
            <input type="password" name="motpasse_membre" id="motpasse_membre"  /> 
        </div>
        <div class="pure-control-group">
            <label for="confirmation">Confirmation de mot de passe</label>
            <input type="password" name="confirmation" id="confirmation"  /> 
        </div>
        <div class="pure-controls">		 
            <input class="pure-button pure-button-primary" type="submit" value="s'inscrire"/>  
        </div>
    </fieldset>			
</form>	

<?php $contenu = ob_get_clean(); ?>

<?php require 'gabarit.php'; ?>