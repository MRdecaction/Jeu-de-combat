<?php
namespace App\Controller;


class Personnage {
  private $_nom;
  private $_force;
  private $_experience;
  private $_degats;

  // Déclarations des constantes en rapport avec la force.
  const FORCE_PETITE = 20;
  const FORCE_MOYENNE = 50;
  const FORCE_GRANDE = 80;




public function setForce($force)
  {
    // On vérifie qu'on nous donne bien soit une "FORCE_PETITE", soit une "FORCE_MOYENNE", soit une "FORCE_GRANDE".
    if (in_array($force, array(self::FORCE_PETITE, self::FORCE_MOYENNE, self::FORCE_GRANDE)))
    {
      $this->_force = $force;
    }
  }

  public function __construct($nom, $force, $degats) // Constructeur demandant 3 paramètres
  {
  // Message s'affichant une fois que tout objet est créé.
  echo '<br/> Voici le constructeur du personnage "'.$nom.'" !'; 

    $this->setNom($nom); // Initialisation du nom du personnage
    $this->setForce($force); // Initialisation de la force.
    $this->setDegats($degats); // Initialisation des dégâts.
    $this->_experience = 1; // Initialisation de l'expérience à 1.
  }

  // Ceci est la méthode getNom() : elle se charge de renvoyer le contenu de l'attribut $_nom.
  public function getNom()
  {
      return $this->_nom;
  }


  // Ceci est la méthode getDegats() : elle se charge de renvoyer le contenu de l'attribut $_degats.
  public function getDegats()
  {
    return $this->_degats;
  }
        
  // Ceci est la méthode getForce() : elle se charge de renvoyer le contenu de l'attribut $_force.
  public function getForce()
  {
    return $this->_force;
  }
    
  
  // Ceci est la méthode getExperience() : elle se charge de renvoyer le contenu de l'attribut $_experience.
  public function getExperience()
  {
    return $this->_experience;
  }

  public function frapper($persoAFrapper)
  {
      $persoAFrapper->_degats += $this->_force;
      print('<br/> '. $persoAFrapper->getNom() . ' a été frappé par ' 
        . $this->getNom() . ' -> Dégats de '.$persoAFrapper->getNom().' = ' . $persoAFrapper->_degats);
  }
 

  public function gagnerExperience()
    {
        // On ajoute 1 à notre attribut $_experience.
        $this->_experience = $this->_experience + 1;
        print('<br/> '.$this->getNom().' a ' . $this->_experience . ' points d\'expérience.');
    }
  
    // Notez que le mot-clé static peut aussi être placé avant la visibilité de la méthode.
  public static function parler()
  {
    print('Je suis le 3ème personnage');
  }


  
}







?>