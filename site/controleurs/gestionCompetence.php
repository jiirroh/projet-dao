<?php
include_once 'modeles/BaseCompetenceDAO.php';
include_once 'configBdd.php';

if (isset($_GET['action']))
    $action = filter_var($_GET['action'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
else
    $action = "Competence";


switch ($action) {
    case 'Competence':
        $connexionBDDev = new BaseCompetenceDAO();
         if(isset($_GET['id'])){
            $id = $_GET['id'];
            $suppr = $connexionBDDev->supprimerCompetence($id);
         }
        $lesCompetences = $connexionBDDev->getLesCompetences();
        include_once 'vues/Competence.php';
        break;
}
