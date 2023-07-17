<?php
/*
Créer une classe Pompe ayant pour propriétés:
$typeCarburant (SP95 ou SP98) => gérer la condition.
$contenuCuve =>le nombre de litre restant dans la cuve.
Générer les getters et setters
Créer le constructeur
*/
class Pompe {
    private string $typeCarburant;
    private int $contenuCuve;

    public function __construct(string $typeCarburant, int $contenuCuve) {
        $this->typeCarburant = $typeCarburant;
        $this->contenuCuve = $contenuCuve;
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
     * Get the value of contenuCuve
     */ 
    public function getContenuCuve()
    {
        return $this->contenuCuve;
    }

    /**
     * Set the value of contenuCuve
     *
     * @return  self
     */ 
    public function setContenuCuve($contenuCuve)
    {
        $this->contenuCuve = $contenuCuve;

        return $this;
    }
}