-- *********************************************
-- * Standard SQL generation                   
-- *--------------------------------------------
-- * DB-MAIN version: 11.0.2              
-- * Generator date: Sep 14 2021              
-- * Generation date: Tue Jan 24 16:52:26 2023 
-- * LUN file: C:\Users\leona\OneDrive\Desktop\uni\web\progetto\doc\DB-progetto-TWEB.lun 
-- * Schema: DBProgettoTWEB/1 
-- ********************************************* 


-- Database Section
-- ________________ 

create database DBProgettoTWEB;


-- DBSpace Section
-- _______________


-- Tables Section
-- _____________ 

create table POST (
     Post_id char(1) not null,
     Immagine char(1) not null,
     Testo char(1) not null,
     Data char(1) not null,
     Ora char(1) not null,
     Tag_id char(1) not null,
     User_id char(1) not null,
     constraint ID_POST_ID primary key (Post_id));

create table Commento (
     User_id char(1) not null,
     Post_id char(1) not null,
     Comment_id char(1) not null,
     Testo char(1) not null,
     constraint ID_Commento_ID primary key (User_id, Post_id, Comment_id));

create table TAG (
     Tag_id char(1) not null,
     Nome_gioco char(1) not null,
     constraint ID_TAG_ID primary key (Tag_id));

create table Mi_piace (
     Post_id char(1) not null,
     User_id char(1) not null,
     constraint ID_Mi_piace_ID primary key (Post_id, User_id));

create table Segue (
     SEG_User_id char(1) not null,
     User_id char(1) not null,
     constraint ID_Segue_ID primary key (User_id, SEG_User_id));

create table USER (
     User_id char(1) not null,
     Username char(1) not null,
     E_mail char(1) not null,
     Password char(1) not null,
     Immagine_profilo char(1),
     constraint ID_USER_ID primary key (User_id));


-- Constraints Section
-- ___________________ 

alter table POST add constraint FKTaggato_FK
     foreign key (Tag_id)
     references TAG;

alter table POST add constraint FKPostato_FK
     foreign key (User_id)
     references USER;

alter table Commento add constraint FKRiferito_FK
     foreign key (Post_id)
     references POST;

alter table Commento add constraint FKCreato
     foreign key (User_id)
     references USER;

alter table Mi_piace add constraint FKMi__USE_FK
     foreign key (User_id)
     references USER;

alter table Mi_piace add constraint FKMi__POS
     foreign key (Post_id)
     references POST;

alter table Segue add constraint FKSEGUITO
     foreign key (User_id)
     references USER;

alter table Segue add constraint FKSEGUACE_FK
     foreign key (SEG_User_id)
     references USER;


-- Index Section
-- _____________ 

create unique index ID_POST_IND
     on POST (Post_id);

create index FKTaggato_IND
     on POST (Tag_id);

create index FKPostato_IND
     on POST (User_id);

create unique index ID_Commento_IND
     on Commento (User_id, Post_id, Comment_id);

create index FKRiferito_IND
     on Commento (Post_id);

create unique index ID_TAG_IND
     on TAG (Tag_id);

create unique index ID_Mi_piace_IND
     on Mi_piace (Post_id, User_id);

create index FKMi__USE_IND
     on Mi_piace (User_id);

create unique index ID_Segue_IND
     on Segue (User_id, SEG_User_id);

create index FKSEGUACE_IND
     on Segue (SEG_User_id);

create unique index ID_USER_IND
     on USER (User_id);

