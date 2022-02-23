<?php
	session_start();
	$medecin 	= $_SESSION['medecin'];

	if (isset($_GET['msg'])) {
		$msg = $_GET['msg'];
	}

	if (isset($_GET['mail'])) 
	{
		if ($_GET['mail'] == 'ok') 
		{
			$mail = $medecin->Email;
		}
	}

	$page = 'Première connexion';

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
		    <form class="form-login" action="app.controller.php?action=updatePasswordFirstCon" method="POST" id="formulaire">
		    	<h2 class="form-login-heading">Première connexion</h2>
		        <div class="row">
					<div class="login-wrap">
						<input type="hidden" name="CINMedecin" value="<?php echo $medecin->CINMedecin ?>">
						<label for="">Email* :</label>
						<input type="email" name="Email" class="form-control" placeholder="Email" required data-type="string">
						<br>
						<label for="">Nouveau mot de passe * :</label>
						<input type="password" name="Pwd" class="form-control" placeholder="Nouveau mot de passe" required data-type="string">
						<br>
						<button class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i> Valider</button>	

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