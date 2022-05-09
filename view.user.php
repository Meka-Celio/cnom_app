<?php $page = "Mon Profil";
require ('_header.php'); ?>

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
                                    <?php if (isset($edit_password)) { ?>
                                        <p><span>Mot de passe : </span> 
                                            <form action="" method="post">
                                                <div class="form-group">
                                                    <input type="password" name="" id="" class="form-control">
                                                </div>
                                                <input type="submit" value="Modifier" class="btn btn-warning">
                                                <a href="view.user.php" class="btn btn-danger"><--</a>
                                            </form>
                                        </p>
                                    <?php } else { ?>
                                        <p><span>Mot de passe</span> <a href="view.user.php?edit=password">Modifier</a></p>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="user-detail">
                            <h3> > Mes Informations</h3>
                            <div class="user-detail-content">
                                <label for="">
                                    Numéro de téléphone : 
                                    <?php if (isset($edit_telephone)) { ?>
                                        <p><form action="" method="post" id="editUserFormTel">
                                            <input type="tel" name="telephone" id="edit_tel" class="">
                                            <input type="submit" value="Modifier" class="btn btn-warning">
                                            <a href="view.user.php" class="btn btn-danger"><--</a>
                                        </form></p>
                                    <?php } else { ?>
                                        <p><span><?php echo $medecin->Telephone ?></span><a href="view.user.php?edit=telephone">Modifier</a></p>
                                    <?php } ?>
                                </label>
                                <label for="">
                                    Email : 
                                    <?php if (isset($edit_email)) { ?>
                                        <p>
                                            <form action="" method="post" class="">
                                                <input type="email" name="" id="" value="<?= $medecin->Email ?>">
                                                <input type="submit" value="Modifier" class="btn btn-warning">
                                                <a href="view.user.php" class="btn btn-danger"><--</a>
                                            </form>
                                        </p>
                                    <?php } else { ?>
                                        <p><span><?php echo $medecin->Email ?></span><a href="view.user.php?edit=email">Modifier</a></p>
                                    <?php } ?> 
                                </label>
                                <label for="">
                                    Province : 
                                    <p><span><?php echo $medecin->NomProvince ?></span></p>
                                </label>
                                <label for="">
                                    Région : 
                                    <p><span><?php echo $medecin->NomRegion ?></span></p>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            
        </section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

<?php require ('_footer.php') ?>