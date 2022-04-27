<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>CNOM APP - <?= $page ?></title>

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

      <header>
          <div class="head-form">
              <div class="container">
                <div class="notification">
                  <?php if (isset($msg)) { require '_utils.php'; } ?>
                </div>
                <div id="rafraichir" style="color:#fff; font-size:20px; text-align:center">
                  Merci de rafaichir la page avec [ctrl + F5] avant de vous conneter
                </div>
                <div class="branding">
                    <img src="assets/img/logo.jpeg" alt="logo cnom">
                </div>
                <div class="title">
                    <h1>Bienvenue sur Espace Cotisation</h1>
                    <p class="subtitle">Portail de paiement en ligne des cotisations CNOM</p>
                </div>
              </div>
          </div>
      </header>

      