<?php
include_once 'modeles/BaseDeveloppeurDAO.php';
include_once 'configBdd.php';
include_once 'modeles/BaseDAO.php';

if (isset($_GET['action']))
    $action = filter_var($_GET['action'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
else
    $action = "aPropos";

switch ($action) {
    case 'aPropos':
        $connexionBDDev = new BaseDeveloppeurDAO();
            $lesDeveloppeurs = $connexionBDDev->getLesDeveloppeurs();
            include_once 'vues/apropos.php';
            break;



      case 'Supprimer':
        $connexionBDDev = new BaseDeveloppeurDAO();
        if(isset($_GET['id'])){
            $id = $_GET['id'];
              $nbLignes = $connexionBDDev->supprimerDeveloppeur($id);
              $lesDeveloppeurs = $connexionBDDev->getLesDeveloppeurs();
              include_once 'vues/apropos.php';

            }
        break;


        
    case 'ajouterDeveloppeur':
        $connexionBDDev = new BaseDeveloppeurDAO();
        if (isset($_POST['nom']) && isset($_POST['prenom'])) {
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $connexionBDDev->ajouterDeveloppeur($nom, $prenom);
            $lesDeveloppeurs = $connexionBDDev->getLesDeveloppeurs();
            include_once 'vues/apropos.php';
        } else {
            include_once 'vues/ajouterDeveloppeur.php';
        }
        break;
        
    case 'Update':
        $connexionBDDev = new BaseDeveloppeurDAO();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $dev = $connexionBDDev->getLeDeveloppeur($id);
            include_once 'vues/modifierDeveloppeur.php';
        }
        break;

           
           
           
        

        case 'enregDev':
            $connexionBDDev = new BaseDeveloppeurDAO();
            if(isset($_POST['nom']) && isset($_POST['prenom'])&& isset($_POST['id'])){
                $id = $_POST['id'];
                $nom = $_POST['nom'];
                $prenom = $_POST['prenom'];
                    $modifDev = $connexionBDDev->modifierDeveloppeur((int)$id, $nom, $prenom);
            }
            $lesDeveloppeurs = $connexionBDDev->getLesDeveloppeurs();
            include_once 'vues/apropos.php';
            break;





            case 'Rechercher':
        $connexionBDDev = new BaseDeveloppeurDAO();

        if (isset($_GET['recherche']) && !empty(($_GET['recherche']))) {
            $texte = ($_GET['recherche']);
            $lesDeveloppeurs = $connexionBDDev->rechercherDeveloppeurs($texte);
        } else {
            $lesDeveloppeurs = $connexionBDDev->getLesDeveloppeurs();
        }

        include_once 'vues/apropos.php';
        break;
}



