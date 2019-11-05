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
    <script type="text/javascript" src="jquery-3.4.1.min.js"></script>
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
  </body>
  
<script>
$("#formulaire_validation").validate({ 
        rules: { 
            firstName:{
                required: true,
                maxlength: 30,
                minlength: 3,
                regexp_firstName: true
            }, 
            // lastName:{
            //     required: true,
            //     maxlength: 30,
            //     minlength: 3,
            //     regexp_lastName: true,
            // }, 
            // email:{
            //     required: true,
            //     maxlength: 100,
            //     regexp_email: true,
            // },
            // password:{
            //     required: true,
            //     maxlength: 50,
            //     minlength: 5,
            //     regexp_password: true,
            //     }, 
            // password_validation:{
            //     required: true,
            //     equalTo: "#password",
            //     }, 
            },	    	 
        // messages:{	
        //         // firstName:
        //         // {
        //         //     required: 'un prénom est obligatoire',
        //         //     maxlength: 'la longueur maximum est de 30 characteres',
        //         //     minlength: 'la longueur minimum est de 3 characteres',	
        //         // },
        //         // lastName:
        //         // {
        //         //     required: 'un nom de famille est obligatoire',
        //         //     maxlength: 'la longueur maximum est de 30 characteres',	
        //         //     minlength: 'la longueur minimum est de 3 characteres',	
        //         // },
        //         // email:
        //         // {
        //         //     required: 'un email est obligatoire',
        //         //     maxlength: 'la longueur maximum est de 100 characteres',	
        //         // },
        //         // password:
        //         // {
        //         //     required: 'un mot de passe est obligatoire'	,                    
        //         //     maxlength: 'la longueur maximum est de 50 characteres',	
        //         //     minlength: 'la longueur minimum est de 5 characteres'
        //         // },
        //         // password_validation:
        //         // {
        //         //     required: 'un mot de passe est obligatoire'	,
        //         //     equalTo : 'doit être pareil au mot de passe',
        //         // },
        //     } 
    });


    $.validator.addMethod("regexp_firstName", 
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

</html>
