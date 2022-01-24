<?php
  session_start();
  require '../app.soapClient.php';
  require '../model.collection.php';

  $medecins = getAllUserLimit();
  $tabSize = count($medecins);

  $transactions = getAllTransaction();

  if (isset($_GET['msg'])) {
    $msg = $_GET['msg'];
  }

  /*------------------------------------------------
    Rechercher un medecin
  -------------------------------------------------*/
  if (isset($_POST['CINMedecin'])) {
    $CINMedecin = $_POST['CINMedecin'];

    // Appel à la fonction
    $response = getInfoMedecin($CINMedecin);

    if (isset($response->GetInfoMedecinAvecAuthResult)) {
      $infoMedecin = $response->GetInfoMedecinAvecAuthResult;
    } 

    $searchTurple = searchTurple($CINMedecin);

    if ($searchTurple)
    {
      $turples      =   getTurple($CINMedecin);
    }

  }

  if (isset($_POST['addMedecin'])) {
     // addMedecin ($CINMedecin, $Nom_Medecin, $Email, $Pwd, $Telephone, $NomProvince, $NomRegion, $Date_Inscription, $Date_Modification)
    
    $CINMedecin   = $_POST['CINMedecin'];
    $Nom_Medecin  = $_POST['Nom_Medecin'];
    $Email        = $_POST['Email'];
    $Telephone    = $_POST['Telephone'];
    $NomProvince  = $_POST['NomProvince'];
    $NomRegion    = $_POST['NomRegion'];
    $Pwd = '12345';
    $Date_Inscription = date('Y-m-d');
    $Date_Modification = date('Y-m-d');

    $addMedecin = addMedecin($CINMedecin, $Nom_Medecin, $Email, $Pwd, $Telephone, $NomProvince, $NomRegion, $Date_Inscription, $Date_Modification);

    if ($addMedecin)
    {
      $msg = '';
    }
  }

  /*-------------------------------------------------
    Rechercher une transaction
  ---------------------------------------------------*/
  if (isset($_POST['searchTransaction']))
  {
    $n = $_POST['NumCommande'];
    $oneTransaction = getTransaction($n);
  }

  /*-------------------------------------------------
    Voir une transaction
  ---------------------------------------------------*/
  if (isset($_GET['showTransaction']))
  {
    $n = $_GET['numTransaction'];
    $oneTransaction = getTransaction($n);
  }

  /*--------------------------------------------------
  Modifier une transaction
  ----------------------------------------------------*/
  if (isset($_GET['modifyTransaction']))
  {
    $n = $_GET['numTransaction'];
    $oneTransaction = getTransaction($n);
  }

  /*------------------------------------------------------
  Voir les cotisations d'un medecin
  --------------------------------------------------------*/
  if (isset($_POST['readCotisation']))
    { 
      $cin = $_POST['cin'];
      $cotisationsPayer     = getCotisationPayer($cin); // JE285751
      $cotisationsNonPayer  = getCotisationNonPayer($cin); // EE541129

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

    <title>CNOM APP - <?php echo $page; ?> </title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="../assets/img/favicon.png" type="image/x-icon">

    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="../assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="../assets/lineicons/style.css">

    <!-- Custom styles for this template -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/style-responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/custom.css">
  </head>

  <body>

  <section id="container" class="admin-container">
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
            <!--logo start-->
            <a href="admin.view.dashboard.php" class="logo"><b>Espace Cotisations</b></a>
            <!--logo end-->

            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                  <li><a class="logout" href="admin.logout.php">Deconnexion</a></li>
            	</ul>
            </div>
        </header>
      <!--header end-->

      <?php include '_sidebar.php' ?>
