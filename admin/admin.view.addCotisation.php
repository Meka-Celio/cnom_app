<?php $page = 'Ajouter une cotisation';
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

            <h3><i class="fa fa-angle-right"></i> Rubrique Ajout Cotisation</h3>

            <?php if (isset($msg)) { include('../_utils.php'); } ?>
            <?php if (isset($CINMedecin)) { ?>
              <p><label for="">CINMedecin</label> : <?php echo $CINMedecin ?>; <label for="">NumTransaction</label> : <?php echo $NumTransaction ?>; <label for="">Annees</label> : <?php echo $Annees ?>;</p>
            <?php } ?>
            
            <!-- BASIC FORM ELELEMNTS -->
            <div class="row mt col-md-6">
                <div class="col-lg-12">
                  <div class="form-panel">

                    <form action="admin.app.addCotisation.php" method="POST">
                      <h4>Ajouter un paiement de cotisation</h4>
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

            <div class="row mt col-md-6">
                <div class="col-lg-12">
                  <div class="form-panel">

                    <form action="admin.app.getRecu.php" method="POST">
                      <h4>Récupérer le reçu de transaction</h4>
                      
                      <div class="form-group">
                        <input type="text" name="NumTransaction" value="" placeholder="NumTransaction" required>
                      </div>

                      <div class="form-group">
                        <input type="text" name="CIN" value="" placeholder="CIN" required>
                      </div>

                      <input type="submit" name="submit" value="Generer Recu" class="btn btn-warning">
                    </form>

                  </div>
                </div><!-- col-lg-12-->         
            </div><!-- /row -->

          </section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

<?php include '_admin.footer.php'; ?>