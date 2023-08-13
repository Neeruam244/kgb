-- Active: 1689165483012@@127.0.0.1@3306
CREATE DATABASE IF NOT EXISTS kgb DEFAULT CHARACTER SET = 'utf8mb4';

-- Active: 1689165483012@@127.0.0.1@3306@kgb
CREATE TABLE agent 
(
    id_agent INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    first_name VARCHAR(50) NOT NULL,
    date_of_birth DATE NOT NULL,
    identification_code VARCHAR(50) NOT NULL,
    nationality VARCHAR(50) NOT NULL,
    specialities VARCHAR(150) NOT NULL
);
CREATE TABLE targets 
(
    id_target INT PRIMARY KEY AUTO_INCREMENT,
    last_name VARCHAR(50) NOT NULL,
    first_name VARCHAR(50) NOT NULL,
    date_of_birth DATE NOT NULL,
    code_name_target VARCHAR(50) NOT NULL,
    nationality VARCHAR(50) NOT NULL
);
CREATE TABLE contact
(
    id_contact INT PRIMARY KEY AUTO_INCREMENT,
    last_name VARCHAR(50) NOT NULL,
    first_name VARCHAR(50) NOT NULL,
    date_of_birth DATE NOT NULL,
    code_name_contact VARCHAR(50) NOT NULL,
    nationality VARCHAR(50) NOT NULL
);
CREATE TABLE hideout
(
    id_hideout INT PRIMARY KEY AUTO_INCREMENT,
    adress VARCHAR(255) NOT NULL,
    country VARCHAR(50) NOT NULL,
    type_of_hideout VARCHAR(50) NOT NULL
);
CREATE TABLE missions 
(
    id_mission INT PRIMARY KEY AUTO_INCREMENT,
    id_admin INT NOT NULL,
    title VARCHAR(50) NOT NULL,
    description TEXT NOT NULL,
    name_code_mission VARCHAR(50) NOT NULL,
    country VARCHAR(50) NOT NULL,
    type_of_mission VARCHAR(50) NOT NULL,
    statut VARCHAR(50) NOT NULL,
    number_of_hideout INT NOT NULL,
    speciality VARCHAR(50) NOT NULL,
    start_date DATE,
    end_date DATE,
    identification_code VARCHAR(50), 
    code_name_target VARCHAR(50),
    code_name_contact VARCHAR(50),
    adress VARCHAR(255)
);
ALTER TABLE missions
ADD CONSTRAINT FK_admin_missions
FOREIGN KEY (id_admin)
REFERENCES administrator (id_admin)
ON DELETE RESTRICT
ON UPDATE RESTRICT;
ALTER TABLE missions
ADD CONSTRAINT FK_agent_missions
FOREIGN KEY (identification_code)
REFERENCES agent (identification_code)
ON DELETE RESTRICT
ON UPDATE RESTRICT;
ALTER TABLE missions
ADD CONSTRAINT FK_target_missions
FOREIGN KEY (code_name_target)
REFERENCES targets (code_name_target)
ON DELETE RESTRICT
ON UPDATE RESTRICT;
ALTER TABLE missions
ADD CONSTRAINT FK_contact_missions
FOREIGN KEY (code_name_contact)
REFERENCES contact(code_name_contact)
ON DELETE RESTRICT
ON UPDATE RESTRICT;
ALTER TABLE missions
ADD CONSTRAINT FK_hideout_missions
FOREIGN KEY (adress)
REFERENCES hideout (adress)
ON DELETE RESTRICT
ON UPDATE RESTRICT;

CREATE TABLE statut
(
    id_statut INT PRIMARY KEY AUTO_INCREMENT,
    in_preparation VARCHAR(50),
    in_progress VARCHAR(50),
    ended VARCHAR(50), 
    failure VARCHAR(50),
    name_code_missions VARCHAR(50)
);
ALTER TABLE statut
ADD CONSTRAINT FK_mission_statut
FOREIGN KEY (name_code_missions)
REFERENCES missions (name_code_missions)
ON DELETE RESTRICT
ON UPDATE RESTRICT;
CREATE TABLE administrator 
(
    id_admin INT PRIMARY KEY AUTO_INCREMENT,
    last_name VARCHAR(50) NOT NULL,
    first_name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(50),
    creation_date DATE NOT NULL,
    role VARCHAR(50) NOT NULL
);

-- Active: 1689165483012@@127.0.0.1@3306@kgb

INSERT INTO agent (last_name, first_name, date_of_birth, identification_code, nationality, specialities) VALUES
('Romanoff', 'Natasha', '1984-11-28', 'black widow', 'ukraine', 'assasinat, tireuse d''élite'),
('Unwin', 'Gary', '1989-11-10', 'kingsman', 'britannique', 'renseignements, maitrise de l''armement'),
('Bond', 'James', '1968-03-02', '007', 'britannique', 'combats rapprochés, assasinat'),
('Egorova', 'Dominica', '1991-07-08', 'red sparrow', 'russe', 'renseignements, espionnage'),
('Bourne', 'Jason', '1986-02-26', 'JB', 'americain', 'assasinat, combats rapprochés'),
('Fury', 'Nick', '1979-08-12', 'SHIELD', 'americain', 'combat armés et non armés');

INSERT INTO targets (last_name, first_name, date_of_birth, code_name_target, nationality) VALUES
('Dreykov', 'Nikolai', '1966-04-16', 'NI66R', 'russe'),
('Valentine', 'Richmond', '1981-01-13', 'RI81A', 'americain'),
('Stavro Blofeld', 'Ernst', '1986-10-21', 'SPECTRE', 'polonais'),
('Ergorov', 'Ivan', '1992-08-31', 'IV92U', 'ukrainien'),
('Conklin', 'Alexander', '1988-06-20', 'AL88A', 'anglais'),
('Schmidt', 'Johann', '1945-09-18', 'crâne rouge', 'allemand');

INSERT INTO contact (last_name, first_name, date_of_birth, code_name_contact, nationality) VALUES
('Brejnev', 'Dimitri', '1970-05-06', 'DV05BI', 'russe'),
('Brown', 'Megan', '1978-09-01', 'MN19BN', 'americaine'),
('Siudek', 'Antoni', '1990-12-26', 'AK21SI', 'polonais'),
('Vlasenko', 'Anastasia', '1997-10-24', 'AO21VA', 'ukrainienne'),
('Cooper', 'Charlie', '1994-02-12', 'CR12CE', 'anglais'),
('Hofman', 'Magda', '1996-09-30', 'MN39HA', 'allemande');

INSERT INTO hideout (adress, country, type_of_hideout) VALUES 
('Chertanovskaya Ulitsa, Moskva 117208', 'Russie', 'appartement 24, 4ème étage'),
('527 W 41st St, Chicago, IL 60609', 'États-Unis', 'maison de quartier'),
('Aleja Pułkownika Władysława Beliny-Prażmowskiego, 31-514 Kraków', 'Pologne', 'appartement 6, rez de chaussée'),
('Surhany, Kirovohrad, 28000', 'Ukraine', 'maison de campagne'),
('Hamilton House, Mabledon Pl, London WC1H 9BB', 'Royaume-Uni', 'maison de quartier avec 1 étage'),
('Ziegeleiweg, 14929 Treuenbrietzen', 'Allemagne', 'maison de campagne');

INSERT INTO administrator (last_name, first_name, email, password, creation_date, role) VALUES
('Petrov', 'Aleksei', 'petrov.aleksei@kgb.ru', '1234', '2003-10-14', 'admin'),
('Ivanov', 'Milana', 'ivanov.milana@kgb.ru', 'jam', '2009-06-01', 'admin'),
('Smirnov', 'Svetlana', 'smirnov.svetlana@kgb.ru', 'test', '2012-12-15', 'admin'),
('Astakhov', 'Youri', 'astakhov.youri@kgb.ru', 'test12', '2016-09-12', 'admin');

INSERT INTO missions (id_admin, title, description, name_code_mission, country, type_of_mission, statut, number_of_hideout, speciality, start_date, end_date, identification_code, code_name_contact, code_name_target, adress) VALUES
('1', 'Infiltration chez SPECTRE', 'Infiltration et neutralisation des 9 sentinelles', 'IN-SPECTRE-R8', 'Pologne', 'Infiltration', 'Echec', 1, 'Combats rapprochés', '2023-06-15', '2023-06-26', '007', 'AK21SI', 'SPECTRE', 'Aleja Pulkownika Wladyslawa Beliny Prazmowskiego 31-514 Krakow'),
('2', 'Assasinat du général Dreykov', 'Infiltration dans le reprère de la Chambre rouge, élimination de la cible NI66R - si possible libération des veuves', 'AS-NI66R-2B', 'Russie', 'Assasinat', 'En cours', 1, 'Assasinat', '2023-08-08', '2023-08-10', 'Black Widow', 'DV05BI', 'NI66R', 'Chertanovskaya Ulitsa Moskva 117208');
INSERT INTO missions (id_admin, title, description, name_code_mission, country, type_of_mission, statut, number_of_hideout, speciality, start_date, end_date, identification_code, code_name_contact, code_name_target, adress) VALUES
('1', 'Espionnage de M Valentine', 'Surveillance de la cible et prise d''information en vu d''une possible infiltration', 'SU-RI81A-6D', 'Etats-Unis', 'Surveillance', 'En préparation', 1, 'Renseignements', '2023-09-10', '2023-10-19', 'Kingsman', 'MN19BN', 'RI81A', '527 W 41st St - Chicago - IL 60609'),
('3', 'Infiltration chez HYDRA', 'Infiltration dans le repère de HYDRA et vol du tereract', 'IN-RedSkull-P8', 'Allemagne', 'Infiltration', 'En préparation', 1, 'Combats rapprochés', '2023-12-01', '2023-12-10', 'SHIELD', 'MN39HA', 'Red Skull', 'Ziegeleiweg 14929 Treuenbrietzen'),
('4', 'Espionnage de Ergorov', 'Surveillance de la cible en vue d''un futur assasinat', 'SU-IV92U-6F', 'Ukraine', 'Surveillance', 'En cours', 1, 'Renseignements', '2023-07-28', '2023-08-28', 'Red Sparrow', 'AO21VA', 'IV92U', 'Surhany, Kirovohrad, 28000'),
('3', 'Assasinat du chef de l''opération Treadstone', 'Infiltration à son domicile familiale et élimination de la cible', 'AS-AL88A-2W', 'Angleterre', 'Assasinat', 'Terminé', 1, 'Assasinat', '2023-07-15', '2023-07-16', 'JB', 'CD12CE', 'AL88A', 'Hamilton House - Mabledon Pl - London WC1H 9BB');

INSERT INTO statut (name_code_missions, in_preparation) VALUES
('SU-RI81A-6D', 'en préparation'),
('IN-RedSkull-P8', 'en préparation');

INSERT INTO statut (name_code_missions, in_progress) VALUES
('SU-IV92U-6F', 'en cours'),
('AS-NI66R-2B', 'en cours');

INSERT INTO statut (name_code_missions, ended) VALUES 
('AS-AL88A-2W', 'terminé');

INSERT INTO statut (name_code_missions, failure) VALUES
('IN-SPECTRE-R8', 'echec');