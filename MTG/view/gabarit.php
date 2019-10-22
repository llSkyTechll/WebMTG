
<?php
    if(!empty($_POST))
    {
        setcookie('pays',htmlentities($_POST["pays"]),time()+365*24*3600,null,null,false,true);
    }
   
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $titre ?></title>

<link rel="stylesheet" href="css/include.css">

<script type="text/javascript" src="jquery-validation/lib/jquery-1.11.1.js"></script>
<script type="text/javascript" src="jquery-validation/dist/jquery.validate.min.js"></script>
<script type="text/javascript" src="jquery-validation/dist/localization/messages_fr.js"></script>
</head>

<body>
<div class="form-group">
		  <div class="col-md-4 col-lg-2">   <!--pure-u-1 pure-u-md-1-3 pure-u-lg-1-5 -->
    	</div>
        <div class="pure-u-1 pure-u-md-2-3 pure-u-lg-4-5"> <!--pure-u-1 pure-u-md-2-3 pure-u-lg-4-5 -->
    		<?php require('view_menu.php'); ?>
        </div>
          
    	<div class="pure-u-1 pure-u-md-2-3 pure-u-lg-1-5">
    	</div>
        <div class="pure-u-1 pure-u-md-2-3 pure-u-lg-4-5">
        	<article> 
            	<H1> <?php echo $titre ?></H1>
            </article>
    	</div>   
    <div class="pure-u-1 pure-u-md-2-3 pure-u-lg-1-5">
    </div>
    <div class="pure-u-1 pure-u-md-2-3 pure-u-lg-3-5 form-box"> 
		<?php echo $contenu ?>   <!-- Élément spécifique -->		
	</div>
</div>

<script>
$("#formulaire_validation").validate({
  errorElement : "em",
  onfocusout: function(maFonction) {
              this.element(maFonction);
            },
  rules : {
    Pseudo : {
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
 
});
</script>
</body>
</html>