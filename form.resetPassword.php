<?php 
	
	if (!isset($_GET['email'])) {
		if (isset($_GET['msg'])) {
			$msg = $_GET['msg'];
		}
		else {
			header('Location:form.forgetPassword.php?msg=403');
		}
	}
	else {
		$email = $_GET['email'];
	}

	$page = 'Réinitialiser mon mot de passe';
	include '_form.header.php';

?>

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

	<div id="login-page">
		<div class="container">
			
			<div class="notification">
				<?php if (isset($msg)) { require '_utils.php'; } ?>
	  	</div>
		      <form class="form-login" action="app.controller.php?action=changePassword" method="POST" id="formulaire">
		        <h2 class="form-login-heading">Reinitialiser <br>mon mot de passe</h2>
		        <div class="row">
							<div class="login-wrap">
							<p class="form-detail">Réinitialiser votre mot de passe</p><br>
								<label for="">Renseigner votre CIN</label>
								<input type="text" name="CINMedecin" placeholder="CIN" class="form-control" required>
								<br>
								<label for="">Renseigner votre E-mail</label>
								<?php if (isset($email)) { ?>
									<input type="email" name="Email" placeholder="E-mail" class="form-control" value="<?php echo $email ?>" required>
								<?php } else { ?>
									<input type="email" name="Email" placeholder="E-mail" class="form-control" value="" required>
								<?php } ?>
								<br>
								<label for="">Nouveau mot de passe</label>
								<input type="password" name="Pwd" placeholder="Nouveau mot de passe" class="form-control" required>
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