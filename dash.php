<table class="table table-striped table-advance table-hover">
                            <h4><i class="fa fa-angle-right"></i> Cotisations à régler</h4>
                            <hr>
                              <thead>
                                <tr>
                                    <th>#</th>
                                    <th><i class="fa fa-bookmark"></i> Année</th>
                                    <th><i class="fa fa-bookmark"></i> Montant</th>
                                    <th><i class=" fa fa-edit"></i> Status</th>
                                </tr>
                              </thead>
                              <tbody>
                                
                                <?php if (isset($yearListNotPaid->AnneeVM)) { 
                                  $AnneeVMNotPaid = $yearListNotPaid->AnneeVM; ?>

                                  <form action="app.controller.php?action=paiement" method="post">

                                  <?php if (is_array($AnneeVMNotPaid)) { ?>
                                    <?php for($i=0; $i<count($AnneeVMNotPaid); $i++) { ?>
                                          <tr>
                                            <td>
                                              <input type="checkbox" name="NotPaid" value="<?= substr($AnneeVMNotPaid[$i]->AnneeMontant, 7) ?>" placeholder="">
                                            </td>
                                            <td><?= $AnneeVMNotPaid[$i]->Annee; ?></td>
                                            <td id="montant-<?= $i ?>"><?= substr($AnneeVMNotPaid[$i]->AnneeMontant, 7); ?></td>
                                            <td><p class="label label-danger"><b>Non Payée</b></p></td>
                                          </tr>
                                        <?php } ?>
                                          <tr>
                                            <td colspan="4">
                                              <button class="btn btn-success">Payer ma cotisation</button>
                                            </td>
                                          </tr>
                                  <?php } else { ?>
                                        <tr>
                                          <td>
                                              <input type="radio" name="NotPaid" value="<?= $AnneeVMNotPaid->AnneeMontant ?>" placeholder="">
                                            </td>
                                            <td><?= $AnneeVMNotPaid->Annee; ?></td>
                                            <td id="0"><?= $AnneeVMNotPaid->AnneeMontant; ?></td>
                                            <td><p class="label label-danger"><b>Non Payée</b></p></td>
                                        </tr>
                                  <?php } ?>
                                  <tr>
                                          <input type="hidden" name="Nom_Medecin" value="<?= $user->Nom_Medecin ?>">
                                            <input type="hidden" name="CINMedecin" value="<?= $user->CINMedecin ?>">
                                            <input type="hidden" name="mail" value="<?= $user->Email ?>">
                                          <td colspan="4"><button class="btn btn-success">Payer ma cotisation</button></td>
                                        </tr>
                                </form>
                                <?php } else { ?>
                                    <tr>
                                        <td colspan="4" ><p class="text-success"><b>Toutes les cotisations sont payées !</b></p></td>
                                    </tr>
                                <?php } ?>
                              </tbody>
                          </table>
                        