<?php 
    require 'app.soapClient.php';
    require_once 'model.collection.php';

    // ---------------------------------------------------
    // FONCTIONS POUR LA VALIDATION
    // ---------------------------------------------------
    function valideStringNoRequire ($postString) {
        if (!empty($postString)) {
            return 1;
        } else {
            return 0;
        }
    }

    function valideStringWithRequire ($postString) {
        if (!empty($postString)) {
            return 1;
        } else {
            return 0;
        }
    }

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
    
    // ---------------------------------------------
    // FONCTION D'ACTIONS
    // ---------------------------------------------
    
    /**
	 * Permet de vérifier si la dernière année à payer fait parti 
	 * des années à payer dans le paiement en cours
	 * 
	 * @param string	$CINMedecin			La CIN du médecin qui paie
	 * @param string	$chaine				Les années à payer sous forme de chaine de caractères
	 * 
	 * @var array		$AnneeVM			Tableau contenant les cotisation du médecin
	 * @var array 		$yearsNotPaid		Tableau qui récupère les annéees
	 * 
	 * @var string		$oldOneYear			La plus vielle année à régler
	 * @var string 		$firstYear			La plus récente année à régler
	 * @var string 		$stringYears		La chaine de caractères des années
	 * @var string 		$longueur_chaine	La longueur de la chaine de la plus récente à la plus ancienne année	
	 * 	
	 * @return int							Indication renvoyée pour savoir si la vérification est bonne ou pas
	 */

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


    function RecupererRecu ($NumCommande, $CINMedecin) 
    {
        $NumTransaction =	$NumCommande;
  		$CIN 			= 	$CINMedecin;
  		
  		// Récupération du reçu
  		$getRecu = GetRecuCotisation($NumTransaction, $CIN);
  		$recu_paiement = $getRecu->GetRecuCotisationPayerAvecAuthResult->MedecinCotisationPayee;	

  		if ($recu_paiement) {

  			// Appel à la fonction pour recupération info médecin
		  	$response = getInfoMedecin($CIN);

			// Appel a la fonction getMedecin pour recuperer le mail du medecin
			$DBMedecin = getUserByCIN($CIN);
			$mail = $DBMedecin->Email;
		  
			// Recuperation medecin
			$medecin = $response->GetInfoMedecinAvecAuthResult;

		  	$recu_Nom                           = $medecin->NomComplet;
		  	$recu_SecteurMedecin                = $medecin->SecteurMedecin;
		  	$recu_SpecialiteMedecin             = $medecin->SpecialiteMedecin;
		  	$recu_DateDiplome                   = $medecin->DateDiplome;
		  	$recu_DateRecrutement_Installation  = $medecin->DateRecrutement_Installation;
		  	$recu_AdressePro                    = $medecin->AdressePro;
		  	$recu_Province                      = $medecin->LibelleProvince;
		  	$recu_Region                        = $medecin->LibelleRegion; 
		  	$recu_DateCreation                  = date("d/m/Y");

		  	// Si il y a plusieurs lignes
	  		if (is_array($recu_paiement))
	  		{
	  			// Données variables en fonction du nbr années payées
			  	$recu_CINMedecin        = $recu_paiement[0]->CINMedecin;
			  	$recu_NumTransaction    = $recu_paiement[0]->NumRecuTransaction;
			  	$recu_NumRecu           = array();
			  	$recu_AnneeCotisation   = array();
			  	$recu_MontantCotisation = array();
			  	$recu_Somme             = array();

			  	for ($i = 0; $i < count($recu_paiement); $i++)
				{
				    $a = $recu_paiement[$i]->AnneeCotisation;
				    $m = $recu_paiement[$i]->MontantCotisation;
				    $s = '';
				    $r = $recu_paiement[$i]->NumRecuGenere;

				    if ($a == '2009' || $a == '2010' || $a == '2011' || $a == '2012' || $a == '2013' || $a == '2014' || $a == '2015')
				    {
				      $s = "Trois Cent";
				    }
				    elseif ($a == '2016' || $a == '2017' || $a == '2018') {
				      $s = "Sept Cent";
				    }
				    else {
				      $s = "Cinq Cent";
				    }
				    
				    array_push($recu_NumRecu, $r);
				    array_push($recu_AnneeCotisation, $a);
				    array_push($recu_Somme, $s);
				    array_push($recu_MontantCotisation, $m);
				  }

	  		} // endif
	  		// Si il y a une seule ligne
	  		else 
	  		{
	  			// Données variables en fonction du nbr années payées
			  	$recu_CINMedecin        = $recu_paiement->CINMedecin;
			  	$recu_NumTransaction    = $recu_paiement->NumRecuTransaction;
			  	$recu_NumRecu           = $recu_paiement->NumRecuGenere;
			  	$recu_AnneeCotisation   = $recu_paiement->AnneeCotisation;
			  	$recu_MontantCotisation = "";
			  	$recu_Somme             = "";

			  	$a = $recu_paiement->AnneeCotisation;
			    $m = $recu_paiement->MontantCotisation;
			    $s = '';

			    if ($a == '2009' || $a == '2010' || $a == '2011' || $a == '2012' || $a == '2013' || $a == '2014' || $a == '2015')
			    {
			      $s = "Trois Cent";
			    }
			    elseif ($a == '2016' || $a == '2017' || $a == '2018') {
			      $s = "Sept Cent";
			    }
			    else {
			      $s = "Cinq Cent";
			    }

			  	$recu_MontantCotisation = $m;
			  	$recu_Somme             = $s;

	  		} //endelse

	  		$recuPaiement = (object) array (
	  			'CINMedecin'					=>	$recu_CINMedecin,
	  			'NumTransaction'				=>	$recu_NumTransaction,
	  			'NumRecu'						=>	$recu_NumRecu,
	  			'Nom'							=>	$recu_Nom,
	  			'SecteurMedecin'				=>	$recu_SecteurMedecin,
	  			'SpecialiteMedecin'				=>	$recu_SpecialiteMedecin,
	  			'DateDiplome'					=>	$recu_DateDiplome,
	  			'DateRecrutement_Installation'	=>	$recu_DateRecrutement_Installation,
	  			'AdressePro'					=>	$recu_AdressePro,
	  			'Province'						=>	$recu_Province,
	  			'Region'						=>	$recu_Region,
	  			'DateCreation'					=>	$recu_DateCreation,
	  			'AnneePayee'					=>	$recu_AnneeCotisation,
	  			'MontantCotisation'				=>	$recu_MontantCotisation,
	  			'Somme'							=>	$recu_Somme,
				'Email'							=>	$mail
	  		);


	  		return $recuPaiement;

  		} // endif
  		else 
  		{
  			return 0;
  		} // endesle
    }

    /*******************************************************************************************
     * MAIN
    ****************************************************************************************** */

    if (isset($_GET['action'])) {
       
        // En fonction de l'action reçu faire un traitement spécifique
        switch($_GET['action']) {

            case 'register':
                /*----------------------------------------
                Si nouvel enregistrement
                ------------------------------------------*/
                // Si présence de formulaire
                (function ()
                {
                    if (isset($_POST['CINMedecin']))
                    {
                        $CINMedecin     =   $_POST['CINMedecin'];
                        $Nom_Medecin    =   $_POST['Nom_Medecin'];
                        $Telephone      =   $_POST['Telephone'];
                        $ID_Province    =   $_POST['ID_Province'];

                        $Province       =   getProvinceByID($ID_Province);
                        $NomProvince    =   $Province->Nom_Province;
                        $Region         =   getOneRegion($_POST['Region']);
                        $IDRegion       =   $Region->ID_Region;
                        $NomRegion      =   $Region->Nom_Region;

                        // addMedecin ($CINMedecin, $Nom_Medecin, $Email, $Pwd, $Telephone, $NomProvince, $NomRegion, $Date_Inscription, $Date_Modification)

                        $addMedecin     = addMedecin(
                            $CINMedecin,
                            $Nom_Medecin,
                            '',
                            12345,
                            $Telephone,
                            $NomProvince,
                            $NomRegion,
                            date('Y-m-d'),
                            date('Y-m-d') 
                        );

                        if ($addMedecin)
                        {
                            header('Location:form.login.php?msg=loginOn');
                        }
                        else 
                        {
                            header('Location:form.login.php?msg=RegisterFail');
                        }
                        
                    }
                    else 
                    {
                        header('Location:form.login.php?msg=403');
                    }
                })();
            break;


            case 'login':
                // header('Location:view.dashboard.php?msg=loginOk');
            /*------------------------------------------------
            Si l'action est une connexion
            -------------------------------------------------*/
                (function () {
                    $CINMedecin =   $_POST['CINMedecin'];
                    $Pwd        =   $_POST['Pwd']; 

                    $log        =   "";
                    $secret     =   "";  

                    /*-------------------------------------
                        Verification de La CIN
                    --------------------------------------*/
                    // Si la CIN est vide
                    if (empty($CINMedecin)) {
                        $log = -2;
                    } 
                    // Si la CIN n'est pas vide
                    else 
                    {
                        // Vérification dans les cotisations
                        $response       =   getCotisationNonPayer($CINMedecin);
                        $responseInfo   =   getInfoMedecin($CINMedecin);

                        // Vérifier la CIN dans le webservice
                        $existeMedecin  =  $response->GetCotisationNonPayerAvecAuthResult->MedecinCotisation->ExisteMedecin;
                        if ($existeMedecin) 
                        {
                          $log = 1;

                          // Verifier si le medecin est dans la database
                            if (isset($CINMedecin)) {
                                $verifyMedecin = getCIN($CINMedecin);  // DBCinMedecin
                                //var_dump($verifyMedecin);
                                if ($verifyMedecin) 
                                {
                                    $log = 2;
                                    $DBCinMedecin = $verifyMedecin->CINMedecin;
                                }  
                                else
                                {
                                    $log = 1;
                                }
                            } 
                        } 
                        else 
                        {
                          $log = 0;
                        }

                    /*---------------------------------------
                        Verification du mot de passe
                    ----------------------------------------*/
                    // Si le mot de passe est vide
                        if (empty($Pwd)) 
                        {
                            $secret = 0;
                        }
                        else 
                        {
                            // Véfifier si la CIN est valide
                            // Si non valide
                            if ($log == 0) 
                            {
                                header('Location:form.login.php?msg=noExistCIN');
                            }
                            // Si le medecin existe dans le webservice mais pas dans labase de données
                            elseif ($log == 1) 
                            {
                                // echo "medecin existant mais pas dans la base";
                                // header("Location:form.register.php?msg=RegisterCIN&CIN=$CINMedecin");
                                // echo "Nouvel enregistrement détecté !";
                                
                                $informationMedecin = $responseInfo->GetInfoMedecinAvecAuthResult;

                                $Wcin = $informationMedecin->Cin;
                                $WNom = 'Dr '.$informationMedecin->NomComplet;
                                $WPwd = '12345';
                                $WEmail = "";
                                $WTelephone = $informationMedecin->TelephoneMobile;
                                $WNom_Province = $informationMedecin->LibelleProvince;
                                $WNom_Region = $informationMedecin->LibelleRegion;
                                $Wdate = date('Y-m-d');

                                // echo "$Wcin, $WNom a pour mail : $WEmail. Telephone : $WTelephone, de $WNom_Province dans la région de $WNom_Region est enregistré le $Wdate";

                                $register = addMedecin ($Wcin, $WNom, $WEmail, $WPwd, $WTelephone, $WNom_Province, $WNom_Region, $Wdate, $Wdate);

                                if ($register)
                                {
                                    header('Location:form.login.php?msg=loginOn');
                                }
                            }
                            else 
                            {
                                // Si présent dans la base, valider le mot de passe
                                $DBPasswordResponse     =   getPwd($DBCinMedecin);
                                $DBPassword             =   $DBPasswordResponse->Pwd;

                                // Si mot de passe est valide et crypté
                                if (password_verify($Pwd, $DBPassword)) {
                                    $secret = 2;
                                } 
                                // Si valide mais non cryptée
                                elseif ($Pwd == $DBPassword)
                                {
                                    $secret = 1;
                                }
                                // Si non valide
                                else 
                                {
                                    $secret = 0;
                                }

                                // Connexion
                                if ($secret == 2) 
                                {  
                                    $medecin = getUser($DBCinMedecin, $DBPassword);
                                    session_start();
                                    $_SESSION['medecin']    = $medecin;

                                    // Validation du mail 
                                    // Si le medecin a un mail dans la base de données
                                    $DBEmail = $medecin->Email;
                                    header('Location:view.dashboard.php?msg=loginOk');    
                                }
                                elseif ($secret == 1) 
                                {
                                    $medecin = getUser($DBCinMedecin, $DBPassword);
                                    session_start();
                                    $_SESSION['medecin']    = $medecin;
                                    header('Location:form.firstCon.php?msg=firstCon&mail=ok');
                                }
                                else 
                                {
                                    header('Location:form.login.php?msg=password_404');
                                }
                            }
                        }


                    }
                })();
                break;

            case 'paiement':
            /*------------------------------------------------
            Si l'action est un paiement
            -------------------------------------------------*/
                (function () {

                    if (isset($_POST['NotPaid'])) {

                        $montant = 0;

                        // Si le cache == 0, cache inactif
                        if ($_POST['cache'] == 0) {
                            $cache = 0;
                        } else {
                            $cache = 1;
                        }

                        // SI le medecin a plusieurs impayées
                        if (is_array($_POST['NotPaid'])) {
                            $years = $_POST['NotPaid'];
                            for ($i=0; $i<count($years); $i++) {
                                $montant += substr($years[$i], 7);
                                $years[$i] = substr($years[$i], 0, 4);
                            } // Fin de boucle

                            $user           = getUserByCIN($_POST['CINMedecin']);

                            // Vérifier 

                            if ($user) {
                                session_start();
                                $_SESSION['user'] = $user;

                                $valideMail = valideMail($user->Email);

                                if ($valideMail) {

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
                                    
                                    $frais = number_format(($montant/98.68)*100*0.0136,2);
                                    $montantPaid = $frais + $montant;
                                    $montantAff = $montant;

                                    $number = genererChaineAleatoire(); 

                                    // W + Code region + int(6) + yearDay + H
                                    $id_commande = 'W'. $user->CINMedecin .$number. date('zH');

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
                                    $Annee              =   implode(',', $years); 
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
                                            'Annees'            =>  $years,
                                            'DateE'             =>  $dateE
                                        );

                                        $Nom = str_replace('\'', '', $Nom);

                                        $addTransaction = addTransaction($CIN, $Nom, $Email, $Tel, $NTransaction, $NAutorisation, $NCommande, $NCarte, $Prix, $DatePaiement, $HeurePaiement, $Annee, $dateE);

                                        if ($addTransaction) {
                                            header("Location:API_PHP/index.php");
                                        }
                                        else {
                                            echo "<br> Une erreur est survenue, merci de contacter le support";
                                        }
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
                                            'Annees'            =>  $years,
                                            'DateE'             =>  $dateE
                                        );

                                        $Nom = str_replace('\'', '', $Nom);

                                        $addTransaction = addTransaction($CIN, $Nom, $Email, $Tel, $NTransaction, $NAutorisation, $NCommande, $NCarte, $Prix, $DatePaiement, $HeurePaiement, $Annee, $dateE);

                                        if ($addTransaction) {
                                            header("Location:API_PHP/index.php");
                                        }
                                        else {
                                            echo "<br> Une erreur est survenue, merci de contacter le support";
                                        }
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
                        // Si il a un seul impayée
                        else 
                        {
                            $year       = substr($_POST['NotPaid'], 0, 4);
                            $montant    = substr($_POST['NotPaid'], 7); 

                            
                            $user = getUserByCIN($_POST['CINMedecin']);

                            // Vérifier

                            if ($user) {
                                session_start();
                                $_SESSION['user'] = $user;


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
                                
                                $frais = number_format(($montant/98.68)*100*0.0136,2);
                                $montantPaid = $frais + $montant;
                                $montantAff = $montant;

                                $number = genererChaineAleatoire(); 

                                // W + Code region + int(6) + yearDay + H
                                $id_commande = 'W'. $user->CINMedecin .$number. date('zH');

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

                                $addTransaction = addTransaction($CIN, $Nom, $Email, $Tel, $NTransaction, $NAutorisation, $NCommande, $NCarte, $Prix, $DatePaiement, $HeurePaiement, $Annee, $dateE);

                                if ($addTransaction) 
                                {
                                    header("Location:API_PHP/index.php");
                                }
                            } else {
                                echo "pas de user recupérer";
                            }
                        }
                            
                    }
                    else {
                        header('Location:view.dashboard.php?msg=noPay');
                    }
                })();break;

            case 'updatePassword':
            /*------------------------------------------------
            Si l'action est une mise à jour de mot de passe
            -------------------------------------------------*/
            (function () {
                // Si la CIN est bien renvoyé
                if (isset($_POST['CINMedecin'])) {

                    $CINMedecin         =   $_POST['CINMedecin'];
                    $newPassword        =   $_POST['Pwd'];
                    $Email              =   $_POST['Email'];

                    $user = getUserByCIN($CINMedecin);

                    // Valider l'adresse mail
                    // Si email est valide
                    if (valideMail($Email) === 1) {
                        // Valider le mot de passe
                        // SI le mot de passe fais moins de 5 caractères
                        if (strlen($newPassword) < 5) {
                            header('Location:view.user.php?msg=toshortPassword');
                        } else {
                            // Mot de passe déjà cripté et existant
                            if (password_verify($newPassword, $user->Pwd)) {
                                header('Location:view.user.php?msg=existPassword');
                            }
                            // Mot de passe existant mais pas cripté
                            else {
                                if ($newPassword === $user->Pwd) {
                                    header('Location:view.user.php?msg=existPassword');
                                }
                                // Si mot de passe non existant
                                else {
                                    $hash = password_hash($newPassword, PASSWORD_DEFAULT);
                                    $modifyPassword = updatePassword($CINMedecin, $hash);
                                    if ($modifyPassword) {
                                        updateDateModification($CINMedecin);
                                        header("Location:mail/notif.updatePassword.php?CIN=$CINMedecin&Email=$Email");
                                    } //endif
                                } // endelse
                            } // endelse
                        } // endelse
                    } // endif
                    // Sinon
                    else {
                        header('Location:view.user.php?msg=bad_mail');
                    }
                }
                // Sinon
                else {
                    header("Location:form.login.php?msg=noCIN");
                }
            })();
                break;

            case 'updatePasswordFirstCon':
            /*-----------------------------------------------------------------
            Si l'action est une mise à jour de mot de passe après une connexion
            ------------------------------------------------------------------*/
            (function () {
                // Si la CIN est bien renvoyé
                if (isset($_POST['CINMedecin'])) {

                    $CINMedecin         =   $_POST['CINMedecin'];
                    $newPassword        =   $_POST['Pwd'];
                    $Email              =   $_POST['Email'];

                    $user = getUserByCIN($CINMedecin);

                    // Valider l'adresse mail
                    // Si email est valide
                    if (valideMail($Email) === 1) {
                        // Valider le mot de passe
                        // SI le mot de passe fais moins de 5 caractères
                        if (strlen($newPassword) < 5) {
                            header('Location:form.firstCon.php?msg=toshortPassword');
                        } else {
                            // Mot de passe déjà cripté et existant
                            if (password_verify($newPassword, $user->Pwd)) {
                                header('Location:form.firstCon.php?msg=existPassword');
                            }
                            // Mot de passe existant mais pas cripté
                            else {
                                if ($newPassword === $user->Pwd) {
                                    header('Location:form.firstCon.php?msg=existPassword');
                                }
                                // Si mot de passe non existant
                                else 
                                {
                                    $hash = password_hash($newPassword, PASSWORD_DEFAULT);
                                        $modifyPassword = updatePassword($CINMedecin, $hash);
                                        if ($modifyPassword) 
                                        {
                                            updateDateModification($CINMedecin);
                                            updateEmail($CINMedecin, $Email);
                                            updateMailOnMarit($CINMedecin, $Email);
                                            header("Location:mail/notif.firstCon.php?CIN=$CINMedecin&Email=$Email");
                                        }
                                }
                            }
                        }
                    }
                    // Sinon
                    else {
                        header('Location:form.firstCon.php?msg=bad_mail');
                    }
                }
                // Sinon
                else {
                    header("Location:form.login.php?msg=noCIN");
                }
            })();
                break;

            case 'resetPassword':
            (function () {
                $email = $_POST['email'];
                $valide = valideMail($email);
                if (empty($email)) {
                    header("Location:form.forgetPassword.php?msg=bad_mail");
                } else {
                    if ($valide) {
                        header("Location:form.resetPassword.php?email=$email");
                    }
                    else {
                        header("Location:form.forgetPassword.php?msg=bad_mail");
                    }
                }
            })();
                break;

            case 'reclam':
                (function() {
                    $postCIN    = $_POST['CINMedecin'];
                    $postNom    = $_POST['Nom_Medecin'];
                    $postMail   = $_POST['Email'];
                    $postTel    = $_POST['Telephone'];
                    $Region     = $_POST['Region'];
                    $Province   = $_POST['Province'];

                    if (valideStringWithRequire($postCIN) === 1) {
                        if(valideStringWithRequire($postNom) === 1) {
                            if (valideMail($postMail) === 1) {
                                if (valideStringWithRequire($postTel) === 1) {
                                    header("Location:mail/notif.reclamation.php?CIN=$postCIN&Nom=$postNom&Email=$postMail&Telephone=$postTel&Region=$Region&Province=$Province");
                                } else {
                                    header('Location:form.reclamation.php?msg=null_tel');
                                }
                            } else {
                                header('Location:form.reclamation.php?msg=bad_mail');
                            }
                        } else {
                            header('Location:form.reclamation.php?msg=404');
                        }
                    } else {
                        header('Location:form.reclamation.php?msg=404');
                    } 
                })();
                break;

            case 'ticketPaiement':
                (function() {
                    // Reception des données du recap de paiement

                    if (isset($_GET['CIN'])) {

                        // Section entete
                        $NumCommande            =   $_GET['NumCommande'];
                        $NumTransaction         =   $_GET['NumTransaction'];
                        $NumAutorisation        =   $_GET['NumAutorisation'];
                        $Montant                =   $_GET['Montant'];

                        // Section User
                        $CIN                    =   $_GET['CIN'];
                        $Nom                    =   $_GET['Nom'];
                        $Email                  =   $_GET['Email'];
                        $NumCarte               =   $_GET['NumCarte'];
                        $Region                 =   $_GET['Region'];
                        $Province               =   $_GET['Province'];

                        // Section Content
                        $Date                   =   $_GET['DateTransaction'].' - '.$_GET['HeureTransaction'];
                        $AnneeCotisation        =   $_GET['AnneeCotisation']; // Est déja une chaine de caractere

                        // Section Footer
                        $Commercant             =   $_GET['Commercant'];

                        // Vérification des cotisations
                        $VerifCotisation        =       verifCotisation($CIN, $AnneeCotisation);
                        $TypeMail               =       0;

                        if ($VerifCotisation) {
                            $TypeMail = 1;
                        }
                        else {
                            $TypeMail = -1;
                        }

                        // Enregistrement de Cotisation
                        $tabCotisation        =     explode(',', $AnneeCotisation); // est un array
                        $reverseTabCotisation =     array_reverse($tabCotisation);
                        
                        // Id cotisation
                        $TabIdCotisation = array();

                        // Ajouter les Id des cotisations
                        for ($z=0; $z<count($reverseTabCotisation); $z++) {
                            if ($reverseTabCotisation[$z] == '2009') {
                                array_push($TabIdCotisation, 25);
                            }
                            else if ($reverseTabCotisation[$z] == '2010') { array_push($TabIdCotisation, 26); }
                            else if ($reverseTabCotisation[$z] == '2011') { array_push($TabIdCotisation, 27); }
                            else if ($reverseTabCotisation[$z] == '2012') { array_push($TabIdCotisation, 28); }
                            else if ($reverseTabCotisation[$z] == '2013') { array_push($TabIdCotisation, 29); }
                            else if ($reverseTabCotisation[$z] == '2014') { array_push($TabIdCotisation, 30); }
                            else if ($reverseTabCotisation[$z] == '2015') { array_push($TabIdCotisation, 31); }
                            else if ($reverseTabCotisation[$z] == '2016') { array_push($TabIdCotisation, 32); }
                            else if ($reverseTabCotisation[$z] == '2017') { array_push($TabIdCotisation, 33); }
                            else if ($reverseTabCotisation[$z] == '2018') { array_push($TabIdCotisation, 34); }
                            else if ($reverseTabCotisation[$z] == '2019') { array_push($TabIdCotisation, 35); }
                            else if ($reverseTabCotisation[$z] == '2020') { array_push($TabIdCotisation, 36); }
                            else if ($reverseTabCotisation[$z] == '2021') { array_push($TabIdCotisation, 37); }
                            else { array_push($TabIdCotisation, 38); }
                        }

                        // Formater le tableau en string
                        $stringIdCotisation = implode($TabIdCotisation, ',');

                        // Update de la transaction

                        // Appel de la fonction d'ajout de cotisation
      	                //$addCotisation = AjoutCotisation($CIN, $NumCommande, $stringIdCotisation);

                        // Url pour génération de ticket
                        $url = "NumCommande=$NumCommande&NumTransaction=$NumTransaction&NumAutorisation=$NumAutorisation&Montant=$Montant&CIN=$CIN&Nom=$Nom&Email=$Email&NumCarte=$NumCarte&Region=$Region&Province=$Province&Date=$Date&AnneeCotisation=$AnneeCotisation&Commercant=$Commercant";

                        if ($TypeMail == 1) {
                            header("Location:mail/notif.paiement.php?$url");
                        }
                        else {
                            header("Location:mail/notif.infraction.php?$url");
                        }                
                    }
                    else {}
                })();
                break;

            case 'changePassword' : 
                (function () {
                    // Si la CIN est bien renvoyé
                if (isset($_POST['CINMedecin'])) {

                    $CINMedecin         =   $_POST['CINMedecin'];
                    $newPassword        =   $_POST['Pwd'];
                    $Email              =   $_POST['Email'];

                    $user = getUserByCIN($CINMedecin);

                    if ($user) {
                        // Valider l'adresse mail
                        // Si email est valide
                        if (valideMail($Email) === 1) {
                            // Valider le mot de passe
                                // SI le mot de passe fais moins de 5 caractères
                                if (strlen($newPassword) < 5) {
                                    header('Location:form.updatePassword.php?msg=toshortPassword');
                                } //endif
                                else {
                                    // Si valide mot de passe
                                    if (valideStringWithRequire($newPassword)) {
                                        $hash = password_hash($newPassword, PASSWORD_DEFAULT);
                                        $modifyPassword = updatePassword($CINMedecin, $hash);

                                        // Si la requete reussie
                                        if ($modifyPassword) {
                                            updateDateModification($CINMedecin);
                                            header("Location:mail/notif.changePassword.php?email=$Email");
                                        } //endif
                                        else {
                                            header('Location:form.resetPassword.php?msg=query_fail');
                                        } //endelse
                                    } //endif
                                    else {
                                        header('Location:form.resetPassword.php?msg=noPwd');
                                    } //endelse
                                } //endelse
                        }//endif
                        else {
                            header('Location:form.resetPassword.php?msg=bad_mail');
                        }//endelse
                    } // endif
                    else {
                        header('Location:form.resetPassword.php?msg=login_404');
                    } //endelse
                } //endif
                else {
                    header("Location:form.resetPassword.php?msg=noCIN");
                } //endelse
                })();
            break;

            case 'userUpdate':
                (function () {
                    var_dump($_POST);
                })();
                break; 

            default:break;

            case 'recu_paiement':
                (function () {
                    if (isset($_GET['CIN']))
                    {
                        $CIN            =   $_GET['CIN'];
                        $NumCommande    =   $_GET['NumCommande'];
                        $Annees         =   $_GET['Annees'];
                        $Email          =   $_GET['email'];

                        $getRecu = RecupererRecu($NumCommande, $CIN);

                        if ($getRecu) {

                            $CINMedecin 					=	$getRecu->CINMedecin;
                            $numcommande					=	$getRecu->NumTransaction;
                            $nom_medecin 					=	$getRecu->Nom;
                            $secteur 						=	$getRecu->SecteurMedecin;
                            $specialite 					=	$getRecu->SpecialiteMedecin;
                            $date_diplome 					=	$getRecu->DateDiplome;
                            $date_installation_recrutement 	=	$getRecu->DateRecrutement_Installation;
                            $adresse_pro 					=	$getRecu->AdressePro;
                            $province 						=	$getRecu->Province;
                            $region 						=	$getRecu->Region;
                            $daterecu 						=	$getRecu->DateCreation;
                            $email 							=	$getRecu->Email;
                    
                            /**
                             */
                    
                           if (is_array($getRecu->AnneePayee)) {
                               $annee 				= 	implode(',', $getRecu->AnneePayee);
                               $numrecu 			= 	implode(',', $getRecu->NumRecu);
                               $montant 			= 	implode(',', $getRecu->MontantCotisation);
                               $somme 				=	implode(',', $getRecu->Somme);
                           }
                           else {
                            $annee 		= 	$getRecu->AnneePayee;
                            $numrecu 	= 	$getRecu->NumRecu;
                            $montant 	= 	$getRecu->MontantCotisation;
                            $somme 		=	$getRecu->Somme;
                           }
                           $url = "mail/notif.recu.php?CINMedecin=$CINMedecin&numcommande=$numcommande&nom_medecin=$nom_medecin&secteur=$secteur&specialite=$specialite&date_diplome=$date_diplome&date_installation_recrutement=$date_installation_recrutement&adresse_pro=$adresse_pro&province=$province&region=$region&daterecu=$daterecu&email=$email&annee=$annee&numrecu=$numrecu&montant=$montant&somme=$somme";
                           header("Location:$url");
                        }
                        else {
                            echo "il ny a pas de recu";
                        }

                    }
                    
                    //  ["action"]=> string(13) "recu_paiement" 
                    //["CIN"]=> string(7) "Q297358" 
                    //["NumCommande"]=> string(18) "WQ2973581834008814" 
                    //["Annees"]=> string(9) "2022,2021" 
                    //["email"]=> string(16) "easymoi@yahoo.fr"
                })();
                break;
        }
    }
    else {
        header('Location:form.login.php?msg=403');
    }