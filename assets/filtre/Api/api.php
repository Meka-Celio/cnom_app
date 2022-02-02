<?php
define("URL", str_replace("index.php","",(isset($_SERVER['HTTPS'])? "https" : "http").
"://".$_SERVER['HTTP_HOST'].$_SERVER["PHP_SELF"]));

function getConnexion(){
    return new PDO("mysql:host=localhost;dbname=api_test;chartset=utf8","root","");
}

function getFormations(){
    $pdo = getConnexion();
    $req = "SELECT f.id, f.libelle, f.description, f.image, c.libelle as 'categorie' FROM  formation
    f inner join categorie c on f.categorie_id = c.id";
    $stm = $pdo->prepare($req);
    $stm->execute();
    $formations = $stm->fetchAll(PDO::FETCH_ASSOC);
    for ($i=0; $i < count($formations) ; $i++) { 
        $formations[$i]['image'] = URL."images/cours/".$formations[$i]['image'];
    }
    $stm->closeCursor();
    sendJSON($formations);
    // print_r($formatiion);

}



function getFormationsCategorie($categorie){
    $pdo = getConnexion();
    $req = "SELECT f.id, f.libelle, f.description, f.image, c.libelle as 'categorie' FROM  formation
    f inner join categorie c on f.categorie_id = c.id  
    where c.libelle = :catergorie";
    $stm = $pdo->prepare($req);
    $stm->bindValue(":catergorie",$categorie,PDO::PARAM_STR);
    $stm->execute();
    $formations = $stm->fetchAll(PDO::FETCH_ASSOC);
    for ($i=0; $i < count($formations) ; $i++) { 
        $formations[$i]['image'] = URL."images/cours/".$formations[$i]['image'];
    }
    $stm->closeCursor();
    sendJSON($formations);

}

function getFormationsCategorieById($id){
    $pdo = getConnexion();
    $req = "SELECT f.id, f.libelle, f.description, f.image, c.libelle as 'categorie' FROM  formation
    f inner join categorie c on f.categorie_id = c.id  
    where f.id = :id";
    $stm = $pdo->prepare($req);
    $stm->bindValue(":id",$id,PDO::PARAM_INT);
    $stm->execute();
    $formation = $stm->fetch(PDO::FETCH_ASSOC);
    $formation['image'] = URL."images/cours/".$formation['image'];
    $stm->closeCursor();
    sendJSON($formation);
}

function sendJSON($info){
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json");
    echo json_encode($info, JSON_UNESCAPED_UNICODE);
}
