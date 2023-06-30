-- formation openclassroom
-- https://openclassrooms.com/fr/courses/1959476-administrez-vos-bases-de-donnees-avec-mysql

-- Sélection de données
select * from avion;
select av_const from avion;
select * from avion where av_const="AIRBUS" and av_capacite>300;
-- tri suivant un champ
select * from avion order by av_const;
select * from avion order by av_const desc;
select * from avion order by av_const,av_capacite;
-- requete generale
select av_id,av_const,av_capacite
from avion
where av_capacite>100 
order by av_capacite
limit 3,5;

select *
from avion
where av_const="airbus" or av_const="caravelle";

select *
from avion
where av_capacite>=200 and av_capacite<=300;
-- distinct : élimine les doublons
select distinct av_const from avion;
select distinct av_const,av_capacite from avion;
-- compter le nombre d'enreistrement
select count(*) nbe from avion where av_capacite=300;
select count(distinct av_const) nbe from avion;
-- renommer des champs du select
select av_id id,av_const constructeur,av_capacite siege from avion
-- GENERALISATION
select [liste des champs à afficher]
from [liste des tables qui participent à la requête]
where [conditions]
order by [liste de champs qui seront les clés de tri desc/asc]
limit position, nombre

-- JOINTURE INTERNE
select *
from avion,ville
where av_site=vi_id

select *
from pilote,ville
where pi_site=vi_id

-- liste des vols avec le nom du pilote et le modele de l'avion
select vo_id,pi_nom,av_modele
from vol,pilote,avion
where vo_pilote=pi_id and av_id=vo_avion;

-- liste des vols avec la ville de départ
select vo_id,vi_nom
from vol,ville
where vo_site_depart=vi_id;

-- liste des vols avec le nom du pilote au départ de PARIS
select vo_id,pi_nom
from vol,pilote
where vo_pilote=pi_id and vo_site_depart=2;

-- les opérateurs :
-- AND, OR, !=, =, <, >, IN, NOT IN
-- 
select * 
from vol 
where vo_site_depart in (1,2,3);

select * 
from vol 
where vo_site_depart not in (1,2,3);

-- liste des vols avec le nom de la ville de départ et le nom de la ville d'arrivée
select vol.vo_id, vdepart.vi_nom as depart, varrive.vi_nom as arrivee
from vol, ville as vdepart, ville as varrive
where vol.vo_site_depart=vdepart.vi_id and vol.vo_site_arrivee=varrive.vi_id;

