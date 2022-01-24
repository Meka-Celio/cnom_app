<?php 
  require 'collection.php';
  $regions = getAllRegion();

  function createPassword ($nbr_chara = 15) {
    $chaine = "abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'(-{[|)]}=.+/";
    $maxL = strlen($chaine);
    $pwd = "";

    for ($i=0; $i<$nbr_chara; $i++) {
        $pwd .= $chaine[rand(0, $maxL-1)];
    }

    $pwd = password_hash($pwd, PASSWORD_DEFAULT);
    return $pwd;
  }

  if (isset($_GET['reg'])) {
		$notif = $_GET['reg'];
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

    <title>CNOM APP - Inscription</title>

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

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

	  <div id="register-page">
	  	<div class="container">

        <?php if (isset($notif)) { require 'utils.php'; } ?>
	  	
		      <form class="form-register col-md-12" action="controller.php?a=register" method="post">
		        <h2 class="form-register-heading">Inscription</h2>
		        
            <div class="login-wrap col-md-6">
              <label for="CINMedecin">CIN *</label>
              <input type="text" name="CINMedecin" id="CINMedecin" class="form-control" autofocus required="">
              <br>
                  
              <label for="nomMedecin">Nom *</label>
              <input type="text" name="nomMedecin" id="nomMedecin" class="form-control" required>
              <br>
                  
              <label for="prenomMedecin">Prénom *</label>
              <input type="text" name="prenomMedecin" id="prenomMedecin" class="form-control" required>
              <br>

              <label for="H" style="padding-right:25px;">Homme
                <input type="radio" name="sexe" id="H" value="H" checked="">
              </label>
                  
              <label for="F">Femme
                <input type="radio" name="sexe" id="F" value="F">
              </label> 
              <br><br>

              <label for="gsm1">Téléphone</label>
              <input type="tel" name="gsm1" id="gsm1" class="form-control">
              <br>

              <label for="gsm2">Téléphone 2</label>
              <input type="tel" name="gsm2" id="gsm2" class="form-control">
              <br>
            </div>

            <div class="login-wrap col-md-6">
              <label for="fax">Fax</label>
              <input type="tel" name="fax" id="fax" class="form-control">
              <br>

              <label for="email">E-Mail *</label>
              <input type="email" name="email" id="email" class="form-control" required>
              <br>

              <label for="adresse">Adresse</label>
              <input type="text" name="adresse" id="adresse" class="form-control">
              <br>

              <input type="hidden" name="date_inscription" value="<?= date('Y/m/d') ?>">
              <input type="hidden" name="pwd" value="<?= createPassword() ?>">

              <label for="id_Reg">Région</label>
              <select name="id_Reg" id="id_Reg" class="form-control">
                <?php foreach($regions as $reg) { ?>
                  <option value="<?= $reg->idReg ?>"><?= $reg->nomRegion ?></option>
                <?php } ?>
              </select>
              <br>

              <button class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i> S'inscrire</button>
              <hr>
                  
              <div class="registration">
                  Déjà un compte?<br/>
                  <a class="" href="login.php">
                      Connectez-vous
                  </a>
              </div>
            </div>
		      </form>	  	
	  	
	  	</div>
	  </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("assets/img/cnom-app-bg.png", {speed: 500});
    </script>

    <!--my script -->
    <script type="text/javascript" src=""></script>


  </body>
</html>



