-- file used to populate the database

use db_life_and_games;

-- inserting users into user_table

-- password is "tonnoConForza"
INSERT INTO User_table(Username, E_mail, Passwrd, Profile_img, Salt) Values("leonardo.randacio", "leTime_postednd@amail.com", "0f288564280541542c47da174037af1aef9aaf3b38046fcdb32d3b8e1dad58e9b4f0f91530f3fc33e893f2b26a970bb496533d4a6161194fe0cd469dacbc69a4", "profile-1.jpg", "c77b9a5b198ae0ef00973614454a0a6f3b9f2a9868948719c8727e29c09b0f4f8e480b49e4cb58908cd61b48dd725c6229e7491c93025f61dae768ecdd876fb7");
-- password is "12345"
INSERT INTO User_table(Username, E_mail, Passwrd, Profile_img, Salt) Values("vdamianob", "vdamianb@amail.com", "a7bddfb79be9f53ff4b81ec410fddcea6cd7cfd09cab0b543b990043f8dfdd901c8062975c8579233adf249cc7f4f0e430b75a3bfcd2a8677697e0b2fdbdcf23", "profile-2.jpg", "555b07c4a054e9b8362b3655bcd770207022c28616a0707d7d662a2929d320de5efb64d77aa3eb54b01428f8e6ca3f87123b64f74a5fbb4f6e0d8e69b83248a6"); 
-- password is "ioSonoFilippo"
INSERT INTO User_table(Username, E_mail, Passwrd, Profile_img, Salt) Values("filusbrius", "filippo@amail.com", "d2adeb82802938a2e111f30654277ed86a91c0627abeac9e3bfe60b9e95dfd133f032b58383841d1f0de8f441ce44965407b8daf43e6f00759b3e1f1b52752c9", "profile-3.jpg", "fe84c274287112ae88b601d447ee3c159671f6216ddc2f6bff7339eff84194ae9f527d5b6506a9ebf8df350d17a5bdee67b48545dab0b02256bb67a3b5c4e1c5");

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

INSERT INTO Post(Img, Words, Day_posted, Time_posted, Tag_id, User_id) Values("post-example-1.jpg", "guardate che figo mamma mia", "07/01/2022", "14:00", (SELECT Tag_id FROM Tag WHERE Game_name = "SimCity"), (SELECT User_id FROM User_table WHERE Username = "leonardo.randacio"));

INSERT INTO Post(Img, Words, Day_posted, Time_posted, Tag_id, User_id) Values("post-example-2.jpg", "bug incredibile in Driver 2, da non credere", "08/02/2022", "13:00", (SELECT Tag_id FROM Tag WHERE Game_name = "Driver"), (SELECT User_id FROM User_table WHERE Username = "vdamianob"));

INSERT INTO Post(Img, Words, Day_posted, Time_posted, Tag_id, User_id) Values("post-example-3.jpg", "Su PS1 e 2", "05/01/2020", "10:15", (SELECT Tag_id FROM Tag WHERE Game_name = "Poy Poy"), (SELECT User_id FROM User_table WHERE Username = "leonardo.randacio"));

INSERT INTO Post(Img, Words, Day_posted, Time_posted, Tag_id, User_id) Values("post-example-4.jpg", "Stravinta questa partita contro uno che, a quanto pare, blablabla!", "01/01/2021", "10:04", (SELECT Tag_id FROM Tag WHERE Game_name = "Dominion"), (SELECT User_id FROM User_table WHERE Username = "leonardo.randacio"));

INSERT INTO Post(Img, Words, Day_posted, Time_posted, Tag_id, User_id) Values("post-example-5.jpg", "Ho per caso rispolverato Strongholds Crusader, un vecchio gioco della FireFly Studios. E questo è stato il risultato", "02/08/2022", "15:03", (SELECT Tag_id FROM Tag WHERE Game_name = "Strongholds"), (SELECT User_id FROM User_table WHERE Username = "vdamianob"));

INSERT INTO Post(Img, Words, Day_posted, Time_posted, Tag_id, User_id) Values("post-example-6.jpg", "Facciamo finta di gestire il traffico, un po' come fa l'ATR.", "01/08/2022", "19:03", (SELECT Tag_id FROM Tag WHERE Game_name = "OpenTTD"), (SELECT User_id FROM User_table WHERE Username = "vdamianob"));

INSERT INTO Post(Img, Words, Day_posted, Time_posted, Tag_id, User_id) Values("post-example-7.jpg", "Asdrubale 123 stella terapia lunare", "02/08/2022", "19:04", (SELECT Tag_id FROM Tag WHERE Game_name = "Strongholds"), (SELECT User_id FROM User_table WHERE Username = "leonardo.randacio"));

INSERT INTO Post(Img, Words, Day_posted, Time_posted, Tag_id, User_id) Values("post-example-8.jpg", "Facciamo finta di gestire il traffico, un po' come fa l'ATR.", "02/08/2022", "19:06", (SELECT Tag_id FROM Tag WHERE Game_name = "Dominion"), (SELECT User_id FROM User_table WHERE Username = "vdamianob"));
-- inserting comments into commento table

INSERT INTO Comment(User_id, Post_id, Words, Day_posted, Time_posted) Values((SELECT User_id FROM User_table WHERE Username = "vdamianob"), (SELECT Post_id FROM Post WHERE Img = "post-example-1.jpg"), "AHAHA hai proprio ragione", "02/08/2022", "15:03");

INSERT INTO Comment(User_id, Post_id, Words, Day_posted, Time_posted) Values((SELECT User_id FROM User_table WHERE Username = "leonardo.randacio"), (SELECT Post_id FROM Post WHERE Img = "post-example-1.jpg"), "Finis vitae sed non amoris", "02/08/2022", "15:03");

INSERT INTO Comment(User_id, Post_id, Words, Day_posted, Time_posted) Values((SELECT User_id FROM User_table WHERE Username = "filusbrius"), (SELECT Post_id FROM Post WHERE Img = "post-example-2.jpg"), "Ex vita discedo, tanquam ex hospitio, non tanquam ex domo", "02/08/2022", "15:03");

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

INSERT INTO Follow(Follower_User_id, Followed_User_id) VALUES((SELECT User_id FROM User_table WHERE Username = "filusbrius"), (SELECT User_id FROM User_table WHERE Username = "leonardo.randacio"));