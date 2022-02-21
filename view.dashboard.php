<?php 
  require ('_header.php');
?>

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->

      <section id="main-content">
          <section class="wrapper">
           <h3><i class="fa fa-angle-right"></i> Ma situation sur mes cotisations</h3>
            <?php if (isset($msg)) { include('_utils.php'); } ?>
              
              <div class="container">
                <!-- INFORMATIONS USER -->
                <div class="row mt col-md-4">
                  <div class="col-md-12">
                      <div class="showback">
                          <h4 class="mb"><i class="fa fa-angle-right"></i> Mes Informations</h4>
                          <div class="row">
                              <!-- INFO NAME -->
                              <div class="info-block info-name col-md-12">
                                <p><b>CIN : </b> <?= $medecin->CINMedecin ?> </p>
                                  <p>
                                      <b>Nom :</b> <?php echo $medecin->Nom_Medecin ?>
                                  </p>
                              </div><!-- END INFO NAME -->

                              <!-- INFO GSM EMAIL-->
                              <div class="info-block info-gsm col-md-12">
                                  <p>
                                      <b>Téléphone :</b> <?php echo $medecin->Telephone ?>
                                  </p>
                                  <p>
                                      <b>Email Professionnel :</b> <?php echo $medecin->Email ?>
                                  </p>
                              </div><!-- END INFO GSM FAX EMAIL -->

                              <!-- INFO REGION -->
                              <div class="info-block info-reg col-md-12">
                                  <p><b>Province :</b> <?php echo $medecin->NomProvince ?></p>
                                  <p><b>Region :</b> <?php echo $medecin->NomRegion ?></p>
                              </div>
                            <!-- <?php if (!isset($_SESSION['maj'])) { ?>
                                <div class="info-block col-md-12">
                                  <a href="view.dashboard.php?maj=yes" class="btn btn-warning btn-block">Mettre à jour</a>
                                </div>
                            <?php } ?>    -->
                          </div>
                      </div>
                  </div>
                </div>

                <!-- Mes cotisations payées -->
                <div class="row mt col-md-8">
                    <div class="cotisation-panel">
                        <div class="content-panel">
                            <table class="table table-striped table-advance table-hover">
                              <h4><i class="fa fa-angle-right"></i> Cotisations Payées</h4>
                              <hr>
                                <thead>
                                  <tr>
                                      <th class="hidden-phone"><i class="fa fa-question-circle"></i> Années</th>
                                      <th><i class="fa fa-bookmark"></i> Montants</th>
                                      <th><i class=" fa fa-edit"></i> Status</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php if (isset($yearListPaid->AnneeVM)) { ?>

                                      <?php $AnneeVMPaid = $yearListPaid->AnneeVM;
                                      if (is_array($AnneeVMPaid)) { ?>
                                        <?php for($i=0; $i<count($AnneeVMPaid); $i++) { ?>

                                          <tr>
                                            <td><?= $AnneeVMPaid[$i]->Annee ?></td>
                                            <td><?= $AnneeVMPaid[$i]->AnneeMontant ?></td>
                                            <td><p class="label label-success">Payée</p></td>
                                          </tr>

                                        <?php } ?>
                                        <!-- Si ne comporte qu'une seule ligne -->
                                      <?php } else { ?>
                                        
                                        <tr>
                                          <td><?= $AnneeVMPaid->Annee ?></td>
                                          <td><?= $AnneeVMPaid->AnneeMontant ?></td>
                                          <td><p class="label label-success"><b>Payée</b></p></td>
                                        </tr>

                                    <?php } } else { ?>
                                      <tr>
                                        <td class="bg-danger" colspan="3">Aucune cotisation n'est payée !</td>
                                      </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div><!-- /content-panel -->
                    </div><!-- /col-md-12 -->
                </div><!-- /row -->
              </div>

      </section><! --/wrapper -->
  </section>
   <!-- /MAIN CONTENT -->

      <!--main content end-->
<?php require ('_footer.php') ?>