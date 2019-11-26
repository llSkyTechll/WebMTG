
function AjouterPanier($idChoix){//À modifier
    //var monid=this.id;
    // swal('Added','','success');
     $NumberOfItem=document.getElementById("quantity"+$idChoix).value;
	 AddCookie($idChoix,$NumberOfItem)
    $.ajax({  
        url     : "view/imagePanier.php",
        type    : "POST",
        data    : {idChoix:$idChoix},  
        success : function(output){
                    $choix="#ImagePanier"+$idChoix;
                    $($choix).html(output);
                },
        error   : function(){
                    $choix="#ImagePanier"+$idChoix;
                    $($choix).html("Une erreur est survenue");
                }   
    });
}
function AddCookie($idChoix,$NumberOfItem){
	$tableau = array();
	$cartCookie = array();
	$tableau = array_push($idChoix);
	$tableau = array_push($NumberOfItem);
	$tableau_serialize = serialize($tableau);
	array_push($cartCookie, $tableau_serialize);
	setcookie("CartCookie", $cartCookie,time()+365*24*3600,null,null,false,true);
}


