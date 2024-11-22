CREATE TABLE Joueur(
                       ID_joueur Integer auto_increment,
                       Numéro_de_license VARCHAR(50),
                       Statut VARCHAR(50),
                       Poste_préféré VARCHAR(50),
                       Date_naissance DATE,
                       Poids DOUBLE,
                       Taille DOUBLE,
                       Nom VARCHAR(50),
                       Prénom VARCHAR(50),
                       PRIMARY KEY(ID_joueur)
);

CREATE TABLE Match_de_League_of_Legends(
                                           Id_Match_de_League_of_Legends Integer auto_increment,
                                           Date___Heure_match DATETIME,
                                           Nom_equipe_VS VARCHAR(50),
                                           Lieu_rencontre VARCHAR(50),
                                           Résultat VARCHAR(50),
                                           PRIMARY KEY(Id_Match_de_League_of_Legends)
);

CREATE TABLE Coach(
                      Id_Coach Integer auto_increment,
                      Identifiant VARCHAR(50),
                      mdp VARCHAR(50),
                      PRIMARY KEY(Id_Coach)
);

CREATE TABLE Commentaire(
                            Id_Commentaire Integer auto_increment,
                            Commentaire VARCHAR(50),
                            ID_joueur INT NOT NULL,
                            PRIMARY KEY(Id_Commentaire),
                            FOREIGN KEY(ID_joueur) REFERENCES Joueur(ID_joueur)
);

CREATE TABLE Participer(
ID_joueur INT,
Id_Match_de_League_of_Legends INT,
Note_individuel INT,
Titulaire_Remplaçant VARCHAR(50),
Poste VARCHAR(50),
PRIMARY KEY(ID_joueur, Id_Match_de_League_of_Legends),
FOREIGN KEY(ID_joueur) REFERENCES Joueur(ID_joueur),
FOREIGN KEY(Id_Match_de_League_of_Legends) REFERENCES Match_de_League_of_Legends(Id_Match_de_League_of_Legends)
);
