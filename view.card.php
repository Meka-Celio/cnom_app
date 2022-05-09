<?php $page = "Mon type de carte";

if (isset($_GET['a'])) {
    if (!isset($_POST['NotPaid'])) { header('Location:view.noPaid.php?msg=403'); }
    $notPaid    =   $_POST['NotPaid'];
    $CINMedecin =   $_POST['CINMedecin'];
    $cache      =   $_POST['cache'];
    $year       =   "";
    $montant    =   0;

    if (is_array($notPaid)) {
        $years = $notPaid;
        for ($i=0; $i<count($years); $i++) 
        {
            $montant += substr($years[$i], 7);
            $years[$i] = substr($years[$i], 0, 4);
        } // Fin de boucle
        $year   =   implode(',', $years);
    }
    else 
    {
        $year       = substr($notPaid, 0, 4);
        $montant    = substr($notPaid, 7); 
    }   

    // Si le cache == 0, cache inactif
    if ($cache == 0) {
        $cache = 0;
    } else {
        $cache = 1;
    }

    // $card, $montant, $CINMedecin, $cache, $year, $montant

} else {
    header('Location:view.noPaid.php?msg=403');
}


require '_header.php'; ?>

    <section id="main-content" class="card-section">
        <section class="wrapper">
           
            <!-- Card section -->
            <div class="container" class="card-section-container">
                <div class="row col-md-6">
                    <h3>Définissez la nature de votre carte</h3>

                    <!-- <form action="app.controller.php?action=paiement" method="post" id="card-form"> -->
                    <form action="app.controller.php?action=paiement" method="post" id="card-form">
                        <div class="card-types">
                            <div class="card-type-content">
                                <div class="card-type card-national">
                                    <a>
                                        <h4>Nationale</h4>
                                        <input type="radio" name="card" id="" value="NAT" class="form-control" checked>
                                    </a>  
                                </div>
                            </div>
                            <div class="card-type-content">
                                <div class="card-type card-international">
                                    <a>
                                        <h4>Internationale</h4>
                                        <input type="radio" name="card" id="" value="INT" class="form-control">
                                    </a>  
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Payer ma cotisation" class="btn-submit">
                        </div>
                        <!-- // $montant, $CINMedecin, $cache, $year -->
                        <input type="hidden" name="montant" value="<?= $montant ?>">
                        <input type="hidden" name="CINMedecin" value="<?= $CINMedecin ?>">
                        <input type="hidden" name="cache" value="<?= $cache ?>">
                        <input type="hidden" name="year" value="<?= $year ?>">
                    </form>

                </div>
            </div>
        </section>
    </section>

<?php require '_footer.php' ?>