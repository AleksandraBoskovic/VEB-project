
DROP DATABASE IF EXISTS dogadjaji;


CREATE DATABASE dogadjaji;


GRANT ALL PRIVILEGES ON dogadjaji.* TO 'veb'@'localhost';

 

USE dogadjaji;


CREATE TABLE korisnici
(
 username varchar(21) NOT NULL,
 password varchar(21) NOT NULL,
 ime varchar(30) NOT NULL,
 prezime varchar(30) NOT NULL,
 CONSTRAINT PK PRIMARY KEY (username)
) ENGINE = INNODB;

CREATE TABLE rezervisano
(
  username varchar(21)NOT NULL,
  naziv_objekta varchar(50) NOT NULL,
  adresa varchar(50)NOT NULL,
  datum  varchar(12)  not null,
  CONSTRAINT PK PRIMARY KEY (username,naziv_objekta,datum)
) ENGINE = INNODB;


CREATE TABLE ponuda
( 
  naziv_objekta varchar(50) NOT NULL,
  adresa varchar(50)NOT NULL,
  datum  varchar(12)  not null,
vrsta_muzike varchar(50) not null,
slobodan_ulaz varchar(5),
cena int,
  CONSTRAINT PK PRIMARY KEY (naziv_objekta,datum)
 
) ENGINE = INNODB;




INSERT INTO korisnici(username,password,ime,prezime)
VALUES('aleks1','aleks1234','Aleksandra','Boskovic');

INSERT INTO korisnici(username,password,ime,prezime)
VALUES('aleks2','123456','Aleksandra','Boskovic');

INSERT INTO korisnici(username,password,ime,prezime)
VALUES('milos1','milos1234','Milos','Zivanovic');


INSERT INTO ponuda(naziv_objekta,adresa,datum,vrsta_muzike,slobodan_ulaz,cena)
VALUES('Labamba','Sabacka 3','2018-11-21','pop','da',null);
INSERT INTO ponuda(naziv_objekta,adresa,datum,vrsta_muzike,slobodan_ulaz,cena)
VALUES('Labamba','Sabacka 3','2018-11-11','pop','da',null);
INSERT INTO ponuda(naziv_objekta,adresa,datum,vrsta_muzike,slobodan_ulaz,cena)
VALUES('Java','Bezaniska 27','2018-11-21','pop','ne','300');
INSERT INTO ponuda(naziv_objekta,adresa,datum,vrsta_muzike,slobodan_ulaz,cena)
VALUES('Java','Bezaniska 27','2018-11-11','pop','da',null);


INSERT INTO (username,naziv_objekta,adresa,datum)
VALUES('aleks2','Labamba','Sabacka 3','2018-11-21');

INSERT INTO (username,naziv_objekta,adresa,datum)
VALUES('milos1','Labamba','Sabacka 3','2018-11-21');


INSERT INTO (username,naziv_objekta,adresa,datum)
VALUES('aleks2','Java','Bezaniska 27','2018-11-21');

INSERT INTO (username,naziv_objekta,adresa,datum)
VALUES('milos1','Java','Bezaniska 27','2018-11-21');


INSERT INTO (username,naziv_objekta,adresa,datum)
VALUES('aleks2','Java','Bezaniska 27','2018-11-11');










