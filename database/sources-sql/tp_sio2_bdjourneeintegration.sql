USE tp_sio2_bdjourneeintegration;

#------------------------------------------------------------
# Table: Developpeur
#------------------------------------------------------------

DROP TABLE IF EXISTS `Developpeur`;

CREATE TABLE Developpeur (
    id int Auto_increment NOT NULL,
    nom Varchar(20) NOT NULL,
    prenom Varchar(15) NOT NULL,
    CONSTRAINT Classe_PK PRIMARY KEY (id)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb3 COLLATE = utf8mb3_general_ci;

INSERT INTO
    Developpeur
VALUES('2', 'TOUIL', 'Sacha'),
('3', 'GUETTE', 'Garry'),
('4', 'MARTIN', 'Léa'),
('5', 'DUPONT', 'Lucas'),
('6', 'BENALI', 'Nora'),
('7', 'MOREAU', 'Émile'),
('8', 'RODRIGUEZ', 'Clara'),
('9', 'KIM', 'Jin'),
('10', 'LEROY', 'Camille'),
('11', 'NDIAYE', 'Moussa');

#------------------------------------------------------------
# Table: Competence
#------------------------------------------------------------
CREATE TABLE Competence(
        id      Int  Auto_increment  PRIMARY KEY NOT NULL ,
        nom Varchar (40) NOT NULL
)ENGINE=InnoDB;

#------------------------------------------------------------
# Données de départ
#------------------------------------------------------------
INSERT INTO Competence VALUES ('1', 'Développement Web- CSS');
INSERT INTO Competence VALUES ('2', 'Développement Web- PHP');
INSERT INTO Competence VALUES ('3', 'Développement Web- HTML');



#------------------------------------------------------------
# Habilitations
#------------------------------------------------------------
GRANT SELECT ON `tp_sio2_bdjourneeintegration`.`Developpeur` TO 'JI_Dev_Read'@'%';
GRANT SELECT ON `tp_sio2_bdjourneeintegration`.`Competence` TO 'JI_Comp_Read'@'%';
GRANT SELECT, UPDATE ON `tp_sio2_bdjourneeintegration`.`Developpeur` TO 'JI_Dev_Modif'@'%';
GRANT INSERT ON `tp_sio2_bdjourneeintegration`.`Developpeur` TO 'JI_Dev_Ajout'@'%';
GRANT SELECT, DELETE ON `tp_sio2_bdjourneeintegration`.`Developpeur` TO 'JI_Dev_Suppr'@'%';
