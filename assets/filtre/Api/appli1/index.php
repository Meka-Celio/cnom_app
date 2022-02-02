<?php
//   $formations = json_decode(file_get_contents("http://dev.h2prog.com/API_TEST/formations/"));
require_once "../api.php";
    $pdo = getConnexion();
    $sql = 'SELECT * FROM  `home`';

    $query = $pdo->query($sql);

    $homes = $query->fetchAll();
    // sendJSON($fors);
    // print_r($formatiion);


//  $title = $_POST['titre'];
//  $description = $_POST['description'];
//  $image = $_POST['image'];
 ob_start();
 ?>
<div class="container-fluid">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
        <img src="../images/cours/javascript.jpg" class="d-block w-100 h-50" alt="...">
        </div>
        <div class="carousel-item">
        <img src="../images/cours/php.jpg" class="d-block w-100 h-50" alt="...">
        </div>
        <div class="carousel-item">
        <img src="../images/cours/wordpress.png" class="d-block w-100 h-50" alt="...">
        </div>
        <div class="carousel-item">
        <img src="../images/cours/node.png" class="d-block w-100 h-50" alt="...">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
    </div>
</div>
    <h1 class="text-center mt-2 p-2">Nos différents formations </h1>
    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php foreach ($homes as $home):?>
            <div class="col">
                <div class="card shadow">
                <img src="<?= $home['image']?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $home['titre'] ?></h5>
                    <p class="card-text"><?= $home['description'] ?></p>
                </div>
                </div>
            </div>
            <?php endforeach ;?>    
    </div>
        <!-- <div class="row">
       
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img src="<?= $for->image ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $for->categorie ?></h5>
                        <p class="card-text"><?= $for->description ?></p>
                        <a href="formation.php?numero=<?= $for->id ?>" class="btn btn-primary">Go</a>
                    </div>
                     
                </div>
            </div>
       
        </div> -->
    </div>
<?php



$content = ob_get_clean();

require_once ("./template.php");