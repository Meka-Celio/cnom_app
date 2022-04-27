<?php 

    require     '../app.soapClient.php';
    require     '../model.collection.php';


    if (isset($_POST['submit'])) 
    {

        $cin = $_POST['CINMedecin'];
        $email = $_POST['Email'];

        $getInfoMedecin = getInfoMedecin($email);
        echo "Avant <br>";
        var_dump($getInfoMedecin);

        $response = updateMailOnMarit($cin, $email);

        var_dump($response);

        $changement = true;
    }


?>


<form action="#" method="post">
    <input type="text" name="CINMedecin" id="" placeholder="CIN">
    <input type="text" name="Email" id="" placeholder="Email">
    <input type="submit" value="Mise a jour" name="submit">
</form>



<?php if (isset($changement)) { 
    $getInfoMedecin = getInfoMedecin($email);
    echo "Après <br>";
    var_dump($getInfoMedecin);
} ?>

<?php var_dump(getInfoMedecin('ZG7228')); ?>
