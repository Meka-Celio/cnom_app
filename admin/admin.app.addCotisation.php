<?php 
	require '../app.soapClient.php';

	// addCotisation
	if (!isset($_POST['submit']))
	{
		header('Location:admin.view.addCotisation.php?msg=403');
	}
	else
	{	
		$CINMedecin 		= $_POST['CINMedecin'];
      	$NumTransaction 	= $_POST['NumTransaction'];
      	$IdParamCotisation 	= $_POST['IdParamCotisation'];

      	// Appel de la fonction
      	$addCotisation = AjoutCotisation($CINMedecin, $NumTransaction, $IdParamCotisation);

      	if ($addCotisation) {
        	$msg = 'addCotOk';
      	}
      	else 
      	{
        	$msg = 'addCotFail';
      	}
      	header("Location:admin.view.addCotisation.php?msg=$msg&CINMedecin=$CINMedecin&NumTransaction=$NumTransaction&Annees=$IdParamCotisation");
	}
