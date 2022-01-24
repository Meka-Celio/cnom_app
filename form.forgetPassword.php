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

    <title>CNOM APP - Mot de passe oublié</title>

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

	<div id="login-page">
		<div class="container">
			
			<div class="notification">
				<?php if (isset($msg)) { require '_utils.php'; } ?>
	  	</div>
		      <form class="form-login" action="app.controller.php?action=resetPassword" method="POST" id="formulaire">
		        <h2 class="form-login-heading">Mot de passe oublié</h2>
		        <div class="row">
								<div class="login-wrap">
									<label for="">Renseigner votre E-mail</label>
									<input type="email" name="email" value="" placeholder="E-mail" class="form-control" required>
									<br>
									<button class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i> Envoyer</button>	
									<label class="checkbox">
										<a href="https://cnom.ma/"> Retour au site</a>
										<span class="pull-right">
											<a href="form.login.php"> Connectez-vous</a>
										</span>
									</label>			
								</div>
							</div>
		    	</form>	

		    	<?php include '_form.footer.php'; ?>