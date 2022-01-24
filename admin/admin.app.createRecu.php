<?php 




if (isset($_SESSION['RecuPaiement']))
{

  $recu     = $_SESSION['RecuPaiement'];
  var_dump($recu);

  $recu_CINMedecin        = $recu[0]->CINMedecin;
  $recu_NumTransaction    = $recu[0]->NumRecuTransaction;
  $recu_NumRecu           = $recu[0]->NumRecuGenere;
  $recu_AnneeCotisation   = array();
  $recu_MontantCotisation = array();
  $recu_Somme             = array();

  // Appel à la fonction
  $response = getInfoMedecin($recu_CINMedecin);
  
  // Recuperation
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

  for ($i = 0; $i < count($recu); $i++)
  {
    $a = $recu[$i]->AnneeCotisation;
    $m = $recu[$i]->MontantCotisation;
    $s = '';
    
    $frais = $m * (1.32/100);
    $montant = $m + $frais;

    if ($a == '2009' || $a == '2010' || $a == '2011' || $a == '2012' || $a == '2013' || $a == '2014' || $a == '2015')
    {
      $s = "Trois Cent Trois, Quatre-Vingt-Seize";
    }
    elseif ($a == '2016' || $a == '2017' || $a == '2018') {
      $s = "Sept Cent Neuf, Vingt-Quatre";
    }
    else {
      $s = "Cinq Cent Six, Soixante";
    }
    
    array_push($recu_AnneeCotisation, $a);
    array_push($recu_Somme, $s);
    array_push($recu_MontantCotisation, $montant);
  }

}

?>