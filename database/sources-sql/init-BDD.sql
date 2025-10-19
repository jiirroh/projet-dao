-- script d'initialisation de la base de données pour l'application web avec les droits de l'utilisateur
DROP DATABASE IF EXISTS `tp_sio2_bdjourneeintegration`;

CREATE DATABASE IF NOT EXISTS `tp_sio2_bdjourneeintegration` CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE DATABASE IF NOT EXISTS `tp_sio2_bdjourneeintegration` CHARACTER SET utf8 COLLATE utf8_general_ci;

DROP USER IF EXISTS 'JI_Dev_Read'@'%';

CREATE USER 'JI_Dev_Read'@'%' IDENTIFIED BY 'pwdJIPourDev_R';

DROP USER IF EXISTS 'JI_Comp_Read'@'%';

CREATE USER 'JI_Comp_Read'@'%' IDENTIFIED BY 'pwdJIPourComp_R';

DROP USER IF EXISTS 'JI_Dev_Modif'@'%';

CREATE USER 'JI_Dev_Modif'@'%' IDENTIFIED BY 'pwdJIPourDev_M';

DROP USER IF EXISTS 'JI_Dev_Ajout'@'%';

CREATE USER 'JI_Dev_Ajout'@'%' IDENTIFIED BY 'pwdJIPourDev_A';

DROP USER IF EXISTS 'JI_Dev_Suppr'@'%';

CREATE USER 'JI_Dev_Suppr'@'%' IDENTIFIED BY 'pwdJIPourDev_S';



USE `tp_sio2_bdjourneeintegration`;
