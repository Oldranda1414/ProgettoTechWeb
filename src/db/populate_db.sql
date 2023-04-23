-- file used to populate the database

use db_life_and_games;

-- inserting users into user_table

-- password is "tonnoConForza"
INSERT INTO User_table(Username, E_mail, Passwrd, Profile_img, Salt) Values("leonardo.randacio", "leTime_postednd@amail.com", "8282f881f260443ae6c87850444e403a0162be6c8f3febf23b5fd36b1300c3be53e7270f6b3ae72bdf15bfcb10d60f90d908c42d5300f1d5fad069e6bb3def5b", "profile-1.jpg", "13b45e5adaf27b8f714adf93afd449ace51a5d6835be924695ff1e9791b06ec0ccebe0dd62108e5eae47329615b390615a2b5e9ef3a40ccdd12f44410f628db3");
-- password is "12345"
INSERT INTO User_table(Username, E_mail, Passwrd, Profile_img, Salt) Values("vdamianob", "vdamianb@amail.com", "1da1555d361cdbeb61ab92a8c8a050694792e927ea1592adf8a49300b71d910ba855e9bae0d6ffc31da8a3c2155399c818e065e852447e3f5a8cc89210d1363f", "profile-2.jpg", "50c82fc0b73d63e2c0b76bbb30e7ff726842ab0b488a162ff2a206d0b25232551d8574c6673ce5a2bc243e1bad61b2c9c8f4d2f851d6e498ef3b70174dbf9b0e"); 
-- password is "ioSonoFilippo"
INSERT INTO User_table(Username, E_mail, Passwrd, Profile_img, Salt) Values("filusbrius", "filippo@amail.com", "baf721d375d47be7fac94792e19f3f572e8f6a1be32adf31aedcab1e8597af99c1c731bb2d12034bf0f640bd024e6faf90584a20baa9305dd7d6b87c9b256efc", "profile-3.jpg", "d533c310d12773ef9ee9b589a1b0f805c7a67a55f8e36231175eb7495abb245a8b75afc304cad4d0cd84e338b2693744ac024c9208d4d44bbcc164827afb7d04");

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