<?php 
  require_once 'model.collection.php';

  $regions = getAllRegion();

  if (isset($_POST['Region'])) {

    $postCIN      = $_POST['CINMedecin'];
    $postNom      = $_POST['Nom_Medecin'];
    $postMail     = $_POST['Email'];
    $postTel      = $_POST['Telephone'];
    $ID_Region    = $_POST['Region'];
    $Region = "";

    foreach ($regions as $region) {
      if ($ID_Region === $region->ID_Region) {
        $Region = $region->Nom_Region;
      }
    }

    $provinces = getProvinceByRegion($_POST['Region']);
  }

  $page = 'Réclamation : Ajouter ma CIN dna sle système';
  include '_form.header.php';

 ?>

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

	<div id="reclamation-page">
		<div class="container">
			
			<?php if (isset($msg)) { require '_utils.php'; } ?>

          <?php if (isset($provinces)) { ?>
          	<!-- Formulaire de réclamation complet -->
            <form class="form-login" action="app.controller.php?action=reclam" method="POST" id="formulaire">
              <h2 class="form-login-heading">Réclamation</h2>
              <div class="row">
                <div class="login-wrap">
                  <p><b>CIN :</b> <br> <?= $postCIN ?></p>
                  <p><b>Nom & Prénom :</b> <br> <?= $postNom ?></p>
                  <p><b>Email :</b> <br> <?= $postMail ?></p>
                  <p><b>Telephone :</b> <br> <?php echo $postTel ?></p>
                  <p><b>Region :</b> <br> <?= $Region ?></p>
                  <br>

                  <input type="hidden" name="CINMedecin" value="<?php echo $postCIN ?>">
                  <input type="hidden" name="Nom_Medecin" value="<?php echo $postNom ?>">
                  <input type="hidden" name="Email" value="<?php echo $postMail ?>">
                  <input type="hidden" name="Telephone" value="<?php echo $postTel ?>">
                  <input type="hidden" name="Region" value="<?php echo $ID_Region ?>">

                  <!-- A afficher quand le formulaire est envoyé pour choisisr la province -->
                  <label for="">Province</label>
                  <select name="Province" id="listProvince" class="form-control">
                    <option value="1" autofocus>---Selectionner une province---</option>
                    <?php foreach($provinces as $province) { ?>
                      <option value="<?php echo $province->ID_Province ?>">
                        <?php echo $province->Nom_Province ?></option>
                      <?php } ?>
                  </select>
                  <br>
                  <span class="pull-right">
                    <a href="form.login.php">Vous avez déjà un compte ?</a>
                  </span>
                  <br><br>

                  <button class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i> Envoyer</button>
                </div>
              </div>
            </form>
            <!-- /form -->

          <?php } else { ?>
            <form class="form-login" action="<?= $_SERVER['PHP_SELF'] ?>" method="POST" id="formulaire">
            <h2 class="form-login-heading">Réclamation</h2>
            <div class="row">
              <div class="login-wrap">
                <label for="">CIN * </label>
                <input type="text" name="CINMedecin" class="form-control" placeholder="CIN" autofocus required>
                <br>
                <label for="">Nom et Prenom * </label>
                <input type="text" name="Nom_Medecin" class="form-control" placeholder="Nom & Prenom" required>
                <br>
                <label for="">Email * </label>
                <input type="email" name="Email" class="form-control" placeholder="Email" required>
                <br>
                <label for="">Telephone * </label>
                <input type="tel" name="Telephone" class="form-control" placeholder="Telephone" required>
                <br>
                <label for="">Region * </label>
                <select name="Region" id="listRegion" class="form-control">
                  <option value="1" autofocus>---Selectionner une region---</option>
                  <?php foreach($regions as $region) { ?>
                    <option value="<?php echo $region->ID_Region ?>">
                      <?php echo $region->Nom_Region ?></option>
                    <?php } ?>
                </select>
                <br>
                <span class="pull-right">
                  <a href="form.login.php">Vous avez déjà un compte ?</a>
                </span>
                <br><br>

                <button class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i> Envoyer</button>
              </div>
            </div>
          </form>
          <?php } ?>

          <?php include '_form.footer.php'; ?>