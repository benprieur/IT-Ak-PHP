<?php
abstract class Combattant 
{
    protected $_nom = "";
    protected $_pointsVie = 100;
    protected $_valeurAttaque = 0;
 
    public function __construct($val) {
        $this->setNom($val);
    }

    public function getPointsVie() {
       return $this->_pointsVie;
    }
    
    public function setPointsVie($val) {
       $this->_pointsVie = $val;
    }  
    
    public function getValeurAttaque() {
       return $this->_valeurAttaque;
    }

    public function setValeurAttaque($val) {
       $this->_valeurAttaque = $val;
    }  
    
    public function getNom() {
       return $this->_nom;
    }     

    public function setNom($val) {
       $this->_nom = $val;
    }   
           
    abstract public function definirValeurAttaque() : string;   
}

class Junior extends Combattant {
  public function definirValeurAttaque() : string {
    $this->setValeurAttaque(15);  
    return "La valeur d'attaque de cette instance de Junior a été définie.\n";
  }
}

class Confirme extends Combattant {
    public function definirValeurAttaque() : string {
      $this->setValeurAttaque(30);  
      return "La valeur d'attaque de cette instance de Confirme a été définie.\n";
    }
}

class Veteran extends Combattant {
    public function definirValeurAttaque() : string {
      $this->setValeurAttaque(45);  
      return "La valeur d'attaque de cette instance de Veteran a été définie.\n";
    }
}

class Combat
{
    public static function lancerCombat(Combattant &$c1, Combattant &$c2)  { // Passage par référence
        
        $val = $c1->getPointsVie() - $c2->getValeurAttaque();
        if ($val < 0) $val = 0;
        $c1->setPointsVie($val);
        
        $val = $c2->getPointsVie() - $c1->getValeurAttaque();
        if ($val < 0) $val = 0;
        $c2->setPointsVie($val);
        
        return "Un combat s'est déroulé.\n";
    }
}


$junior1 = new Junior("JuniorJunior");
echo $junior1->definirValeurAttaque();

$veteran1 = new Veteran("VeteranVeteran");
echo $veteran1->definirValeurAttaque();

echo $junior1->getPointsVie() . " " . $veteran1->getPointsVie() . "\n";
echo $junior1->getValeurAttaque() . " " . $veteran1->getValeurAttaque() . "\n";

echo Combat::lancerCombat($junior1, $veteran1);
echo $junior1->getPointsVie() . " " . $veteran1->getPointsVie() . "\n";
