-- file used to populate the database

use db_progetto_tech_web;

-- inserting users into user_table

INSERT INTO User_table(Username, E_mail, Passwrd, Immagine_profilo) Values("leonardo.randacio", "leorand@amail.com", "tonnoConForza", "profile-1.jpg");

INSERT INTO User_table(Username, E_mail, Passwrd, Immagine_profilo)Values("vdamianob", "vdamianb@amail.com", "12345", "profile-2.jpg");

INSERT INTO User_table(Username, E_mail, Passwrd, Immagine_profilo) Values("filusbrius", "filippo@amail.com", "ioSonoFilippo", "profile-3.jpg");

-- inserting tags into Tag table

INSERT INTO Tag(Nome_gioco) VALUES ("Final Fantasy");

INSERT INTO Tag(Nome_gioco) VALUES ("Grand Theft Auto");

-- inserting posts into post table

INSERT INTO Post(Immagine, Testo, Giorno, Ora, Tag_id, User_id) Values("post-example-1.jpg", "guardate che figo mamma mia", "07/01/2022", "14:00", (SELECT Tag_id FROM Tag WHERE Nome_gioco = "Final Fantasy"), (SELECT User_id FROM User_table WHERE Username = "leonardo.randacio"));

INSERT INTO Post(Immagine, Testo, Giorno, Ora, Tag_id, User_id) Values("post-example-2.jpg", "bug incredibile in Grand Theft Auto, da non credere", "08/02/2022", "13:00", (SELECT Tag_id FROM Tag WHERE Nome_gioco = "Grand Theft Auto"), (SELECT User_id FROM User_table WHERE Username = "vdamianob"));

-- inserting comments into commento table

INSERT INTO Commento(User_id, Post_id, Testo) Values((SELECT User_id FROM User_table WHERE Username = "vdamianob"), (SELECT Post_id FROM Post WHERE Immagine = "post-example-1.jpg"), "AHAHA hai proprio ragione");

-- inserting likes into mi_piace table

INSERT INTO Mi_piace(Post_id, User_id) VALUES ((SELECT User_id FROM User_table WHERE Username = "vdamianob"), (SELECT Post_id FROM Post WHERE Immagine = "post-example-1.jpg"));

-- inserting follower into segue table

INSERT INTO Segue(Seguace_User_id, Seguito_User_id) VALUES((SELECT User_id FROM User_table WHERE Username = "vdamianob"), (SELECT User_id FROM User_table WHERE Username = "leonardo.randacio"));
