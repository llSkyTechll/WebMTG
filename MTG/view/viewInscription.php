<?php $titre = 'Inscription'; ?>

<?php ob_start(); ?>


<form id="formulaire_validation" class="pure-form pure-form-aligned" action="index.php?action=validation" method="post" >
    <fieldset>
        <div class="pure-control-group">
            <label for="fistName">Nom</label>
            <input type="text" name="fistName" id="fistName" />  
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
<script>
$("#frm_regexp").validate(
    { 
        rules: { 
            fistName:{
                required: true,
                regexp_fistName: true,
            }, 
            lastName:{
                required: true,
                regexp_lastName: true,
            }, 
            email:{
                required: true,
                regexp_email: true,
            },
            password:{
                required: true,
                regexp_password: true,
                }, 
                password_validation:{
                required: true,
                equalTo, "#password",
                }, 
            },	    	 
        messages:
            {	
                fistName:
                {
                    required: 'un prénom est obligatoire'	
                },
                lastName:
                {
                    required: 'un nom de famille est obligatoire'	
                },
                email:
                {
                    required: 'un email est obligatoire'	
                },
                password:
                {
                    required: 'un mot de passe est obligatoire'	
                },
                password_validation:
                {
                    required: 'un mot de passe est obligatoire'	
                    equalTo : 'le mot de passe'
                },
            } 
    });

$.validator.addMethod("regexp_fistName", 
    function (value, element){
     return this.optional(element) || /[a-zA-Z]{30}/.test(value);
    }, 'exemple de format Roy');
$.validator.addMethod("regexp_lastName", 
    function (value, element){
     return this.optional(element) || /[a-zA-Z]{30}/.test(value);
    }, 'exemple de format Luc');
$.validator.addMethod("regexp_password", 
		function (value, element){
			return this.optional(element) || /.{50}/.test(value);
      }, 'exemple de format xxxx12345678');
$.validator.addMethod("regexp_email", 
		function (value, element){
			return this.optional(element) || /^[\w\.-]+@[a-zA-Z0-9\.-]{2,}\.[a-zA-Z0-9]{2,6}$/.test(value);
			}, 'exemple de format abc@gmail.com');
</script>	
<?php $contenu = ob_get_clean(); ?>

<?php require 'gabarit.php'; ?>
