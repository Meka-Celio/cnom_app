<?php 
	if (isset($_GET['msg'])) {
		$msg = $_GET['msg'];
	}

	$page = 'Connexion';

	include '_form.header.php';

?>


      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

	<div id="login-page">
		<div class="container">
			
			
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