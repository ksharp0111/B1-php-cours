<?php

class Medicament {
    // champs de classes    
    public $nom;
    public $dosage;
    public $forme;
    public $fabriquant;
    public $expiration;

    // consturcteur de mla classes
    public function __construct($nom, $dosage, $forme, $fabriquant, $expiration) 
    {
        $this->nom = $nom;
        $this->dosage = $dosage;
        $this->forme = $forme;
        $this->fabriquant = $fabriquant;
        $this->expiration = $expiration;
    }
}
$medicament = [
    $med1 = new Medicament("test1", "test", "test", "test", "2024-01-01"),
    $med2 = new Medicament("test2", "test", "test", "test", "2024-01-01"),
    $med3 = new Medicament("test3", "test", "test", "test", "2024-01-01"),
    $med4 = new Medicament("test4", "test", "test", "test", "2024-01-01"),
];

foreach ($medicaments as $medicament) {
    echo "Nom " . $medicaments->nom . "<br>";
    echo "Dosage " . $medicaments->dosage . "<br>";
    echo "Forme " . $medicaments->forme . "<br>";
    echo "Fabricant " . $medicaments->fabriquant . "<br>";
    echo "Expiration " . $medicaments->expiration . "<br>";
}
?>