<?php
namespace App\Controller;

print('<br/>php Battle game<br/>');

function chargerClasse($classe)
{
  require $classe . '.php';
}

spl_autoload_register('personnage.php');



// On définit une "FORCE_MOYENNE" à la création de ce personnage.
$perso1 = new Personnage(Personnage::FORCE_MOYENNE);
$perso2 = new Personnage(Personnage::FORCE_GRANDE);

// Ensuite, on veut que le personnage n°1 frappe le personnage n°2.
$perso1->frapper($perso2);

// Faire gagner de l'expérience au personnage 1
$perso1->gagnerExperience();

// On veut que le personnage n°2 frappe le personnage n°1.
$perso2->frapper($perso1);

// Faire gagner de l'expérience au personnage 2
$perso2->gagnerExperience();

?>