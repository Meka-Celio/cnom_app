<?php $page = 'Créer un reçu';
include '_admin.header.php'; 

  if (isset($_GET['CINMedecin']))
  {
    $msg                =   $_GET['msg'];
    $CINMedecin         =   $_GET['CINMedecin'];
    $NumTransaction     =   $_GET['NumTransaction'];
    $Annees             =   $_GET['Annees']; 
  }

?>

  <!--main content start-->
      <section id="main-content" class="adminView">
          <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i> Rubrique Créer Reçu</h3>

            <?php if (isset($msg)) { include('../_utils.php'); } ?>
            <?php if (isset($CINMedecin)) { ?>
              <p><label for="">CINMedecin</label> : <?php echo $CINMedecin ?>; <label for="">NumTransaction</label> : <?php echo $NumTransaction ?>; <label for="">Annees</label> : <?php echo $Annees ?>;</p>
            <?php } ?>
            
            <!-- BASIC FORM ELELEMNTS -->
            <div class="row mt col-md-6">
                <div class="col-lg-12">
                  <div class="form-panel">

                    <form action="admin.app.addCotisation.php" method="POST">
                      <h4>Récupérer info Médecin</h4>
                      <div class="form-group">
                        <input type="text" name="CINMedecin" value="" placeholder="CIN" required>
                      </div>

                      <div class="form-group">
                        <input type="text" name="NumTransaction" value="" placeholder="NumTransaction" required>
                      </div>

                      <div class="form-group">
                        <input type="text" name="IdParamCotisation" value="" placeholder="ID Annee Cotisation" required>
                      </div>

                      <input type="submit" name="submit" value="Ajouter un paiement">
                    </form>

                  </div>
                </div><!-- col-lg-12-->         
            </div><!-- /row -->

            <div class="row mt col-md-12">
                <div class="col-lg-12">
                  <div class="form-panel">

                    <table class="table_recu">
                      <form action="PDF/index.php" method="post">
                            
                            <tr>
                              <th>CIN</th>
                              <th>NumTransaction</th>
                              <th>NumRecu</th>
                              <th>Nom</th>
                            </tr>
                            <tr>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                            </tr>

                            <tr>
                              <th>Secteur</th>
                              <th>Spécialité</th>
                              <th>Date Diplome</th>
                              <th>Date Recrutement</th>
                            </tr>
                            <tr>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                            </tr>

                            <tr>
                              <th>Adresse Pro</th>
                              <th>Province</th>
                              <th>Region</th>
                              <th>Date Recu</th>
                            </tr>
                            <tr>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                            </tr>

                            <tr>
                              <th>Année Payée</th>
                              <th>Montant Payé</th>
                              <th>Somme</th>
                              <th>#</th>
                            </tr>
                            <tr>
                              <td></td>
                              <td></td>
                              <td></td>

                              <td><input type="submit" name="submit" value="PDF" class="btn btn-primary"></td>
                            </tr>

                          </form>
                        </table>

                  </div>
                </div><!-- col-lg-12-->         
            </div><!-- /row -->

          </section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

<?php include '_admin.footer.php'; ?>