<?php 
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

    <title>ESPACE COTISATION - Admin</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="../assets/img/favicon.png" type="image/x-icon">

    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/style-responsive.css" rel="stylesheet">

	<!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/custom.css">
  </head>

  <body id="admin-login">

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

	<div id="login-page" class="admin admin-form">
		<div class="container">
			
			<div class="notification">
				<?php if (isset($msg)) { require '_utils.php'; } ?>
	  	</div>
		      <form class="form-login" action="admin.app.controller.php?action=adminLogin" method="POST" id="formulaire">
		        <h2 class="form-login-heading">Admin <br> Espace COTISATION</h2>
		        <div class="row">
							<div class="login-wrap">
								<input type="text" name="Login" class="form-control" placeholder="login" autofocus required data-type="string">
								<br>
								<input type="password" name="Pwd" class="form-control" placeholder="Mot de passe" required data-type="string">
								<label class="checkbox">
									<span class="pull-right">
										<a href="form.adminForgetPassword.php"> Mot de passe oublié ?</a>
									</span>
								</label>
								<button class="btn btn-success btn-block" type="submit"><i class="fa fa-lock"></i> Connexion</button>
								<br>
								<span>
									<a href="https://cnom.ma/"> Retour au site</a>
								</span>		
								<br>						
							</div>
						</div>
		    	</form>	
	  	
	  	</div>
	</div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="../assets/js/jquery.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="../assets/js/jquery.backstretch.min.js"></script>

  </body>
</html>
