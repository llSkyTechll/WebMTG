<?php $titre = 'Inscription'; ?>

<?php ob_start(); ?>


<form id="formulaire_validation" class="pure-form pure-form-aligned" action="index.php?action=validationInscription" method="post" >
    <fieldset>
        <div class="pure-control-group">
            <label for="Nom">Nom</label>
            <input type="text" name="Nom" id="Nom" />  
        </div> 
        <div class="pure-control-group">
            <label for="Prenom">Prenom</label>
            <input type="text" name="Prenom" id="Prenom" />  
        </div> 
        <div class="pure-control-group">  
            <label for="email">Email</label>
            <input type="text" name="email" id="email"  /> 
        </div>
        <div class="pure-control-group">
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password"  /> 
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
