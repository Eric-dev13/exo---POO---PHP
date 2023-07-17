<?php
require_once 'Moto.php';
require_once 'Vehicule.php';
require_once 'Voiture.php';
require_once 'Pompe.php';

// Instancier un véhicule de chaque type.

// Ajouter une méthode accelerer qui prend en paramètre le nombre de km/h de l'accélération.

// Empêcher que l'on puisse depasser la vitesse max

$moto = new Moto('SP95', 280, 0, 50, 20);
$voiture = new Voiture('SP95', 315, 0, 100, 10);


echo '<br> Type carburant: '.$voiture->getTypeCarburant();
echo '<br>Vitesse max: '.$voiture->getVitesseMax();
echo '<br>Vitesse: '.$voiture->getVitesse();
echo '<br>Contenance reservoir: '.$voiture->getContenanceReservoir();
echo '<br> Contenu réservoir: '.$voiture->getContenuReservoir();

echo '<hr><br>Accélération de 70km/h';
$voiture->accelerer(70);

// Accelerer
echo '<hr><br>Nouvelle Vitesse: '.$voiture->getVitesse().' km/h';


$pompe =new Pompe('SP95', 300);
echo '<hr><br>Quantité de carburant à la pompe  : '.$pompe->getContenuCuve().' Litres';

// Faire le plein
$voiture->fairePlein($pompe);
echo '<hr><br>Passer à la pompe et faire le plein : ';
echo '<br>Quantité restante dans la cuve : '.$pompe->getContenuCuve().' Litres';

?>

