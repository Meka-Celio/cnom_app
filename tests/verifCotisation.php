<?php 
	require '../app.soapClient.php';
	require '../model.collection.php';

	$GetInfoMedecin = getInfoMedecin("*11");
	$info_medecin = $GetInfoMedecin->GetInfoMedecinAvecAuthResult;

	$CINMedecin     =   "*11";
	$nom_medecin    =   $info_medecin->NomComplet;
	$Email          =   "nnhaud.celestin@gmail.com";
	$Telephone      =   "0";
	$region         =   $info_medecin->LibelleCommune;
	$province       =   $info_medecin->LibelleProvince;

	$numrecu        =   2525;
	$montant        =   500;
	$somme          =   'Cinq cent dirahm';
	$annee          =   2022;
	$numcommande    =   "WRSK1474SDD";

	$secteur = $info_medecin->SecteurMedecin;
	$specialite = $info_medecin->SpecialiteMedecin;
	$date_diplome = $info_medecin->DateDiplome;
	$date_installation_recrutement = $info_medecin->DateRecrutement_Installation;
	$daterecu = date('Y-m-d');
	$adresse_pro = $info_medecin->AdressePro;

	// LES COTISATIONS
	$cotisationsNonPayer  = getCotisationNonPayer($CINMedecin); 
	$yearListNotPaid    =   $cotisationsNonPayer->GetCotisationNonPayerAvecAuthResult->MedecinCotisation->listeAnnee;
	$AnneeVMNotPaid = $yearListNotPaid->AnneeVM;

	$cache = 0;

?>

<table cellspacing="1" 
cellpadding="10" 
border="1">
	<tbody>
		<tr>
			<th>CIN</th>
			<th>NOM</th>
			<th>EMAIL</th>
			<th>TELEPHONE</th>
			<th>REGION</th>
			<th>PROVINCE</th>
			<th>NUMRECU</th>
			<th>MONTANT</th>
			
		</tr>
		<tr>
			<td><?= $CINMedecin ?></td>
			<td><?= $nom_medecin ?></td>
			<td><?= $Email ?></td>
			<td><?= $Telephone ?></td>
			<td><?= $region ?></td>
			<td><?= $province ?></td>
			<td><?= $numrecu ?></td>
			<td><?= $montant ?></td>
			
		</tr>

		<tr>
			<th>SOMME</th>
			<th>ANNEE</th>
			<th>NUMCOMMANDE</th>
			<th>SECTEUR</th>
			<th>SPECIALITE</th>
			<th>DATE DIPLOME</th>
			<th>DATE INSTALLATION</th>
			<th>DATE RECU</th>
		</tr>
		<tr>
			<td><?= $somme ?></td>
			<td><?= $annee ?></td>
			<td><?= $numcommande ?></td>
			<td><?= $secteur ?></td>
			<td><?= $specialite ?></td>
			<td><?= $date_diplome ?></td>
			<td><?= $date_installation_recrutement ?></td>
			<td><?= $daterecu ?></td>
		</tr>

		<tr>
			<th colspan="8">ADRESSE PRO</th>
		</tr>
		<tr>
			<td colspan="8"><?= $adresse_pro ?></td>
		</tr>
	</tbody>
</table>

<br><br><br>

<table cellpadding="8">
	<tbody>
		<form action="test.controller.php?action=verifC" method="post">

			<input type="hidden" name="CIN" value="<?= $CINMedecin ?>">
			<input type="hidden" name="cache" value="<?= $cache ?>">

			<?php foreach ($AnneeVMNotPaid as $NotPaid)  { ?>
				<tr>
					<td><input type="checkbox" name="NotPaid[]" value="<?= $NotPaid->AnneeMontant ?>"></td> 
					<td><?= $NotPaid->Annee ?></td>
					<td><?= substr($NotPaid->AnneeMontant, 7) ?> DH</td>
				</tr>
			<?php } ?>

			<tr>
				<td>
					<input type="submit" name="submit" value="Payer Ma cotisation">
				</td>
			</tr>
				

		</form>
	</tbody>
</table>

<!-- <form action="test.controller.php?action=verifC" method="post">
	<input type="hidden" name="CINMedecin" value="*11">
	<label for="">2022 <input type="checkbox" name="years[]" id="" value="2022"></label>
	<label for="">2021 <input type="checkbox" name="years[]" id="" value="2021"></label>
	<label for="">2020 <input type="checkbox" name="years[]" id="" value="2020"></label>
	<label for="">2019 <input type="checkbox" name="years[]" id="" value="2019"></label>
	<input type="submit" name="submit" value="Payer ma cotisation">
</form>

<form action="test.controller.php?action=verifC" method="post">
	<input type="hidden" name="CINMedecin" value="GB186224">
	<label for="">2022 <input type="radio" name="years" id="" value="2022"></label>
	<input type="submit" name="submit" value="Payer ma cotisation">
</form> -->