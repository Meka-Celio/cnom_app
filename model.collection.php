<?php
// IMPORTATION DES FICHIERS DE CONFIG
    require 'app.config.php';

    /*********************************************************
     * FONCTION DE CONNEXION A LA BASE DE DONNEES
    ********************************************************** */

    function databaseConnexion() {
        try {
            $options=array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES 'utf8'");
            $con = new PDO(DSN,USER,PASSWORD,$options);
		    return $con;
        } catch (PDOException $e) {
            echo "Echec de connexion à la base de données ! ".$e->getMessage();
        }
    }

    /*********************************************************
     * FONCTIONS SUR LES REGIONS
    ********************************************************** */

    function getAllRegion () {
        try {
            $con = databaseConnexion();
            $sql = "SELECT * FROM regions";
            $rq=$con->query($sql);
            $datas = $rq->fetchAll();
            $rq->closeCursor();
            return $datas;
        }
        catch (PDOException $e) {
            echo "Erreur lors de l'execution de la requête : ".$e->getMessage();
        }
    }

    function getProvinceByRegion ($id_region) {
        try {
            $con =  databaseConnexion();
            $sql =  "SELECT * FROM provinces WHERE IdRegion = $id_region";
            $rq  =  $con->query($sql);
            $datas = $rq->fetchAll();
            $rq->closeCursor();
            return $datas;
        }
        catch (PDOException $e) {
            echo "Erreur lors de l'execution de la requete : ".$e->getMessage();
        }
    }

    function getProvinceByID ($id_province) {
        try {
            $con =  databaseConnexion();
            $sql =  "SELECT * FROM provinces WHERE ID_Province = $id_province";
            $rq  =  $con->query($sql);
            $data = $rq->fetch();
            $rq->closeCursor();
            return $data;
        }
        catch (PDOException $e) {
            echo "Erreur lors de l'execution de la requete : ".$e->getMessage();
        }
    }


    function getProvinceByNameRegion ($nom_region) {
        try {
            $con =  databaseConnexion();
            $sql =  "SELECT * FROM provinces WHERE NomRegion LIKE '%$nom_region%'";
            $rq=$con->query($sql);
            if ($rq) {
                $data = $rq->fetch();
                $rq->closeCursor();
                return $data;
            }
            else {
                return 0;
            }
        }
        catch (PDOException $e) {
            echo "Erreur lors de l'execution de la requete : ".$e->getMessage();
        }
    }


    function getOneRegion ($nom_region) {
        try {
            $con =  databaseConnexion();
            $sql =  "SELECT * FROM regions WHERE Nom_Region LIKE '%$nom_region%'";
            $rq=$con->query($sql);
            if ($rq) {
                $data = $rq->fetch();
                $rq->closeCursor();
                return $data;
            }
            else {
                return 0;
            }
        }
        catch (PDOException $e) {
            echo "Erreur lors de l'execution de la requete : ".$e->getMessage();
        }
    }

    function getRegionByID ($id_region) {
        try {
            $con =  databaseConnexion();
            $sql =  "SELECT * FROM regions WHERE ID_Region = '$id_region'";
            $rq=$con->query($sql);
            if ($rq) {
                $data = $rq->fetch();
                $rq->closeCursor();
                return $data;
            }
            else {
                return 0;
            }
        }
        catch (PDOException $e) {
            echo "Erreur lors de l'execution de la requete : ".$e->getMessage();
        }
    }

    /*********************************************************
     * FONCTIONS SUR LES USERS
    ********************************************************** */

    function getCIN ($CIN) {
        try {
            $con = databaseConnexion();
            $sql = "SELECT CINMedecin FROM medecin where CINMedecin = '$CIN'";
            $rq=$con->query($sql);
            if ($rq) {
                $data = $rq->fetch();
                $rq->closeCursor();
                return $data;
            }
            else {
                return 0;
            }
        }
        catch (PDOException $e) {
            echo "Erreur lors de l'execution de la requête : ".$e->getMessage();
        }
    }

    function getPwd ($CINMedecin) {
        try {
                $con = databaseConnexion();
                $sql = "SELECT Pwd FROM medecin where CINMedecin = '$CINMedecin'";
                $rq=$con->query($sql);
                if ($rq) {
                    $data = $rq->fetch();
                    $rq->closeCursor();
                    return $data;
                }
                else {
                    return 0;
                }
        }
        catch (PDOException $e) {
            echo "Erreur lors de l'execution de la requête : ".$e->getMessage();
        }
    }

    function getUser ($CINMedecin, $Pwd) {
        try {
            $con = databaseConnexion();
            //$sql = "SELECT * FROM medecin where CINMedecin = '$CINMedecin' AND Pwd = '$Pwd'";
            $sql = "SELECT * from medecin WHERE CINMedecin = '$CINMedecin' AND medecin.Pwd = '$Pwd'";
            $rq=$con->query($sql);
            $data = $rq->fetch();
            $rq->closeCursor();
            return $data;
        }
        catch (PDOException $e) {
            echo "Erreur lors de l'execution de la requête : ".$e->getMessage();
        }
    }

    function getUserByCIN ($CINMedecin) {
        try {
            $con = databaseConnexion();
            $sql = "SELECT * from medecin WHERE CINMedecin = '$CINMedecin'";
            $rq=$con->query($sql);
            $data = $rq->fetch();
            $rq->closeCursor();
            return $data;
        }
        catch (PDOException $e) {
            echo "Erreur lors de l'execution de la requête : ".$e->getMessage();
        }
    }

    function updateFirstConnexion ($CINMedecin, $email, $tel) {
        try {
            $con = databaseConnexion();
            $sql = "UPDATE medecin SET Email='$email', Telephone='$tel' WHERE CINMedecin='$CINMedecin'";
            if ($res = $con->query($sql)) {
                $action = 1;
            } else {
                $action = 0;
            }
            return $action;

        } catch (PDOException $e) {
            echo "Erreur lors de l'execution de la requête : ".$e->getMessage();
        }
    }

    function updatePassword ($CINMedecin, $pwd) {
        try {
            $con = databaseConnexion();
            $sql = "UPDATE medecin SET Pwd='$pwd' WHERE CINMedecin='$CINMedecin'";
            if ($res = $con->query($sql)) {
                $action = 1;
            } else {
                $action = 0;
            }
            return $action;
        }
        catch(PDOException $e) {
            echo "Erreur lors de l'execution de la requête : ".$e->getMessage();
        }
    }

    function updateEmail ($CINMedecin, $email) {
        try {
            $con = databaseConnexion();
            $sql = "UPDATE medecin SET Email='$email' WHERE CINMedecin='$CINMedecin'";
            if ($res = $con->query($sql)) {
                $action = 1;
            } else {
                $action = 0;
            }
            return $action;
        }
        catch(PDOException $e) {
            echo "Erreur lors de l'execution de la requête : ".$e->getMessage();
        }
    }

    function updateDateModification ($CINMedecin) {
        try {
            $con = databaseConnexion();
            $sql = "UPDATE medecin SET Date_Modification = NOW() WHERE CINMedecin='$CINMedecin'";
            if ($res = $con->query($sql)) {
                $action = 1;
            } else {
                $action = 0;
            }
            return $action;
        }
        catch(PDOException $e) {
            echo "Erreur lors de l'execution de la requête : ".$e->getMessage();
        }
    }

    function getAllTurple () 
    {
        try {
            $con = databaseConnexion();
            $sql = "SELECT COUNT(*) AS nbr_doublon, CINMedecin, Nom_Medecin, NomRegion, NomProvince FROM medecin GROUP BY CINMedecin HAVING COUNT(*) > 1";
            $rq=$con->query($sql);
            $datas = $rq->fetchAll();
            $rq->closeCursor();
            return $datas;
        }
        catch (PDOException $e) {
            echo "Erreur lors de l'execution de la requete";
        }
    }

    function getTurple ($CINMedecin) {
        try {
            $con = databaseConnexion();
            $sql = "SELECT * from medecin where CINMedecin = '$CINMedecin'";
            $rq=$con->query($sql);
            $datas = $rq->fetchAll();
            $rq->closeCursor();
            return $datas;
        }
        catch (PDOException $e) {
            echo "Erreur lors de l'execution de la requete !";
        }
    }

    function searchTurple ($CINMedecin) 
    {
        try {
            $con = databaseConnexion($CINMedecin);
            $sql = "SELECT COUNT(*) AS nbr_doublon, CINMedecin, Nom_Medecin, NomRegion, NomProvince FROM medecin WHERE CINMedecin = '$CINMedecin' GROUP BY CINMedecin HAVING COUNT(*) > 1";
            $rq = $con->query($sql);
            if ($rq->fetch())
            {
                $action = 1;
            }
            else
            {
                $action = 0;
            }
            return $action;
        }
        catch (PDOException $e) {
            echo "Erreur lors de l'execution de la requete";
        }
    }

    /*---------------------------------------------
    PARTIE ADMIN
    ----------------------------------------------*/

    function addAdmin ($username, $email)
    {
        try 
        {
            $con = databaseConnexion();
            $sql = "INSERT INTO administrateur VALUES (0, '$username', '$email')";
            // Si success
            if ($res = $con->query($sql))
            {
                $action = 1;
            }
            // else
            else
            {
                $action = 0;
            }

            return $action;
        }
        catch (PDOException $e)
        {
            echo "Erreur dans l\'ajout dans la table".$e->getMessage();
        }
    }

    function addMedecin ($CINMedecin, $Nom_Medecin, $Email, $Pwd, $Telephone, $NomProvince, $NomRegion, $Date_Inscription, $Date_Modification) {
        try {
            $con = databaseConnexion();
            $sql = "INSERT INTO medecin VALUES (
            0, '$CINMedecin', '$Nom_Medecin', '$Email', '$Pwd', '$Telephone', '0', '$NomProvince', '0', '$NomRegion', '$Date_Inscription', '$Date_Modification' 
            )";
            // Si success
            if ($res = $con->query($sql)) {
                $action = 1;
            }
            // Sinon
            else {
                $action = 0;
            }
            return $action;
        }
        catch (PDOException $e) {
            echo "Erreur dans l\'ajout dans la table".$e->getMessage();
        }
    }

    function updateMedecin ($CINMedecin, $Email, $Telephone, $NomProvince, $NomRegion, $Date_Modification) {
        try {
            $con = databaseConnexion();
            $sql = "UPDATE medecin SET 
            Email = '$Email', 
            Telephone = '$Telephone', 
            NomProvince = '$NomProvince', 
            NomRegion = '$NomRegion', 
            Date_Modification = '$Date_Modification'
            WHERE CINMedecin = '$CINMedecin'";
            // Si success
            if ($res = $con->query($sql)) {
                $action = 1;
            } 
            else {
                $action = 0;
            }
            return $action;
        }
        catch (PDOException $e) {
            echo "Erreur lors de l'execution de la fonction ".$e->getMessage();
        }
    }

    function addTransaction ($CINMedecin, $Nom, $Email, $Tel, $NTransaction, $NAutorisation, $NCommande, $NCarte, $Montant, $DatePaiement, $HeurePaiement, $Annee, $dateE) {
		try{
			$con = databaseConnexion();
            $sql = "INSERT INTO paiements VALUES ('0','$CINMedecin', '$Nom', '$Email', '$Tel', '$NTransaction', '$NAutorisation', '$NCommande', '$NCarte', $Montant, '$DatePaiement', '$HeurePaiement', '$Annee','$dateE', '0')";
			// Si la requete fonctionne
            if ($res = $con->query($sql)) {
                $action = 1;
            }
            // Sinon
            else{
                $action = 0;
            }
            return $action;
		}
		catch(PDOException $e){
			echo "Erreur d'ajout dans la table <br>".$e->getMessage();
		}
    }

    function getTransaction ($NCommande) {
        try {
            $con = databaseConnexion();
            $sql = "SELECT * FROM paiements WHERE NCommande = '$NCommande'";
            $rq=$con->query($sql);
            $data = $rq->fetch();
            $rq->closeCursor();
            return $data;
        }
        catch(PDOException $e){
            echo "Erreur de recuperation".$e->getMessage();
        }
    }

    function updateTransaction ($NCommande, $NTransaction, $NAutorisation) {
        try 
        {
            $con = databaseConnexion();
            $sql = "UPDATE paiements SET 
            NTransaction = '$NTransaction', 
            NAutorisation = '$NAutorisation'
            WHERE NCommande = '$NCommande'";
            // Si success
            if ($res = $con->query($sql)) {
                $action = 1;
            } 
            else {
                $action = 0;
            }
            return $action;
        }
        catch (PDOException $e) 
        {
            echo "La requete a échouée ! ".$e->getMessage();
        }
    }

    function getAllTransactionByCIN ($CIN) {
        try {
            $con = databaseConnexion();
            $sql = "SELECT * FROM paiements WHERE CIN = '$CIN'";
            $rq=$con->query($sql);
            $datas = $rq->fetchAll();
            $rq->closeCursor();
            return $datas;
        }
        catch(PDOException $e){
            echo "Erreur de recuperation".$e->getMessage();
        }
    }

    function getAllTransaction () {
        try {
            $con = databaseConnexion();
            $sql = "SELECT * FROM paiements";
            $rq=$con->query($sql);
            $datas = $rq->fetchAll();
            $rq->closeCursor();
            return $datas;
        }
        catch(PDOException $e){
            echo "Erreur de recuperation".$e->getMessage();
        }
    }

    function getAllUser () {
        try {
            $con = databaseConnexion();
            $sql = "SELECT * FROM medecin INNER JOIN users ON medecin.CINMedecin = users.CIN";
            $rq=$con->query($sql);
            $datas = $rq->fetchAll();
            $rq->closeCursor();
            return $datas;
        }
        catch (PDOException $e) {
            echo "Erreur lors de l'execution de la requête : ".$e->getMessage();
        }
    }

    function getNbrUser () {
        try {
            $con = databaseConnexion();
            $sql = "SELECT COUNT(CINMedecin) FROM medecin";
            $rq=$con->query($sql);
            $datas = $rq->fetch();
            $rq->closeCursor();
            return $data;
        }
        catch (PDOException $e) {
            echo "Erreur lors de l'execution de la requête : ".$e->getMessage();
        }
    }

    function getAllUserLimit () {
        try {
            $con = databaseConnexion();
            $sql = "SELECT * FROM medecin INNER JOIN users ON medecin.CINMedecin = users.CIN LIMIT 25";
            $rq=$con->query($sql);
            $datas = $rq->fetchAll();
            $rq->closeCursor();
            return $datas;
        }
        catch (PDOException $e) {
            echo "Erreur lors de l'execution de la requête : ".$e->getMessage();
        }
    }

    function getAdmin ($email, $pwd) {
        try {
            $con = databaseConnexion();
            $sql = "SELECT * from admin where email = '$email' AND pwd = '$pwd'";
            $rq=$con->query($sql);
            $data = $rq->fetch();
            $rq->closeCursor();
            return $data;
        }
        catch (PDOException $e) {
            echo "Erreur lors de l'execution de la requête : ".$e->getMessage();
        }
    }


    function activeTransaction ($NCommande) {
        try 
        {
            $con = databaseConnexion();
            $sql = "UPDATE paiements SET 
            Validation = 1
            WHERE NCommande = '$NCommande'";
            // Si success
            if ($res = $con->query($sql)) {
                $action = 1;
            } 
            else {
                $action = 0;
            }
            return $action;
        }
        catch (PDOException $e) 
        {
            echo "La requete a échouée, la transaction n'est pas activée ! ".$e->getMessage();
        }
    }
