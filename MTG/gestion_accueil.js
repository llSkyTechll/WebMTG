

function AjouterPanier($idChoix){
    swal('Ajouter au panier!',"",'success');
    $NumberOfItem=document.getElementById("quantity"+$idChoix).value;
    AjouterItemAuPanier($NumberOfItem,$idChoix);
	$.ajax({   
        url 	: "view/imagePanier.php",
        type 	: "POST",
        data 	: {idChoix:$idChoix},   
        success : function(output){
                    $choix="#ImagePanier"+$idChoix;
                    $($choix).html(output);
                },
        error	: function(){
                    $choix="#ImagePanier"+$idChoix;
                    $($choix).html("Une erreur est survenue");
                }	
    });
}
function AjouterItemAuPanier($Quantite,$idProduit) {
   

    $.ajax({   
        url 	: "index.php?action=AjouterPanier",
        type 	: "POST",
        data 	: {panier:$idProduit,quantite:$Quantite},   
        success : function(output){
                    alert(output);
                    $choix="";
                    $($choix).html(output);
                },
        error	: function(){
                    $choix="";
                    $($choix).html("Une erreur est survenue");
                }	
    });
    
}

function RetirerPanier($idChoix){
     swal('Retirer du panier!',"",'success');
    // NumberOfItem=document.getElementById("quantity"+$idChoix).value;    
    $(document.getElementById("Group"+$idChoix)).addClass("d-none");
    RetirerItemAuPanier($idChoix);	
}
function RetirerItemAuPanier($idProduit) {
   

    $.ajax({   
        url 	: "index.php?action=RetirerPanier",
        type 	: "POST",
        data 	: {panier:$idProduit},   
        success : function(output){
                    alert(output);
                    $choix="";
                    $($choix).html(output);
                },
        error	: function(){
                    $choix="";
                    $($choix).html("Une erreur est survenue");
                }	
    });
    
}
function PasserCommande(){
    //swal('Commande effectué!',"",'success');   
//    $(document.getElementById("Group"+$idChoix)).addClass("d-none");
    $.ajax({   
        url 	: "index.php?action=AjouterCommmande",
        type 	: "POST",
        data 	: {},   
        success : function(output){
                    alert(output);
                    $choix="";
                    $($choix).html(output);
                },
        error	: function(){
                    $choix="";
                    $($choix).html("Une erreur est survenue");
                }	
    });	
}
