<?php 
	if (isset($_GET['msg'])) {
		$msg = $_GET['msg'];
	}

	$page = 'Mot de passé oublié ?';
  	include '_form.header.php';


?>

<div id="login-page">
		<div class="container">
			
			<div class="notification">
				<?php if (isset($msg)) { require '_utils.php'; } ?>
	  	</div>
		      <form class="form-login" action="app.controller.php?action=resetPassword" method="POST" id="formulaire">
		        <h2 class="form-login-heading">Mot de passe oublié</h2>
		        <div class="row">
								<div class="login-wrap">
								<p class="form-detail">Réinitialiser votre mot de passe</p><br>
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