<?php 
  session_start();
  require 'app.soapClient.php';
  require 'model.collection.php';


  if (isset($_SESSION['medecin'])) {
    $medecin = $_SESSION['medecin'];

    // Mise à jour information médecin
    $cin = $medecin->CINMedecin;
    $DBtelephone = $medecin->Telephone;
    $DBemail = $medecin->Email;
    $DBregion = $medecin->NomRegion;
    $DBprovince = $medecin->NomProvince;
 
    $GetInfoMedecin = getInfoMedecin($cin);
    $response = $GetInfoMedecin->GetInfoMedecinAvecAuthResult;

    // Informations récdupéré du webservice
    $wemail = $response->Email;
    $wtelephone = $response->TelephoneMobile;
    $wregion = $response->LibelleRegion;
    $wprovince = $response->LibelleProvince;
    
    $wsecteurMedecin = $response->SecteurMedecin;
    $wspecialite = $response->SpecialiteMedecin;
    $wdateDiplome = $response->DateDiplome;
    $wdateRecrutement = $response->DateRecrutement_Installation;
    $wadresse = $response->AdressePro;

    $pattern = "/^[^\s()<>@,;:\/]+@\w[\w\.-]+\.[a-z]{2,}$/i";

    if (preg_match($pattern, $DBemail)) {
      $email = $DBemail;
      $has_mail = 1;
    } else {
      if (preg_match($pattern, $wemail)) {
        $email = $wemail;
        $has_mail = 1;
      }
      else {
        $email = "";
        $has_mail = 0;
      }
    }

  } else {
    header('Location:form.login.php?msg=user_404');
  }

  $cotisationsPayer     = getCotisationPayer($medecin->CINMedecin);
  $cotisationsNonPayer  = getCotisationNonPayer($medecin->CINMedecin); 

  $yearListPaid       =   $cotisationsPayer->GetCotisationPayerAvecAuthResult->MedecinCotisation->listeAnnee;
  $yearListNotPaid    =   $cotisationsNonPayer->GetCotisationNonPayerAvecAuthResult->MedecinCotisation->listeAnnee;

  if (isset($yearListPaid->AnneeVM)) {
    if (is_array($yearListPaid->AnneeVM)) {
      $AllYearPaid = $yearListPaid->AnneeVM;
      $LastYearPaid = $AllYearPaid[0];
    }
    else {
      $LastYearPaid = $yearListPaid->AnneeVM;
    }
  }
  else {
    $LastYearPaid = (object)array(
      'Annee' => 0,
      'AnneeMontant'  => 0
    );
  }

  if (isset($_GET['msg'])) {
    if ($_GET['msg'] === 'firstCon') {
      header('Location:app.logout.php?msg=dex');
    } else {
      $msg = $_GET['msg'];
    }
  }

  $cache = false;


?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>CNOM APP - Mes Cotisations </title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">    

    <!-- Filtre -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/custom.css">

  </head>

  <body>

  <section id="container" class="sidebar-closed">
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
            <!--logo start-->
            <a href="view.dashboard.php" class="logo"><b>Espace Cotisations</b></a>
            <!--logo end-->

            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                  <li><a class="logout" href="app.logout.php">Deconnexion</a></li>
            	</ul>
            </div>
        </header>
      <!--header end-->

       <!--  top menu -->
       <!-- <div class="nav" id="top_menu">
         <ul class="nav top-menu">
           <li clas="nav-item-notify"><a href="view.dashboard.php">Tableau de bord</a></li>
           <li clas="nav-item-notify"><a href="view.noPaid.php" class="btn btn-danger">Impayées</a></li>
           <li clas="nav-item-notify"><a href="view.paid.php">Historique</a></li>
           <li clas="nav-item-notify"><a href="view.user.php">Mon Profil</a></li>
           <li clas="nav-item-notify"><a href="app.logout.php?msg=exit">Retour sur cnom.ma</a></li>
          </ul>
        </div>  -->
        <div class="top-separateur"></div>

        <div class="notif">
          <p class="alert alert-info">Le service prendra fin à 23H</p>
        </div>

            <div class="container nav-option">

              <!-- OPTIONS DASHBOARD -->
              <div class="option-container">
                <div class="option">
                    <a href="view.dashboard.php">
                      <img src="assets/img/home.png" alt="">
                      <p>Accueil</p>
                    </a>
                  </div>
                </div>


                <!-- OPTIONS DASHBOARD -->
                <div class="option-container">
                  <div class="option">
                    <a href="view.noPaid.php">
                      <img src="assets/img/bill.png" alt="">
                      <p>Mes Impayées</p>
                    </a>
                  </div>
                </div>

                <!-- OPTIONS DASHBOARD -->
                <div class="option-container">
                <div class="option">
                    <a href="view.user.php">
                      <img src="assets/img/user.png" alt="">
                      <p>Mon Profil</p>
                    </a>
                  </div>
                </div>

                <div class="option-container">
                  <div class="option">
                    <a href="view.faq.php">
                      <img src="assets/img/faq.png" alt="">
                      <p>FAQ</p>
                    </a>
                  </div>
                </div>

              </div>

            <!-- Si il n'y a pas de mail -->
            <?php if ($has_mail == 0) { ?>
              <p class="text-danger hasNoMail">
                Vous n'avez pas d'email, merci d'allez dans la section profil pour configurer votre email
              </p>
            <?php } ?>