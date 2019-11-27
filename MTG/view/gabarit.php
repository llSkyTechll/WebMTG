<?php
    if (!empty($_COOKIE['CartCookie'])) {
        $cartCookie=htmlentities(unserialize($_COOKIE['Visites']));
    }
    else {
      $cartCookie = array();
    }
?>
    <!doctype html>
<html>
  <head>
  <meta charset="utf-8">
    <title><?php echo $titre ?></title>

    <link rel="stylesheet" href="css/include.css">

    <script src="https://kit.fontawesome.com/30dce125f3.js" crossorigin="anonymous"></script> <!--lien pour les icons -->

    <!-- <script type="text/javascript" src="jquery-3.4.1.min.js"></script> -->
    <script <?php if (!empty($lien_ajax)) { echo  $lien_ajax; } ?>></script>

    <script type="text/javascript" src="jquery-validation/lib/jquery-1.11.1.js"></script>
    <script type="text/javascript" src="jquery-validation/dist/jquery.validate.min.js"></script>
    <script type="text/javascript" src="jquery-validation/dist/localization/messages_fr.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link href="jquery-ui/jquery-ui.css" rel="stylesheet">
		<script src="jquery-ui/external/jquery/jquery.js"></script>
		<script src="jquery-ui/jquery-ui.js"></script>
  </head>

  <body>
    <div class="d-flex row">
      <div class="col-md-12 from-group">
        <?php require('viewMenu.php'); ?>
      </div>
      <div class="col-md-12">
        <article>
          <H1> <?php echo $titre ?></H1>
        </article>
      </div>
        <div class="col-md-12 form-group">
          <?php echo $contenu ?>
        </div>
    </div>
    <script <?php if (!empty($gestion_ajax)) {echo $gestion_ajax;} ?> ></script>
    <script>
		  $( "#accordion" ).accordion({ heightStyle: "content" });
		</script>
  </body>
</html>
