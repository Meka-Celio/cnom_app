<?php $page = 'Admin Dashboard';
require '_admin.header.php'; ?>

	<section id="main-content">
          <section class="wrapper">
           <h3><i class="fa fa-angle-right"></i> GENERAL</h3>
            <?php if (isset($msg)) { include('_utils.php'); } ?>

            <!-- Mes Cotisations impayées -->
              <div class="row mt col-md-12">
                  <div class="cotisation-panel">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
                            <h4><i class="fa fa-angle-right"></i> Liste des médecins</h4>
                            <hr>
                              <thead>
                                <tr>
                                    <th>CIN</th>
                                    <th><i class="fa fa-bookmark"></i> Nom & Prénom</th>
                                    <th><i class="fa fa-bookmark"></i> Email</th>
                                    <th><i class="fa fa-edit"></i> Telephone</th>
                                    <th><i class="fa fa-edit"></i> Province</th>
                                    <th><i class="fa fa-edit"></i> Region</th>
                                    <th colspan="2"><i class="fa fa-edit"></i> Options</th>
                                </tr>
                              </thead>
                              <tbody>
                              	<?php foreach ($medecins as $med) { ?>
                              		<tr>
                              			<td><?php echo $med->CINMedecin ?></td>
                              			<td><?= $med->Nom_Medecin ?></td>
                              			<td><?= $med->EMAIL ?></td>
                              			<td><?= $med->TELEPHONE_MOBILE ?></td>
                              			<td><?= $med->NomRegion ?></td>
                              			<td><?= $med->NomProvince ?></td>
                              			<td><button class="btn btn-info btn-xs">Consulter</button></td>
                              			<td><button class="btn btn-warning btn-xs">Modifier</button></td>
                              		</tr>
                              	<?php } ?>
                              </tbody>
                          </table>
                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
                  <div class="direction-rows">
                  	<div id="prev-arrow"><</div>
                  	<div id="newt-arrow">></div>
                  </div>
              </div><!-- /row -->

      </section><! --/wrapper -->

        <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i> Voir les transactions</h3>
            
            <!-- BASIC FORM ELELEMNTS -->
            <div class="row mt">
              <div class="col-lg-8">
                  <div class="form-panel">
                      <form action="<?php echo $_SERVER['PHP_SELF'] ?>" class="form-horizontal style-form" method="post">
                        <h4>Transactions</h4>
                          <div class="form-group col-md-8">
                              <label class="col-sm-6 col-sm-6 control-label">CIN</label>
                              <div class="col-sm-6">
                                  <input required type="text" class="form-control" name="CIN">
                              </div>
                          </div>

                          <div class="form-group">
                              <button class="btn btn-warning">Voir</button>
                          </div>
                      </form>
                  </div>
              </div><!-- col-lg-12-->       
            </div><!-- /row -->

            <div class="row mt col-md-12">
              <div class="cotisation-panel">
                <div class="content-panel">
                  <table class="table table-striped table-advance table-hover">
                    <thead>
                      <tr>
                        <th>CIN</th>
                        <th>Nom</th>
                        <th>Montant</th>
                        <th>N° Transaction</th>
                        <th>N° Autorisation</th>
                        <th>N° Commande</th>
                        <th>Date Paiement</th>
                        <th>Heure</th>
                        <th>Années Payées</th>
                        <th>#</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($transactions as $ligne) { ?>
                        <tr>
                          <td><?php echo $ligne->CIN ?></td>
                          <td><?php echo $ligne->Nom ?></td>
                          <td><?php echo $ligne->Montant ?></td>
                          <td><?php echo $ligne->NTransaction ?></td>
                          <td><?php echo $ligne->NAutorisation ?></td>
                          <td><?php echo $ligne->NCommande ?></td>
                          <td><?php echo $ligne->DatePaiement ?></td>
                          <td><?php echo $ligne->HeurePaiement ?></td>
                          <td><?php echo $ligne->Annee ?></td>
                          <td>
                            <a href="" class="btn btn-xs btn-primary">Voir</a>
                          </td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            
          </section>

</section>

<?php require '_admin.footer.php' ?>