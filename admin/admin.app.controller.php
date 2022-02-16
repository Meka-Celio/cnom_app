<?php
    require '../app.soapClient.php';
    require_once '../model.collection.php';

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


    /************************************************
     * MAIN
    ************************************************ */

    if (isset($_GET['action'])) {

        // En fonction de l'action reçu faire un traitement spécifique
        switch($_GET['action']) {

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
                            // Si le mail correspond au mail du user
                            if ($Email === $user->Email) {
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
                            } //endif
                            else {
                                header('Location:form.resetPassword.php?msg=wrong_mail');
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

            case 'adminLogin':
                // header('Location:view.dashboard.php?msg=loginOk');
            /*------------------------------------------------
            Si l'action est une connexion
            -------------------------------------------------*/
               (function () {
                    $email      =   $_POST['Login'];
                    $pwd        =   $_POST['Pwd'];


                    if ($email == 'TechCelio') {
                        if ($pwd == '123soleil') {
                            header('Location:admin.view.dashboard.php');
                        }
                    }
                    else {
                        header("Location:admin.login.php?msg=noUser");
                    }
                    

                })();
                break;

            case 'addTransaction':
                (function () {
                    $CIN                =   $_POST['CIN'];
                    $Nom                =   $_POST['Nom'];
                    $Email              =   $_POST['Email'];
                    $Tel                =   $_POST['Tel'];
                    $NTransaction       =   $_POST['NTransaction'];
                    $NAutorisation      =   $_POST['NAutorisation'];
                    $NCommande          =   $_POST['NCommande'];
                    $NCarte             =   $_POST['NCarte'];
                    $Montant            =   $_POST['Montant'];
                    $DatePaiement       =   $_POST['DatePaiement'];
                    $HeurePaiement      =   $_POST['HeurePaiement'];
                    $Annee              =   $_POST['Annee'];
                    $dateE              =   date('Y-m-d');

                    $transaction = addTransaction ($CIN, $Nom, $Email, $Tel, $NTransaction, $NAutorisation, $NCommande, $NCarte, $Montant, $DatePaiement, $HeurePaiement, $Annee, $dateE);

                    if ($transaction) {
                        header('Location:admin.view.addTransaction.php?msg=addTOk');
                    }
                    else {
                        // header('Location:admin.view.addTransaction.php?msg=addTFail');
                    }

                })();
                break;

            case 'modifTransaction':
                (function () {
                    if (isset($_POST['submit']))
                    {
                        $NCommande      = $_POST['NCommande'];
                        $NAutorisation  = $_POST['NAutorisation'];
                        $NTransaction   = $_POST['NTransaction'];
                    }
                    else 
                    {

                    }
                })();
                break;

            case 'addMedecin':
                (function () {
                    var_dump($_POST);
                })();
                break; 

            case 'activeT':
                (function () {
                    $NCommande = $_POST['numCommande'];
                    $activeT = activeTransaction($NCommande);
                    if ($activeT) {
                        header("Location:admin.view.oneTransaction.php?showTransaction=on&numTransaction=$NCommande&msg=activeSuccess");
                    }
                    else {
                        header("Location:admin.view.oneTransaction.php?showTransaction=on&numTransaction=$NCommande&msg=activeFail");
                    }
                })();
                break;

            default:break;
        }
    }
    else {
        header('Location:form.login.php?msg=403');
    }

