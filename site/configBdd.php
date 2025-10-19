<?php

/**
 * Fichier de configuration de la base de données
 * Il est suggéré d'enlever ce fichier des push ultérieurs
 */
$_ENV['bd'] = 'tp_sio2_bdjourneeintegration'; // nom de la base de données distante

$_ENV['local_dsn'] = 'mysql:host=127.0.0.1;dbname=' . $_ENV['bd'] . ';port=3306'; // local data source name

$_ENV['remote_dsn_slam'] = 'mysql:host=194.199.35.4;dbname=' . $_ENV['bd'] . ';port=3306'; // remote data source name

$_ENV['options'] = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''); // option pour le driver PDO : UTF8 pour gérer les accents


/**
 * Compte ayant les habilitations pour la fonctionnalité "aPropos" :liste des développeurs
 */
$_ENV['DevRead'] = 'JI_Dev_Read'; // utilisateur de la base de données
$_ENV['pwdDevRead'] = 'pwdJIPourDev_R'; // mot de passe de l'utilisateur de la base de données
// Le compte JI_Dev_Read ne peut que lire les données de la base de données (confère initialisation de la base de données dans le script SQL fourni)
$_ENV['CompRead'] = 'JI_Comp_Read'; // utilisateur de la base de données
$_ENV['pwdCompRead'] = 'pwdJIPourComp_R'; // mot de passe de l'utilisateur de la base de données

$_ENV ['DevModif'] = 'JI_Dev_Modif';
$_ENV ['pwdDevModif'] = 'pwdJIPourDev_M';

$_ENV ['DevAjout'] = 'JI_Dev_Ajout';
$_ENV ['pwdDevAjout'] = 'pwdJIPourDev_A';
$_ENV ['DevSuppr'] = 'JI_Dev_Suppr';
$_ENV ['pwdDevSuppr'] = 'pwdJIPourDev_S';