<?php
require_once("./api.php");
//www.website.fr/formations => website.fr/index.php?demande=formation
//www.website.fr/formations/:catégorie (PHP JAVASCRIPT)
//www.website.fr/formation/:id(6,7)
try {

    if(!empty($_GET['demande'])){
        $url = explode("/",filter_var($_GET['demande'], FILTER_SANITIZE_URL));
        
        switch ($url[0]) {
            case 'formations':
                if (empty($url[1])) {
                    getFormations();
                }else {
                    getFormationsCategorie($url[1]);
                }
                break;

            case 'formation':
                if (empty($url[1])) {
                    getFormationsCategorieById($url[1]);
                }
                else {
                    throw new Exception("Vous n'avez pas re"); 
                }
                break;
            
            case 'home':
                if (empty($url[1])) {
                    getHome($url[1]);
                } else {
                    throw new Exception("Vous n'avez pas re"); 
                }
                break;
            
            default:
            throw new Exception("la demande n'est pas valide verifier l'url"); 
                break;
        }
    }
    else{
        throw new Exception("Donner introuvable");   
    }

} catch (Exception $e) {
   $error =[
    "message" => $e->getMessage(),
    "code" => $e->getCode()
   ];
   print_r($error);
}

