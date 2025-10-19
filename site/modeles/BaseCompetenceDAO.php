<?php
// lien vers la classe mère
include_once "BaseDAO.php";
include_once "Competence.php";

/**
 * Modifications :
 * - création d'une classe spécifique pour chaque table de la base de données
 * - modification du constructeur : instruction de connexion enlevée
 * - réalisation de la connexion en décalé afin de pouvoir
 *   définir un accès spécifique selon le type d'opération à réaliser
 */

class BaseCompetenceDAO extends BaseDAO
{
    public function __construct()
    {
        parent::__construct(); // par défaut la connexion n'est pas établie.
    }

    /**
     * Méthode permettant de définir la connexion
     * à la base de données
     * avec les habilitations les plus adéquates (droits restreints)
     * selon l'action à réaliser
     */
    private function setConnexionSelonRole(string $role)
    {
        $this->setConnexionBase($_ENV['local_dsn'], $_ENV[$role], $_ENV['pwd' . $role], $_ENV['options']);
    }

    // Nouvelle méthode créée à l'intérieur du modèle
    // pour rendre l'application plus modulaire

    /**
     * Fonction qui permet de récupérer les informations relatives aux développeurs
     * @return array $lesLignes
     */
    public function getLesCompetences(): array
    {
        // connexion à la base de données avec des droits adéquats
        $this->setConnexionSelonRole("CompRead");
        // demande d'exécution de la requête fournie
        $requeteAExecuter = "SELECT * FROM Competence;";
        $resultatDeLaRequete = $this->query($requeteAExecuter);

        //extraction des données récupérées sous la forme d'un tableau associatif (PHP)
        $lesLignes = $resultatDeLaRequete->fetchAll();

        // transformation du tableau associatif en tableau d'objets
        $lesLignesObjets = [];

        foreach ($lesLignes as $ligne) {
            $lesLignesObjets[] = new Competence (
                (int)$ligne['id'],
                (string)$ligne['nom'],
            );
        }

        // fermeture de la connexion à la base de données
        $resultatDeLaRequete = null;

        return $lesLignesObjets; // renvoi du tableau d'objets
    }

    public function supprimerCompetence(int $id): String{
    
        $this->setConnexionSelonRole("CompRead");
        $requeteAExecuter = "DELETE FROM Competence WHERE id = ".$id.";";
        $resultatDeLaRequete = $this->query($requeteAExecuter);
        if ($resultatDeLaRequete){
            return "SUPPRIMER.";
        }else {
            return "Sa marche pas";
        }
    }
}

