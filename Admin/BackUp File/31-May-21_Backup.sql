

CREATE TABLE `admins` (
  `Slno` int(5) NOT NULL AUTO_INCREMENT,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Date` date NOT NULL,
  `Block` tinyint(1) NOT NULL DEFAULT '1',
  `UpdateDate` date NOT NULL,
  PRIMARY KEY (`Slno`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO admins VALUES("1","Debraj Aditya","4388c0ac505fa5cf479c1fd4947b3fa7","2020-03-31","1","2020-03-31");



CREATE TABLE `courses` (
  `Slno` int(5) NOT NULL AUTO_INCREMENT,
  `Course` varchar(500) NOT NULL,
  `Fee` int(5) NOT NULL,
  `Date` date NOT NULL,
  `Updatedate` date NOT NULL,
  `Block` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`Slno`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO courses VALUES("1","C","3000","2020-04-02","2020-04-02","1");
INSERT INTO courses VALUES("2","CPP","3000","2020-04-02","2020-04-02","1");
INSERT INTO courses VALUES("3","PHP","3000","2020-04-02","2020-04-05","1");
INSERT INTO courses VALUES("4","HTML","2000","2020-04-02","2020-04-05","1");
INSERT INTO courses VALUES("5","FULLSTACK WEBDESIGN (PHP,MYSQL,HTML,BOOTSTRAP,JAVASCRIPT)","10000","2020-04-02","2020-04-05","1");
INSERT INTO courses VALUES("6","JAVA","5000","2020-04-02","2020-04-05","1");



CREATE TABLE `student` (
  `Id` int(5) NOT NULL AUTO_INCREMENT,
  `Name` varchar(30) NOT NULL,
  `Contact` varchar(10) NOT NULL,
  `Address` varchar(1000) NOT NULL,
  `Gmail` varchar(50) NOT NULL,
  `Course` text NOT NULL,
  `DOJ` date NOT NULL,
  `Block` int(11) NOT NULL,
  `DOE` varchar(15) NOT NULL DEFAULT 'Current',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

INSERT INTO student VALUES("1","Debraj Aditya","7005782532","247, Lhomithi colony, Dimapur Nagaland","debraj.123@gmail.com","FULLSTACK WEBDESIGN (PHP,MYSQL,HTML,BOOTSTRAP,JAVASCRIPT)","2020-04-02","1","Current");
INSERT INTO student VALUES("3","Anita Aditya","9862799274","49 Lhomthi colony Nagaland","anita123@gmail.com","PHP","2020-04-02","1","Current");
INSERT INTO student VALUES("5","Debojit Chakraborty","7095664826","kamrup metropolatian","debojitchakraborty9@gmail.com","JAVA","2020-04-03","1","Current");
INSERT INTO student VALUES("6","Pritam","9862051696","Zelilong Village Dimapur Nagaland","pritam124@gmail.com","JAVA","2020-04-04","1","Current");
INSERT INTO student VALUES("7","Shiwani Singh","7005782539","Dhobinala dimapur nagaland","shiwani3@gmail.com","PHP","2021-05-28","1","Current");
INSERT INTO student VALUES("8","Ankan khatua","9178877355","kolkata people","ankan123@gmail.com","FULLSTACK WEBDESIGN (PHP,MYSQL,HTML,BOOTSTRAP,JAVASCRIPT)","2021-05-28","1","Current");
INSERT INTO student VALUES("10","Tilok","1234567893","guwahit ppl","tolok123@gmail.com","JAVA","2021-05-31","1","Current");
INSERT INTO student VALUES("11","Tilok","1235567893","guwahit ppl","tolok1253@gmail.com","JAVA","2021-05-31","1","Current");
INSERT INTO student VALUES("12","Tilok","1235367893","guwahit ppl","tolk1253@gmail.com","JAVA","2021-05-31","1","Current");
INSERT INTO student VALUES("13","Tilok","1232343456","guwahit ppl","tol253@gmail.com","JAVA","2021-05-31","1","Current");
INSERT INTO student VALUES("14","nag","1233211234","dksjdks","nag@gmail.com","FULLSTACK WEBDESIGN (PHP,MYSQL,HTML,BOOTSTRAP,JAVASCRIPT)","2021-05-31","1","Current");
INSERT INTO student VALUES("15","asdad","1212123324","fsfds","asd@gmail.com","FULLSTACK WEBDESIGN (PHP,MYSQL,HTML,BOOTSTRAP,JAVASCRIPT)","2021-05-31","1","Current");
INSERT INTO student VALUES("16","Pritam Nag","1234567892","kolkata people","pritam123@gmail.com","FULLSTACK WEBDESIGN (PHP,MYSQL,HTML,BOOTSTRAP,JAVASCRIPT)","2021-05-31","1","Current");



CREATE TABLE `studentfees` (
  `Slno` int(5) NOT NULL AUTO_INCREMENT,
  `Name` varchar(30) NOT NULL,
  `Course` varchar(500) NOT NULL,
  `Gmail` varchar(30) NOT NULL,
  `Contact` varchar(10) NOT NULL,
  `Date` date NOT NULL,
  `Block` tinyint(1) NOT NULL DEFAULT '1',
  `Fee` int(5) NOT NULL,
  `Paid` int(5) NOT NULL,
  `PaidVia` varchar(10) NOT NULL,
  PRIMARY KEY (`Slno`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

INSERT INTO studentfees VALUES("18","Debojit Chakraborty","JAVA","debojitchakraborty9@gmail.com","7095664826","2020-04-04","1","5000","4000","CASH");
INSERT INTO studentfees VALUES("16","Anita Aditya","PHP","anita123@gmail.com","9862799274","2020-04-04","1","3000","2000","CASH");
INSERT INTO studentfees VALUES("17","Bishal Saha","PHP","bishal123@gmail.com","9612448931","2020-04-04","1","3000","1000","CASH");
INSERT INTO studentfees VALUES("15","Debraj Aditya","FULLSTACK WEBDESIGN (PHP,MYSQL,HTML,BOOTSTRAP,JAVASCRIPT)","debraj.123@gmail.com","7005782532","2020-04-04","1","10000","10000","CASH");
INSERT INTO studentfees VALUES("19","Shiwani Singh","PHP","shiwani@gmail.com","7005782539","2021-05-31","1","3000","3000","");
INSERT INTO studentfees VALUES("20","Ankan khatua","FULLSTACK WEBDESIGN (PHP,MYSQL,HTML,BOOTSTRAP,JAVASCRIPT)","ankan123@gmail.com","9178877355","2021-05-28","1","10000","0","");
INSERT INTO studentfees VALUES("21","Ankan khatua","FULLSTACK WEBDESIGN (PHP,MYSQL,HTML,BOOTSTRAP,JAVASCRIPT)","ankan3@gmail.com","9178877477","2021-05-28","1","10000","0","");
INSERT INTO studentfees VALUES("22","Tilok","JAVA","tolok123@gmail.com","1234567893","2021-05-31","1","5000","5000","CARD");
INSERT INTO studentfees VALUES("23","Tilok","JAVA","tolok1253@gmail.com","1235567893","2021-05-31","1","5000","0","");
INSERT INTO studentfees VALUES("24","Tilok","JAVA","tolk1253@gmail.com","1235367893","2021-05-31","1","5000","5000","UPI");
INSERT INTO studentfees VALUES("25","Tilok","JAVA","tol253@gmail.com","1232343456","2021-05-31","1","5000","0","");
INSERT INTO studentfees VALUES("26","nag","FULLSTACK WEBDESIGN (PHP,MYSQL,HTML,BOOTSTRAP,JAVASCRIPT)","nag@gmail.com","1233211234","2021-05-31","1","10000","0","");
INSERT INTO studentfees VALUES("27","asdad","FULLSTACK WEBDESIGN (PHP,MYSQL,HTML,BOOTSTRAP,JAVASCRIPT)","asd@gmail.com","1212123324","2021-05-31","1","10000","0","");
INSERT INTO studentfees VALUES("28","Pritam Nag","FULLSTACK WEBDESIGN (PHP,MYSQL,HTML,BOOTSTRAP,JAVASCRIPT)","pritam123@gmail.com","1234567892","2021-05-31","1","10000","0","");



CREATE TABLE `xstudent` (
  `Id` int(5) NOT NULL AUTO_INCREMENT,
  `Name` varchar(30) NOT NULL,
  `Contact` varchar(10) NOT NULL,
  `Gmail` varchar(50) NOT NULL,
  `Address` varchar(1000) NOT NULL,
  `Course` varchar(500) NOT NULL,
  `D.O.L.` date NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO xstudent VALUES("1","Bishal Saha","9862051696","bishal123@gmail.com","49 Dhobinala Dimapur Nagaland","JAVA","2020-04-02");
INSERT INTO xstudent VALUES("2","Bishal Saha","9612448931","bishal123@gmail.com","58 Chandigarh sector 54","PHP","2020-04-05");
INSERT INTO xstudent VALUES("3","Ankan khatua","9178877477","ankan3@gmail.com","kolkata people ggg","FULLSTACK WEBDESIGN (PHP,MYSQL,HTML,BOOTSTRAP,JAVASCRIPT)","2021-05-31");

