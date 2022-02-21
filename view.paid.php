<?php include '_header.php' ?>

<!--main content start-->

      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Historique des cotisations</h3>
            
            <?php if (isset($msg)) { include('_utils.php'); } ?>

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
                                <!-- Si ne comporte qu'une seule ligne -->
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
		  </section><! --/wrapper -->
  </section>
	  <!-- /MAIN CONTENT -->

      <!--main content end-->

<?php include '_footer.php' ?>