<?php $page = "Ajouter une transaction";
include '_admin.header.php'; ?>

<!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Ajouter une transaction</h3>
          	<?php if (isset($msg)) { include('_utils.php'); } ?>
            
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-8">
                  <div class="form-panel">
                      <form action="app.controller.php?action=addTransaction" class="form-horizontal style-form" method="post">

                      <!-- INFORMATION CLIENTS -->
                      <h4>Informations Client</h4>
                          <div class="form-group col-md-6">
                              <label class="col-sm-2 col-sm-2 control-label">CIN</label>
                              <div class="col-sm-10">
                                  <input required type="text" class="form-control" name="CIN">
                              </div>
                          </div>

                          <div class="form-group col-md-6">
                              <label class="col-sm-2 col-sm-2 control-label">Nom</label>
                              <div class="col-sm-10">
                                  <input required type="text" class="form-control" name="Nom">
                              </div>
                          </div>

                          <div class="form-group col-md-6">
                              <label class="col-sm-2 col-sm-2 control-label">Email</label>
                              <div class="col-sm-10">
                                  <input required type="email" class="form-control" name="Email">
                              </div>
                          </div>

                          <div class="form-group col-md-6">
                              <label class="col-sm-2 col-sm-2 control-label">Tel</label>
                              <div class="col-sm-10">
                                  <input required type="text" class="form-control" name="Tel">
                              </div>
                          </div>
                          <!-- /INFORMATIONS CLIENTS -->

                          <!-- INFORMATION TRANSACTION -->
                          <h4>Informations Transaction</h4>
                          <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">N° Transaction</label>
                                <div class="col-sm-4">
                                    <input required type="text" name="NTransaction" id="" class="form-control">
                                </div>
                          </div>

                          <div class="form-group">
                              <label class="col-lg-2 col-sm-2 control-label">N° Authorisation</label>
                              <div class="col-sm-4">
                                    <input required type="text" name="NAuthorisation" id="" class="form-control">
                                </div>
                          </div>

                          <div class="form-group">
                              <label class="col-lg-2 col-sm-2 control-label">N° Commande</label>
                              <div class="col-sm-4">
                                    <input required type="text" name="NCommande" id="" class="form-control">
                                </div>
                          </div>

                          <div class="form-group">
                              <label class="col-lg-2 col-sm-2 control-label">N° Carte</label>
                              <div class="col-sm-4">
                                    <input required type="text" name="NCarte" id="" class="form-control">
                                </div>
                          </div>

                          <div class="form-group">
                              <label class="col-lg-2 col-sm-2 control-label">Montant</label>
                              <div class="col-sm-4">
                                    <input required type="text" name="Montant" id="" class="form-control">
                                </div>
                          </div>

                          <div class="form-group ">
                              <label class="col-lg-2 col-sm-2 control-label">Date</label>
                              <div class="col-sm-2">
                                    <input required type="date" name="DatePaiement" id="">
                                </div>
                          </div>

                          <div class="form-group ">
                              <label class="col-lg-2 col-sm-2 control-label">Heure</label>
                              <div class="col-sm-2">
                                    <input required type="time" name="HeurePaiement" id="">
                                </div>
                          </div>

                          <div class="form-group ">
                              <label class="col-lg-2 col-sm-2 control-label">Annee</label>
                              <div class="col-sm-4">
                                    <input required type="text" name="Annee" id="">
                                    <span>Si il y a plusieurs années, les séparer par une virgule</span>
                                </div>
                          </div>
                          <!-- /INFORMATIONS TRANSACTIONS -->

                          <div class="form-group">
                              <button class="btn btn-success">Enregistrer</button>
                          </div>
                      </form>
                  </div>
          		</div><!-- col-lg-12-->      	
          	</div><!-- /row -->
          	
          	
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

<?php include '_admin.footer.php' ?>