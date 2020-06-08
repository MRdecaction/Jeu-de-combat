<?php

    class PersonnageManager {
    private $_db;
    

    // mettre en commentaire toute les function pour d'organiser clairement le code . 
  public function __construct($db)
  {
    $this->setDb($db);
  }

  public function add(Personnage $perso)
  {

    // Préparation de la requête d'insertion.
    // Assignation des valeurs pour le nom, la force, les dégâts, l'expérience et le niveau du personnage.
    // Exécution de la requête.
    $request = $this->_db->prepare('INSERT INTO personnages SET nom = :nom, 
      `force` = :force, degats = :degats, niveau = :niveau, experience = :experience;');

      $request->bindValue(':nom', $perso->getNom(), PDO::PARAM_STR);
      $request->bindValue(':force', $perso->getForce(), PDO::PARAM_INT);
      $request->bindValue(':degats', $perso->getDegats(), PDO::PARAM_INT);
      $request->bindValue(':niveau', $perso->getNiveau(), PDO::PARAM_INT);
      $request->bindValue(':experience', $perso->getExperience(), PDO::PARAM_INT);

    $request->execute();
  }

  public function delete(Personnage $perso)
  {
    // Exécute une requête de type DELETE, effacer.
    $this->_db->exec('DELETE FROM personnages WHERE id = '.$perso->id().';');
  }
  public function getOne($id)
  {
    // Exécute une requête de type SELECT avec une clause WHERE, et retourne un objet Personnage.
    $id = (int) $id;

    $request = $this->_db->query('SELECT id, nom, `force`, degats, niveau, experience FROM personnages WHERE id = '.$id.';');
    $ligne = $request->fetch(PDO::FETCH_ASSOC);

    return new Personnage($ligne);
  }

  public function getList()
  {
    // Retourne la liste de tous les personnages.
    $persos = array();

    $request = $this->_db->query('SELECT id, nom, `force`, degats, niveau, experience FROM personnages ORDER BY nom;');

    while ($ligne = $request->fetch(PDO::FETCH_ASSOC))
    {
      $persos[] = new Personnage($ligne);
    }

    return $persos;
  }

  public function update(Personnage $perso)
  {
    // Prépare une requête de type UPDATE.
    // Assignation des valeurs à la requête.
    // Exécution de la requête.
    $request = $this->_db->prepare('UPDATE personnages SET `force` = :force, 
      degats = :degats, niveau = :niveau, experience = :experience WHERE id = :id;');

    $request->bindValue(':force', $perso->getForce(), PDO::PARAM_INT);
    $request->bindValue(':degats', $perso->getDegats(), PDO::PARAM_INT);
    $request->bindValue(':niveau', $perso->getNiveau(), PDO::PARAM_INT);
    $request->bindValue(':experience', $perso->getExperience(), PDO::PARAM_INT);
    $request->bindValue(':id', $perso->getId(), PDO::PARAM_INT);

    $request->execute();
  }

  public function setDb(PDO $db)
  {
    $this->_db = $db;
  }
}













































































?>