<?php 

require_once 'Vehicule.php';

class Moto extends Vehicule 
{

    public function nombreRoue():int {
        return 2;
    }
}