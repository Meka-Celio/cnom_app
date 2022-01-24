<?php $page = "Editer une transaction";
include '_admin.header.php'; ?>

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
          	<h3><i class="fa fa-angle-right"></i> Modifier la transaction :  <?php echo $oneTransaction->NCommande ?> </h3>

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
                        <th>Montant</th>
                        <th>Années Payées</th>
                        <th>Date Paiement</th>
                        <th>Heure</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <form action="admin.app.controller.php?action=modifTransaction" method="post">
                          <td><?php echo $oneTransaction->CIN ?></td>
                          <td><?php echo $oneTransaction->Nom ?></td>

                          <input type="hidden" name="NCommande" value="<?php echo $oneTransaction->NCommande ?>">
                          <td><input type="text" name="NTransaction" value="<?php echo $oneTransaction->NTransaction ?>" placeholder=""></td>

                          <td><input type="text" name="NAutorisation" value="<?php echo $oneTransaction->NAutorisation ?>" placeholder=""></td>

                          <td><?php echo $oneTransaction->Montant ?></td>
                          <td><?php echo $oneTransaction->Annee ?></td>
                          <td><?php echo $oneTransaction->DatePaiement ?></td>
                          <td><?php echo $oneTransaction->HeurePaiement ?></td>
                        </tr>
                        <tr><td colspan="8"><input type="submit" name="submit" value="Valider" class="btn btn-success"></td></tr>
                      </form>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

          	
          	
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

<?php include '_admin.footer.php' ?>