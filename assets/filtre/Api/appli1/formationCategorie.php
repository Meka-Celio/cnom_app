<?php
 
 $formations = json_decode(file_get_contents("http://dev.h2prog.com/API_TEST/formations/".$_GET['categorie']));
 ob_start();
?>
    <h1 class="text-center">Les formations de la catégorie <?=$_GET['categorie']; ?></h1>
    <table class="table  table-bordered table-sm table-hover" >
       <thead >  
       <tr class="table-warning fw-bold">
            <td>Id</td>
            <td>Nom</td>
            <td>Description</td>
            <td>Image</td>
            <td>Catégories</td>
        </tr>
       </thead>

        <?php  foreach($formations as $formation): ?>
        <tr>
            <td><?= $formation->id ?></td>
            <td><?= $formation->libelle ?></td>
            <td><?= $formation->description ?></td>
            <td><img src="<?= $formation->image ?>" width="100px"></td>
            <td><?= $formation->categorie ?></td>
        </tr>
        <?php endforeach ; ?>
    </table>
<?php


$content = ob_get_clean();

require_once ("./template.php");