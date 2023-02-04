-- file used to populate the database

use db_life_and_games;

-- inserting users into user_table

INSERT INTO User_table(Username, E_mail, Passwrd, Profile_img) Values("leonardo.randacio", "leTime_postednd@amail.com", "tonnoConForza", "profile-1.jpg");

INSERT INTO User_table(Username, E_mail, Passwrd, Profile_img)Values("vdamianob", "vdamianb@amail.com", "12345", "profile-2.jpg");

INSERT INTO User_table(Username, E_mail, Passwrd, Profile_img) Values("filusbrius", "filippo@amail.com", "ioSonoFilippo", "profile-3.jpg");

-- inserting tags into Tag table

INSERT INTO Tag(Game_name) VALUES ("Final Fantasy");

INSERT INTO Tag(Game_name) VALUES ("Grand Theft Auto");

-- inserting posts into post table

INSERT INTO Post(Img, Words, Day_posted, Time_posted, Tag_id, User_id) Values("post-example-1.jpg", "guardate che figo mamma mia", "07/01/2022", "14:00", (SELECT Tag_id FROM Tag WHERE Game_name = "Final Fantasy"), (SELECT User_id FROM User_table WHERE Username = "leonardo.randacio"));

INSERT INTO Post(Img, Words, Day_posted, Time_posted, Tag_id, User_id) Values("post-example-2.jpg", "bug incredibile in Grand Theft Auto, da non credere", "08/02/2022", "13:00", (SELECT Tag_id FROM Tag WHERE Game_name = "Grand Theft Auto"), (SELECT User_id FROM User_table WHERE Username = "vdamianob"));

-- inserting comments into commento table

INSERT INTO Comment(User_id, Post_id, Words) Values((SELECT User_id FROM User_table WHERE Username = "vdamianob"), (SELECT Post_id FROM Post WHERE Img = "post-example-1.jpg"), "AHAHA hai proprio ragione");

-- inserting likes into mi_piace table

INSERT INTO Like_table(Post_id, User_id) VALUES ((SELECT User_id FROM User_table WHERE Username = "vdamianob"), (SELECT Post_id FROM Post WHERE Img = "post-example-1.jpg"));

-- inserting follower into segue table

INSERT INTO Follow(Follower_User_id, Followed_User_id) VALUES((SELECT User_id FROM User_table WHERE Username = "vdamianob"), (SELECT User_id FROM User_table WHERE Username = "leonardo.randacio"));
