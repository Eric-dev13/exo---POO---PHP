
Créer une classe abstraite Vehicule
qui va contenir des proprietes pour retourner :
- typeCarburant : le type de carburant (SP95 ou SP98)
- vitesseMax : la vitesse maximale du véhicule
- une vitesse (zéro par défaut)
- contenanceReservoir : la taille du réservoir
- contenuReservoir : combien de litre de carburant il contient
- le nombre de roues (lié au type de véhicule, toujours le même pour le même type=> revoir les méthodes abstraites)

Ajouter un construteur (__construct).

Créer 2 classes qui en héritent : Moto et Voiture

Instancier un véhicule de chaque type.

Ajouter une méthode accelerer qui prend en paramètre le nombre de km/h de l'accélération.

Empêcher que l'on puisse dépasser la vitesse max

*********************************************************************

Créer une classe Pompe ayant pour propriétés:
$typeCarburant (SP95 ou SP98) => gérer la condition.
$contenuCuve =>le nombre de litre restant dans la cuve.
Générer les getters et setters
Créer le constructeur

Dans la classe Vehicule créer une méthode fairePlein()
cette méthode attend en argument un objet instance de la classe pompe afin qu'un vehicule puisse faire son plein sur cette pompe.

Effectuer tout les contrôles.
1- vérifier que les types de carburants correspondent entre pompe et vehicule.
2- vérifier les besoins en carburant du vehicule (différence entre contrenance reservoir et contenu reservoir)
2- Vérifier que la cuve ai suffisemment de carburant pour faire le plein du vehicule (si oui retirer les besoins en carburant au contenu de la cuve et réaffecter la valeur du contenu du réservoir) sinon vider la cuve  et mettre le restant de la cuve au contenu du reservoir 

