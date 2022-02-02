<?php include '_admin.header.php'; ?>

<!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <br>
      <br>
      <br>
      <br>
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

            <!-- BASIC FORM ELELEMNTS -->
            <div class="row mt">
              <div class="col-lg-8">
                  <div class="form-panel">
                      <form action="admin.view.oneTransaction.php" class="form-horizontal style-form" method="post">
                        <h4>Transactions</h4>
                          <div class="form-group col-md-8">
                              <label class="col-sm-6 col-sm-6 control-label">NumCommande</label>
                              <div class="col-sm-6">
                                  <input required type="text" class="form-control" name="NumCommande">
                              </div>
                          </div>

                          <div class="form-group">
                              <input type="submit" name="searchTransaction" value="Rechercher" class="btn btn-info">
                          </div>
                      </form>
                  </div>
              </div><!-- col-lg-12-->       
            </div><!-- /row -->
            
          	<h3><i class="fa fa-angle-right"></i> Voir la transaction :  <?php echo $oneTransaction->NCommande ?> </h3>

            <div class="row mt col-md-12">
              <div class="cotisation-panel">
                <div class="content-panel">
                  <table class="table table-striped table-advance table-hover">
                    <thead>
                      <tr>
                        <th>CIN</th>
                        <th>Nom</th>
                        <th>Mail</th>
                        <th>Années Payées</th>
                        <th>N° Commande</th>
                        <th>Montant</th>
                        <th>Date Paiement</th>
                        <th>Heure</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                          <td><?php echo $oneTransaction->CIN ?></td>
                          <td><?php echo $oneTransaction->Nom ?></td>
                          <td><?php echo $oneTransaction->Email ?></td>
                          <td><?php echo $oneTransaction->Annee ?></td>
                          <td><?php echo $oneTransaction->NCommande ?></td>
                          <td><?php echo $oneTransaction->Montant ?></td>
                          <td><?php echo $oneTransaction->DatePaiement ?></td>
                          <td><?php echo $oneTransaction->HeurePaiement ?></td>
                        </tr>
                    </tbody>
                    <tfoot>
                      <tr><td colspan="8"><a href="admin.view.editTransaction.php?modifyTransaction=on&numTransaction=<?php echo $oneTransaction->NCommande ?>" class="btn btn-warning">Modifier</a></td></tr>
                    </tfoot>
                  </table>
                </div>
              </div>
            </div>

          	
          	
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

<?php include '_admin.footer.php' ?>
