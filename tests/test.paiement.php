<?php

require '../model.collection.php';
require '../app.soapClient.php';




function valideMail ($postMail) {
    if(empty($postMail)) {
        return 0;
    } else {
        $pattern = "/^[^\s()<>@,;:\/]+@\w[\w\.-]+\.[a-z]{2,}$/i";
        if (!preg_match($pattern, $postMail)) {
            return 0;
        } 
        else {
            return 1;
        }
    }
}


function genererChaineAleatoire($longueur = 6)
{
        $caracteres = '0123456789';
        $longueurMax = strlen($caracteres);
        $chaineAleatoire = '';
        for ($i = 0; $i < $longueur; $i++)
        {
            $chaineAleatoire .= $caracteres[rand(0, $longueurMax - 1)];
        }
        return $chaineAleatoire;
}

function verifCotisation ($CINMedecin, $chaine, $cache) {

    // Récupération des impayees de $CINMedecin
    $getImpayees = getCotisationNonPayer($CINMedecin);

    // Récupération du tableau des cotisations impayees 
    $AnneeVM = $getImpayees->GetCotisationNonPayerAvecAuthResult->MedecinCotisation->listeAnnee->AnneeVM;

    // Variables
    $yearsNotPaid 		= 	[];
    $oldOneYear 		= 	"";
    $firstYear			=	"";
    $stringYears		=	"";
    $longueur_chaine	=	0;

    if (is_array($AnneeVM)) {
        // Ajout des années dans le tableau et du dernier element dans la variable $oldOneYear
        for ($i=0; $i < count($AnneeVM); $i++) {
            array_push($yearsNotPaid, $AnneeVM[$i]->Annee);
            $oldOneYear = strval($AnneeVM[$i]->Annee);
        }
    }
    else {
        array_push($yearsNotPaid, $AnneeVM->Annee);
    }

    // Attribution de la première année
    $firstYear	=	strval($yearsNotPaid[0]);
    
    // Vérifier que $oldOneYear est dans $chaine
    if (stristr($chaine, $oldOneYear)) {
        // vérifier que la premiere annee est dans la chaine
        if (stristr($chaine, $firstYear))
        {
            $stringYears 	= implode(',', $yearsNotPaid);
            $longueur_chaine = strlen($stringYears);

            if (strlen($chaine) === $longueur_chaine) {
                return 1;
            }
            else {
                if ($cache) {
                    return 2;
                }
                else {
                    return -1;
                }
            }
        }
        else 
        {
            return 2;
        }
    } 
    else {
        if ($cache) {
            return 2;
        }
        else {
            return 0;
        }
    }
}


function preparePaiement ($card, $montant, $cin, $cache, $year) {
    $user           = getUserByCIN($cin);

        // Vérifier 

        if ($user) {
            // session_start();
            // $_SESSION['user']   =   $user;
            $responseInfo       =   getInfoMedecin($user->CINMedecin);
            $webuser            =   $responseInfo->GetInfoMedecinAvecAuthResult;

            $valideMail = valideMail($user->Email);

            if ($valideMail) {
                
                $frais = 0;
                if ($card == 'NAT') {
                    $frais = number_format(($montant/98.68)*100*0.0136,2);
                }
                else {
                    $frais = number_format(($montant/98.68)*100*0.0295,2);
                }
                $montantPaid = $frais + $montant;
                $montantAff = $montant;

                $number = genererChaineAleatoire(); 

                // W + Code region + int(6) + yearDay + H
                $id_commande = 'W'. $webuser->AbreviationRegion .$number. date('zHi'); 

                $CIN                =   $user->CINMedecin;     
                $Nom                =   $user->Nom_Medecin;
                $Email              =   $user->Email;
                $Tel                =   'null';
                $NTransaction       =   'null';
                $NAutorisation      =   'null'; 
                $NCommande          =   $id_commande;
                $NCarte             =   'null';
                $Prix               =   $montantPaid;
                $DatePaiement       =   date('Y-m-d'); 
                $HeurePaiement      =   date('H:i');
                $Annee              =   $year;
                $dateE              =   date('Y-m-d');

                $_verifCotisation = verifCotisation($CIN, $Annee, $cache);
                if ($_verifCotisation == 0) {
                    header('Location:view.noPaid.php?msg=no_old_year');
                }
                else if ($_verifCotisation == -1) {
                    header('Location:view.noPaid.php?msg=no_all_years');
                }
                else if ($_verifCotisation == 2) {
                    $_SESSION['cotisation'] = (object) array(
                        'NTransaction'      =>  $NTransaction,
                        'NAutorisation'     =>  $NAutorisation,
                        'NCommande'         =>  $NCommande,
                        'NCarte'            =>  $NCarte,
                        'Montant'           =>  $montant,
                        'MontantAff'        =>  $montantAff,
                        'DatePaiement'      =>  $DatePaiement,
                        'HeurePaiement'     =>  $HeurePaiement,
                        'Annees'            =>  $year,
                        'DateE'             =>  $dateE
                    );
                }
                else {
                    $_SESSION['cotisation'] = (object) array(
                        'NTransaction'      =>  $NTransaction,
                        'NAutorisation'     =>  $NAutorisation,
                        'NCommande'         =>  $NCommande,
                        'NCarte'            =>  $NCarte,
                        'Montant'           =>  $montant,
                        'MontantAff'        =>  $montantAff,
                        'DatePaiement'      =>  $DatePaiement,
                        'HeurePaiement'     =>  $HeurePaiement,
                        'Annees'            =>  $year,
                        'DateE'             =>  $dateE
                    );
                }      
                    $Nom = str_replace('\'', '', $Nom);

                    $addTransaction = addTransaction($CIN, $Nom, $Email, $Tel, $NTransaction, $NAutorisation, $NCommande, $NCarte, $Prix, $DatePaiement, $HeurePaiement, $Annee, $dateE);

                    if ($addTransaction) {
                        header("Location:API_PHP/index.php");
                    }
                    else {
                        echo "<br> Une erreur est survenue, merci de contacter le support";
                    }
            }
            else 
            {
                header('Location:view.noPaid.php?msg=bad_mail');
            }
        } else {
            echo "pas de user recupérer";
        }
}


/*--------------------------------------------------------------
MAIN    
-----------------------------------------------------------------*/
$data_post = isset($_POST) ? $_POST : null;
//var_dump($data_post->card);
$carte          =   $_POST['card'];
$montant        =   $_POST['montant'];
$CINMedecin     =   $_POST['CINMedecin'];
$cache          =   $_POST['cache'];
$year           =   $_POST['year'];  


