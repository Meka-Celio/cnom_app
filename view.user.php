<?php require ('_header.php'); ?>

    <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i> Mon Profil</h3>

            <?php if (isset($msg)) { include('_utils.php'); } ?>
            
            <!-- USER INFO PANEL -->
            <div class="container">
                <div class="row mt col-md-12">
                    <div class="user-panel">
                        <div class="user-info">
                            <div class="user-info-panel">
                                <div class="user-info-content">
                                    <img src="assets/img/user-profil.png" alt="img-user">
                                    <p><span><?php echo $medecin->CINMedecin ?></span></p>
                                    <p><span><?php echo $medecin->Nom_Medecin ?></span></p>
                                    <p><span>Mot de passe</span> <a href="#">Modifier</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="user-detail">
                            <h3> > Mes Informations</h3>
                            <div class="user-detail-content">
                                <label for="">
                                    Numéro de téléphone : 
                                    <p><span><?php echo $medecin->Telephone ?></span><a href="#">Modifier</a></p>
                                </label>
                                <label for="">
                                    Email : 
                                    <p><span><?php echo $medecin->Email ?></span><a href="#">Modifier</a></p>
                                </label>
                                <label for="">
                                    Province : 
                                    <p><span><?php echo $medecin->NomProvince ?></span><a href="#">Modifier</a></p>
                                </label>
                                <label for="">
                                    Région : 
                                    <p><span><?php echo $medecin->NomRegion ?></span><a href="#">Modifier</a></p>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            
        </section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

<?php require ('_footer.php') ?>