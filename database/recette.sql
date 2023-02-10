dCREATE DATABASE recette_manager;

-- Membre (idMembre, pseudo, nom, email, mdp, date_inscription)
CREATE TABLE membre (
    id_membre BIGINT(20) AUTO_INCREMENT NOT NULL,
    pseudo VARCHAR(255) NOT NULL,
    nom VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    mdp VARCHAR(255) NOT NULL,
    date_inscription DATETIME NOT NULL,
    PRIMARY KEY (id_membre)
) ENGINE=InnoDB;

-- Categorie_Recette (idRecette, idCategorie)
CREATE TABLE categorie (
    id_categorie BIGINT(20) AUTO_INCREMENT NOT NULL,
    nom VARCHAR(255),
    PRIMARY KEY (id_categorie)
) ENGINE=InnoDB;

-- Recette (idRecette, titre, auteur, description, photo, date_creation, #idMembre)
CREATE TABLE recette (
    id_recette BIGINT(20) AUTO_INCREMENT NOT NULL,
    titre VARCHAR(255) NOT NULL,
    auteur VARCHAR(255) NOT NULL,
    date_creation DATETIME NOT NULL,
    description VARCHAR(255) NOT NULL,
    photo VARCHAR(255) NOT NULL,
    id_membre BIGINT(20) NOT NULL,
    PRIMARY KEY (id_recette),
    CONSTRAINT FK_recette_id_membre
    FOREIGN KEY (id_membre)
    REFERENCES membre (id_membre)
) ENGINE=InnoDB;

CREATE TABLE categorie_recette (
    id_recette BIGINT(20) NOT NULL,
    id_categorie BIGINT(20) NOT NULL,
    CONSTRAINT FK_categorie_recette_id_recette
    FOREIGN KEY (id_recette)
    REFERENCES recette (id_recette),
    CONSTRAINT FK_categorie_recette_id_categorie
    FOREIGN KEY (id_categorie)
    REFERENCES categorie (id_categorie)
) ENGINE=InnoDB;

-- Ingredient (idIngredient, nom, quantite, unite, #idRecette)
CREATE TABLE ingredient (
    id_ingredient BIGINT(20) AUTO_INCREMENT NOT NULL,
    nom VARCHAR(255) NOT NULL,
    quantite INT(11) NOT NULL,
    unite VARCHAR(255) NOT NULL,
    id_recette BIGINT(20) NOT NULL,
    PRIMARY KEY (id_ingredient),
    CONSTRAINT FK_ingredient_id_recette
    FOREIGN KEY (id_recette)
    REFERENCES recette (id_recette)
) ENGINE=InnoDB;

-- Commentaire (idCommentaire, auteur, contenu, note, #idRecette)
CREATE TABLE commentaire (
    id_commentaire BIGINT(20) AUTO_INCREMENT NOT NULL,
    auteur VARCHAR(255) NOT NULL,
    contenu VARCHAR(255) NOT NULL,
    id_recette BIGINT(20) NOT NULL,
    note INT NOT NULL,
    PRIMARY KEY (id_commentaire),
    CONSTRAINT FK_commentaire_id_recette
    FOREIGN KEY (id_recette)
    REFERENCES recette (id_recette)
) ENGINE=InnoDB;

INSERT INTO membre (pseudo, nom, email, mdp, date_inscription)
VALUES
("Nicolas", "Nicolas", "nicolas@example.com", "MotDePasse1", "2023-02-10 12:00:00"),
("janedoe", "Jane Doe", "janedoe@example.com", "MotDePasse2", "2023-02-10 12:01:00"),
("jimsmith", "Jim Smith", "jimsmith@example.com", "MotDePasse3", "2023-02-10 12:02:00"),
("sarahjones", "Sarah Jones", "sarahjones@example.com", "MotDePasse4", "2023-02-10 12:03:00"),
("mikebrown", "Mike Brown", "mikebrown@example.com", "MotDePasse5", "2023-02-10 12:04:00");

INSERT INTO recette (titre, auteur, date_creation, description, photo, id_membre)
VALUES ('Tartiflette', 'Nicolas', '2012-02-03', 'La tartiflette savoyarde est un gratin de pommes de terre avec du Reblochon fondu dessus', 'tartiflette.jpg', 1),
('Velouté de carottes au cumin', 'Nicolas', '2012-02-04', 'Un velouté de carotte au cumin', 'veloute-de-carotte-au-cumin.jpg', 1);

INSERT INTO ingredient (nom, quantite, unite, id_recette)
VALUES ('Pommes de terre', '750', 'g', 1),
('Reblochon', '1', 'u', 1),
('Lardons', '200', 'g', 1),
('Crème fraîche épaisse', '3', 'cs', 1),
('Oignons', '2', 'u', 1),
('Beurre', '20', 'g', 1),
('Sel', '1', 'cc', 1),
('Poivre', '1', 'p', 1),
('Carottes', '800', 'g', 2),
('Oignon', '1', 'u', 2),
('Bouillon de volaille', '1', 'l', 2),
('Cumin', '1', 'cs', 2),
('Crème fraîche épaisse', '2', 'cs', 2),
('Huile d’olive', '2', 'cs', 2),
('Sel', '1', 'cc', 2),
('Poivre', '1', 'p', 2);

INSERT INTO categorie (nom)
VALUES ('Entrée'), ('Plat principal'), ('Dessert');

INSERT INTO categorie_recette (id_recette, id_categorie)
VALUES (1, 2), (2, 1);

INSERT INTO commentaire (auteur, contenu, id_recette)
VALUES ('janedoe', 'Trop bien la recette', 1),
('jimsmith', 'Ça me donne faim', 1),
('sarahjones', 'Très bonne recette', 2),
('mikebrown', 'Ça me donne faim', 2);