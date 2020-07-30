CREATE TABLE post(
	id int(11) not null PRIMARY KEY AUTO_INCREMENT,
    subject varchar(128) not null,
    content varchar(1000) not null,
    date datetime not null
);


INSERT INTO post (subject, content, date) VALUES ('This is a content', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque mollis faucibus velit id varius. Nulla facilisi. Pellentesque fringilla ipsum lorem, eget tempor enim mattis dignissim. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas vitae ultricies magna. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nullam id dignissim nunc. Interdum et malesuada fames ac ante ipsum primis in faucibus. ', '2015-11-12 16:38:43');



CREATE TABLE loginsystem (
	id int(1000) NOT null PRIMARY KEY AUTO_INCREMENT,
    user_first varchar(40) not null,
    user_last varchar(40) not null,
    user_email varchar(60) not null,

)

INSERT INTO users (user_first, user_last, user_email, user_uid, user_pwd) VALUES ("Ruhsora", "Khakimjonova", "ruhsora@gmail.com", "Sora03", 'ruxsora1111');





CREATE TABLE Users (
	id int(11) NOT null PRIMARY KEY AUTO_INCREMENT,
    firstName varchar(100),
    secondName varchar(100),
    email varchar(200) NOT null,
    pwd varchar(200) NOT null,
    registerDate datetime

);


CREATE TABLE user(
	userId int not null PRIMARY KEY AUTO_INCREMENT,
    firstName varchar(100),
    lastName varchar(100),
    email varchar(200) not null,
    password varchar(200) not null,
    profileImage varchar(255),
    registerDate datetime
);

-- loginsystemtuts

CREATE TABLE users (
	idUsers int(11) AUTO_INCREMENT PRIMARY KEY NOT null,
    uidUsers TINYTEXT NOT null,
    emailUSers TINYTEXT NOT null,
    pwdUsers LONGTEXT NOT null
);

-- Password recovery tutorials

CREATE TABLE pwdReset (
	pwdResetId int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    pwdResetEmail TEXT NOT NULL,
    pwdResetSelector TEXT NOT null,
    pwdResetToken LONGTEXT NOT NULL,
    pwdResetExpires TEXT NOT NULL
);


-- Creating database with SQL scripts and giving privelege to one specific user
CREATE DATABASE members;
GRANT ALL
ON members.*
TO 'adrian'
IDENTIFIED BY 'stapler12';

CREATE TABLE users (
user_id MEDIUMINT (6) UNSIGNED
AUTO_INCREMENT,
first_name VARCHAR(30) NOT NULL,
last_name VARCHAR(40) NOT NULL,
email VARCHAR(50) NOT NULL,
password CHAR(60) NOT NULL,
registration_date DATETIME,
PRIMARY KEY (user_id)
);

-- for logindb in PHP7 Chapter 3 p 76
Username: william
Host: localhost
Password: Cat0nlap
Database name: logindb

-- Will be an admisnitrator for ligin site.
• First name: James
• Last name: Smith
• E-mail: jsmith@myisp.co.uk
• Password: Blacksm1th

-- This is specific info for entering to the site as administrator
• First name: Jack
• Last name: Smith
• E-mail: jsmith@outcook.com
• Password: D0gsb0dy


-- Chapter 4
-- The admin user provided by root to hava access to admintable DB
User: webmaster
Password: C0ffeep0t
Host: localhost


-- Will be an admisnitrator for ligin site.
• First name: James
• Last name: Smith
• E-mail: jsmith@myisp.co.uk
• Password: Blacksm1th

-- This is specific info for entering to the site as administrator
• First name: Jack
• Last name: Smith
• E-mail: jsmith@outcook.com
• Password: D0gsb0dy

-- for dbphpsearch database for makeing search engine
INSERT INTO article (a_title, a_text, a_author, a_date)
VALUES('Our Best Education Articles of 2019', 'Looking for inspiration to start the new decade off on the right foot? Our most popular education articles of 2019 explore how children develop purpose, how we can best support our students’ mental health and social-emotional development, why we benefit from listening to each other’s stories, and more.
       And…if you want to put the scientific findings from these articles into practice, check out our new website for educators, Greater Good in Education (GGIE), officially launching on February 20, 2020.
       In response to our readers’ call for more practical resources for the classroom, GGIE features free research-based practices, lessons, and strategies for educators to foster their students’ and their own well-being, and for school leaders to develop positive school climates—all in the service of cultivating kinder, happier, and more equitable classrooms and schools.', 'Amy L. Eva', '2019-12-23 13:13:13')

			 INSERT INTO article (a_title, a_text, a_author, a_date)
			 VALUES('Cisco Networking Academy\'s Introduction to Scaling Networks', 'This chapter introduces strategies that can be used to systematically design a highly functional network, such as the hierarchical network design model, the Cisco Enterprise Architecture, and appropriate device selections.', '
By Cisco Networking Academy', '2014-04-17 13:13:13')
INSERT INTO article (a_title, a_text, a_author, a_date)
VALUES('A Virtual Reality Bias Simulator', 'In the wake of new Black Lives Matter protests, one company hopes to use virtual reality to help people better understand others by putting them in their colleagues’ shoes. The aim is to create better workplaces by helping employees develop and practice more respectful ways of interacting with each other.

By immersing people in realistic digital environments, virtual reality (VR) can lead to mind-bending experiences, such as making users feel as if they have swapped bodies with someone else. The effects of VR can persist long after these experiences; psychologists hope this can help in therapies for ailments such as phobias and post-traumatic stress disorder.

Previously, clinical psychologist Robin Rosenberg and her colleagues found that when people could use “superpowers” in VR, they acted more virtuously afterward. After this work, as the Black Lives Matter movement rose to prominence in 2014, Rosenberg remembered hearing how some white people responded by saying “white lives matter” or “all lives matter.”', '
Charles Q. Choi', '2020-07-10 13:13:13');
INSERT INTO article (a_title, a_text, a_author, a_date)
VALUES('U.S. Women in Tech Are Paid Less Than Men—Except in Minnesota', 'Women across the United States who work in tech are generally paid less than their male counterparts, even when education, years of experience, and specific occupations match.

That’s not exactly news; study after study has confirmed the differential. The latest analysis, a review of three years’ worth of salary survey data collected by job search site provider Dice, once again found that the overall gap persists.

The Dice analysis did find some interesting differences in regions and engineering disciplines. For instance, women in cloud engineering, systems architecture, and network engineering might be doing better than their male counterparts, though the sample sizes for cloud engineering and systems architecture were too small to be conclusive, and the differences were not statistically significant.', '
Tekla S. Perry', '2020-03-12 13:13:13');

-- For commentsection
			 CREATE TABLE comments (
			 	cid INT(11) not null AUTO_INCREMENT PRIMARY KEY,
			    	uid varchar(128) not null,
			    	date datetime not null,
			    	message text not null


			 );


CREATE TABLE users(
	id int(11) not null AUTO_INCREMENT PRIMARY KEY,
    uid varchar(128) not null,
    pwd varchar(128) not null
);

-- Chapter 5   for creating postaldb users table

CREATE TABLE `postaldb`.`users` ( `user_id` MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT , `first_name` VARCHAR(30) NOT NULL , `last_name` VARCHAR(40) NOT NULL , `email` VARCHAR(50) NOT NULL , `password` CHAR(255) NOT NULL , `registration_date` DATETIME NOT NULL , `user_level` TINYINT(1) UNSIGNED NOT NULL DEFAULT '0' , `class` CHAR(20) NOT NULL , `address1` VARCHAR(50) NOT NULL , `address2` VARCHAR(50) NULL , `city` VARCHAR(50) NOT NULL , `state_country` CHAR(25) NOT NULL , `zocde_pcode` CHAR(10) NOT NULL , `phone` CHAR(15) NULL , `paid` ENUM("yes","no") NOT NULL , PRIMARY KEY (`user_id`)) ENGINE = InnoDB;

admin with all previliges for postaldb
• Username: jenner
• Host: localhost
• Password: Vacc1nat10n


-- Chapter 5 This is specific info for entering to the site as administrator
James Smith jsmith@myisp.com Bl3cksmith

-- Chapter 6 priveleged admin for finalpostdb
• Username: cabbage
• Password: in4aPin4aL
• Host: localhost


-- Chapter 7 -  priveleged user for migrate database
• Username: trevithick
• Host Select: Local
• Password: l0c0m0t1v3

id12394904_trevithick
id12394904_migrate
password : 3}[FvEuD(tRL_d46

	@osWOQUMt2Ii1w\|


-- priveleged admin for estatedb
	• Username: smeeton
		• Password: L1ghth0us3
	• Host: Localhost

to access administration page
	Jack’s sign-in information is as follows:
	• E-mail: jsmith@outcook.com
	• Password: D0g3b@dy

-- Chapter 9 priveleged admin for birdsdb
	• Username: faraday
	• Password: Dynam01831
	• Host: Localhost
	• Database name: birdsdb


	-- Chapter 10
	CREATE USER 'brunel'@'localhost' IDENTIFIED VIA mysql_native_password USING '***';GRANT ALL PRIVILEGES ON *.* TO 'brunel'@'localhost' REQUIRE NONE WITH GRANT OPTION MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;GRANT ALL PRIVILEGES ON `msgboarddb`.* TO 'brunel'@'localhost';
	-- Priveleged admin for mgboarddb
	• Username: brunel
• Host: localhost
• Password: tra1lblaz3r

lilythepink jsmith@myisp.co.uk BumB!3b33
giantstep12 ndean@myisp.co.uk  C3rtr1dg@
mechanic7   jdoe@myisp.co.uk   B@tt3ry4c3r
skivvy      jsmith@outcook.com D0gs0dy!2
mythking    arthur@myisp.net   Cam@10t4

-- Chapter 11  Priveleged admin for paypaldb

• Username: colossus
• Password: Fstc0mput3r
• Host: localhost
• Database name: paypaldb

-- Here are the login details for the users; you will need Mr. Mike Rosoft’s details to log in into the
-- administration page and add new paintings.

Mr. Mike Rosoft, e-mail: miker@myisp.com, password: W111g@t3s, user_level: 1
Mrs. Rose Bush, e-mail: rbush@myisp.co.uk, password: R@db100ms, user_level: 0


-- Chapter 11  Priveleged admin for customdb

• Username: turing
• Password: En1gm3
• Host: localhost
• Database name: customdb
