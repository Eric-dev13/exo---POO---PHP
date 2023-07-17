<?php
session_start();

require_once 'Moto.php';
require_once 'Vehicule.php';
require_once 'Voiture.php';

// Instancier un véhicule de chaque type.

// Ajouter une méthode accelerer qui prend en paramètre le nombre de km/h de l'accélération.

// Empêcher que l'on puisse depasser la vitesse max

// $moto = new Moto('SP95',280,0,50,20);
// $voiture = new Voiture('SP95',160,0,50,20);


if (!empty($_GET)) {
    // recharger la page
    if (isset($_GET['a']) && $_GET['a'] == 'home') {
        $_SESSION['vehicule'] = '';
        $_SESSION['pompe'] = '';
        header('location:./start.php');
    }

    // Intancier une voiture
    if (isset($_GET['a']) && $_GET['a'] == 'acheter-voiture') {
        $maVoiture = new Voiture('SP95', 315, 0, 100, 10);
        $pompe = new Pompe('SP95', 300);

        $_SESSION['vehicule'] = serialize($maVoiture);
        $_SESSION['pompe'] = serialize($pompe);
    }

    // Intancier une moto
    if (isset($_GET['a']) && $_GET['a'] == 'acheter-moto') {
        $maMoto = new moto('SP95', 220, 0, 20, 9);
        $pompe = new Pompe('SP95', 300);

        $_SESSION['vehicule'] = serialize($maMoto);
        $_SESSION['pompe'] = serialize($pompe);
    }

    // Accélérer
    if (isset($_GET['a']) && $_GET['a'] == 'accelerer' && !empty($_SESSION['vehicule'])) {
        $voiture = unserialize($_SESSION['vehicule']);
        $voiture->accelerer(20);
        $_SESSION['vehicule'] = serialize($voiture);
    }

    // Faire le plein
    if (isset($_GET['a']) && $_GET['a'] == 'faire-le-plein') {
        $voiture = unserialize($_SESSION['vehicule']);
        $pompe = unserialize($_SESSION['pompe']);

        $voiture->fairePlein($pompe);

        $_SESSION['vehicule'] = serialize($voiture);
        $_SESSION['pompe'] = serialize($pompe);

        // header('location:./start.php');
    }
} else {
    $_SESSION['vehicule'] = '';
    $_SESSION['pompe'] = '';
}

$vehicule = unserialize($_SESSION['vehicule']);
$pompe = unserialize($_SESSION['pompe']);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <div class="d-flex justify-content-center border p-1 mt-5">
        <a href="?a=home" class="btn btn-secondary me-3">Effacer</a>
        <a href="?a=acheter-voiture" class="btn btn-success me-3">Acheter une FERRARI F430 V8</a>
        <a href="?a=acheter-moto" class="btn btn-success">Acheter une Ducati Panigale V4 SP</a>
    </div>

    <?php
    if (isset($vehicule) && !empty($vehicule)) {
    ?>
        <div class="container">
            <div class="row mb-3">
                    <div class="col-12 col-lg-6 border">
                        <?php if(get_class($vehicule) == 'Voiture') { ?>
                        <h3 class="text-center text-primary mb-3">FERRARI F430 V8</h3>
                        <div class="text-center">
                            <img src="https://auto.cdn-rivamedia.com/photos/annoncecli/big/ferrari-f430-v8-123175810.jpg" alt="" class="img-thumbnail" width="200">
                        </div>
                        <?php } else { ?>
                            <h3 class="text-center text-primary mb-3">Ducati Panigale V4 SP</h3>
                            <div class="text-center">
                            <img src="http://www.lerepairedesmotards.com/img/actu/2020/nouveaute/sportive-ducati-panigale-v4-sp-statique_hd.jpg" alt="" class="img-thumbnail" width="200">
                        </div>
                        <?php } ?>
                        <div class="text-center">
                            <?= get_class($vehicule); ?>
                            <p class="mt-3">Type carburant: <?= $vehicule->getTypeCarburant() ?></p>
                            <p>Vitesse max: <?= $vehicule->getVitesseMax() ?> km/h</p>
                            <p>Vitesse: <?= $vehicule->getVitesse() ?> km/h</p>
                            <p>Contenance reservoir: <?= $vehicule->getContenanceReservoir() ?> Litres</p>
                            <p>Contenu réservoir: <?= $vehicule->getContenuReservoir() ?> Litres</p>
                        </div>
                    </div>
                <div class="col-12 col-lg-6 border ">
                    <h3 class="text-center text-primary mb-3">STATION SERVICE</h3>
                    <div class="text-center">
                        <img src="https://www.largus.fr/images/images/img4757.jpg" alt="" class="img-thumbnail" width="200">
                    </div>
                    <div class="text-center">
                        <p class="mt-3">Quantité de carburant disponible : <?= $pompe->getContenuCuve() ?> Litres</p>
                    </div>
                </div>
                <div class="row mt-3 p-1">
                    <div class="text-center">
                        <a href="?a=accelerer" class="btn btn-outline-primary">Accelerer de 20km/h</a>
                        <a href="?a=faire-le-plein" class="btn btn-outline-success">Faire le plein</a>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>