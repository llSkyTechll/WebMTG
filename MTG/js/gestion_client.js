// JavaScript Document

$("#mon_formu").validate(
	{ rules:
			{ nom :    { 	required : true,
				 			minlength : 2
		 			   },
		  	  prenom : { 	required : true,
				  			minlength : 2
		  			   }
			 },
	  messages:  {
	    			nom : { required : 'Le nom est obligatoire',
		         			minlength : 'Le nom doit avoir au moins 2 caractères'
 		       	   		  } ,
					prenom : { 	minlength : 'Le prenom doit avoir au moins 2 caractères' ,
		        				required : 'Le prenom est obligatoire'
		      				 }
				  },
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
