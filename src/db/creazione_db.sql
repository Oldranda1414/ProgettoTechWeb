-- Database Section
-- ________________ 

create SCHEMA IF NOT EXISTS db_progetto_tech_web;
use db_progetto_tech_web;

-- DBSpace Section
-- _______________


-- Tables Section
-- _____________ 

CREATE TABLE db_progetto_tech_web.Post (
     Post_id int not null auto_increment,
     Immagine char(100) not null,
     Testo char(100) not null,
     Giorno char(10) not null,
     Ora char(10) not null,
     Tag_id int not null,
     User_id int not null,
     constraint ID_POST_ID primary key (Post_id));

CREATE TABLE db_progetto_tech_web.Commento (
     Comment_id int not null auto_increment,
     User_id int not null,
     Post_id int not null,
     Testo char(100) not null,
     constraint ID_Commento_ID primary key (Comment_id));

CREATE TABLE db_progetto_tech_web.Tag (
     Tag_id int not null auto_increment,
     Nome_gioco char(30) not null,
     constraint ID_TAG_ID primary key (Tag_id));

CREATE TABLE db_progetto_tech_web.Mi_piace (
     Post_id int not null,
     User_id int not null,
     constraint ID_Mi_piace_ID primary key (Post_id, User_id));

CREATE TABLE db_progetto_tech_web.Segue (
     Seguace_User_id int not null,
     Seguito_User_id int not null,
     constraint ID_Segue_ID primary key (Seguito_User_id, Seguace_User_id));

CREATE TABLE db_progetto_tech_web.User_table (
     User_id int not null auto_increment,
     Username char(30) not null,
     E_mail char(30) not null,
     Passwrd char(30) not null,
     Immagine_profilo char(100),
     constraint ID_USER_ID primary key (User_id));


-- Constraints Section
-- ___________________ 

alter table Post add constraint FKTaggato_FK
     foreign key (Tag_id)
     references Tag(Tag_id)
     on update cascade
     on delete cascade;

alter table Post add constraint FKPostato_FK
     foreign key (User_id)
     references User_table(User_id)
     on update cascade
     on delete cascade;

alter table Commento add constraint FKRiferito_FK
     foreign key (Post_id)
     references Post(Post_id)
     on update cascade
     on delete cascade;

alter table Commento add constraint FKCreato
     foreign key (User_id)
     references User_table(User_id)
     on update cascade
     on delete cascade;

alter table Mi_piace add constraint FKMi__USE_FK
     foreign key (User_id)
     references User_table(User_id)
     on update cascade
     on delete cascade;

alter table Mi_piace add constraint FKMi__POS
     foreign key (Post_id)
     references Post(Post_id)
     on update cascade
     on delete cascade;

alter table Segue add constraint FKSEGUITO
     foreign key (Seguito_User_id)
     references User_table(User_id)
     on update cascade
     on delete cascade;

alter table Segue add constraint FKSEGUACE_FK
     foreign key (Seguace_User_id)
     references User_table(User_id)
     on update cascade
     on delete cascade;


-- Index Section
-- _____________ 

create unique index ID_Post_IND
     on Post (Post_id);

create index FKTaggato_IND
     on Post (Tag_id);

create index FKPostato_IND
     on Post (User_id);

create unique index ID_Commento_IND
     on Commento (User_id, Post_id, Comment_id);

create index FKRiferito_IND
     on Commento (Post_id);

create unique index ID_TAG_IND
     on Tag (Tag_id);

create unique index ID_Mi_piace_IND
     on Mi_piace (Post_id, User_id);

create index FKMi__USE_IND
     on Mi_piace (User_id);

create unique index ID_Segue_IND
     on Segue (Seguito_User_id, Seguace_User_id);

create index FKSEGUACE_IND
     on Segue (Seguace_User_id);

create unique index ID_USER_IND
     on User_table (User_id);
