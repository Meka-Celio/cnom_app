<?php if (isset($msg_p)) { ?>
    <?php if ($msg_p == 'oldPassword') { ?>
        <div class="alert alert-danger">
            <b>Merci de changer votre mot de passe !</b> <a href="view.edit.password.php" class="btn btn-warning btn-xs">Changer de mot de passe !</a>
        </div>
    <?php } ?>
<?php } ?>