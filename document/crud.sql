-- Create = créer un nouvel enregistrement
INSERT INTO  table (champ1, champ2, champ3) VALUES ("value1","value2","value3");
insert into ville (vi_id,vi_nom) values (null,"nancy");

-- Delete = Supprimer des enregistrements
DELETE FROM  table where champ1="value1";
delete from ville where vi_id=9;
delete from ville where vi_id>=9;

-- Update = Mise à jour d'un enregistrement
UPDATE table SET champ1="value1", champ2="value2", champ3="value3" where champ4="value4";
update ville set vi_nom="Nancy" where vi_id=9;
update ville set vi_nom=concat(ucase(left(vi_nom,1)),right(vi_nom,length(vi_nom)-1));

-- Création d'un utilisateur
CREATE USER 'guinot'@'%' IDENTIFIED by "guinot";
GRANT ALL PRIVILEGES ON *.* TO 'guinot'@'%';

-- connexion avec le client mysql.exe
-- accès à la console de mysql
mysql -u root
-- pour utiliser la base avion
use baseavion;

