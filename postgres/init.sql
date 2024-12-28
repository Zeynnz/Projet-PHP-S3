
CREATE TABLE IF NOT EXISTS Joueur (
            Id_Joueur SERIAL,
            Numero_Licence VARCHAR(50),
            Statut VARCHAR(50),
            Poste_Prefere VARCHAR(50),
            Date_Naissance DATE,
            Poids DOUBLE PRECISION,
            Taille DOUBLE PRECISION,
            Nom VARCHAR(50),
            Prenom VARCHAR(50),
            PRIMARY KEY(Id_joueur)
);

CREATE TABLE IF NOT EXISTS Matchs (
            Id_Match SERIAL,
            Date_Heure_Match TIMESTAMP,
            Nom_Equipe_VS VARCHAR(50),
            Lieu_Rencontre VARCHAR(50),
            Resultat VARCHAR(50),
            PRIMARY KEY(Id_Match)
);

CREATE TABLE IF NOT EXISTS Coach (
            Id_Coach SERIAL,
            Identifiant VARCHAR(50),
            Mdp VARCHAR(50),
            PRIMARY KEY(Id_Coach)
);

CREATE TABLE IF NOT EXISTS Commentaire (
            Id_Commentaire SERIAL,
            Commentaire VARCHAR(50),
            Id_Joueur INT NOT NULL,
            PRIMARY KEY(Id_Commentaire),
            FOREIGN KEY(ID_Joueur) REFERENCES Joueur(ID_Joueur)
);

CREATE TABLE IF NOT EXISTS Participer (
            Id_Joueur INT,
            Id_Match INT,
            Note_Individuel INT,
            Titulaire_Remplacant VARCHAR(50),
            Poste VARCHAR(50),
            PRIMARY KEY(Id_Joueur, Id_Match),
            FOREIGN KEY(Id_Joueur) REFERENCES Joueur(Id_Joueur),
            FOREIGN KEY(Id_Match) REFERENCES Matchs(Id_Match)
);
