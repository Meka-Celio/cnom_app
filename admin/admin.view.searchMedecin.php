<?php require '_admin.header.php' ?>

	<section id="main-content"> 
          <section class="wrapper">

           <div class="search-section col-md-10" style="padding-top:100px">
             <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" class="col-md-6">
              <input type="text" name="CINMedecin" value="" placeholder="CIN" required>
              <button>Valider</button>
            </form>

        <!-- <table cellpadding="2" cellspacing="1" border="1" id="searchMedecin">
          <p>CIN Recherchée : <?php echo $CINMedecin ?> </p>
          <caption>Dans le webservice</caption>
          <thead>
            <tr>
              <th>CIN</th>
              <th>Nom</th>
              <th>Email</th>
              <th>Telephone</th>
              <th>Province</th>
              <th>Region</th>
              <th>Adresse Professionnelle</th>
              <th>Secteur Medecin</th>
              <th>Specialite</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <?php if(isset($medecin)) { ?>
                <td><?= $medecin->Cin ?></td>
                <td><?= $medecin->NomComplet ?></td>
                <td><?= $medecin->Email ?></td>
                <td><?= $medecin->TelephoneMobile ?></td>
                <td><?= $medecin->LibelleProvince ?></td>
                <td><?= $medecin->LibelleRegion ?></td>
                <td><?= $medecin->AdressePro ?></td>
                <td><?= $medecin->SecteurMedecin ?></td>
                <td><?= $medecin->SpecialiteMedecin ?></td>
              <?php } else { ?>
                <td colspan="9">Cette CIN ne correspond à aucun médecin</td>
              <?php } ?>
            </tr>
          </tbody>
          <tfoot>
            <form class="" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">

              <?php if(isset($medecin)) { ?>
                <input type="hidden" name="CINMedecin" value="<?= $medecin->Cin ?>">
                <input type="hidden" name="Nom_Medecin" value="<?= $medecin->NomComplet ?>">
                <input type="hidden" name="Email" value="<?= $medecin->Email ?>">
                <input type="hidden" name="Telephone" value="<?= $medecin->TelephoneMobile ?>">
                <input type="hidden" name="NomProvince" value="<?= $medecin->LibelleProvince ?>">
                <input type="hidden" name="NomRegion" value="<?= $medecin->LibelleRegion ?>">
              <?php } ?>
              <tr>
                <td colspan="9">
                    <input type="submit" name="addMedecin" value="ajouter">
                </td>
              </tr>
            </form>
          </tfoot>
        </table>

          -->


        <h2>Original</h2>
        <?php if (isset($infoMedecin)) { ?>
          <div class="col-md-12">
            <div class="user-card">
              <div class="col-md-4"></div>
              <div class="col-md-8">
                <h4><?php echo $infoMedecin->Cin ?></h4>
                <div class="ligne-1 col-md-8">
                  <p>Nom : <b><?php echo $infoMedecin->NomComplet ?></b></p>
                  <p>Email : <b><?php echo $infoMedecin->Email ?></b></p>
                  <p>Gsm : <b><?php echo $infoMedecin->TelephoneMobile ?></b></p>
                </div>

                <div class="ligne-2 col-md-6">
                  <p>Adresse pro : <b><?php echo $infoMedecin->AdressePro ?></b></p>
                  <p>Province : <b><?php echo $infoMedecin->LibelleProvince ?></b></p>
                  <p>Code Région : <b><?php echo $infoMedecin->AbreviationRegion ?></b></p>
                  <p>Region : <b><?php echo $infoMedecin->LibelleRegion ?></b></p>
                  <p>Telephone : <b><?php echo $infoMedecin->Telephone ?></b></p>
                </div>

                <div class="ligne-3 col-md-6">
                  <p>Date du Diplome : <b><?php echo $infoMedecin->DateDiplome ?></b></p>
                  <p>Date de recrutement/installation : <b><?php echo $infoMedecin->DateRecrutement_Installation ?></b></p>
                  <p>Secteur Médecin : <b><?php echo $infoMedecin->SecteurMedecin ?></b></p>
                  <p>Spécialité : <b><?php echo $infoMedecin->SpecialiteMedecin ?></b></p>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>


          <table cellpadding="2px" cellspacing="2px" border="1" class="bdMedecin">
          <caption>Dans la base de données</caption>
          <thead>
            <tr>
              <th>CIN</th>
              <th>Nom</th>
              <th>Email</th>
              <th>Tel</th>
              <th>Province</th>
              <th>Region</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <?php if (isset($DBmedecin)) { ?>
              <td><?= $DBmedecin->CINMedecin ?></td>
              <td><?= $DBmedecin->Nom_Medecin ?></td>
              <td><?= $DBmedecin->Email ?></td>
              <td><?= $DBmedecin->Telephone ?></td>
              <td><?= $DBmedecin->NomProvince ?></td>
              <td><?= $DBmedecin->NomRegion ?></td>
              <?php } ?>
            </tr>
          </tbody>
        </table>


        <?php if (isset($turples)) { ?>
          <h2 class="col-md-12">Turples</h2>
          <?php foreach ($turples as $double) { ?>
            <div class="col-md-6">
              <div class="user-card">
                <div class="user-img col-md-4"></div>
                <div class="user-info col-md-8">
                  <h4><?php echo $double->CINMedecin ?></h4>
                  <div class="ligne-1">
                    <p>Nom : <b><?php echo $double->Nom_Medecin ?></b></p>
                    <p>Email : <b><?php echo $double->Email ?></b></p>
                  </div>

                  <div class="ligne-2">
                    <p>Province : <b><?php echo $double->NomProvince ?></b></p>
                    <p>Région : <b><?php echo $double->NomRegion ?></b></p>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
        <?php } ?>

      </section><! --/wrapper -->

</section>

<?php require '_admin.footer.php' ?>