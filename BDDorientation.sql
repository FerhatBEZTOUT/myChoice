DROP DATABASE IF EXISTS Orientation;
CREATE DATABASE Orientation;

USE Orientation;
	
CREATE TABLE AnneeEtud (
	idAnneeEtud int NOT NULL AUTO_INCREMENT,
	cycleEtud varchar(30),
	annee int,
	
	CONSTRAINT pk_anneeEtud PRIMARY KEY (idAnneeEtud)
	) ENGINE="innoDB";
	
	
	
CREATE TABLE Specialite (
	idSpecialite int NOT NULL AUTO_INCREMENT,
	nomSpecialite varchar(100) NOT NULL,
	anneeDebut int,
	programme varchar(255),
	
	CONSTRAINT pk_specialite PRIMARY KEY (idSpecialite),
	CONSTRAINT fk_specialite_Voeux FOREIGN KEY(anneeDebut) REFERENCES AnneeEtud(idAnneeEtud) ON DELETE SET NULL ON UPDATE CASCADE
	)ENGINE="innoDB";
	
	
	
CREATE TABLE FicheVoeux (
	idFiche int NOT NULL AUTO_INCREMENT,
	intituleFiche varchar(100) NOT NULL,
	DateDebut date NOT NULL,
	DateFin date NOT NULL,
	acheve boolean default false,
	Destination int NOT NULL,
	
	CONSTRAINT pk_FicheVoeux PRIMARY KEY (idFiche),
	CONSTRAINT fk_FicheVoeux_specialite FOREIGN KEY (Destination) REFERENCES Specialite(idSpecialite) ON DELETE CASCADE ON UPDATE CASCADE
	) ENGINE="innoDB";
	
CREATE TABLE Utilisateur (
	idUser int NOT NULL AUTO_INCREMENT ,
	nom varchar(30) NOT NULL,
	prenom varchar(30) NOT NULL,
	dateNaiss date NOT NULL,
	email varchar(90) NOT NULL UNIQUE,
	password varchar(40) NOT NULL,
	isAdmin boolean NOT NULL default false,
	userType varchar(30) NOT NULL default 'etd',
	licenceTrois boolean default false,
	anneeCourante int,
	specialiteCourante int,
	specialiteFuture int,
	
	CONSTRAINT pk_utilisateur PRIMARY KEY (idUser),
	CONSTRAINT fk_utilisateur_anneeEtud FOREIGN KEY(anneeCourante) REFERENCES AnneeEtud(idAnneeEtud) ON DELETE SET NULL ON UPDATE CASCADE,
	CONSTRAINT fk_utilisateur_specialite1 FOREIGN KEY(specialiteCourante) REFERENCES Specialite(idSpecialite) ON DELETE SET NULL ON UPDATE CASCADE,
	CONSTRAINT fk_utilisateur_specialite2 FOREIGN KEY(specialiteFuture) REFERENCES Specialite(idSpecialite) ON DELETE SET NULL ON UPDATE CASCADE
	
	) AUTO_INCREMENT=1000 , ENGINE="innoDB";
	
CREATE TABLE Moyenne (
	idUser int,
	idAnneeEtud int,
	idSpecialite int,
	moyenne float,
	rattrapage int,
	redouble int,
	dette int,
	
	CONSTRAINT pk_moyenne PRIMARY KEY(idUser,idAnneeEtud,idSpecialite),
	CONSTRAINT fk_Moyenne_Utilisateur FOREIGN KEY (idUser) REFERENCES Utilisateur(idUser) ON DELETE CASCADE ON UPDATE CASCADE,
	CONSTRAINT fk_Moyenne_AnneeEtude FOREIGN KEY (idAnneeEtud) REFERENCES AnneeEtud(idAnneeEtud) ON DELETE CASCADE ON UPDATE CASCADE,
	CONSTRAINT fk_Moyenne_specialite FOREIGN KEY (idSpecialite) REFERENCES Specialite(idSpecialite) ON DELETE CASCADE ON UPDATE CASCADE
	)ENGINE="innoDB";

-- Relation Contenir renommée en SpecialiteVoeux
CREATE TABLE SpecialiteFiche(
	idFiche int,
	idSpecialite int,
	nbrPlaces int,
	
	CONSTRAINT pk_specialiteFiche PRIMARY KEY (idFiche,idSpecialite),
	CONSTRAINT fk_specialiteFiche_Voeux FOREIGN KEY (idFiche) REFERENCES ficheVoeux(idFiche) ON DELETE CASCADE ON UPDATE CASCADE,
	CONSTRAINT fk_specialiteFiche_specialite FOREIGN KEY (idSpecialite) REFERENCES Specialite(idSpecialite) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE="innoDB";

CREATE TABLE Voeux (
	idUser int,
	idFiche int,
	idSpecialite int,
	ordre int,
	
	CONSTRAINT pk_voeux PRIMARY KEY (idUser,idFiche,idSpecialite,ordre),
	CONSTRAINT fk_voeux_utilisateur FOREIGN KEY (idUser) REFERENCES Utilisateur(idUser) ON DELETE CASCADE ON UPDATE CASCADE,
	CONSTRAINT fk_voeux_ficheVoeux FOREIGN KEY (idFiche) REFERENCES ficheVoeux(idFiche) ON DELETE CASCADE ON UPDATE CASCADE,
	CONSTRAINT fk_voeux_specialite FOREIGN KEY (idSpecialite) REFERENCES Specialite(idSpecialite) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE="innoDB";




INSERT INTO AnneeEtud(cycleEtud,annee) VALUES ('Licence',1);  -- 1
INSERT INTO AnneeEtud(cycleEtud,annee) VALUES ('Licence',2);  -- 2
INSERT INTO AnneeEtud(cycleEtud,annee) VALUES ('Licence',3);  -- 3
INSERT INTO AnneeEtud(cycleEtud,annee) VALUES ('Master',1);  -- 4
INSERT INTO AnneeEtud(cycleEtud,annee) VALUES ('Master',2);  -- 5


INSERT INTO Specialite(nomSpecialite,anneeDebut) VALUES ("Systèmes d'informations",3);  -- 1
INSERT INTO Specialite(nomSpecialite,anneeDebut) VALUES ("Réseaux et sécurité",3);  -- 2
INSERT INTO Specialite(nomSpecialite,anneeDebut) VALUES ("Informatique (M.I)",3);  -- 3
INSERT INTO Specialite(nomSpecialite,anneeDebut) VALUES ('Génie Logiciel',4);  -- 4
INSERT INTO Specialite(nomSpecialite,anneeDebut) VALUES ('Intelligence artificielle',4);  -- 5
INSERT INTO Specialite(nomSpecialite,anneeDebut) VALUES ('Administration et sécurité des réseaux',4);	-- 6
INSERT INTO Specialite(nomSpecialite,anneeDebut) VALUES ('Réseaux et systèmes distribués',4);		-- 7
INSERT INTO Specialite(nomSpecialite,anneeDebut) VALUES ('Ingénierie de la connaissance',4);		-- 8
INSERT INTO Specialite(nomSpecialite,anneeDebut) VALUES ("Informatique (R.N)",2);		-- 9

INSERT INTO FicheVoeux (intituleFiche,DateDebut,DateFin,acheve,destination) VALUES ("Fiche 1","2022-04-27","2022-05-27",false,9);		-- 1
INSERT INTO FicheVoeux (intituleFiche,DateDebut,DateFin,acheve,destination) VALUES ("Fiche 2","2022-04-27","2022-05-27",false,2);		-- 2
INSERT INTO FicheVoeux (intituleFiche,DateDebut,DateFin,acheve,destination) VALUES ("Fiche 3","2022-04-27","2022-05-27",false,3);		-- 3

INSERT INTO SpecialiteFiche(idFiche,idSpecialite,nbrPlaces) VALUES (1,1,20);
INSERT INTO SpecialiteFiche(idFiche,idSpecialite,nbrPlaces) VALUES (1,2,30);
INSERT INTO SpecialiteFiche(idFiche,idSpecialite,nbrPlaces) VALUES (2,4,20);
INSERT INTO SpecialiteFiche(idFiche,idSpecialite,nbrPlaces) VALUES (2,5,40);
INSERT INTO SpecialiteFiche(idFiche,idSpecialite,nbrPlaces) VALUES (2,7,10);
INSERT INTO SpecialiteFiche(idFiche,idSpecialite,nbrPlaces) VALUES (2,8,30);


INSERT INTO Utilisateur(nom,prenom,dateNaiss,email,password,isAdmin,userType,licenceTrois,anneeCourante,specialiteCourante) 
VALUES ('beztout','ferhat','1997-02-03','ferhat.beztout@se.univ-bejaia.dz','1997-02-03',false,'etd',true,2,3);
INSERT INTO Utilisateur(nom,prenom,dateNaiss,email,password,isAdmin,userType,licenceTrois,anneeCourante,specialiteCourante) 
VALUES ('beztout','thirinasse','2001-09-29','thirinasse.beztout@se.univ-bejaia.dz','2001-09-29',false,'etd',true,2,3);
INSERT INTO Utilisateur(nom,prenom,dateNaiss,email,password,isAdmin,userType,licenceTrois,anneeCourante,specialiteCourante) 
VALUES ('boudjaoui','imene','2002-01-12','imene.boudjaoui@se.univ-bejaia.dz','2002-01-12',false,'etd',true,2,3);
INSERT INTO Utilisateur(nom,prenom,dateNaiss,email,password,isAdmin,userType,licenceTrois,anneeCourante,specialiteCourante) 
VALUES ('boubadra ','melissa','2001-04-10','melissa.boubadra @se.univ-bejaia.dz','2001-04-10',false,'etd',true,2,3);
INSERT INTO Utilisateur(nom,prenom,dateNaiss,email,password,isAdmin,userType,licenceTrois,anneeCourante,specialiteCourante) 
VALUES ('berreguia','rahma','2000-02-24','rahma.berreguia@se.univ-bejaia.dz','2000-02-24',false,'etd',true,3,3);
INSERT INTO Utilisateur(nom,prenom,dateNaiss,email,password,isAdmin,userType,licenceTrois,anneeCourante,specialiteCourante) 
VALUES ('bouamama','melissa','2001-03-03','melissa.bouamama@se.univ-bejaia.dz','2001-03-03',false,'etd',true,3,3);
INSERT INTO Utilisateur(nom,prenom,dateNaiss,email,password,isAdmin,userType,licenceTrois,anneeCourante,specialiteCourante) 
VALUES ('bournine','ikram','2002-01-30','ikram.bournine@se.univ-bejaia.dz','2002-01-30',false,'etd',true,3,3);
INSERT INTO Utilisateur(nom,prenom,dateNaiss,email,password,isAdmin,userType,licenceTrois,anneeCourante,specialiteCourante) 
VALUES ('aissani','sofiane','1970-01-01','sofiane.aissani@univ-bejaia.dz','1970-01-01',true,'admin',false,NULL,NULL);


INSERT INTO Moyenne VALUES (1000,1,3,12.5,0,0,0);
INSERT INTO Moyenne VALUES (1000,2,3,10.45,1,0,0);
INSERT INTO Moyenne VALUES (1000,3,3,12.5,0,0,0);

INSERT INTO Moyenne VALUES (1001,1,3,15,0,0,0);
INSERT INTO Moyenne VALUES (1001,2,3,12.45,0,0,0);
INSERT INTO Moyenne VALUES (1001,3,3,10,1,1,0);

INSERT INTO Moyenne VALUES (1002,1,3,14,0,0,0);
INSERT INTO Moyenne VALUES (1002,2,3,11.45,0,0,0);
INSERT INTO Moyenne VALUES (1002,3,3,10,0,0,0);

INSERT INTO Moyenne VALUES (1003,1,3,13.21,0,0,0);
INSERT INTO Moyenne VALUES (1003,2,3,14.52,0,0,0);
INSERT INTO Moyenne VALUES (1003,3,3,11,1,0,0);

INSERT INTO Moyenne VALUES (1004,1,3,10,0,0,0);
INSERT INTO Moyenne VALUES (1004,2,3,11.45,0,0,0);
INSERT INTO Moyenne VALUES (1004,3,3,12.5,0,0,0);

INSERT INTO Moyenne VALUES (1005,1,3,15.21,0,0,0);
INSERT INTO Moyenne VALUES (1005,2,3,15.45,0,0,0);
INSERT INTO Moyenne VALUES (1005,3,3,16.5,0,0,0);

INSERT INTO Moyenne VALUES (1006,1,3,12,0,0,0);
INSERT INTO Moyenne VALUES (1006,2,3,12.65,0,0,0);
INSERT INTO Moyenne VALUES (1006,3,3,10.63,1,0,0);
