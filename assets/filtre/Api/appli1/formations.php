<?php
 $formations = json_decode(file_get_contents("http://dev.h2prog.com/API_TEST/formations"));
 ob_start();
?>
    <div class="container">
        <h1 class="text-center">Mon tableau de formations</h1>
    <table class="table  table-bordered" >
        <tr class="table-warning fw-bold">
            <td>Id</td>
            <td>Nom</td>
            <td>Description</td>
            <td>Image</td>
            <td>Catégories</td>
        </tr>

        <?php  foreach($formations as $formation): ?>
        <tr>
            <td><?= $formation->id ?></td>
            <td><a href="formation.php?numero=<?= $formation->id ?>"><?= $formation->libelle ?></a> </td>
            <td><?= $formation->description ?></td>
            <td><img src="<?= $formation->image ?>" width="100px"></td>
            <td><?= $formation->categorie ?></td>
        </tr>
        <?php endforeach ; ?>
    </table>
    </div>

<?php


$content = ob_get_clean();

require_once ("./template.php");