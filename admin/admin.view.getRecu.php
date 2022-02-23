<?php $page = 'Générer un reçu';
include '_admin.header.php'; 

if (isset($_SESSION['RecuPaiement']))
{

  $recu = $_SESSION['RecuPaiement'];

}

?>

	<!--main content start-->
      <section id="main-content">
          <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i> Créer un reçu de paiement</h3>

            <?php if (isset($msg)) { include('../_utils.php'); } ?>
            
            <!-- BASIC FORM ELELEMNTS -->
            <div class="row mt">
                <div class="col-lg-12">
                  <div class="form-panel">
                    
                    <table class="table_recu">
                      <thead>
                        <?php if (is_array($recu)) { ?>
                          <tr><th colspan="16">Recu N</th></tr>
                        <?php } else { ?>
                          <tr><th colspan="16">Recu N° </th></tr>
                        <?php } ?>
                      </thead>
                      <tbody>

                        <?php if (is_array($recu->AnneePayee)) { ?>

                          <!-- Si il y a plusieurs reçus -->
                          <?php for ($j = 0; $j<count($recu->AnneePayee); $j++) { ?>
                            <tr><td colspan="16" class="divider"></td></tr>

                            <form action="PDF/index.php" method="post">
                              
                              <tr>
                                <th>CIN</th>
                                <th>NumTransaction</th>
                                <th>NumRecu</th>
                                <th>Nom</th>
                              </tr>
                              <tr>
                                <td><?php echo $recu->CINMedecin ?></td>
                                <td><?php echo $recu->NumTransaction ?></td>
                                <td><?php echo $recu->NumRecu[$j] ?></td>
                                <td><?php echo $recu->Nom ?></td>
                              </tr>

                              <tr>
                                <th>Secteur</th>
                                <th>Spécialité</th>
                                <th>Date Diplome</th>
                                <th>Date Recrutement</th>
                              </tr>
                              <tr>
                                <td><?php echo $recu->SecteurMedecin ?></td>
                                <td><?php echo $recu->SpecialiteMedecin ?></td>
                                <td><?php echo $recu->DateDiplome ?></td>
                                <td><?php echo $recu->DateRecrutement_Installation ?></td>
                              </tr>

                              <tr>
                                <th>Adresse Pro</th>
                                <th>Province</th>
                                <th>Region</th>
                                <th>Date Recu</th>
                              </tr>
                              <tr>
                                <td><?php echo $recu->AdressePro ?></td>
                                <td><?php echo $recu->Province ?></td>
                                <td><?php echo $recu->Region ?></td>
                                <td><?php echo $recu->DateCreation ?></td>
                              </tr>

                              <tr>
                                <th>Année Payée</th>
                                <th>Montant Payé</th>
                                <th>Somme</th>
                                <th>#</th>
                              </tr>
                              <tr>
                                <td><?php echo $recu->AnneePayee[$j] ?></td>
                                <td><?php echo $recu->MontantCotisation[$j] ?></td>
                                <td><?php echo $recu->Somme[$j] ?></td>

                                <!-- Données à mettre dans le formulaire -->
                                <input type="hidden" name="NumTransaction" value="<?= $recu->NumTransaction ?>">
                                <input type="hidden" name="NumRecu" value="<?= $recu->NumRecu[$j] ?>">
                                <input type="hidden" name="Nom" value="<?= $recu->Nom ?>">
                                <input type="hidden" name="SecteurMedecin" value="<?= $recu->SecteurMedecin ?>">
                                <input type="hidden" name="SpecialiteMedecin" value="<?= $recu->SpecialiteMedecin ?>">
                                <input type="hidden" name="DateDiplome" value="<?= $recu->DateDiplome ?>">
                                <input type="hidden" name="DateRecrutement_Installation" value="<?= $recu->DateRecrutement_Installation ?>">
                                <input type="hidden" name="AdressePro" value="<?= $recu->AdressePro ?>">
                                <input type="hidden" name="Province" value="<?= $recu->Province ?>">
                                <input type="hidden" name="Region" value="<?= $recu->Region ?>">
                                <input type="hidden" name="DateCreation" value="<?= $recu->DateCreation ?>">
                                <input type="hidden" name="AnneePayee" value="<?= $recu->AnneePayee[$j] ?>">
                                <input type="hidden" name="MontantCotisation" value="<?= $recu->MontantCotisation[$j] ?>">
                                <input type="hidden" name="Somme" value="<?= $recu->Somme[$j] ?>">

                                <td>
                                  <input type="submit" name="submit" value="PDF" class="btn btn-primary">
                                  <input type="submit" name="submitmail" value="Envoie" class="btn btn-danger">
                                </td>
                              </tr>

                              <tr>
                                <td><?php echo $recu->Email ?></td>
                                <td>00000</td>
                              </tr>

                            </form>

                          <?php } ?>


                        <?php } else { ?>

                          <!-- Si c'est un seul reçu -->
                          <form action="PDF/index.php" method="post">
                            
                            <tr>
                              <th>CIN</th>
                              <th>NumTransaction</th>
                              <th>NumRecu</th>
                              <th>Nom</th>
                            </tr>
                            <tr>
                              <td><?php echo $recu->CINMedecin ?></td>
                              <td><?php echo $recu->NumTransaction ?></td>
                              <td><?php echo $recu->NumRecu ?></td>
                              <td><?php echo $recu->Nom ?></td>
                            </tr>

                            <tr>
                              <th>Secteur</th>
                              <th>Spécialité</th>
                              <th>Date Diplome</th>
                              <th>Date Recrutement</th>
                            </tr>
                            <tr>
                              <td><?php echo $recu->SecteurMedecin ?></td>
                              <td><?php echo $recu->SpecialiteMedecin ?></td>
                              <td><?php echo $recu->DateDiplome ?></td>
                              <td><?php echo $recu->DateRecrutement_Installation ?></td>
                            </tr>

                            <tr>
                              <th>Adresse Pro</th>
                              <th>Province</th>
                              <th>Region</th>
                              <th>Date Recu</th>
                            </tr>
                            <tr>
                              <td><?php echo $recu->AdressePro ?></td>
                              <td><?php echo $recu->Province ?></td>
                              <td><?php echo $recu->Region ?></td>
                              <td><?php echo $recu->DateCreation ?></td>
                            </tr>

                            <tr>
                              <th>Année Payée</th>
                              <th>Montant Payé</th>
                              <th>Somme</th>
                              <th>#</th>
                            </tr>
                            <tr>
                              <td><?php echo $recu->AnneePayee ?></td>
                              <td><?php echo $recu->MontantCotisation ?></td>
                              <td><?php echo $recu->Somme ?></td>

                              <!-- Données à mettre dans le formulaire -->
                                <input type="hidden" name="NumTransaction" value="<?= $recu->NumTransaction ?>">
                                <input type="hidden" name="NumRecu" value="<?= $recu->NumRecu ?>">
                                <input type="hidden" name="Nom" value="<?= $recu->Nom ?>">
                                <input type="hidden" name="SecteurMedecin" value="<?= $recu->SecteurMedecin ?>">
                                <input type="hidden" name="SpecialiteMedecin" value="<?= $recu->SpecialiteMedecin ?>">
                                <input type="hidden" name="DateDiplome" value="<?= $recu->DateDiplome ?>">
                                <input type="hidden" name="DateRecrutement_Installation" value="<?= $recu->DateRecrutement_Installation ?>">
                                <input type="hidden" name="AdressePro" value="<?= $recu->AdressePro ?>">
                                <input type="hidden" name="Province" value="<?= $recu->Province ?>">
                                <input type="hidden" name="Region" value="<?= $recu->Region ?>">
                                <input type="hidden" name="DateCreation" value="<?= $recu->DateCreation ?>">
                                <input type="hidden" name="AnneePayee" value="<?= $recu->AnneePayee ?>">
                                <input type="hidden" name="MontantCotisation" value="<?= $recu->MontantCotisation ?>">
                                <input type="hidden" name="Somme" value="<?= $recu->Somme ?>">

                              <td>
                                <input type="submit" name="submit" value="PDF" class="btn btn-primary">
                                <input type="submit" name="submitmail" value="Envoie" class="btn btn-danger">
                              </td>
                            </tr>

                          </form>


                        <?php } ?>

                      </tbody>
                    </table>
                  </div>
                </div><!-- col-lg-12-->         
            </div><!-- /row --></section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->
<?php include '_admin.footer.php' ?>