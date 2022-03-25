<?php 
	require '../app.soapClient.php';
	require '../model.collection.php';


	/**
	 * Permet de vérifier si la dernière année à payer fait parti 
	 * des années à payer dans le paiement en cours
	 * 
	 * @param string	$CINMedecin			La CIN du médecin qui paie
	 * @param string	$chaine				Les années à payer sous forme de chaine de caractères
	 * 
	 * @var array		$AnneeVM			Tableau contenant les cotisation du médecin
	 * @var array 		$yearsNotPaid		Tableau qui récupère les annéees
	 * 
	 * @var string		$oldOneYear			La plus vielle année à régler
	 * @var string 		$firstYear			La plus récente année à régler
	 * @var string 		$stringYears		La chaine de caractères des années
	 * @var string 		$longueur_chaine	La longueur de la chaine de la plus récente à la plus ancienne année	
	 * 	
	 * @return int							Indication renvoyée pour savoir si la vérification est bonne ou pas
	 */

	function verifCotisation ($CINMedecin, $chaine) {

		// Récupération des impayees de $CINMedecin
		$getImpayees = getCotisationNonPayer($CINMedecin);

		// Récupération du tableau des cotisations impayees 
		$AnneeVM = $getImpayees->GetCotisationNonPayerAvecAuthResult->MedecinCotisation->listeAnnee->AnneeVM;

		// Variables
		$yearsNotPaid 		= 	[];
		$oldOneYear 		= 	"";
		$firstYear			=	"";
		$stringYears		=	"";
		$longueur_chaine	=	0;

		if (is_array($AnneeVM)) {
			// Ajout des années dans le tableau et du dernier element dans la variable $oldOneYear
			for ($i=0; $i < count($AnneeVM); $i++) {
				array_push($yearsNotPaid, $AnneeVM[$i]->Annee);
				$oldOneYear = strval($AnneeVM[$i]->Annee);
			}
		}
		else {
			array_push($yearsNotPaid, $AnneeVM->Annee);
		}

		// Attribution de la première année
		$firstYear	=	strval($yearsNotPaid[0]);
		
		// Vérifier que $oldOneYear est dans $chaine
		if (stristr($chaine, $oldOneYear)) {
			// vérifier que la premiere annee est dans la chaine
			if (stristr($chaine, $firstYear))
			{
				$stringYears 	= implode(',', $yearsNotPaid);
				$longueur_chaine = strlen($stringYears);

				if (strlen($chaine) === $longueur_chaine) {
					return 1;
				}
				else {
					return -1;
				}
			}
			else 
			{
				return 2;
			}
		} 
		else {
			return 0;
		}
	}

	if (isset($_POST['submit'])) {
		var_dump($_POST);
		$CINMedecin 	= $_POST['CINMedecin'];
		if (is_array($_POST['years'])) {
			$years 	= implode(',', $_POST['years']);
		}
		else {
			$years = $_POST['years'];
		}
		$validation = verifCotisation($CINMedecin, $years);
		
		echo "<h2>Résultats</h2>";

		if ($validation == 0) {
			echo "ERREUR : L'année la plus ancienne n'a pas été coché !";
		} else if ($validation == -1) {
			echo "ERREUR : Vous ne pouvez pas régulariser l'année la plus récente sans régulariser les autres !";
		}
		else if ($validation == 1) {
			echo "SUCCES : Vous pouvez maintenant passer au paiement de vos cotisations !";
		}
		else {
			echo "SUCCES : Pensez à vous mettre à jour";
		}
	}

?>

<form action="#" method="post">
	<input type="hidden" name="CINMedecin" value="*11">
	<label for="">2022 <input type="checkbox" name="years[]" id="" value="2022"></label>
	<label for="">2021 <input type="checkbox" name="years[]" id="" value="2021"></label>
	<label for="">2020 <input type="checkbox" name="years[]" id="" value="2020"></label>
	<label for="">2019 <input type="checkbox" name="years[]" id="" value="2019"></label>
	<input type="submit" name="submit" value="Payer ma cotisation">
</form>

<form action="#" method="post">
	<input type="hidden" name="CINMedecin" value="GB186224">
	<label for="">2022 <input type="radio" name="years" id="" value="2022"></label>
	<input type="submit" name="submit" value="Payer ma cotisation">
</form>