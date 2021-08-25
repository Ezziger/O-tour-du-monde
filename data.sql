CREATE DATABASE boutique_en_ligne;
USE boutique_en_ligne;

/*****CREATION DE LA TABLE GAMMES*****/

CREATE TABLE gammes
	(
		id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        nom VARCHAR(25)    
    );
    
/*****CREATION DE LA TABLE ARTICLES*****/

CREATE TABLE articles
	(
		id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
		nom VARCHAR(75),
        description VARCHAR(75),
        description_detaillee TEXT,
        image VARCHAR(75),
        prix FLOAT,
        background VARCHAR(75),
        duree VARCHAR(30),
        stock INT,
        FOREIGN KEY (id_gamme) REFERENCES gammes(id),
        id_gamme INT
    );
    
/*****CREATION DE LA TABLE CLIENTS*****/

CREATE TABLE clients
	(
		id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        nom VARCHAR(25),
        prenom VARCHAR(25),
        email VARCHAR(25),
        mot_de_passe VARCHAR(100)
	);
    
/*****CREATION DE LA TABLE COMMANDES*****/

CREATE TABLE commandes
	(
		id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
		numero INT,
        date_commande VARCHAR(25),
        prix FLOAT,
        FOREIGN KEY (id_client) REFERENCES clients(id),
        id_client INT
    );
    
/*****CREATION DE LA TABLE ADRESSES*****/

CREATE TABLE adresses
	(
		id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        FOREIGN KEY (id_client) REFERENCES clients(id),
        id_client INT,
        adresse VARCHAR(40),
        code_postal VARCHAR(5),
        ville VARCHAR(25)
    );
    
/*****CREATION DE LA TABLE COMMANDES_ARTICLES*****/

CREATE TABLE commandes_articles
	(
		id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        FOREIGN KEY (id_commande) REFERENCES commandes(id),
        id_commande INT,
        FOREIGN KEY (id_article) REFERENCES articles(id),
        id_article INT
	);

/********************MODIFIER LA TABLE ARTICLES (AJOUT DE LA DUREE)********************/

ALTER TABLE articles
ADD duree VARCHAR(30);

ALTER TABLE articles
ADD background VARCHAR(100);

ALTER TABLE articles
MODIFY description VARCHAR(75);

ALTER TABLE articles
MODIFY nom VARCHAR(75);

ALTER TABLE articles
MODIFY image VARCHAR(75);

SELECT * FROM articles;

DROP TABLE articles;

SELECT articles.nom, articles.description, articles.description_detaillee, articles.image, articles.prix, articles.background, articles.duree, gammes.nom AS formule FROM articles  
INNER JOIN gammes
ON articles.id_gamme = gammes.id;

/********************REQUETES********************/

INSERT INTO articles(nom, image, background, description, description_detaillee, duree, prix, id_gamme) VALUES
	("A l'abordage de Santorin", "./images/santorin.jpg", "./images/background-santorin.jpg", "Séjour inoubliable sur l'île de Santorin en Grèce", "Entre mers et montagnes, eaux turquoises, petits villages pittoresques et la traditionnelle Philoxénia (l’hospitalité grecque), venez profiter d’un séjour inoubliable en Grèce !", "7 jours et 6 nuits", "700", 1),
	("Farniente à l'île Maurice", "./images/ile-maurice.jpg", "./images/background-ile-maurice.jpg", "Séjour détente, entre plage, eaux turquoises et coktails", "Posée en plein Océan indien, l'île Maurice vous ouvre les portes de son jardin secret. Sur place, vous avez rendez-vous avec le bonheur, le raffinement et l'authenticité.", "10 jours et 9 nuits", "1250", 2),
	("Circuit au pays des cariocas", "./images/rio-de-janeiro.jpg", "./images/background-bresil.jpg", "Circuit découverte à travers les incontournables du Brésil.  ", "Que l'on soit amateur de ses plages inoubliables et de son soleil, de ses montagnes, sa nature luxuriante et ses forets tropicales, ou de ses ambiances musicales entêtantes,son carnaval et sa diversité, le Brésil est destination qui remplira vos attentes", "15 jours et 14 nuits", "1950", 3),
	("L'islande et ses aurores boréales", "./images/islande.jpg", "./images/background-islande.jpg", "Circuit découverte de l'Islande et de ses merveilles", "Terre de glace et de feu hors du temps, le pays adossé au cercle arctique ressemble à un immense parc naturel offrant des paysages variés et grandioses.", "8 jours et 7 nuits", "850", 3);
    
INSERT INTO gammes(nom) VALUES
	("demi-pension"),
    ("all-inclusive"),
    ("pension complète");

select * from clients;


/**********Jointure clients/adresses**********/
SELECT adresses.adresse, adresses.code_postal, adresses.ville, clients.nom, clients.prenom, clients.email FROM adresses
INNER JOIN clients
ON adresses.id_client = clients.id;

SELECT nom, prenom, email FROM clients WHERE prenom = "steven";