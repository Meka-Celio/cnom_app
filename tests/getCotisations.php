<?php 
require '../app.soapClient.php';
	

  	if (isset($_POST['submit']))
  	{	
  		$cin = $_POST['cin'];
  		$cotisationsPayer     = getCotisationPayer($cin); // JE285751
  		$cotisationsNonPayer  = getCotisationNonPayer($cin); // EE541129
  		$existeMedecin 		=	$cotisationsNonPayer->GetCotisationNonPayerAvecAuthResult->MedecinCotisation->ExisteMedecin;

  		echo 'IMPAYEES <br>';
  		var_dump($cotisationsPayer);
  		echo '<br> PAYEES <br>';
  		var_dump($cotisationsNonPayer);

  		if ($existeMedecin) 
  		{
	  		$yearListNotPaid    =   $cotisationsNonPayer->GetCotisationNonPayerAvecAuthResult->MedecinCotisation->listeAnnee;
	  		$yearListPaid    =   $cotisationsPayer->GetCotisationNonPayerAvecAuthResult->MedecinCotisation->listeAnnee;

	  		var_dump($yearListPaid);

	  		if (isset($yearListNotPaid->AnneeVM))
	  		{
	  			$AnneeVMNotPaid = $yearListNotPaid->AnneeVM;
	  			if (is_array($AnneeVMNotPaid))
			  	{
			  		$tabNotPaid = 'array';
			  	}
			  	else
			  	{
			  		$tabNotPaid = 'object';
			  	}
	  		}
	  		else
	  		{
	  			$tabNotPaid = 'none';
	  		}

	  		if (isset($yearListPaid->AnneeVM))
	  		{
	  			$AnneeVMPaid = $yearListPaid->AnneeVM;
	  			if (is_array($AnneeVMPaid))
	  			{
	  				$tabPaid = 'array';
	  			}
	  			else {
	  				$tabPaid = 'object';
	  			}
	  		}
	  		else 
	  		{
	  			$tabPaid = 'none';
	  		}

	  		/*echo 'COTISATION NON PAYEES !!! <br>';
	  		echo '<pre>';
		  	var_dump($yearListNotPaid);
		  	echo '</pre>';
		  	echo 'COTISATION PAYEES !!! <br>';
		  	echo '<pre>';
		  	var_dump($yearListPaid);
		  	echo '</pre>';*/
		  	
  		}
  	}

?>


<form action="#" method="post">
	<input type="text" name="cin" value="" placeholder="CIN">
	<input type="submit" name="submit" value="Voir">
</form>


<table cellpadding="4" cellspacing="4" border="1">
	<thead>
		<tr>
			<th>CIN</th>
			<th>ID</th>
			<th>Annee-Montant</th>
			<th>Statut</th>
		</tr>
	</thead>
	<tbody>
		<?php if($tabNotPaid == 'array') { ?>
			<?php for ($i=0; $i < count($AnneeVMNotPaid); $i++) { ?>
				<tr>
					<td><?php echo $cin ?></td>
					<td><?php echo $AnneeVMNotPaid[$i]->Id ?></td>
					<td><?php echo $AnneeVMNotPaid[$i]->AnneeMontant ?></td> 
					<td>Non Payée</td>
				</tr>
			<?php } ?>
		<?php } ?>
	</tbody>
</table>

<br>

<table cellpadding="4" cellspacing="4" border="1">
	<thead>
		<tr>
			<th>CIN</th>
			<th>ID</th>
			<th>Annee-Montant</th>
			<th>Statut</th>
		</tr>
	</thead>
	<tbody>
		<?php if($tabPaid == 'array') { ?>
			<?php for ($j=0; $j < count($AnneeVMPaid); $j++) { ?>
				<tr>
					<td><?php echo $cin ?></td>
					<td><?php echo $AnneeVMPaid[$j]->Id ?></td>
					<td><?php echo $AnneeVMPaid[$j]->AnneeMontant ?></td> 
					<td>Payée</td>
				</tr>
			<?php } ?>
		<?php } ?>
	</tbody>
</table>