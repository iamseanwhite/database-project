Create table business(
id int PRIMARY KEY AUTO_INCREMENT,
name VARCHAR(255) NOT NULL,
field VARCHAR(255) NOT NULL,
location VARCHAR(255) NOT NULL
)ENGINE=InnoDB;

Create table social_madia_platform(
id int PRIMARY KEY AUTO_INCREMENT,
name VARCHAR(255) NOT NULL
)ENGINE=InnoDB;

Create table post(
id int PRIMARY KEY AUTO_INCREMENT,
time_posted timestamp NOT NULL,
character_length int NOT NULL
)ENGINE=InnoDB;

Create table content(
id int PRIMARY KEY AUTO_INCREMENT,
type VARCHAR(255) NOT NULL
)ENGINE=InnoDB;

Create table feedback(
id int PRIMARY KEY AUTO_INCREMENT,
name VARCHAR(255) NOT NULL
)ENGINE=InnoDB;


CREATE TABLE buisness_social_media(
bid int,
smpid int,
PRIMARY KEY (bid, smpid),
FOREIGN KEY (bid) REFERENCES business (id),
FOREIGN KEY (smid) REFERENCES social_madia_platform (id)
)ENGINE = InnoDB;
