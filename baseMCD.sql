-- DATABASE STAGE

CREATE SEQUENCE sequenceAdministrateur;
CREATE SEQUENCE sequenceSatut;
CREATE SEQUENCE sequenceFournisseur;
CREATE SEQUENCE sequenceIncident;
CREATE SEQUENCE sequenceTypeIncident;
CREATE SEQUENCE sequenceIntervenant;
CREATE SEQUENCE sequencePriorite;
CREATE SEQUENCE sequenceProjet;
CREATE SEQUENCE sequenceIncidentArchive;
create sequence sequenceprojetsupprimer;
create sequence sequenceprojetarchive;
create sequence sequenceincidentsupprimer

CREATE TABLE Administrateur(
    id Integer PRIMARY KEY NOT NULL DEFAULT NEXTVAL('sequenceAdministrateur'),
    matricule Integer ,
    nom VARCHAR(255),
    prenom VARCHAR(255),
    photo VARCHAR(255),
    Email VARCHAR(255),
    mdp VARCHAR(255)
);


CREATE TABLE Priorite(
    id Integer PRIMARY KEY,
    nom VARCHAR(255)
)


CREATE TABLE Statut(
    id Integer PRIMARY KEY,
    nom VARCHAR(255) NOT NULL
);


CREATE TABLE TypeIncident(
    id VARCHAR(255) PRIMARY KEY NOT NULL DEFAULT CONCAT('TypeIncident',NEXTVAL('sequenceTypeIncident')),
    nom VARCHAR(255) NOT NULL
);


CREATE TABLE Intervenant(
    id VARCHAR(255) PRIMARY KEY NOT  NULL DEFAULT CONCAT('Intervenant',NEXTVAL('sequenceIntervenant')),
    matricule DOUBLE PRECISION,
    nom  VARCHAR(255),
    prenom VARCHAR(255),
    photo VARCHAR(255),
    email VARCHAR(255),
    MotDePasse VARCHAR(255)
);


CREATE TABLE Fournisseur (
    id VARCHAR(255) PRIMARY KEY NOT NULL DEFAULT CONCAT('Fournisseur',NEXTVAL('sequenceFournisseur')),
    nom VARCHAR(255)
);

CREATE TABLE incident(
  id Integer PRIMARY KEY NOT NULL DEFAULT NEXTVAL('sequenceIncident'),
  nom VARCHAR(255) NOT NULL,
  idTypeIncident Integer,
  idIntervenant Integer,
  commentaire TEXT,
  dateIncident DATE,
  dateFin DATE,
  Etat int,
  FOREIGN KEY ( idTypeIncident ) REFERENCES type_incidents( id ),
  FOREIGN KEY ( idIntervenant ) REFERENCES Intervenants ( id )
);
ALTER TABLE incident
ADD archive int
ALTER TABLE incident
ADD supprimer int
ALTER TABLE incident
ADD fournisseurs VARCHAR(255)

CREATE view incidentActif as 
select 
    i.id as id,
    i.nom as nom,
    type_incidents.nom as type,
    intervenants.nom as nomIntervenant,
    intervenants.prenom as prenomIntervenant,
    i.dateIncident as dateIncident,
    i.commentaire as commentaire,
    i.etat as etat,
    i.archive as archive,
    i.supprimer as supprimer,
    i.fournisseurs as fournisseurs  
from incident as i
    join type_incidents
        on i.idTypeIncident = type_incidents.id
    join intervenants 
        on i.idIntervenant = intervenants.id


CREATE TABLE incidentArchive(
    id Integer PRIMARY KEY NOT null DEFAULT NEXTVAL('sequenceIncidentArchive'),
    idIncident Integer,
    FOREIGN KEY (idIncident) REFERENCES incident(id)
);




CREATE TABLE Projet(
    id Integer PRIMARY KEY NOT NULL DEFAULT NEXTVAL('sequenceProjet'),
    nom VARCHAR(255),
    dependance VARCHAR(255),
    description TEXT,
    idPriorite Integer,
    idIntervenant Integer,
    dateDebut DATE,
    dateFin DATE,
    idStatut Integer,
    observation TEXT,
    fournisseur VARCHAR(255),
    FOREIGN KEY ( idPriorite ) REFERENCES Priorite (id),
    FOREIGN KEY ( idIntervenant ) REFERENCES Intervenants (id),
    FOREIGN KEY ( idStatut ) REFERENCES  Statut (id)
    );
ALTER TABLE Projet
ADD archive int

ALTER TABLE Projet
ADD supprimer int

CREATE TABLE projetsupprimer(
    id Integer primary key not null default NEXTVAL('sequenceprojetsupprimer'),
    idprojet Integer,
    foreign key (idprojet) references projet (id)
);
CREATE TABLE incidentsupprimer(
    id Integer primary key not null default NEXTVAL('sequenceincidentsupprimer'),
    idincident Integer,
    foreign key (idincident) references incident (id)
);

CREATE TABLE projetarchive(
    id Integer primary key not null default NEXTVAL('sequenceprojetarchive'),
    idprojet Integer,
    foreign key (idprojet) references projet (id)
);

CREATE view projetactif as
select 
    p.id as id,
    p.nom as nom,
    p.dependance as dependance,
    intervenants.nom as nomIntervenant,
    intervenants.prenom as prenomIntervenant,
    p.dateDebut as dateDebut,
    p.dateFin as dateFin,
    p.idstatut as statut,
    p.archive as archive,
    p.supprimer as supprimer,
    p.fournisseur as fournisseur
from Projet as p 
    join intervenants 
        on p.idIntervenant = intervenants.id

CREATE view deroulementprojet as 
select
    p.id as id ,
    p.nom as nom,
    intervenants.nom as nomIntervenant,
    intervenants.prenom as prenomIntervenant,
    intervenants.photo as photo,
    p.idstatut as statut,
    p.dateDebut as dateDebut,
    p.dateFin as dateFin,
    (p.datefin - p.datedebut) as delai,
    ((p.datefin - p.datedebut) - (p.datefin - current_date)) as jourdepasse,
    (p.datefin - current_date) as restejour,
    ((p.datefin - p.datedebut) - (p.datefin - current_date))*100/((p.datefin - p.datedebut)) as pourcentagefait
from projet as p
    join intervenants 
        on p.idIntervenant = intervenants.id
    