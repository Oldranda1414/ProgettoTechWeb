-- file used to populate the database

use db_life_and_games;

-- inserting users into user_table

INSERT INTO User_table(Username, E_mail, Passwrd, Profile_img) Values("leonardo.randacio", "leTime_postednd@amail.com", "tonnoConForza", "profile-1.jpg");

INSERT INTO User_table(Username, E_mail, Passwrd, Profile_img)Values("vdamianob", "vdamianb@amail.com", "12345", "profile-2.jpg");

INSERT INTO User_table(Username, E_mail, Passwrd, Profile_img) Values("filusbrius", "filippo@amail.com", "ioSonoFilippo", "profile-3.jpg");

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

INSERT INTO Like_table(Post_id, User_id) VALUES ((SELECT User_id FROM User_table WHERE Username = "filusbrius"), (SELECT Post_id FROM Post WHERE Img = "post-example-1.jpg"));

INSERT INTO Like_table(Post_id, User_id) VALUES ((SELECT User_id FROM User_table WHERE Username = "filusbrius"), (SELECT Post_id FROM Post WHERE Img = "post-example-2.jpg"));

INSERT INTO Like_table(Post_id, User_id) VALUES ((SELECT User_id FROM User_table WHERE Username = "filusbrius"), (SELECT Post_id FROM Post WHERE Img = "post-example-3.jpg"));

INSERT INTO Like_table(Post_id, User_id) VALUES ((SELECT User_id FROM User_table WHERE Username = "leonardo.randacio"), (SELECT Post_id FROM Post WHERE Img = "post-example-2.jpg"));

INSERT INTO Like_table(Post_id, User_id) VALUES ((SELECT User_id FROM User_table WHERE Username = "vdamianob"), (SELECT Post_id FROM Post WHERE Img = "post-example-2.jpg"));

-- INSERT INTO Like_table(Post_id, User_id) VALUES ((SELECT User_id FROM User_table WHERE Username = "vdamianob"), (SELECT Post_id FROM Post WHERE Img = "post-example-7.jpg"));

INSERT INTO Like_table(Post_id, User_id) VALUES ((SELECT User_id FROM User_table WHERE Username = "leonardo.randacio"), (SELECT Post_id FROM Post WHERE Img = "post-example-7.jpg"));

INSERT INTO Like_table(Post_id, User_id) VALUES ((SELECT User_id FROM User_table WHERE Username = "vdamianob"), (SELECT Post_id FROM Post WHERE Img = "post-example-8.jpg"));

-- inserting follower into segue table

INSERT INTO Follow(Follower_User_id, Followed_User_id) VALUES((SELECT User_id FROM User_table WHERE Username = "vdamianob"), (SELECT User_id FROM User_table WHERE Username = "leonardo.randacio"));

INSERT INTO Follow(Follower_User_id, Followed_User_id) VALUES((SELECT User_id FROM User_table WHERE Username = "filusbrius"), (SELECT User_id FROM User_table WHERE Username = "leonardo.randacio"));