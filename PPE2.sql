CREATE TABLE etudiants
(
    id_etudiant SERIAL PRIMARY KEY,
    nom_etudiant VARCHAR(20),
    prenom_etudiant VARCHAR(20),
    numeroTel_etudiant VARCHAR(20),
    specialite_eleve VARCHAR(20)
);


CREATE TABLE professeurs
(
    id_professeurs SERIAL PRIMARY KEY,
    nom_professeurs VARCHAR(20),
    prenom_professeurs VARCHAR(20),
    numeroTel_professeur INT,
    specialite_professeur VARCHAR(20)
);

CREATE TABLE tuteur
(
    id_tuteur SERIAL PRIMARY KEY,
    nom_tuteur VARCHAR(20),
    prenom_tuteur VARCHAR(20),
    numeroTel_tuteur INT
);


CREATE TABLE entreprises
(
    id_entreprise SERIAL PRIMARY KEY,
    nom_entreprise VARCHAR(30),
    adresse VARCHAR(50)
);

CREATE TABLE stages
(
    id_stage SERIAL PRIMARY KEY,
    id_entreprise SERIAL REFERENCES entreprises(id_entreprise),
    id_tuteur SERIAL REFERENCES tuteur(id_tuteur),ppe2stage
    visite_effectue BOOLEAN
);

CREATE TABLE visite_stage
(
    id_visite SERIAL PRIMARY KEY,
    id_etudiant SERIAL REFERENCES etudiants(id_etudiant),
    id_professeurs SERIAL REFERENCES professeurs(id_professeurs),
    date_visite DATE,
    lieux_visite VARCHAR(50)
);

