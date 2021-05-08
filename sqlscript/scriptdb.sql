CREATE DATABASE IF NOT EXISTS UNITEC CHARACTER SET latin1 COLLATE latin1_spanish_ci;
USE UNITEC;

CREATE TABLE IF NOT EXISTS clientes (
  id int(20) NOT NULL AUTO_INCREMENT,
  nombre varchar(50) NOT NULL ,
  apepat varchar(50) NOT NULL ,
  apemat varchar(50) NOT NULL ,
  genero int(3) NOT NULL,
  edad varchar(5) NOT NULL ,
  edo_civil int(3) NOT NULL ,
  email varchar(100) NOT NULL ,  
  password varchar(100) NOT NULL,  
  opt1 varchar(5) NOT NULL ,
  opt2 varchar(5) NOT NULL ,
  date_created datetime NOT NULL,
  PRIMARY KEY (id)  
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS catalogo (
  id int(20) NOT NULL AUTO_INCREMENT,
  movimiento varchar(50) DEFAULT NULL,
  relacion int(3) DEFAULT NULL,
  enable int(3) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


INSERT INTO catalogo (movimiento, relacion, enable) VALUES ('Masculino', '1', '1'), ('Femenino', '1', '1');
INSERT INTO catalogo (movimiento, relacion, enable) VALUES ('Soltero', '2', '1'), ('Casado', '2', '1');
INSERT INTO catalogo (movimiento, relacion, enable) VALUES ('Preparatoria', '3', '1'), ('Licenciatura', '3', '1'), ('Posgrado', '3', '1');


