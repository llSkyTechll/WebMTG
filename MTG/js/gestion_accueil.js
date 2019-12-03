

function AjouterPanier($idChoix){
    AjouterItemAuPanier(1,$idChoix);
	$.ajax({
        url 	: "view/imagePanier.php",
        type 	: "POST",
        data 	: {idChoix:$idChoix},
        success : function(output){
                    $choix="#ImagePanier"+$idChoix;
                    $($choix).html(output);
                    swal('Ajouter au panier!',"",'success');
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
    $.ajax({
        url 	: "index.php?action=AjouterCommmande",
        type 	: "POST",
        data 	: {},
        success : function(output){
                    
                    $choix="";
                    $($choix).html(output);
                },
        error	: function(){
                    $choix="";
                    $($choix).html("Une erreur est survenue");
                }
    });
}
function UpdatePanier($idProduit)
{
    $NumberOfItem=document.getElementById("quantity"+$idProduit).value;
    $.ajax({
        url 	: "index.php?action=UpdatePanier",
        type 	: "POST",
        data 	: {panier:$idProduit,quantity:$NumberOfItem},
        success : function(output){
                    $choix="";
                    $($choix).html(output);
                },
        error	: function(){
                    $choix="";
                    $($choix).html("Une erreur est survenue");
                }
    });
}
