<?php
require_once 'Pompe.php';

/*
    Une classe abstraite est une classe qui ne peut pas être instanciée directement et qui est destinée à être étendue.
    Elle sert de modèle pour d'autres classes, fournissant des méthodes et des propriétés communes que les sous-classes peuvent hériter et implémenter. Le mot-clé "abstract" est utilisé pour définir une classe abstraite.
*/
abstract class Vehicule
{

    // Le type de carburant (SP95 ou SP98)
    private string $typeCarburant;

    // La vitesse maximale du véhicule
    private int $vitesseMax;

    // Une vitesse (zéro par défaut)
    private int $vitesse = 0;

    // La taille du réservoir
    private int $contenanceReservoir;

    // Combien de litre de carburant il contient
    private int $contenuReservoir;

    // Le nombre de roues (lié au type de véhicule, toujours le même pour le même type=> revoir les méthodes abstraites)

    public function __construct(string $typeCarburant, $vitesseMax, int $vitesse, int $contenanceReservoir, int $contenuReservoir)
    {
        $this
            ->setTypeCarburant($typeCarburant)
            ->setVitesseMax($vitesseMax)
            ->setContenanceReservoir($contenanceReservoir)
            ->setContenuReservoir($contenuReservoir);
    }

    abstract public function nombreRoue(): int;

    // Ajouter une méthode accelerer qui prend en paramètre le nombre de km/h de l'accélération.
    public function accelerer($acceleration)
    {
        if ($this->vitesse + $acceleration <= $this->vitesseMax) {
            $this->vitesse += $acceleration;
        } else {
            $this->vitesse = $this->vitesseMax;
        }
        return $this;
    }

    // cette méthode attend en argument un objet instance de la classe pompe afin qu'un vehicule puisse faire son plein sur cette pompe.
    public function fairePlein(Pompe $pompe)
    {
        // calcule le nombre de litre manquant pour a voir le plein
        $complementCarburant = $this->contenanceReservoir - $this->contenuReservoir;

        // verifie si le carburant de la pompe et compatible avec celui du véhicule
        if ($pompe->getTypeCarburant() == $this->getTypeCarburant()) {
            // Si il reste assez de carburant dans la cuve on fait le plein
            if ($pompe->getContenuCuve() >= $complementCarburant) {
                // Nouveau contenu reservoir véhicule
                $this->contenuReservoir = $this->contenanceReservoir;
                // Mise a jour le contenu de la cuve pour la pompe
                $newContenuCuve = $pompe->getContenuCuve() - $complementCarburant;
                $pompe->setContenuCuve($newContenuCuve) ;
            } else {
                // Nouveau contenu reservoir véhicule
                $this->contenuReservoir = $this->contenuReservoir + $pompe->getContenuCuve();
                // Mise a jour le contenu de la cuve, la cuve est vide
                $pompe->setContenuCuve(0);
            }
        } else {
            trigger_error('Ce carburant n\'est pas recommandé pour votre véhicule', E_USER_NOTICE);
            return $this;
        }
    }


    /**
     * Get the value of typeCarburant
     */
    public function getTypeCarburant()
    {
        return $this->typeCarburant;
    }

    /**
     * Set the value of typeCarburant
     *
     * @return  self
     */
    public function setTypeCarburant($typeCarburant)
    {
        $choice = ['SP95', 'SP98'];
        if (in_array($typeCarburant, $choice)) {
            $this->typeCarburant = $typeCarburant;
            return $this;
        } else {
            trigger_error('Vous avez deux choix possible: SP95 ou SP98', E_USER_NOTICE);
            return $this;
        }
    }

    /**
     * Get the value of contenanceReservoir
     */
    public function getContenanceReservoir()
    {
        return $this->contenanceReservoir;
    }

    /**
     * Set the value of contenanceReservoir
     *
     * @return  self
     */
    public function setContenanceReservoir($contenanceReservoir)
    {
        $this->contenanceReservoir = $contenanceReservoir;

        return $this;
    }

    /**
     * Get the value of contenuReservoir
     */
    public function getContenuReservoir()
    {
        return $this->contenuReservoir;
    }

    /**
     * Set the value of contenuReservoir
     *
     * @return  self
     */
    public function setContenuReservoir($contenuReservoir)
    {
        $this->contenuReservoir = $contenuReservoir;

        return $this;
    }

    /**
     * Get the value of vitesseMax
     */
    public function getVitesseMax()
    {
        return $this->vitesseMax;
    }

    /**
     * Set the value of vitesseMax
     *
     * @return  self
     */
    public function setVitesseMax($vitesseMax)
    {
        $this->vitesseMax = $vitesseMax;

        return $this;
    }

    /**
     * Get the value of vitesse
     */
    public function getVitesse()
    {
        return $this->vitesse;
    }

    /**
     * Set the value of vitesse
     *
     * @return  self
     */
    public function setVitesse($vitesse)
    {
        $this->vitesse = $vitesse;

        return $this;
    }
}
