<?php 

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
                        // Vérifier la CIN dans le webservice
                        $response       = getCotisationNonPayer($CINMedecin);
                        $existeMedecin  =  $response->GetCotisationNonPayerAvecAuthResult->MedecinCotisation->ExisteMedecin;
                        if (isset($existeMedecin)) 
                        {
                          $log = 1;

                          // Verifier si le medecin est dans la database
                            if (isset($CINMedecin)) {
                                $verifyMedecin = getCIN($CINMedecin);  // DBCinMedecin
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
                            elseif ($log == 1) 
                            {
                                // echo "medecin existant mais pas dans la base";
                                header("Location:register.php?CIN=$CINMedecin&PWD=$Pwd");
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



 ?>