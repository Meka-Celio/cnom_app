<?php require ('_header.php'); ?>

    <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i> Mon Profil</h3>

            <?php if (isset($msg)) { include('_utils.php'); } ?>
            
            <!-- BASIC FORM ELELEMNTS -->
            <div class="row mt col-md-6">
                <div class="col-lg-12">
                  <div class="form-panel">
                      <form class="form-horizontal style-form" method="post">

                          <div class="form-group">
                              <label class="col-lg-2 col-sm-2 control-label">CIN</label>
                              <div class="col-lg-10">
                                  <p class="form-control-static"><?php echo $medecin->CINMedecin ?></p>
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-lg-2 col-sm-2 control-label">Nom</label>
                              <div class="col-lg-10">
                                  <p class="form-control-static"><?php echo $medecin->Nom_Medecin ?></p>
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-lg-2 col-sm-2 control-label">Téléphone</label>
                              <div class="col-lg-10">
                                  <p class="form-control-static"><?php echo $medecin->Telephone ?></p>
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-lg-2 col-sm-2 control-label">E-Mail</label>
                              <div class="col-lg-10">
                                  <p class="form-control-static"><?php echo $medecin->Email ?></p>
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-lg-2 col-sm-2 control-label">Province</label>
                              <div class="col-lg-10">
                                  <p class="form-control-static"><?php echo $medecin->NomProvince ?></p>
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-lg-2 col-sm-2 control-label">Région</label>
                              <div class="col-lg-10">
                                  <p class="form-control-static"><?php echo $medecin->NomRegion ?></p>
                              </div>
                          </div>

                      </form>
                  </div>
                </div><!-- col-lg-12-->         
            </div><!-- /row -->
            
            <!-- INLINE FORM ELELEMNTS -->
            <div class="row mt col-lg-6">
              <div class="col-lg-12">
                <div class="form-panel">
                      <h4 class="mb"><i class="fa fa-angle-right"></i> Changer de mot de passe</h4>
                      <form class="form-inline" role="form" id="formulaire" action="app.controller.php?action=updatePassword" method="post">
                        <input type="hidden" name="CINMedecin" value="<?= $medecin->CINMedecin ?>">
                        <input type="hidden" name="Email" value="<?= $medecin->Email ?>">
                          <div class="form-group">
                              <label class="sr-only" for="Pwd">Mot de passe</label>
                              <input type="password" name="Pwd" class="form-control" id="Pwd" placeholder="Password">
                          </div>
                          <button type="submit" class="btn btn-theme">Valider</button>
                      </form>
                </div><!-- /form-panel -->
              </div><!-- /col-lg-12 -->
            </div><!-- /row -->
            
            
        </section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

<?php require ('_footer.php') ?>