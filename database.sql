CREATE TABLE IF NOT EXISTS `user`(
    `email` varchar(30) PRIMARY KEY,
    `fname` varchar(30) NOT NULL,
    `lname` varchar(30) NOT NULL,
    `password` varchar(10) NOT NULL,
    `designation` varchar(10) DEFAULT NULL,
    `image` text  DEFAULT NULL
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `category`(
    `cat_id` int(30) PRIMARY KEY AUTO_INCREMENT ,
    `cat_name` varchar(30) NOT NULL,
    `cat_image` text DEFAULT NULL
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `question`(
    `ques_id` int(30) PRIMARY KEY AUTO_INCREMENT,
    `email` varchar(30) REFERENCES `user`(`email`)ON DELETE CASCADE ON UPDATE CASCADE ,
    `cat_id` int(30) REFERENCES `category`(`cat_id`)ON DELETE CASCADE ON UPDATE CASCADE ,
    `subtopic` varchar(10) DEFAULT NULL,
    `content` text NOT NULL,
    `datetime` datetime DEFAULT NULL
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `answer`(
    `ans_id` int(30) PRIMARY KEY AUTO_INCREMENT,
    `email` varchar(30) REFERENCES `user`(`email`) ON DELETE CASCADE ON UPDATE CASCADE,
    `ques_id` int(30) REFERENCES `question`(`ques_id`)ON DELETE SET NULL ON UPDATE CASCADE,
    `content` text NOT NULL,
    `datetime` datetime DEFAULT NULL,
    `upvotes` int(12) DEFAULT 0
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `comment`(
    `com_id` int(30) PRIMARY KEY AUTO_INCREMENT,
    `email` varchar(30) REFERENCES `user`(`email`) ON DELETE CASCADE ON UPDATE CASCADE,
    `ans_id` int(30) REFERENCES `answer`(`ans_id`)ON DELETE SET NULL ON UPDATE CASCADE,
    `content` varchar(100) NOT NULL,
    `datetime` datetime DEFAULT NULL
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `category_def`(
    `def_id` int(30) PRIMARY KEY AUTO_INCREMENT,
    `cat_id` int(30) REFERENCES `category`(`cat_id`)ON DELETE CASCADE ON UPDATE CASCADE ,
    `content` varchar(100) NOT NULL
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;



CREATE TABLE IF NOT EXISTS `liked`(
    `like_id` int(30) PRIMARY KEY AUTO_INCREMENT,
    `email` varchar(30) REFERENCES `user`(`email`) ON DELETE CASCADE ON UPDATE CASCADE,
    `ans_id` int(30) REFERENCES `answer`(`ans_id`)ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

/*Insert into Category defination*/
INSERT INTO `user`(`email`, `fname`, `lname`, `password`, `designation`, `image`) VALUES ('radhachirania4@gmail.com','Radha','Chirania','rads1234','Expert','');

/*Insert into user table*/
INSERT INTO `user`(`email`, `fname`, `lname`, `password`, `designation`, `image`) VALUES ('radhachirania4@gmail.com','Radha','Chirania','rads1234','Expert','');
INSERT INTO `user`(`email`, `fname`, `lname`, `password`, `designation`, `image`) VALUES ('pragyasaraswat@gmail.com','Pragya','Saraswat','p1234','Teacher','');
INSERT INTO `user`(`email`, `fname`, `lname`, `password`, `designation`, `image`) VALUES ('spriyanka@gmail.com','Priyanka','Singh','sp1234','Student','');
INSERT INTO `user`(`email`, `fname`, `lname`, `password`, `designation`, `image`) VALUES ('barkhachirania4@gmail.com','Barkha','Chirania','barkha23@@','Student','');

/*Insert into category table*/
INSERT INTO `category`(`cat_name`) VALUES ('DATA STRUCTURE');
INSERT INTO `category`(`cat_name`) VALUES ('DESIGN N ANALYSIS OF ALGORITHM');
INSERT INTO `category`(`cat_name`) VALUES ('THEORY OF COMPUTATION');
INSERT INTO `category`(`cat_name`) VALUES ('NETWORKING');
INSERT INTO `category`(`cat_name`) VALUES ('OBJECT ORIENTED PROGRAMMING');
INSERT INTO `category`(`cat_name`) VALUES ('C');
INSERT INTO `category`(`cat_name`) VALUES ('C++');
INSERT INTO `category`(`cat_name`) VALUES ('JAVA');
INSERT INTO `category`(`cat_name`) VALUES ('HTML');
INSERT INTO `category`(`cat_name`) VALUES ('DBMS');

/*Insert into question table*/
INSERT INTO `question`(`email`, `cat_id`, `subtopic`, `content`, `datetime`) VALUES ('spriyanka@gmail.com','8','Thread','What is multithreading','2019/02/18 01:01:02');
INSERT INTO `question`(`email`, `cat_id`, `subtopic`, `content`, `datetime`) VALUES ('spriyanka@gmail.com','1','Tree','What are Trees','2019/01/18 12:01:02');
INSERT INTO `question`(`email`, `cat_id`, `subtopic`, `content`, `datetime`) VALUES ('pragyasaraswat@gmail.com','2','Backtrack','What is backtracking','2018/02/18 02:01:02');
INSERT INTO `question`(`email`, `cat_id`, `subtopic`, `content`, `datetime`) VALUES ('radhachirania4@gmail.com','1','Stack','What is Stack','2019/02/18 01:01:02');

/*Insert into ANSWER table*/
INSERT INTO `answer`(`email`, `ques_id`, `content`, `datetime`) VALUES ('radhachirania4@gmail.com','1','this is multithreading','2019/02/18 02:01:02');
INSERT INTO `answer`(`email`, `ques_id`, `content`, `datetime`) VALUES ('pragyasaraswat@gmail.com','2','this is trees','2019/02/18 13:01:02');
INSERT INTO `answer`(`email`, `ques_id`, `content`, `datetime`) VALUES ('radhachirania4@gmail.com','3','this is backtracking','2018/02/18 02:08:02');

/*Insert into comment table*/
INSERT INTO `comment`(`email`, `ans_id`, `content`, `datetime`) VALUES ('pragyasaraswat@gmail.com','1','this is right answer','2019/02/18 03:01:02');
INSERT INTO `comment`(`email`, `ans_id`, `content`, `datetime`) VALUES ('radhachirania4@gmail.com','2','this is right answer','2019/02/18 03:01:02');
INSERT INTO `comment`(`email`, `ans_id`, `content`, `datetime`) VALUES ('pragyasaraswat@gmail.com','2','this is wrong answer','2019/02/18 03:01:02');







