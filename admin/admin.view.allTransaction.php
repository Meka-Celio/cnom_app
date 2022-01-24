<?php include '_admin.header.php'; ?>

<!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Voir les transactions</h3>
          	
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

            <div class="row mt col-md-12">
              <div class="cotisation-panel">
                <div class="content-panel">
                  <table class="table table-striped table-advance table-hover">
                    <thead>
                      <tr>
                        <th>CIN</th>
                        <th>Nom</th>
                        <th>N° Transaction</th>
                        <th>N° Autorisation</th>
                        <th>N° Commande</th>
                        <th>Montant</th>
                        <th>Années Payées</th>
                        <th>Date Paiement</th>
                        <th>Heure</th>
                        <th>#</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($transactions as $ligne) { ?>
                        <tr>
                          <td><?php echo $ligne->CIN ?></td>
                          <td><?php echo $ligne->Nom ?></td>
                          <td><?php echo $ligne->NTransaction ?></td>
                          <td><?php echo $ligne->NAutorisation ?></td>
                          <td><?php echo $ligne->NCommande ?></td>
                          <td><?php echo $ligne->Montant ?></td>
                          <td><?php echo $ligne->Annee ?></td>
                          <td><?php echo $ligne->DatePaiement ?></td>
                          <td><?php echo $ligne->HeurePaiement ?></td>
                          <td>
                            <a href="admin.view.oneTransaction.php?showTransaction=on&numTransaction=<?php echo $ligne->NCommande ?>" class="btn btn-xs btn-primary">Voir</a>
                          </td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            
          </section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

<?php include '_admin.footer.php' ?>