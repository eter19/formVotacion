create table region (
	id int AUTO_INCREMENT NOT NULL,
	name VARCHAR(255) not null,
	PRIMARY KEY(id)
);
CREATE TABLE comuna (
   id int PRIMARY KEY AUTO_INCREMENT not NULL,
    name VARCHAR(255) NOT NULL,
    regionId int,
    FOREIGN KEY (regionId) REFERENCES region(id) ON DELETE CASCADE
);

create table candidato (

id int PRIMARY KEY AUTO_INCREMENT not NULL,
nombre VARCHAR(100) not null 
);

create table votos (
	id int PRIMARY KEY AUTO_INCREMENT NOT NULL,
	nombreyapellido VARCHAR(255) NOT NULL,
	alias VARCHAR(255) NOT NULL,
	rut VARCHAR(255) UNIQUE NOT NULL,
	regionId INT NOT NULL,
	comunaId INT NOT NULL,
	candidatoId INT NOT NULL,
	conocio VARCHAR(255) NOT NULL,
	FOREIGN KEY (regionId) REFERENCES region(id) ON DELETE CASCADE,
	FOREIGN KEY (comunaId) REFERENCES comuna(id) ON DELETE CASCADE,
	FOREIGN KEY (candidatoId) REFERENCES candidato(id) ON DELETE CASCADE
);

INSERT INTO region (name) VALUES ('Maule'),('Biobío'),('Concon'),('arau');

INSERT INTO comuna (name, regionId) VALUES ('comuna1',1),('comuna12',2),('comuna4',3),('comuna123',4);

INSERT INTO candidato (nombre) VALUES ('candidato1'),('candidato2'),('candidato3'),('candidato4');
