-- Database Section
-- ________________ 

create SCHEMA IF NOT EXISTS db_life_and_games;
use db_life_and_games;

-- DBSpace Section
-- _______________


-- Tables Section
-- _____________ 

CREATE TABLE db_life_and_games.Post (
     Post_id int not null auto_increment,
     Img char(100) not null,
     Words char(100) not null,
     Day_posted char(10) not null,
     Time_posted char(10) not null,
     Tag_id int not null,
     User_id int not null,
     constraint ID_POST_ID primary key (Post_id));

CREATE TABLE db_life_and_games.Comment (
     Comment_id int not null auto_increment,
     User_id int not null,
     Post_id int not null,
     Words char(100) not null,
     constraint ID_Comment_ID primary key (Comment_id));

CREATE TABLE db_life_and_games.Tag (
     Tag_id int not null auto_increment,
     Game_name char(30) not null,
     constraint ID_TAG_ID primary key (Tag_id));

CREATE TABLE db_life_and_games.Like_table (
     Post_id int not null,
     User_id int not null,
     constraint ID_Like_table_ID primary key (Post_id, User_id));

CREATE TABLE db_life_and_games.Follow (
     Follower_User_id int not null,
     Followed_User_id int not null,
     constraint ID_Follow_ID primary key (Followed_User_id, Follower_User_id));

CREATE TABLE db_life_and_games.User_table (
     User_id int not null auto_increment,
     Username char(30) not null,
     E_mail char(30) not null,
     Passwrd char(30) not null,
     Profile_img char(100),
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

alter table Comment add constraint FKRiferito_FK
     foreign key (Post_id)
     references Post(Post_id)
     on update cascade
     on delete cascade;

alter table Comment add constraint FKCreato
     foreign key (User_id)
     references User_table(User_id)
     on update cascade
     on delete cascade;

alter table Like_table add constraint FKMi__USE_FK
     foreign key (User_id)
     references User_table(User_id)
     on update cascade
     on delete cascade;

alter table Like_table add constraint FKMi__POS
     foreign key (Post_id)
     references Post(Post_id)
     on update cascade
     on delete cascade;

alter table Follow add constraint FKFollowed
     foreign key (Followed_User_id)
     references User_table(User_id)
     on update cascade
     on delete cascade;

alter table Follow add constraint FKFollower_FK
     foreign key (Follower_User_id)
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

create unique index ID_Comment_IND
     on Comment (User_id, Post_id, Comment_id);

create index FKRiferito_IND
     on Comment (Post_id);

create unique index ID_TAG_IND
     on Tag (Tag_id);

create unique index ID_Like_table_IND
     on Like_table (Post_id, User_id);

create index FKMi__USE_IND
     on Like_table (User_id);

create unique index ID_Follow_IND
     on Follow (Followed_User_id, Follower_User_id);

create index FKFollower_IND
     on Follow (Follower_User_id);

create unique index ID_USER_IND
     on User_table (User_id);
