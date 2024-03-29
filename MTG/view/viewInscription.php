<?php $titre = 'Inscription'; ?>

<?php ob_start(); ?>


<form id="formulaire_validation" class="from-group" action="index.php?action=validationInscription" method="post" >
    
        <div class="form-group col-md-4">
            <label for="fistName">Nom</label>
            <input class = "form-control" type="text" name="firstName" tabindex="10" id="fistName" />
        </div>
        <div class="form-group col-md-4">
            <label for="lastName">Prenom</label>
            <input class = "form-control"type="text" name="lastName" tabindex="20" id="lastName" />
        </div>
        <div class="form-group col-md-4">
            <label for="email">Email</label>
            <input class = "form-control"type="text" name="email" tabindex="30" id="email"  />
        </div>
        <div class="form-group col-md-4">
            <label for="password">Mot de passe</label>
            <input class = "form-control"type="password" name="password" tabindex="40" id="password"  />
        </div>
        <div class="form-group col-md-4">
            <label for="password_validation">Confirmation de mot de passe</label>
            <input class = "form-control" type="password" name="password_validation" tabindex="50" id="password_validation"  />
        </div>
        <div class="form-group col-md-4">
            <input  class="btn btn-secondary" type="submit" tabindex="60" value="S'inscrire"/>
        </div>
    
</form>
<script>
$("#formulaire_validation").validate({
        rules: {
            firstName:{
                required: true,
                maxlength: 30,
                minlength: 3,
                regexp_firstName: true
            },
            lastName:{
                required: true,
                maxlength: 30,
                minlength: 3,
                regexp_lastName: true,
            },
            email:{
                required: true,
                maxlength: 100,
                regexp_email: true,
            },
            password:{
                required: true,
                maxlength: 50,
                minlength: 5,
                regexp_password: true,
                },
            password_validation:{
                required: true,
                equalTo: "#password",
                },
            },
        messages:{
                firstName:
                {
                    required: 'Un prénom est obligatoire',
                    maxlength: 'La longueur maximum est de 30 characteres',
                    minlength: 'La longueur minimum est de 3 characteres',
                },
                lastName:
                {
                    required: 'Un nom de famille est obligatoire',
                    maxlength: 'La longueur maximum est de 30 characteres',
                    minlength: 'La longueur minimum est de 3 characteres',
                },
                email:
                {
                    required: 'Un email est obligatoire',
                    maxlength: 'La longueur maximum est de 100 characteres',
                },
                password:
                {
                    required: 'Un mot de passe est obligatoire'	,
                    maxlength: 'La longueur maximum est de 50 characteres',
                    minlength: 'La longueur minimum est de 5 characteres'
                },
                password_validation:
                {
                    required: 'Un mot de passe est obligatoire'	,
                    equalTo : 'Doit être pareil au mot de passe',
                },
            }
    });

    $.validator.addMethod("regexp_firstName",
    function (value, element){
    return this.optional(element) || /[a-zA-Z]{3,30}/.test(value);
    }, 'Exemple de format: Roy');
    $.validator.addMethod("regexp_lastName",
    function (value, element){
    return this.optional(element) || /[a-zA-Z]{3,30}/.test(value);
    }, 'Exemple de format: Luc');
    $.validator.addMethod("regexp_password",
    function (value, element){
    return this.optional(element) || /.{0,50}/.test(value);
    }, 'Exemple de format: xxxx12345678');
    $.validator.addMethod("regexp_email",
    function (value, element){
    return this.optional(element) || /^[\w\.-]+@[a-zA-Z0-9\.-]{2,}\.[a-zA-Z0-9]{2,6}$/.test(value);
    }, 'Exemple de format: abc@gmail.com');


</script>
<?php $contenu = ob_get_clean(); ?>

<?php require 'gabarit.php'; ?>
