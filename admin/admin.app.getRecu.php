<?php 
	require '../app.soapClient.php';
  	require '../model.collection.php';

  	if (!isset($_POST['submit']))
  	{
  		header("Location:admin.view.addCotisation.php?msg=403");
  	}
  	else 
  	{	
		$NumTransaction =	$_POST['NumTransaction'];
  		$CIN 			= 	$_POST['CIN'];
  		
  		// Récupération du reçu
  		$getRecu = GetRecuCotisation($NumTransaction, $CIN);
  		$recu_paiement = $getRecu->GetRecuCotisationPayerAvecAuthResult->MedecinCotisationPayee;	

  		if ($recu_paiement) {

  			// Appel à la fonction pour recupération info médecin
		  	$response = getInfoMedecin($CIN);

			// Appel a la fonction getMedecin pour recuperer le mail du medecin
			$DBMedecin = getUserByCIN($CIN);
			$mail = $DBMedecin->Email;
		  
			// Recuperation medecin
			$medecin = $response->GetInfoMedecinAvecAuthResult;

		  	$recu_Nom                           = $medecin->NomComplet;
		  	$recu_SecteurMedecin                = $medecin->SecteurMedecin;
		  	$recu_SpecialiteMedecin             = $medecin->SpecialiteMedecin;
		  	$recu_DateDiplome                   = $medecin->DateDiplome;
		  	$recu_DateRecrutement_Installation  = $medecin->DateRecrutement_Installation;
		  	$recu_AdressePro                    = $medecin->AdressePro;
		  	$recu_Province                      = $medecin->LibelleProvince;
		  	$recu_Region                        = $medecin->LibelleRegion; 
		  	$recu_DateCreation                  = date("d/m/Y");

		  	// Si il y a plusieurs lignes
	  		if (is_array($recu_paiement))
	  		{
	  			
	  			// Données variables en fonction du nbr années payées
			  	$recu_CINMedecin        = $recu_paiement[0]->CINMedecin;
			  	$recu_NumTransaction    = $recu_paiement[0]->NumRecuTransaction;
			  	$recu_NumRecu           = array();
			  	$recu_AnneeCotisation   = array();
			  	$recu_MontantCotisation = array();
			  	$recu_Somme             = array();

			  	for ($i = 0; $i < count($recu_paiement); $i++)
				{
				    $a = $recu_paiement[$i]->AnneeCotisation;
				    $m = $recu_paiement[$i]->MontantCotisation;
				    $s = '';
				    $r = $recu_paiement[$i]->NumRecuGenere;

				    if ($a == '2009' || $a == '2010' || $a == '2011' || $a == '2012' || $a == '2013' || $a == '2014' || $a == '2015')
				    {
				      $s = "Trois Cent";
				    }
				    elseif ($a == '2016' || $a == '2017' || $a == '2018') {
				      $s = "Sept Cent";
				    }
				    else {
				      $s = "Cinq Cent";
				    }
				    
				    array_push($recu_NumRecu, $r);
				    array_push($recu_AnneeCotisation, $a);
				    array_push($recu_Somme, $s);
				    array_push($recu_MontantCotisation, $m);
				  }

	  		} // endif
	  		// Si il y a une seule ligne
	  		else 
	  		{

	  			// Données variables en fonction du nbr années payées
			  	$recu_CINMedecin        = $recu_paiement->CINMedecin;
			  	$recu_NumTransaction    = $recu_paiement->NumRecuTransaction;
			  	$recu_NumRecu           = $recu_paiement->NumRecuGenere;
			  	$recu_AnneeCotisation   = $recu_paiement->AnneeCotisation;
			  	$recu_MontantCotisation = "";
			  	$recu_Somme             = "";

			  	$a = $recu_paiement->AnneeCotisation;
			    $m = $recu_paiement->MontantCotisation;
			    $s = '';

			    if ($a == '2009' || $a == '2010' || $a == '2011' || $a == '2012' || $a == '2013' || $a == '2014' || $a == '2015')
			    {
			      $s = "Trois Cent";
			    }
			    elseif ($a == '2016' || $a == '2017' || $a == '2018') {
			      $s = "Sept Cent";
			    }
			    else {
			      $s = "Cinq Cent";
			    }

			  	$recu_MontantCotisation = $m;
			  	$recu_Somme             = $s;

	  		} //endelse

	  		session_start();
	  		$_SESSION['RecuPaiement'] = (object) array (
	  			'CINMedecin'					=>	$recu_CINMedecin,
	  			'NumTransaction'				=>	$recu_NumTransaction,
	  			'NumRecu'						=>	$recu_NumRecu,
	  			'Nom'							=>	$recu_Nom,
	  			'SecteurMedecin'				=>	$recu_SecteurMedecin,
	  			'SpecialiteMedecin'				=>	$recu_SpecialiteMedecin,
	  			'DateDiplome'					=>	$recu_DateDiplome,
	  			'DateRecrutement_Installation'	=>	$recu_DateRecrutement_Installation,
	  			'AdressePro'					=>	$recu_AdressePro,
	  			'Province'						=>	$recu_Province,
	  			'Region'						=>	$recu_Region,
	  			'DateCreation'					=>	$recu_DateCreation,
	  			'AnneePayee'					=>	$recu_AnneeCotisation,
	  			'MontantCotisation'				=>	$recu_MontantCotisation,
	  			'Somme'							=>	$recu_Somme,
				'Email'							=>	$mail
	  		);


	  		header('Location:admin.view.getRecu.php?msg=createCotOk');

  		} 
  		// Fin de 'Si Recu de paiement'
  		else 
  		{
  			header("Location:admin.view.addCotisation.php?msg=findCotFail");
  		}
  	}
?>