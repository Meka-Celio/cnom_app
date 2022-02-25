<?php require ('_header.php'); ?>

    <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i> Modifier mes informations</h3>

            <?php if (isset($msg)) { include('_utils.php'); } ?>
            
            <!-- BASIC FORM ELELEMNTS -->
            <div class="row mt col-md-8">
                <div class="col-lg-12">
                  <div class="form-panel">
                    <form action="app.controller.php?action=userUpdate" id="user-profile-form" class="form-horizontal style-form modif-user-form" method="post">
                  

                        <div class="form-group">
                              <label class="col-lg-4 col-sm-4 control-label">CIN</label>
                              <div class="col-lg-8">
                                  <p class="form-control-static"><?php echo $medecin->CINMedecin ?></p>
                              </div>
                        </div>

                        <div class="form-group">
                              <label class="col-lg-4 col-sm-4 control-label">Nom</label>
                              <div class="col-lg-8">
                                  <p class="form-control-static"><?php echo $medecin->Nom_Medecin ?></p>
                              </div>
                        </div>

                        <div class="form-group">
                              <label class="col-lg-4 col-sm-4 control-label">Téléphone</label>
                              <div class="col-lg-6">
                                <input type="text" name="telephone" id="" class="form-control" placeholder="Telephone">
                                <sub>Format : 0600000000</sub>
                              </div>
                        </div>

                        <div class="form-group">
                              <label class="col-lg-4 col-sm-4 control-label">E-Mail</label>
                              <div class="col-lg-6">
                                  <input type="text" name="email" id="" class="form-control" placeholder="E-Mail">
                              </div>
                        </div>

                        <div class="form-group">
                              <label class="col-lg-4 col-sm-4 control-label">Province</label>
                              <div class="col-lg-6">
                                  <p class="form-control-static"><?php echo $medecin->NomProvince ?></p>
                              </div>
                        </div>

                        <div class="form-group">
                              <label class="col-lg-4 col-sm-4 control-label">Région</label>
                              <div class="col-lg-8">
                                  <p class="form-control-static"><?php echo $medecin->NomRegion ?></p>
                              </div>
                        </div>
                        
                        <input type="submit" name="userUpdateSubmit" value="Terminer les modifications" class="btn btn-info">

                    </form>
                          
                  </div>
                </div><!-- col-lg-12-->         
            </div><!-- /row -->
            
            <!-- INLINE FORM ELELEMNTS -->
            <div class="row mt col-lg-4">
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