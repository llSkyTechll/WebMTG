<?php $titre = 'Connexion'; ?>

<?php ob_start(); ?>


<form id="formulaire_connexion" class="from-group" action="index.php?action=userConnexion" method="post" >
       
        <div class="form-group col-md-4">
            <label for="email">Email</label>
            <input class = "form-control"type="text" name="email" tabindex="30" id="email"  />
        </div>
        <div class="form-group col-md-4">
            <label for="password">Mot de passe</label>
            <input class = "form-control"type="password" name="password" tabindex="40" id="password"  />
        </div>
        <input class="btn btn-secondary" type="submit" tabindex="30" value="Se connecter"/>


   
</form>
<script>
$("#formulaire_connexion").validate({
        rules: {
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
            },
        messages:{
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
            }
    });

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
