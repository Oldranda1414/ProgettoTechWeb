-- file used to populate the database

use db_life_and_games;

-- inserting users into user_table

-- password is "tonnoConForza"
INSERT INTO User_table(Username, E_mail, Passwrd, Profile_img, DT, Salt) Values("leonardo.randacio", "leTime_postednd@amail.com", "74d45b696cf8ad2045b0737754daa0d4df73b4e4cdb091f506be5226853df7e00d0d7922f1f03d41e3677c0df91667e468d553339d45cd55c67cd121daa5f5cd", "profile-1.jpg", "2019-05-12 15:03:00", "adb197687c2dd4333461248ab52653d8fc5ea4e87577678d4d81822ff1bfa8eb1ea7ffc71354a68e8ebd42f7c530deabbd5a90956f3504d243d753949285e7c0");
-- password is "12345"
INSERT INTO User_table(Username, E_mail, Passwrd, Profile_img, DT, Salt) Values("vdamianob", "vdamianb@amail.com", "cf853e3cb33605f11ad0676b57532695c1293ef7640f9875cff2cd32b75709930e096bd7bcd89617058e9b66a82d48ff78bd06f870d95c479aacfc35c4f698bf", "profile-2.jpg", "2018-05-12 15:03:00", "f5432e790a5420867177f88f5f43b7c94550ea38d5e6ecf0dbb1b71f34d7129181b2f535e7a8142445ff85a39213bf45702318ab8fe27dcd4f1f66d9dd235d44"); 
-- password is "ioSonoFilippo"
INSERT INTO User_table(Username, E_mail, Passwrd, Profile_img, DT, Salt) Values("filusbrius", "filippo@amail.com", "e2db33998e68db871685f8174290ccca3f091117f1ea0a44b98cece64258861d607333c83e585c7a031da16486e843aca9ff344f51d6b6f9243f51e7b58b5c57", "profile-3.jpg", "2017-05-12 15:03:00", "6809e69ea791935db471664a603307c30bb60ccb5f1ca778b43b50e8d9fa6b20bca8f056df3e2eac65b13342ab9df0c5bb6d0f7df768414c3069f537be74faa8");

-- inserting tags into Tag table

INSERT INTO Tag(Game_name) VALUES ("SimCity");

INSERT INTO Tag(Game_name) VALUES ("Driver");

INSERT INTO Tag(Game_name) VALUES ("Poy Poy");

INSERT INTO Tag(Game_name) VALUES ("Dominion");

INSERT INTO Tag(Game_name) VALUES ("Strongholds");

INSERT INTO Tag(Game_name) VALUES ("OpenTTD");

INSERT INTO Tag(Game_name) VALUES ("Heavy Rain");

INSERT INTO Tag(Game_name) VALUES ("Imperivm GBR");

INSERT INTO Tag(Game_name) VALUES ("Tarantola 412");

-- inserting posts into post table

INSERT INTO Post(Img, Words, DT, Tag_id, User_id) Values("post-example-1.jpg", "guardate che figo mamma mia", "2022-01-07 12:00:00", (SELECT Tag_id FROM Tag WHERE Game_name = "SimCity"), (SELECT User_id FROM User_table WHERE Username = "leonardo.randacio"));

INSERT INTO Post(Img, Words, DT, Tag_id, User_id) Values("post-example-2.jpg", "bug incredibile in Driver 2, da non credere", "2022-01-07 13:00:00", (SELECT Tag_id FROM Tag WHERE Game_name = "Driver"), (SELECT User_id FROM User_table WHERE Username = "vdamianob"));

INSERT INTO Post(Img, Words, DT, Tag_id, User_id) Values("post-example-3.jpg", "Su PS1 e 2", "2022-01-08 10:15:00", (SELECT Tag_id FROM Tag WHERE Game_name = "Poy Poy"), (SELECT User_id FROM User_table WHERE Username = "leonardo.randacio"));

INSERT INTO Post(Img, Words, DT, Tag_id, User_id) Values("post-example-4.jpg", "Stravinta questa partita contro uno che, a quanto pare, blablabla!", "2022-01-10 10:04:00", (SELECT Tag_id FROM Tag WHERE Game_name = "Dominion"), (SELECT User_id FROM User_table WHERE Username = "leonardo.randacio"));

INSERT INTO Post(Img, Words, DT, Tag_id, User_id) Values("post-example-5.jpg", "Ho per caso rispolverato Strongholds Crusader, un vecchio gioco della FireFly Studios. E questo è stato il risultato", "2022-05-12 15:03:00", (SELECT Tag_id FROM Tag WHERE Game_name = "Strongholds"), (SELECT User_id FROM User_table WHERE Username = "vdamianob"));

INSERT INTO Post(Img, Words, DT, Tag_id, User_id) Values("post-example-6.jpg", "Facciamo finta di gestire il traffico, un po' come fa l'ATR.", "2022-05-12 19:03:00", (SELECT Tag_id FROM Tag WHERE Game_name = "OpenTTD"), (SELECT User_id FROM User_table WHERE Username = "vdamianob"));

INSERT INTO Post(Img, Words, DT, Tag_id, User_id) Values("post-example-7.jpg", "Asdrubale 123 stella terapia lunare", "2022-05-12 19:04:00", (SELECT Tag_id FROM Tag WHERE Game_name = "Strongholds"), (SELECT User_id FROM User_table WHERE Username = "leonardo.randacio"));

INSERT INTO Post(Img, Words, DT, Tag_id, User_id) Values("post-example-8.jpg", "Facciamo finta di gestire il traffico, un po' come fa l'ATR.", "2022-05-12 19:06:00", (SELECT Tag_id FROM Tag WHERE Game_name = "Dominion"), (SELECT User_id FROM User_table WHERE Username = "vdamianob"));
-- inserting comments into commento table

INSERT INTO Comment(User_id, Post_id, Words, DT) Values((SELECT User_id FROM User_table WHERE Username = "vdamianob"), (SELECT Post_id FROM Post WHERE Img = "post-example-1.jpg"), "AHAHA hai proprio ragione", "2022-05-13 15:03:00");

INSERT INTO Comment(User_id, Post_id, Words, DT) Values((SELECT User_id FROM User_table WHERE Username = "leonardo.randacio"), (SELECT Post_id FROM Post WHERE Img = "post-example-1.jpg"), "Finis vitae sed non amoris", "2022-05-13 15:03:13");

INSERT INTO Comment(User_id, Post_id, Words, DT) Values((SELECT User_id FROM User_table WHERE Username = "filusbrius"), (SELECT Post_id FROM Post WHERE Img = "post-example-2.jpg"), "Ex vita discedo, tanquam ex hospitio, non tanquam ex domo", "2022-05-13 15:04:00");

-- inserting likes into mi_piace table

INSERT INTO Like_table(User_id, Post_id) VALUES ((SELECT User_id FROM User_table WHERE Username = "filusbrius"), (SELECT Post_id FROM Post WHERE Img = "post-example-1.jpg"));

INSERT INTO Like_table(User_id, Post_id) VALUES ((SELECT User_id FROM User_table WHERE Username = "filusbrius"), (SELECT Post_id FROM Post WHERE Img = "post-example-2.jpg"));

INSERT INTO Like_table(User_id, Post_id) VALUES ((SELECT User_id FROM User_table WHERE Username = "filusbrius"), (SELECT Post_id FROM Post WHERE Img = "post-example-3.jpg"));

INSERT INTO Like_table(User_id, Post_id) VALUES ((SELECT User_id FROM User_table WHERE Username = "leonardo.randacio"), (SELECT Post_id FROM Post WHERE Img = "post-example-2.jpg"));

INSERT INTO Like_table(User_id, Post_id) VALUES ((SELECT User_id FROM User_table WHERE Username = "vdamianob"), (SELECT Post_id FROM Post WHERE Img = "post-example-2.jpg"));

INSERT INTO Like_table(User_id, Post_id) VALUES ((SELECT User_id FROM User_table WHERE Username = "vdamianob"), (SELECT Post_id FROM Post WHERE Img = "post-example-7.jpg"));

INSERT INTO Like_table(User_id, Post_id) VALUES ((SELECT User_id FROM User_table WHERE Username = "leonardo.randacio"), (SELECT Post_id FROM Post WHERE Img = "post-example-7.jpg"));

INSERT INTO Like_table(User_id, Post_id) VALUES ((SELECT User_id FROM User_table WHERE Username = "vdamianob"), (SELECT Post_id FROM Post WHERE Img = "post-example-8.jpg"));

-- inserting follower into segue table

INSERT INTO Follow(Follower_User_id, Followed_User_id) VALUES((SELECT User_id FROM User_table WHERE Username = "vdamianob"), (SELECT User_id FROM User_table WHERE Username = "leonardo.randacio"));

INSERT INTO Follow(Follower_User_id, Followed_User_id) VALUES((SELECT User_id FROM User_table WHERE Username = "leonardo.randacio"), (SELECT User_id FROM User_table WHERE Username = "vdamianob"));

INSERT INTO Follow(Follower_User_id, Followed_User_id) VALUES((SELECT User_id FROM User_table WHERE Username = "filusbrius"), (SELECT User_id FROM User_table WHERE Username = "leonardo.randacio"));