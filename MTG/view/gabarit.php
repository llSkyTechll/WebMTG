<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $titre ?></title>

<link rel="stylesheet" href="css/include.css">

<script src="https://kit.fontawesome.com/30dce125f3.js" crossorigin="anonymous"></script> <!--lien pour les icons -->

<script type="text/javascript" src="jquery-validation/lib/jquery-1.11.1.js"></script>
<script type="text/javascript" src="jquery-validation/dist/jquery.validate.min.js"></script>
<script type="text/javascript" src="jquery-validation/dist/localization/messages_fr.js"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body>
<div class="d-flex row">
  <div class="col-md-12 from-group offset-sm-5">
    <?php require('view_menu.php'); ?>
  </div>          
  <div class="col-md-12 offset-sm-6">
    <article> 
      <H1> <?php echo $titre ?></H1>
    </article>
  </div>   
    <div class="col-md-12 form-group offset-sm-6"> 
		  <?php echo $contenu ?>  		
	  </div>
</div>

<!-- <script>
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
</script> -->
</body>
</html>