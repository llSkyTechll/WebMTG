<!doctype html>
<html>
  <head>
  <meta charset="utf-8">
    <title><?php echo $titre ?></title>

    <link rel="stylesheet" href="css/include.css">

    <script src="https://kit.fontawesome.com/30dce125f3.js" crossorigin="anonymous"></script> <!--lien pour les icons -->

    <!-- <script type="text/javascript" src="jquery-3.4.1.min.js"></script> -->
    <script <?php echo  $lien_ajax ?>></script>

    
    <script type="text/javascript" src="jquery-validation/lib/jquery-1.11.1.js"></script>
    <script type="text/javascript" src="jquery-validation/dist/jquery.validate.min.js"></script>
    <script type="text/javascript" src="jquery-validation/dist/localization/messages_fr.js"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
    <script <?php echo $gestion_ajax ?> ></script>
  </body>
</html>
