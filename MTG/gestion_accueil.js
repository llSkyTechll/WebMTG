// JavaScript Document
/* mauvais exemple non focntionnel */ 
/*
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
				  submitHandler: function(verification){
					$.ajax({
						url: "index.php?action=verification", 
						type: 'POST',
						dataType: 'html',
						data:{nom:$("#nom").val(),prenom:$("#prenom").val()},
						success : function(output){ 
									if(output.trim() == 'bon_login'){
										// Le nom prenom est connu. Nous voulons donc lui permettre l'acces à une autre page  
										window.location = 'index.php?action=autre';
									}
									else {
										if(output.trim() == 'mauvais_login'){
											// Le membre n'est pas connu (output vaut ici "mauvais_login")
											$("#resultat").html("<p>Vous êtes un inconnu, votre nom et prenom ne correspondent pas</p>");
										}
									}
						},
		})
				  } 	
		});


// $(document).ready(function(){
//      $("#mon_formu").submit(travail);});

// function travail(){  
// 	var output = $.ajax({
// 					url: "index.php?action=verification", 
// 					type: 'POST',
// 					dataType: 'html',
// 					data:{nom:$("#nom").val(),prenom:$("#prenom").val()},
// 					success : function(output){ 
//                                 if(output.trim() == 'bon_login'){
//                                     // Le nom prenom est connu. Nous voulons donc lui permettre l'acces à une autre page  
//                                     window.location = 'index.php?action=autre';
//                                 }
//                                 else {
//                                     if(output.trim() == 'mauvais_login'){
//                                         // Le membre n'est pas connu (output vaut ici "mauvais_login")
//                                         $("#resultat").html("<p>Vous êtes un inconnu, votre nom et prenom ne correspondent pas</p>");
//                                     }
//                                 }
//                     },
//     }); 
// };

*/
// solution ajax et jquery validate, ajouter le submitHandler
/*
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
		});

$(document).ready(function(){
     $("#mon_formu").submit(travail);});

function travail(){  
	var output = $.ajax({
					url: "index.php?action=verification", 
					type: 'POST',
					dataType: 'html',
					data:{nom:$("#nom").val(),prenom:$("#prenom").val()},
					success : function(output){ 
                                if(output.trim() == 'bon_login'){
                                    // Le nom prenom est connu. Nous voulons donc lui permettre l'acces à une autre page  
                                    window.location = 'index.php?action=autre';
                                }
                                else {
                                    if(output.trim() == 'mauvais_login'){
                                        // Le membre n'est pas connu (output vaut ici "mauvais_login")
                                        $("#resultat").html("<p>Vous êtes un inconnu, votre nom et prenom ne correspondent pas</p>");
                                    }
                                }
                    },
    }); 
};

*/
/* solution moins élégante : Ajax et jquery avec if ( $(this).valid()) et return false;*/

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
		});


$(document).ready(function(){
     $("#mon_formu").submit(travail);});

function travail(){  
	if($this.valid()){	
		var output = $.ajax({
						url: "index.php?action=verification", 
						type: 'POST',
						dataType: 'html',
						data:{nom:$("#nom").val(),prenom:$("#prenom").val()},
						success : function(output){ 
									if(output.trim() == 'bon_login'){
										// Le nom prenom est connu. Nous voulons donc lui permettre l'acces à une autre page  
										window.location = 'index.php?action=autre';
									}
									else {
										if(output.trim() == 'mauvais_login'){
											// Le membre n'est pas connu (output vaut ici "mauvais_login")
											$("#resultat").html("<p>Vous êtes un inconnu, votre nom et prenom ne correspondent pas</p>");
										}
									}
						},
		}); 
	};
	event.preventDefault();
};
{/* <i class="fas fa-shopping-cart"></i> */}/*icon panier*/ 


