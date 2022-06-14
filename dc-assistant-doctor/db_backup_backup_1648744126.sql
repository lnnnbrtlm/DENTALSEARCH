

CREATE TABLE `employees` (
  `employeeid` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  PRIMARY KEY (`employeeid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO employees VALUES("1","Carmen","N.","Natividad");
INSERT INTO employees VALUES("2","Jenny","P.","Lopez");
INSERT INTO employees VALUES("5","Janny","C.","Carpio");
INSERT INTO employees VALUES("6","Nanny","B.","Gomez");

