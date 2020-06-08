<?php

print('<br/>php Battle game<br/>');

function chargerClasse($classe)
{
  require $classe . '.php';
}

spl_autoload_register('chargerClasse');





$Allan = new Personnage("Allan" ,10,20);
$Jacque = new Personnage("Jacque",20,20);
$perso2 = new Personnage("perso2",20,40);

// Ensuite, on veut que le personnage n°1 frappe le personnage n°2.
$Allan->frapper($perso2);

// Faire gagner de l'expérience au personnage 1
$Allan->gagnerExperience();

// On veut que le personnage n°2 frappe le personnage n°1.
$perso2->frapper($Allan);

// Faire gagner de l'expérience au personnage 2
$perso2->gagnerExperience();


$db = new PDO('mysql:host=localhost;dbname=battlegame', 'root', '');
$manager = new PersonnageManager($db);
$manager->add($perso2);

$perso2 = new Personnage(array('nom' => 'Prim','force' => 30,'degats' => 20,
  
));


?>