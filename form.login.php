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

    <title>ESPACE COTISATION - Login</title>

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
		      <form class="form-login" action="app.controller.php?action=login" method="POST" id="formulaire">
		        <h2 class="form-login-heading">Espace COTISATION</h2>
		        <div class="row">
							<div class="login-wrap">
								<label for=""><b>CIN *</b></label>
								<input type="text" name="CINMedecin" class="form-control" placeholder="CIN" autofocus required data-type="string">
								<br>
								<label for=""><b>Mot de passe *</b></label>
								<input type="password" name="Pwd" class="form-control" placeholder="Mot de passe" required data-type="string">
								<p>Mot de passe par défaut : 12345</p>
								<label class="checkbox">
									<span class="pull-right">
										<a href="form.forgetPassword.php"> Mot de passe oublié ?</a> 
									</span>
								</label>
								<button class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i> Connexion</button>
								<br>
								<span>
									<a href="https://cnom.ma/"> Retour au site</a>
								</span>		
								<br>						
							</div>
						</div>
		    	</form>	 

<?php include '_form.footer.php'; ?>