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

INSERT INTO Tag(Game_name) VALUES ("Ninja Town");

INSERT INTO Tag(Game_name) VALUES ("Dark Souls");

INSERT INTO Tag(Game_name) VALUES ("RPG Maker");

INSERT INTO Tag(Game_name) VALUES ("Dota 2");

INSERT INTO Tag(Game_name) VALUES ("Mario Kart");

INSERT INTO Tag(Game_name) VALUES ("Battlefield Heroes");

INSERT INTO Tag(Game_name) VALUES ("Brothers in Arms 2");

INSERT INTO Tag(Game_name) VALUES ("Paper, please");

-- inserting posts into post table

INSERT INTO Post(Img, Words, DT, Tag_id, User_id) Values("post-example-1.jpg", "guardate che figo mamma mia", "2022-01-07 12:00:00", (SELECT Tag_id FROM Tag WHERE Game_name = "SimCity"), (SELECT User_id FROM User_table WHERE Username = "leonardo.randacio"));

INSERT INTO Post(Img, Words, DT, Tag_id, User_id) Values("post-example-2.jpg", "bug incredibile in Driver 2, da non credere", "2022-01-07 13:00:00", (SELECT Tag_id FROM Tag WHERE Game_name = "Driver"), (SELECT User_id FROM User_table WHERE Username = "vdamianob"));

INSERT INTO Post(Img, Words, DT, Tag_id, User_id) Values("post-example-3.jpg", "Su PS1 e 2", "2022-01-08 10:15:00", (SELECT Tag_id FROM Tag WHERE Game_name = "Poy Poy"), (SELECT User_id FROM User_table WHERE Username = "leonardo.randacio"));

INSERT INTO Post(Img, Words, DT, Tag_id, User_id) Values("post-example-4.jpg", "Stravinta questa partita contro uno che, a quanto pare, blablabla!", "2022-01-10 10:04:00", (SELECT Tag_id FROM Tag WHERE Game_name = "Dominion"), (SELECT User_id FROM User_table WHERE Username = "leonardo.randacio"));

INSERT INTO Post(Img, Words, DT, Tag_id, User_id) Values("post-example-5.jpg", "Ho per caso rispolverato Strongholds Crusader, un vecchio gioco della FireFly Studios. E questo è stato il risultato", "2022-05-12 15:03:00", (SELECT Tag_id FROM Tag WHERE Game_name = "Strongholds"), (SELECT User_id FROM User_table WHERE Username = "vdamianob"));

INSERT INTO Post(Img, Words, DT, Tag_id, User_id) Values("post-example-6.jpg", "Facciamo finta di gestire il traffico, un po' come fa l'ATR.", "2022-05-12 19:03:00", (SELECT Tag_id FROM Tag WHERE Game_name = "OpenTTD"), (SELECT User_id FROM User_table WHERE Username = "vdamianob"));

INSERT INTO Post(Img, Words, DT, Tag_id, User_id) Values("post-example-7.jpg", "Asdrubale 123 stella terapia lunare", "2022-05-12 19:04:00", (SELECT Tag_id FROM Tag WHERE Game_name = "Strongholds"), (SELECT User_id FROM User_table WHERE Username = "leonardo.randacio"));

INSERT INTO Post(Img, Words, DT, Tag_id, User_id) Values("post-example-8.jpg", "Facciamo finta di gestire il traffico, un po' come fa l'ATR.", "2022-05-12 19:06:00", (SELECT Tag_id FROM Tag WHERE Game_name = "Dominion"), (SELECT User_id FROM User_table WHERE Username = "vdamianob"));

INSERT INTO Post(Img, Words, DT, Tag_id, User_id) Values("post-example-12.jpg", "Errare humanum est, perseverare ovest", "2022-01-07 14:00:00", (SELECT Tag_id FROM Tag WHERE Game_name = "Brothers in Arms 2"), (SELECT User_id FROM User_table WHERE Username = "vdamianob"));

INSERT INTO Post(Img, Words, DT, Tag_id, User_id) Values("post-example-13.jpg", "nocciole piemonte coop buonissime, ma questo è rpg-maker", "2023-01-07 12:20:00", (SELECT Tag_id FROM Tag WHERE Game_name = "RPG Maker"), (SELECT User_id FROM User_table WHERE Username = "vdamianob"));

INSERT INTO Post(Img, Words, DT, Tag_id, User_id) Values("post-example-14.jpg", "Chiusura dei server, il gioco non sarà più online dal 12.12.2012", "2023-01-07 11:20:00", (SELECT Tag_id FROM Tag WHERE Game_name = "Battlefield Heroes"), (SELECT User_id FROM User_table WHERE Username = "leonardo.randacio"));

INSERT INTO Post(Img, Words, DT, Tag_id, User_id) Values("post-example-15.jpg", "Lore & blablabla, Glicemille crema mani non è come te l'aspetti", "2019-01-07 12:20:00", (SELECT Tag_id FROM Tag WHERE Game_name = "Dark Souls"), (SELECT User_id FROM User_table WHERE Username = "vdamianob"));

INSERT INTO Post(Img, Words, DT, Tag_id, User_id) Values("post-example-16.jpg", "For nintendo DS, un classico defence tower con una vena simpatica", "2021-01-07 11:20:00", (SELECT Tag_id FROM Tag WHERE Game_name = "Ninja Town"), (SELECT User_id FROM User_table WHERE Username = "leonardo.randacio"));

INSERT INTO Post(Img, Words, DT, Tag_id, User_id) Values("post-example-17.jpg", "Sembra del rally ma non lo è, livello 13", "2023-01-07 12:20:00", (SELECT Tag_id FROM Tag WHERE Game_name = "Mario Kart"), (SELECT User_id FROM User_table WHERE Username = "vdamianob"));

INSERT INTO Post(Img, Words, DT, Tag_id, User_id) Values("post-example-18.jpg", "Mi sono bloccato, qualcuno nei commenti sa come andare avanti? Per favore...!", "2023-01-07 17:33:00", (SELECT Tag_id FROM Tag WHERE Game_name = "Paper, please"), (SELECT User_id FROM User_table WHERE Username = "vdamianob"));

INSERT INTO Post(Img, Words, DT, Tag_id, User_id) Values("post-example-19.jpg", "Una disfatta su tutti i fronti, Gavettone parabola e tanti fiordi.", "2021-05-07 19:10:00", (SELECT Tag_id FROM Tag WHERE Game_name = "Dota 2"), (SELECT User_id FROM User_table WHERE Username = "filusbrius"));

-- inserting comments into commento table

INSERT INTO Comment(User_id, Post_id, Words, DT) Values((SELECT User_id FROM User_table WHERE Username = "vdamianob"), (SELECT Post_id FROM Post WHERE Img = "post-example-1.jpg"), "AHAHA hai proprio ragione", "2022-05-13 15:03:00");

INSERT INTO Comment(User_id, Post_id, Words, DT) Values((SELECT User_id FROM User_table WHERE Username = "leonardo.randacio"), (SELECT Post_id FROM Post WHERE Img = "post-example-1.jpg"), "Finis vitae sed non amoris", "2022-05-13 15:03:13");

INSERT INTO Comment(User_id, Post_id, Words, DT) Values((SELECT User_id FROM User_table WHERE Username = "filusbrius"), (SELECT Post_id FROM Post WHERE Img = "post-example-2.jpg"), "Ex vita discedo, tanquam ex hospitio, non tanquam ex domo", "2022-05-13 15:04:00");

INSERT INTO Comment(User_id, Post_id, Words, DT) Values((SELECT User_id FROM User_table WHERE Username = "filusbrius"), (SELECT Post_id FROM Post WHERE Img = "post-example-18.jpg"), "Devi fare x, y, ma poi anche z se no non funziona. E buona notte al secchio.", "2023-05-26 15:01:00");

INSERT INTO Comment(User_id, Post_id, Words, DT) Values((SELECT User_id FROM User_table WHERE Username = "vdamianob"), (SELECT Post_id FROM Post WHERE Img = "post-example-18.jpg"), "Secondo me devi parlare una lingua slava, invece", "2023-05-26 15:02:00");

INSERT INTO Comment(User_id, Post_id, Words, DT) Values((SELECT User_id FROM User_table WHERE Username = "vdamianob"), (SELECT Post_id FROM Post WHERE Img = "post-example-14.jpg"), "E' un vero peccato, spero non sia vero", "2023-05-26 15:01:00");

INSERT INTO Comment(User_id, Post_id, Words, DT) Values((SELECT User_id FROM User_table WHERE Username = "filusbrius"), (SELECT Post_id FROM Post WHERE Img = "post-example-16.jpg"), "Mi piace scrivere commenti perchè è il mio forte", "2023-04-26 15:01:00");

INSERT INTO Comment(User_id, Post_id, Words, DT) Values((SELECT User_id FROM User_table WHERE Username = "filusbrius"), (SELECT Post_id FROM Post WHERE Img = "post-example-15.jpg"), "Mi piace molto, sono d'accordo con te.", "2023-05-26 15:01:00");

INSERT INTO Comment(User_id, Post_id, Words, DT) Values((SELECT User_id FROM User_table WHERE Username = "vdamianob"), (SELECT Post_id FROM Post WHERE Img = "post-example-12.jpg"), "6 un manikoldo, f + bello fare come ho ftto io", "2023-02-26 15:09:00");

INSERT INTO Comment(User_id, Post_id, Words, DT) Values((SELECT User_id FROM User_table WHERE Username = "filusbrius"), (SELECT Post_id FROM Post WHERE Img = "post-example-13.jpg"), "Tutti erano innamorati di Clo: Pio Pis ne era pazzo. Soltanto Filimario Dublè non era innamorato di Clotilde", "2023-05-26 15:01:00");

INSERT INTO Comment(User_id, Post_id, Words, DT) Values((SELECT User_id FROM User_table WHERE Username = "vdamianob"), (SELECT Post_id FROM Post WHERE Img = "post-example-14.jpg"), "Chi sogna nuovi geranei?", "2023-05-21 12:00:30");

-- inserting likes into Like_table

INSERT INTO Like_table(User_id, Post_id) VALUES ((SELECT User_id FROM User_table WHERE Username = "filusbrius"), (SELECT Post_id FROM Post WHERE Img = "post-example-1.jpg"));

INSERT INTO Like_table(User_id, Post_id) VALUES ((SELECT User_id FROM User_table WHERE Username = "filusbrius"), (SELECT Post_id FROM Post WHERE Img = "post-example-2.jpg"));

INSERT INTO Like_table(User_id, Post_id) VALUES ((SELECT User_id FROM User_table WHERE Username = "filusbrius"), (SELECT Post_id FROM Post WHERE Img = "post-example-3.jpg"));

INSERT INTO Like_table(User_id, Post_id) VALUES ((SELECT User_id FROM User_table WHERE Username = "leonardo.randacio"), (SELECT Post_id FROM Post WHERE Img = "post-example-2.jpg"));

INSERT INTO Like_table(User_id, Post_id) VALUES ((SELECT User_id FROM User_table WHERE Username = "vdamianob"), (SELECT Post_id FROM Post WHERE Img = "post-example-2.jpg"));

INSERT INTO Like_table(User_id, Post_id) VALUES ((SELECT User_id FROM User_table WHERE Username = "vdamianob"), (SELECT Post_id FROM Post WHERE Img = "post-example-7.jpg"));

INSERT INTO Like_table(User_id, Post_id) VALUES ((SELECT User_id FROM User_table WHERE Username = "leonardo.randacio"), (SELECT Post_id FROM Post WHERE Img = "post-example-7.jpg"));

INSERT INTO Like_table(User_id, Post_id) VALUES ((SELECT User_id FROM User_table WHERE Username = "vdamianob"), (SELECT Post_id FROM Post WHERE Img = "post-example-8.jpg"));

INSERT INTO Like_table(User_id, Post_id) VALUES ((SELECT User_id FROM User_table WHERE Username = "vdamianob"), (SELECT Post_id FROM Post WHERE Img = "post-example-12.jpg"));

INSERT INTO Like_table(User_id, Post_id) VALUES ((SELECT User_id FROM User_table WHERE Username = "filusbrius"), (SELECT Post_id FROM Post WHERE Img = "post-example-12.jpg"));

INSERT INTO Like_table(User_id, Post_id) VALUES ((SELECT User_id FROM User_table WHERE Username = "leonardo.randacio"), (SELECT Post_id FROM Post WHERE Img = "post-example-12.jpg"));

INSERT INTO Like_table(User_id, Post_id) VALUES ((SELECT User_id FROM User_table WHERE Username = "filusbrius"), (SELECT Post_id FROM Post WHERE Img = "post-example-15.jpg"));

INSERT INTO Like_table(User_id, Post_id) VALUES ((SELECT User_id FROM User_table WHERE Username = "filusbrius"), (SELECT Post_id FROM Post WHERE Img = "post-example-19.jpg"));

INSERT INTO Like_table(User_id, Post_id) VALUES ((SELECT User_id FROM User_table WHERE Username = "filusbrius"), (SELECT Post_id FROM Post WHERE Img = "post-example-14.jpg"));

INSERT INTO Like_table(User_id, Post_id) VALUES ((SELECT User_id FROM User_table WHERE Username = "vdamianob"), (SELECT Post_id FROM Post WHERE Img = "post-example-14.jpg"));

INSERT INTO Like_table(User_id, Post_id) VALUES ((SELECT User_id FROM User_table WHERE Username = "leonardo.randacio"), (SELECT Post_id FROM Post WHERE Img = "post-example-14.jpg"));

INSERT INTO Like_table(User_id, Post_id) VALUES ((SELECT User_id FROM User_table WHERE Username = "leonardo.randacio"), (SELECT Post_id FROM Post WHERE Img = "post-example-19.jpg"));

-- inserting follower into Follow table

INSERT INTO Follow(Follower_User_id, Followed_User_id) VALUES((SELECT User_id FROM User_table WHERE Username = "vdamianob"), (SELECT User_id FROM User_table WHERE Username = "leonardo.randacio"));

INSERT INTO Follow(Follower_User_id, Followed_User_id) VALUES((SELECT User_id FROM User_table WHERE Username = "leonardo.randacio"), (SELECT User_id FROM User_table WHERE Username = "vdamianob"));

INSERT INTO Follow(Follower_User_id, Followed_User_id) VALUES((SELECT User_id FROM User_table WHERE Username = "filusbrius"), (SELECT User_id FROM User_table WHERE Username = "leonardo.randacio"));

-- inserting notifications into notifications TABLE

INSERT INTO Notifications(Notification_type, User_id, Follower_User_id, DT) VALUES("follower", (SELECT User_id FROM User_table WHERE Username = "leonardo.randacio"), (SELECT User_id FROM User_table WHERE Username = "vdamianob"), "2022-05-12 15:03:00");

INSERT INTO Notifications(Notification_type, User_id, Follower_User_id, DT) VALUES("follower", (SELECT User_id FROM User_table WHERE Username = "vdamianob"), (SELECT User_id FROM User_table WHERE Username = "leonardo.randacio"), "2022-05-11 15:03:00");

INSERT INTO Notifications(Notification_type, User_id, Follower_User_id, DT) VALUES("follower", (SELECT User_id FROM User_table WHERE Username = "leonardo.randacio"), (SELECT User_id FROM User_table WHERE Username = "filusbrius"), "2022-05-11 14:03:00");

INSERT INTO Notifications(Notification_type, User_id, Liked_Post_id, Like_User_id, DT) VALUES("like", (SELECT User_id FROM User_table WHERE Username = "leonardo.randacio"), (SELECT Post_id FROM Post WHERE Img = "post-example-1.jpg"), (SELECT User_id FROM User_table WHERE Username = "filusbrius"), "2022-05-11 20:03:00");

INSERT INTO Notifications(Notification_type, User_id, Comment_id, DT) VALUES("comment", (SELECT User_id FROM User_table WHERE Username = "leonardo.randacio"), (SELECT Comment_id FROM Comment WHERE DT = "2022-05-13 15:03:00"), "2022-05-13 15:03:00");
