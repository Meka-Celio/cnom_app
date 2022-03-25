<!-- Si la notification existe  -->
<?php if (isset($msg)) { ?>

    <!-- Si CIN non trouvé  -->
    <?php if ($msg == 'login_404') { ?>
        <div class="alert alert-danger alert-banner" role="alert">
			Cette CIN n'existe pas dans la base de données. Si la CIN mentionnée est correcte, <br>
            <b>Merci de passer une réclamation</b> ! 
          <a href="form.reclamation.php" class="btn btn-danger btn-xs">Faire une réclamation</a>
		</div>
        
    <?php } else if ($msg == 'noExistCIN') { ?>
        <div class="alert alert-danger alert-banner" role="alert">
            Nous ne parvenons pas à retrouver cette CIN sur le système. <br>
            <b>Evitez les espaces sur la CIN.</b> <br>
            Vérifiez que votre CIN soit correctement écrite
        </div>

    <?php } else if ($msg == 'user_404') { ?>
        <div class="alert alert-danger alert-banner" role="alert">
            <b>Une erreur a été détecté lors de la connexion merci de contacter le service technique !</b>
        </div>

        <!-- Si le mot de passe est invalide -->
    <?php } else if ($msg == 'password_404') { ?>
        <div class="alert alert-danger alert-banner" role="alert">
            <b>Le mot de passe est invalide ! Merci de renseigner le bon mot de passe !</b> <br>
            Si vous avez oublié votre mot de passe, merci de suivre la section "Mot de passe oublié ?"
        </div>

    <?php } else if ($msg == 404) { ?>
        <div class="alert alert-danger alert-banner" role="alert">
            <b>Les champs ne doivent pas être vide !</b>
        </div> 

    <?php } else if ($msg == 403) { ?>
        <div class="alert alert-danger alert-banner" role="alert">
            <b>Vous avez tenté d'accéder à une page restreinte !</b>
        </div>

    <?php } else if ($msg == "bad_mail") { ?>
        <div class="alert alert-danger alert-banner" role="alert">
            L'adresse mail est <b>invalide !</b>
        </div>

    <?php } else if ($msg == 'null_tel') { ?>
        <div class="alert alert-danger alert-banner" role="alert">
           Le numéro de téléphone ne doit pas être <b> vide!</b>
        </div>

    <?php } else if ($msg == 'loginOn') { ?>
        <div class="alert alert-success alert-banner">
            Vos informations ont bien été enregistrées ! Merci de vous connecter en utilisant <b>votre mot de passe personnalisé!</b>
        </div>

    <?php } else if ($msg == 'payFail') { ?>
        <div class="alert alert-danger alert-banner">
            Votre demande de paiement n'a pu aboutir ! <b>Merci de contactez le support !</b>
        </div>

    <?php } else if ($msg == 'noPay') { ?>
        <div class="alert alert-danger alert-banner">
            <b>Vous devez sélectionner une ligne pour faire une demande de paiement !</b>
        </div>

    <?php } else if ($msg == 'payOk') { ?>
        <div class="alert alert-success alert-banner">
            <b>Votre paiement a bien été effectué !</b>
            <br>Vous recevrez un mail contenant le ticket de paiement.
        </div>

    <?php } else if ($msg == 'setPwdOK') { ?>
        <div class="alert alert-success alert-banner">
            <b>Modification du mot de passe réussi !</b>
        </div>

    <?php } else if ($msg == 'setPwdFail') { ?>
        <div class="alert alert-danger alert-banner">
            <b>Modification du mot de passe échoué !</b>
        </div>

    <?php } else if ($msg == 'noPwd') { ?>
        <div class="alert alert-danger alert-banner">
            <b>Merci de mentionner un mot de passe pour le changement !</b>
        </div>

    <?php } else if ($msg == 'resetPwd') { ?>
        <div class="alert alert-info alert-banner">
            <b>Votre demande a été prise en compte !</b> <br>
            Merci de vérifier votre boite mail !
        </div>

    <?php } else if ($msg == 'changePwdOk') { ?>
        <div class="alert alert-success alert-banner">
            <b>Réinitialisation de mot de passe réussi !</b> <br>
            Merci de vous connectez !
        </div>

    <?php } else if ($msg == 'firstCon') { ?>
        <?php if (isset($mail)) { ?>
            <div class="alert alert-warning alert-banner">
                <b>Vous utilisez le mot de passe par défaut ! </b> <br>
                Merci de changer de mot de passe !
            </div>
        <?php } else { ?>
            <div class="alert alert-danger alert-banner">
                <b>Avant de continuer ! </b> <br>
                Merci de changer de mot de passe !
            </div>
        <?php } ?>

    <?php } else if ($msg == 'toshortPassword') { ?>
        <div class="alert alert-danger alert-banner">
           Mot de passe <b>trop court !</b> <br> 5 caractères au minimum !
        </div>

    <?php } else if ($msg == 'existPassword') { ?>
        <div class="alert alert-danger alert-banner">
           Mot de passe <b>déjà existant !</b>
        </div>

    <?php } else if ($msg == 'query_fail') { ?>
        <div class="alert alert-danger alert-banner">
           <b>Erreur lors de l'execution de la modification</b> <br>
           Merci de contacter le support.
        </div>

    <?php } else if ($msg == 'wrong_mail') { ?>
        <div class="alert alert-danger alert-banner">
           <b>Cet utilisateur est enregistré avec une autre adresse mail</b> <br>
           Merci renseigner le bon E-Mail.
        </div>

    <?php } else if ($msg == 'updatePwd') { ?>
        <div class="alert alert-success alert-banner">
           <b>Vous avez modifié votre mot de passe</b> <br>
           Merci de vous connecter.
        </div>

    <?php } else if ($msg == 'reclam') { ?>
        <div class="alert alert-success alert-banner">
           <b>Votre demande a été prise en compte </b> <br>
           Vous serez informé une fois votre demande traitée.
        </div>

    <?php } else if ($msg == 'addTOk') { ?>
        <div class="alert alert-success alert-banner">
           <b>Transaction Enregistré !</b>
        </div>

    <?php } else if ($msg == 'addTFail') { ?>
        <div class="alert alert-danger alert-banner">
           <b>Transaction Non Enregistré !</b>
        </div>
    
    <?php } else if ($msg == 'addCotOk') { ?>
        <div class="alert alert-success alert-banner">
           <b>Cotisation Enregistré !</b>
        </div>

    <?php } else if ($msg == 'addCotFail') { ?>
        <div class="alert alert-danger alert-banner">
           <b>Cotisation Non Enregistré !</b>
        </div>

    <?php } else if ($msg == 'findCotOk') { ?>
        <div class="alert alert-success alert-banner">
           <b>Cotisation Trouvé !</b>
        </div>

    <?php } else if ($msg == 'findCotFail') { ?>
        <div class="alert alert-danger alert-banner">
           <b>Cotisation Introuvable, peut-être elle n'est pas créée !</b>
        </div>

    <?php } else if ($msg == 'createCotOk') { ?>
        <div class="alert alert-success alert-banner">
           <b>Reçu généré avec succès !</b>
        </div>

    <?php } else if ($msg == 'updateUser') { ?>
        <div class="alert alert-warning alert-banner">
           <b>Vos informations sont bien mise à jour !</b>
        </div>
    <?php } else if ($msg == 'RegisterCIN') { ?>
    <div class="alert alert-danger alert-banner">
           <b>Nouvel enregistrement détecté !</b> <br>
           Merci de remplir le formulaire pour accéder à votre espace de cotisation.
        </div>

    <?php } else if ($msg == 'no_old_year') { ?>
        <div class="alert alert-danger alert-banner">
           <b>Vous devez commencer la régularisation depuis l'année la plus ancienne !</b>
        </div>

    <?php } else if ($msg == 'no_all_years') { ?>
        <div class="alert alert-danger alert-banner">
           <b>Vous ne pouvez régulariser l'année la plus récente sans régulariser les autres !</b> 
        </div>
    <?php } ?>



<?php } ?>