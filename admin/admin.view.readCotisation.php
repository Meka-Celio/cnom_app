<?php include '_admin.header.php'; ?>

<section id="main-content">
	<section class="wrapper">
		<h3><i class="fa fa-angle-right"  style="padding-top:50px;"></i> Voir les Cotisations</h3>

		<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
        	<input type="text" name="cin" value="" placeholder="CIN" required>
            <input type="submit" name="readCotisation" value="Voir les cotisations">
        </form>

        <!-- Affichage -->
        <div class="row mt col-md-6">
                  <div class="cotisation-panel"> 
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
                            <h4><i class="fa fa-angle-right"></i> Cotisations à régler - CIN : <?php echo $cin ?></h4>
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

                                    <!-- Si il y a plusieurs lignes -->
                                  <?php if (is_array($AnneeVMNotPaid)) { ?>
                                    <tr>
                                      <td>Dernière Année Payée</td>
                                      <td><?php echo $LastYearPaid->Annee ?></td>
                                      <td><?php echo $LastYearPaid->AnneeMontant ?></td>
                                      <td><p class="label label-success"><b>Payée</b></p></td>
                                      <td></td>
                                    </tr>
                                    <!-- Boucle -->
                                    <?php for($i=0; $i < count($AnneeVMNotPaid); $i++) { ?>
                                        <!-- Si la derniere annee payée < Annee non payée -->
                                        
                                          <tr>
                                              
                                              <td>
                                                <input type="checkbox" id="" name="NotPaid[]" value="<?= $AnneeVMNotPaid[$i]->AnneeMontant ?>" placeholder="">
                                              </td>
                                              <td><?php echo $AnneeVMNotPaid[$i]->Id ?></td>
                                              <td><?= $AnneeVMNotPaid[$i]->Annee; ?></td>
                                              <td id="montant-<?= $i ?>"><?= substr($AnneeVMNotPaid[$i]->AnneeMontant, 7); ?></td>
                                              <td><p class="label label-danger"><b>Non Payée</b></p></td>
                                            </tr>
                                          <?php  } ?>
                                     <!-- /endfor -->

                                  <!-- Si il y a une seule ligne -->
                                  <?php } else { ?>
                                    <tr>
                                      <td>Dernière Année Payée</td>
                                      <td><?php echo $LastYearPaid->Annee ?></td>
                                      <td><?php echo $LastYearPaid->AnneeMontant ?></td>
                                      <td><p class="label label-success"><b>Payée</b></p></td>
                                    </tr>
                                    <tr>
                                      <td>
                                        <input type="radio" name="NotPaid" value="<?= $AnneeVMNotPaid->AnneeMontant ?>" placeholder="">
                                      </td>
                                      <td><?php echo $AnneeVMNotPaid->Id ?></td>
                                      <td><?= $AnneeVMNotPaid->Annee; ?></td>
                                      <td id="0"><?= substr($AnneeVMNotPaid->AnneeMontant, 7); ?></td>
                                      <td><p class="label label-danger"><b>Non Payée</b></p></td>
                                    </tr>
                                  <?php } ?> <!-- /end -->
                                  <input type="hidden" name="CINMedecin" value="<?= $medecin->CINMedecin ?>">

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

        <!-- Mes Cotisations impayées -->
              <div class="row mt col-md-6">
                  <div class="cotisation-panel">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
                            <h4><i class="fa fa-angle-right"></i> Cotisations à régler</h4>
                            <hr>
                              <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Id</th>
                                    <th><i class="fa fa-bookmark"></i> Année</th>
                                    <th><i class="fa fa-bookmark"></i> Montant</th>
                                    <th><i class=" fa fa-edit"></i> Status</th>
                                </tr>
                              </thead>
                              <tbody>
                                
                                <!-- Si il y a des cotisations  -->
                                <?php if (isset($yearListNotPaid->AnneeVM)) { 
                                  $AnneeVMNotPaid = $yearListNotPaid->AnneeVM; ?>

                                  <form action="app.controller.php?action=paiement" method="post">

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
                                                <input type="checkbox" id="" name="NotPaid[]" value="<?= $AnneeVMNotPaid[$i]->AnneeMontant ?>" placeholder="">
                                              </td>
                                              <td><?php echo $AnneeVMNotPaid[$i]->Id ?></td>
                                              <td><?= $AnneeVMNotPaid[$i]->Annee; ?></td>
                                              <td id="montant-<?= $i ?>"><?= substr($AnneeVMNotPaid[$i]->AnneeMontant, 7); ?></td>
                                              <td><p class="label label-danger"><b>Non Payée</b></p></td>
                                            </tr>
                                          <?php } else { $cache = true; ?>
                                            <tr><td colspan="4"><button class="btn btn-secondary disabled">Payer ma cotisation</button></td></tr>
                                          <?php break; } ?>
                                    <?php } ?> <!-- /endfor -->

                                    <?php if(!$cache) { ?>
                                      <tr><td colspan="4"><button class="btn btn-success">Payer ma cotisation</button></td></tr>
                                    <?php } ?>

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

	</section> <!-- /Wrapper -->
</section>

<?php include '_admin.footer.php' ?> 