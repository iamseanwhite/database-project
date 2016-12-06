Create table business(
id int PRIMARY KEY AUTO_INCREMENT,
name VARCHAR(255) NOT NULL,
field VARCHAR(255) NOT NULL,
location VARCHAR(255) NOT NULL
)ENGINE=InnoDB;

Create table social_media_platform(
id int PRIMARY KEY AUTO_INCREMENT,
name VARCHAR(255) NOT NULL
)ENGINE=InnoDB;

Create table post(
id int PRIMARY KEY AUTO_INCREMENT,
time_posted timestamp NOT NULL,
character_length int NOT NULL,
business int NOT NULL,
FOREIGN KEY (business) REFERENCES business (id) 
)ENGINE=InnoDB;

Create table content(
id int PRIMARY KEY AUTO_INCREMENT,
type VARCHAR(255) NOT NULL
)ENGINE=InnoDB;

Create table feedback(
id int PRIMARY KEY AUTO_INCREMENT,
name VARCHAR(255) NOT NULL
)ENGINE=InnoDB;


CREATE TABLE business_social_media(
bid int,
smpid int,
PRIMARY KEY (bid, smpid),
FOREIGN KEY (bid) REFERENCES business (id) ON DELETE CASCADE,
FOREIGN KEY (smpid) REFERENCES social_media_platform (id) ON DELETE CASCADE
)ENGINE = InnoDB;

CREATE table post_content(
pid int,
cid int,
PRIMARY KEY (pid, cid),
FOREIGN KEY (pid) REFERENCES post (id) ON DELETE CASCADE,
FOREIGN KEY (cid) REFERENCES content (id) ON DELETE CASCADE
)ENGINE = InnoDB;

CREATE table post_feedback(
pid int,
fid int,
PRIMARY KEY (pid, fid),
FOREIGN KEY (pid) REFERENCES post (id) ON DELETE CASCADE,
FOREIGN KEY (fid) REFERENCES feedback (id) ON DELETE CASCADE
)ENGINE = InnoDB;
