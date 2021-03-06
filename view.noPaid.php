<?php $page = "Mes Impayés";
include '_header.php'; ?>

<!--main content start-->

      <section id="main-content">
          <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i> Cotisations Impayées</h3>

            <?php if (isset($msg)) { include('_utils.php'); } ?>
            <div class="container">

              <!-- Mes Cotisations impayées -->
              <div class="row mt col-md-12">
                  <div class="cotisation-panel">
                    <p>Si vous avez des doutes concernant cette partie, merci de prendre attache avec votre CROM.</p>
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
                            <h4><i class="fa fa-angle-right"></i> Cotisations à régler</h4>
                            <hr>
                              <thead>
                                <tr>
                                    <th>#</th>
                                    <th><i class="fa fa-bookmark"></i> Année</th>
                                    <th><i class="fa fa-bookmark"></i> Montant</th>
                                    <th><i class=" fa fa-edit"></i> Status</th> 
                                </tr>
                              </thead>
                              

                              <tbody>
                                
                                <!-- Si il y a des cotisations  -->
                                <?php if (isset($yearListNotPaid->AnneeVM)) { 
                                  $AnneeVMNotPaid = $yearListNotPaid->AnneeVM; ?>

                                  <form action="view.card.php?a=paiement" method="post">

                                    <!-- Si il y a plusieurs lignes -->
                                    <?php if (is_array($AnneeVMNotPaid)) { ?>
                                    <tr>
                                      <td>Dernière Année Payée</td>
                                      <td><?php echo $LastYearPaid->Annee ?></td>
                                      <td><?php echo $LastYearPaid->AnneeMontant ?></td>
                                      <td><p class="label label-success"><b>Payée</b></p></td>
                                    </tr>
                                    <!-- Boucle -->
                                    <?php for($i=0; $i < count($AnneeVMNotPaid); $i++) { ?>
                                        <!-- Si la derniere annee payée < Annee non payée -->
                                        <?php if ($AnneeVMNotPaid[$i]->Annee > $LastYearPaid->Annee) { ?>
                                          <tr> 
                                              <td>
                                                <!-- <label for=""><?= $AnneeVMNotPaid[$i]->Annee; ?></label> -->
                                                <input type="checkbox" id="<?php echo $AnneeVMNotPaid[$i]->Id ?>" name="NotPaid[]" value="<?= $AnneeVMNotPaid[$i]->AnneeMontant ?>" aria-details="<?= $i+1 ?>" placeholder=""> 
                                              </td>
                                              <!-- <td><?php echo $AnneeVMNotPaid[$i]->Id ?></td> -->
                                              <td><?= $AnneeVMNotPaid[$i]->Annee; ?></td>
                                              <td id="montant-<?= $i ?>"><?= substr($AnneeVMNotPaid[$i]->AnneeMontant, 7); ?></td>
                                              <td><p class="label label-danger"><b>Non Payée</b></p></td>
                                            </tr>
                                          <?php  } else { $cache++; } ?>
                                          <?php  } ?>
                                     <!-- /endfor -->
                                     <?php if ($medecin->CINMedecin == '*11') { ?>
                                      <!-- <tr>
                                        <td>
                                          <input type="checkbox" name="NotPaid[]" value="2030 - 1">
                                        </td>
                                        <td>1</td>
                                        <td>2030</td>
                                        <td>1</td>
                                        <td><p class="label label-danger"><b>Non Payée</b></p></td>
                                      </tr> -->
                                    <?php } ?>
                                    <tr><td colspan="4"><button class="btn btn-success">Payer ma cotisation</button></td></tr>


                                    <!-- Si il y a une seule ligne -->
                                    <?php } else { ?>
                                    <tr>
                                      <td>Dernière Année Payée</td>
                                      <td><?php echo $LastYearPaid->Annee ?></td>
                                      <td><?php echo $LastYearPaid->AnneeMontant ?></td>
                                      <td><p class="label label-success"><b>Payée</b></p></td>
                                    </tr>
                                    <?php if ($LastYearPaid->Annee < $AnneeVMNotPaid->Annee) { ?>
                                        <tr>

                                          <td>
                                              <input type="radio" name="NotPaid" value="<?= $AnneeVMNotPaid->AnneeMontant ?>" placeholder="">
                                            </td>
                                            <td><?php echo $AnneeVMNotPaid->Id ?></td>
                                            <td><?= $AnneeVMNotPaid->Annee; ?></td>
                                            <td id="0"><?= substr($AnneeVMNotPaid->AnneeMontant, 7); ?></td>
                                            <td><p class="label label-danger"><b>Non Payée</b></p></td>
                                        </tr>
                                        <tr><td colspan="4"><button class="btn btn-success">Payer ma cotisation</button></td></tr>
                                      <?php } else { ?>
                                        <tr><td colspan="4"><button class="btn btn-success disabled">Payer ma cotisation</button></td></tr>
                                      <?php } ?>
                                    <?php } ?> <!-- /end -->
                                    <input type="hidden" name="CINMedecin" value="<?= $medecin->CINMedecin ?>">
                                    <input type="hidden" name="cache" value="<?= $cache ?>">
                                  </form>
                                <!-- Si il n'y a pas de cotisation -->
                                <?php } else { ?>
                                    <tr>
                                        <td colspan="4" ><p class="text-success"><b>Toutes les cotisations sont payées !</b></p></td>
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

<?php include '_footer.php' ?>