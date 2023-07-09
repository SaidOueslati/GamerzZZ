 CREATE TABLE Utilisateur(
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY ,
    pseudo VARCHAR(30) NOT NULL,
    mdp VARCHAR(355) NOT NULL,
    admin TINYINT(1) DEFAULT 0 NOT NULL,
    UNIQUE(pseudo)
);

CREATE TABLE Post(
    id_post INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    id_posteur INT UNSIGNED NOT NULL,
    message VARCHAR(300) NOT NULL,
    heure_date_publication DATETIME NOT NULL,
    modifie TINYINT(1) DEFAULT 0 NOT NULL,
    public TINYINT(1) NOT NULL,

    FOREIGN KEY(id_posteur) REFERENCES Utilisateur(id) ON DELETE CASCADE
);

-- Creation des utilisateurs :

INSERT INTO Utilisateur(pseudo, mdp, admin) VALUES('Said', '$2y$10$ALAEla5y/ugaw1OEyHhvJe9o3Xt5ob9kIDvwTw8HY4AL./U9S/5j.', 1) ;
INSERT INTO Utilisateur(pseudo, mdp) VALUES('Pierra', '$2y$10$q7yobulTk9676JVafKGTWeGRM9hXeGpKC9VKaLApI8/1uzYiBhIK2') ;
INSERT INTO Utilisateur(pseudo, mdp) VALUES('Damien', '$2y$10$9.EPEFF6Uy0jVuB28A1.Y.cbsfcF7eBJN51rbkU1kVV0itO.5BJ/K') ;
INSERT INTO Utilisateur(pseudo, mdp) VALUES('Dams', '$2y$10$y7FPm/YN9htPdQTammRwfeaYc6wicebeuxLlmWA721o5g5OLKE3JK') ;
INSERT INTO Utilisateur(pseudo, mdp) VALUES('Lechat', '$2y$10$WLgbTCQdKwcC.nRyjD9dzOhFb.zJTpBMygdqMn0dOtVH3qfmOD7jy') ;
INSERT INTO Utilisateur(pseudo, mdp) VALUES('Miaou', '$2y$10$Ei3l8OYtzKmr3wFF3Nj2Buv1TGtqiSrwDGtZtxiSDXgFsOwm.XZcW') ;
INSERT INTO Utilisateur(pseudo, mdp) VALUES('Mich12', '$2y$10$QNLHfkTJyrzx.yW4u1nJ8Ormt1IufZnUteJS/ezZUQIp7dOfsoSEi') ;

-- Creation des posts :

INSERT INTO Post(id_posteur, message, heure_date_publication, public) VALUES(
    2, "I am valorant player , I'm looking for teamates", '2022-05-02 12:03:00', 1) ;

INSERT INTO Post(id_posteur, message, heure_date_publication, public) VALUES(
    4, "I am league of legends players , I'm looking for duo", '2022-05-03 16:30:24', 1) ;

INSERT INTO Post(id_posteur, message, heure_date_publication, public) VALUES(
    3, 'We are 4 players CSGO , We are looking for last', '2022-05-03 16:31:24', 1) ;

INSERT INTO Post(id_posteur, message, heure_date_publication, public) VALUES(
    7, "Last Day , I Ranked up to Plat3 in Valorant ^_^", '2022-04-03 06:31:24', 0) ;

INSERT INTO Post(id_posteur, message, heure_date_publication, public) VALUES(
    6, "I'm new gamer , can you suggest for me good games to try? ", '2022-05-04 13:01:24', 1) ;

INSERT INTO Post(id_posteur, message, heure_date_publication, public) VALUES(
    5, "Last day I downlowded Outlast II and It was so fun , I recommend it <3 ", '2022-05-02 20:19:24', 1) ;


