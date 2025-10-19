
<?php
include_once "BaseDAO.php";
include_once "Developpeur.php";

class BaseDeveloppeurDAO extends BaseDAO
{
    public function setConnexionSelonRole(string $role)
    {
        $this->setConnexionBase($_ENV['local_dsn'], $_ENV[$role], $_ENV['pwd' . $role], $_ENV['options']);
    }
  
  
    // Récupérer tous les développeurs
    public function getLesDeveloppeurs(): array
    {
        $this->setConnexionSelonRole("DevRead");
        $sql = "SELECT * FROM Developpeur;";
        $result = $this->query($sql);
        $tab = $result->fetchAll();
        $devs = [];
        foreach ($tab as $ligne) {
            $devs[] = new Developpeur($ligne['id'], $ligne['nom'], $ligne['prenom']);
        }
        return $devs;
    }

 
 
    // Ajouter un développeur
    public function ajouterDeveloppeur($nom, $prenom)
    {
        $this->setConnexionSelonRole("DevAjout");
        $sql = "INSERT INTO Developpeur (nom, prenom) VALUES ('$nom', '$prenom');";
        return $this->query($sql);
    }

 
 
 //supprimer un développeur
       public function supprimerDeveloppeur(int $id): String{
    
        $this->setConnexionSelonRole("DevSuppr");
        $requeteAExecuter = "DELETE FROM Developpeur WHERE id = ".$id.";";
        $resultatDeLaRequete = $this->exec($requeteAExecuter);
        if ($resultatDeLaRequete){
            return "supprimer";
        }
        else {
            return "Erreur lors de la suppression du développeur.";
        }
    }
  
            // modifier un développeur
    public function modifierDeveloppeur(int $id, string $nom, string $prenom): bool
    {
        $this->setConnexionSelonRole("DevModif");
        $sql = "UPDATE Developpeur SET nom = '$nom', prenom = '$prenom' WHERE id = ".$id.";";
        $result = $this->exec($sql);
        return $result !== false;
}
    // Récupérer tous le développeur
    public function getLeDeveloppeur($id): Developpeur
    {
        $this->setConnexionSelonRole("DevRead");
        $sql = "SELECT * FROM Developpeur WHERE id = $id;";
        $result = $this->query($sql);
        $ligne = $result->fetch();
        $dev = new Developpeur($ligne['id'], $ligne['nom'], $ligne['prenom']);
        
        return $dev;
    }
    public function rechercherDeveloppeurs(string $texte): array
    {
        $this->setConnexionSelonRole("DevRead");

        $requeteAExecuter = "SELECT * FROM Developpeur 
                             WHERE nom LIKE :texte OR prenom LIKE :texte;";

        $requete = $this->db->prepare($requeteAExecuter);

        $requete->execute([':texte' => '%' . $texte . '%']);

        $tab = $requete->fetchAll();

        $devs = [];
        foreach ($tab as $ligne) {
            $devs[] = new Developpeur($ligne['id'], $ligne['nom'], $ligne['prenom']);
        }

        return $devs;
    }

}