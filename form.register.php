<?php 
	require 'model.collection.php';
	$regions = getAllRegion();

	if (isset($_GET['msg'])) {
		$msg = $_GET['msg'];
	}

	if (isset($_GET['CIN']))
	{
		$CINMedecin = $_GET['CIN'];
	}
	

	/*----------------------------------------------
	PREMIER ENVOI DU FORMULAIRE
	-----------------------------------------------*/

	if (isset($_POST['CINMedecin']))
	{
		$CIN = $_POST['CINMedecin'];
		$Nom_Medecin = $_POST['Nom_Medecin'];
		$Telephone = $_POST['Telephone'];
		$Region = $_POST['ID_Region'];

		$provinces = getProvinceByRegion($Region);
		$NomRegion = getRegionByID($Region); 
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

    <title>ESPACE COTISATION - Register</title>

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
		      <?php if (!isset($CIN)) { ?>

		      	<form class="form-login" action="<?= $_SERVER['PHP_SELF'] ?>" method="POST" id="formulaire">
			      	<input type="hidden" name="CINMedecin" value="<?= $CINMedecin ?>">
			        <h2 class="form-login-heading">Enregistrement</h2>
			        <div class="row">
								<div class="login-wrap">
									<input type="text" name="Nom_Medecin" class="form-control" placeholder="Nom complet" autofocus required data-type="string">
									<br>
									<input type="tel" name="Telephone" value="" placeholder="Téléphone Mobile" class="form-control" required>
									<br>
									<select name="ID_Region" id="" class="form-control">
										<?php foreach ($regions as $reg) { ?>
											<option value="<?= $reg->ID_Region ?>"><?php echo $reg->Nom_Region ?></option>
										<?php } ?>
									</select>
									<br>
									<button class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i> Valider</button>
									<br>
									<span>
										<a href="https://cnom.ma/"> Retour au site</a>
									</span>		
									<br>						
								</div>
							</div>
			    	</form>

		      <?php } else { ?>
		      	<form class="form-login" action="app.controller.php?action=register" method="POST" id="formulaire">

			      	<input type="hidden" name="CINMedecin" value="<?= $CIN ?>">
			      	<input type="hidden" name="Nom_Medecin" value="Dr <?php echo $Nom_Medecin ?>">
			      	<input type="hidden" name="Telephone" value="<?php echo $Telephone ?>">
			      	<input type="hidden" name="Region" value="<?php echo $NomRegion->Nom_Region ?>">

			        <h2 class="form-login-heading">Enregistrement</h2> 
			        <div class="row">
								<div class="login-wrap">
									<p>Nom : Dr <?php echo $Nom_Medecin ?></p>
									<br>
									<p>Telephone : <?php echo $Telephone ?></p>
									<br>
									<p>Region : <?php echo $NomRegion->Nom_Region ?></p>
									<br>
									<Label>Province : </Label>
									<select name="ID_Province" id="" class="form-control">
										<?php foreach ($provinces as $province) { ?>
											<option value="<?= $province->ID_Province ?>"><?php echo $province->Nom_Province ?></option>
										<?php } ?>
									</select>
									<br>
									<button class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i> Valider</button>
									<br>
									<span>
										<a href="https://cnom.ma/"> Retour au site</a>
									</span>		
									<br>						
								</div>
							</div>
			    	</form>
			    <?php } ?>


<?php include '_form.footer.php'; ?>