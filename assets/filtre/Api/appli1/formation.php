<?php
 
 $formation = json_decode(file_get_contents("http://dev.h2prog.com/API_TEST/formation/".$_GET['numero']));
 ob_start();
?>
    <div class="container">
        <div class="row row-cols-1 row-cols-md-2 sm">
        <div class="col">
            <div class="card">
            <h1 class="text-center">Formation: <?=$formation->libelle ?> - <?=$formation->categorie ?></h1> 
            <img src="<?=$formation->image ?>" class=" w-400" alt="" srcset="">
            </div>
        </div>
        <div class="col">
        <?=$formation->description ?>
        </div>
        </div>
    </div>
    
<?php


$content = ob_get_clean();

require_once ("./template.php");