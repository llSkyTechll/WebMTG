<?php $titre = 'Inscription'; ?>

<?php ob_start(); ?>


<form id="formulaire_validation" class="pure-form pure-form-aligned" action="index.php?action=validationInscription" method="post" >
    <fieldset>
        <div class="pure-control-group">
            <label for="firstName">Nom</label>
            <input type="text" name="firstName" id="firstName" />  
        </div> 
        <div class="pure-control-group">
            <label for="lastName">Prenom</label>
            <input type="text" name="lastName" id="lastName" />  
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
            <label for="password_validation">Confirmation de mot de passe</label>
            <input type="password" name="password_validation" id="password_validation"  />
        </div>
        <div class="pure-controls">
            <input class="pure-button pure-button-primary" type="submit" value="s'inscrire"/>
        </div>
    </fieldset>
</form>

<?php $contenu = ob_get_clean(); ?>

<?php require 'gabarit.php'; ?>
