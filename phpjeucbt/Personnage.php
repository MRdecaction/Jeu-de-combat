<?php



class Personnage {
  private $_nom;
  private $_force;
  private $_experience;
  private $_degats;
  private $_compteur;
  private $_niveau;

  // Déclarations des constantes en rapport avec la force.
  const FORCE_PETITE = 10;
  const FORCE_MOYENNE = 20;
  const FORCE_GRANDE = 30;






  public function __construct($nom, $force, $degats) // Constructeur demandant 3 paramètres
  {
  // Message s'affichant une fois que tout objet est créé.
  echo '<br/> Voici le constructeur du personnage "'.$nom.'" !'; 

    $this->getNom($nom); // Initialisation du nom du personnage
    $this->setForce($force); // Initialisation de la force.
    $this->getDegats($degats); // Initialisation des dégâts.
    $this->_experience = 1; // Initialisation de l'expérience à 1.

  }

  public function hydrate(array $ligne)
  {
   foreach ($ligne as $key => $value)
   {
     $method = 'set'.ucfirst($key);
        
     if (method_exists($this, $method))
     {
      $this->$method($value);
     }
    }
  }



  // Ceci est la méthode getNom() : elle se charge de renvoyer le contenu de l'attribut $_nom.
  public function getNom()
  {
      return $this->_nom;
  }
  // Ceci est la méthode getNom() : elle se charge de renvoyer le contenu de l'attribut $_id.
  public function getId()
  {
    return $this->_id;
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

  public function getNiveau()
    {
      return $this->_niveau;
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


  public function setForce($force)
    {
    // On vérifie qu'on nous donne bien soit une "FORCE_PETITE", "FORCE_MOYENNE" ,"FORCE_GRANDE"
      if (in_array($force, array(self::FORCE_PETITE, self::FORCE_MOYENNE, self::FORCE_GRANDE))) {
          $this->_force = $force;
      } else {
          trigger_error('La force d\'un personnage doit être ' . self::FORCE_PETITE . ', ' 
              . self::FORCE_MOYENNE . ' ou ' . self::FORCE_GRANDE . '.', E_USER_WARNING);
          return;
      }
  }
  
  public function setDegats($degats)
  {
    $degats = (int) $degats;
      
    if ($degats >= 0 && $degats <= 100)
    {
      $this->_degats = $degats;
    }
  }

  public function setNiveau($niveau)
  {
    $niveau = (int) $niveau;
      
    if ($niveau >= 1 && $niveau <= 100)
    {
      $this->_niveau = $niveau;
    }
  }
    
  public function setExperience($experience)
  {
    $experience = (int) $experience;
      
    if ($experience >= 1 && $experience <= 100)
    {
      $this->_experience = $experience;
    }
  }
  
}


  








?>