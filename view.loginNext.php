<?php 
  session_start();

  if (!isset($_SESSION['user'])) {
    header('Location:view.login.php?msg=403');
  }

  $CINMedecin = $_SESSION['user']->CINMedecin;
  $Pwd        = $_SESSION['user']->Pwd;

    if (isset($_GET['notif'])) {
      $notif = $_GET['notif'];
    } 
    else {
      // header('Location:view.login.php?n=403');
    }

    if (isset($_GET['msg'])) {
      $msg = $_GET['msg'];
    }
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>CNOM APP - Voir ma Cotisation - Login</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

	<!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/custom.css">
  </head>

  <body>

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
<!--  -->
	<div id="login-page">
		<div class="container">
			<?php if (isset($msg)) { require '_utils.php'; } ?>
		    <form class="form-login" method="POST" id="formulaire" action="app.controller.php?action=updateLogin">
		      <h2 class="form-login-heading">CNOM COTISATION</h2>
		      <div class="row">
					  <div class="login-wrap">
              <p>NB : Les informations suivantes sont nécessaires :</p><br>
      				<input type="email" name="Email" id="email" class="form-control" autofocus placeholder="Email*" required data-type="mail">
              <p class="form-error label label-danger" data-error="mail"></p>
      				<br>
      				<input type="tel" name="Tel" id="tel" class="form-control" placeholder="Telephone*" required data-type="number">
              <p class="form-error label label-danger" data-error="number"></p>
              <span class="help-block">Format : 0600000000</span>
              <br>
              <input type="hidden" name="CINMedecin" value="<?php echo $CINMedecin ?>">
              <input type="hidden" name="Pwd" value="<?php echo $Pwd ?>">
      				<button class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i> Envoyer</button>
					  </div>
				  </div>
		    </form>
	  </div>
	</div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- <script src="assets/js/form.js" ></script> -->

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("assets/img/cnom-app-bg.png", {speed: 500});
    </script>

    <!-- CUSTOM -->
    <script src="assets/js/verif-form.js" type="text/javascript"></script>

  </body>
</html>
