// JavaScript Document

$("#formulaire_validation").validate({
	errorElement : "em",
	onfocusout: function(maFonction) {
				this.element(maFonction);
			  },
			  rules : {
				Nom : {
				  required : true,
				  maxlength: 5,
				},
				Prenom : {
				  required : true,
				  maxlength: 5,
				},
				email_membre : {
				  required : true,
				  email : true,
				},
				motpasse_membre : {
				  required : true,
				  minlength: 3
				},
				confirmation : {
				  required : true,
				  equalTo:"#motpasse_membre"
				},
			
			  },
			  messages:  {
				email_membre : {
					 required : 'Un address email est obligatoire',
					 email : 'Une address email doit être valide',
					},
					motpasse_membre : {
						required : 'Un mot de passe est obligatoire',
					},
			  }	,			
			
		submitHandler : function (verification){
			$.ajax({
				url: "index.php?action=inscription",
				type: 'POST',
				dataType: 'html',
				data:{nom:$("#email").val()},
				success : function(output){
					if(output.trim() == 'email_inexistant'){
						// Le nom prenom est connu. Nous voulons donc lui permettre l'acces à une autre page
						//window.location = 'index.php?action=autre';
															swal('bon');
					}
					else {
						if(output.trim() == 'email_existant'){
							// Le membre n'est pas connu (output vaut ici "mauvais_login")
							//$("#resultat").html("<p>Vous êtes un inconnu, votre nom et prenom ne correspondent pas</p>");
																	swal('mauvais');
						}
					}
				},
		    });
		}
		});
