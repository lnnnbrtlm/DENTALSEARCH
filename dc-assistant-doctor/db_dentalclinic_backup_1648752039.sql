

CREATE TABLE `appointments` (
  `appointment_refno` int(50) NOT NULL AUTO_INCREMENT,
  `patient_id` varchar(50) NOT NULL,
  `patient_name` varchar(250) NOT NULL,
  `email` varchar(255) NOT NULL,
  `doctor_name` varchar(250) NOT NULL,
  `service_name` varchar(50) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `note` varchar(100) NOT NULL,
  `appointment_datentime` date NOT NULL,
  `appointment_time` time NOT NULL,
  `checkin_datentime` datetime DEFAULT NULL,
  `inchair_datentime` datetime NOT NULL,
  `complete_datentime` datetime NOT NULL,
  `cancelled_datentime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`appointment_refno`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

INSERT INTO appointments VALUES("1","1","Owang Malubay","joshua@gmail.com","Joshua Malubay","Root Canal Treatment","Riverside Branch","hays","2022-04-09","07:05:00","2022-03-31 17:02:00","2022-03-31 17:02:02","2022-04-01 00:33:33","2022-03-31 17:01:50","In-Chair");
INSERT INTO appointments VALUES("2","5","Joshua Malubay","francis.dumas.urna@gmail.com","Francis wang","Teeth Whitening","Main Branch","note","2022-04-05","00:00:00","2022-04-01 00:32:17","2022-04-01 00:32:20","0000-00-00 00:00:00","2022-03-31 18:11:27","In-Chair");
INSERT INTO appointments VALUES("3","4","Owang Malubay","joshua@gmail.com","Lennon Bartolome","Teeth Whitening","Main Branch","note","2022-04-07","00:00:00","","0000-00-00 00:00:00","0000-00-00 00:00:00","2022-03-31 18:21:53","Confirmed");
INSERT INTO appointments VALUES("4","3","Owang Malubay","joshua@gmail.com","Francis wang","Denture","Main Branch","note","2022-04-08","00:00:00","","0000-00-00 00:00:00","0000-00-00 00:00:00","2022-03-31 18:29:28","Confirmed");
INSERT INTO appointments VALUES("5","6","Francis Urna","cisurna@gmail.com","Lennon Bartolome","Teeth Whitening","Main Branch","note","2022-04-02","00:00:00","","0000-00-00 00:00:00","0000-00-00 00:00:00","2022-03-31 21:59:58","Confirmed");
INSERT INTO appointments VALUES("6","7","Francis Urna","cisurna@gmail.com","Francis wang","Crowns and Bridges","Main Branch","note","2022-04-02","00:00:00","","0000-00-00 00:00:00","0000-00-00 00:00:00","2022-03-31 22:01:57","Confirmed");
INSERT INTO appointments VALUES("7","8","Francis Urna","cisurna@gmail.com","Francis wang","Pediatric Dentistry","Main Branch","note","2022-05-03","00:00:00","","0000-00-00 00:00:00","0000-00-00 00:00:00","2022-04-01 01:19:26","Confirmed");
INSERT INTO appointments VALUES("8","9","Francis Urna","cisurna@gmail.com","Lennon Bartolome","Dental Implants","Riverside Branch","","2022-04-29","00:00:00","","0000-00-00 00:00:00","0000-00-00 00:00:00","2022-04-01 01:24:58","Confirmed");
INSERT INTO appointments VALUES("9","2","","lennon1@gmail.com","Lennon Bartolome","Dental Implants","Riverside Branch","","2022-04-09","00:00:00","","0000-00-00 00:00:00","0000-00-00 00:00:00","2022-04-01 01:25:59","Confirmed");
INSERT INTO appointments VALUES("10","11","try try","lennon1@gmail.com","Francis wang","Dental Implants","Riverside Branch","","2022-06-03","00:00:00","","0000-00-00 00:00:00","0000-00-00 00:00:00","2022-04-01 01:26:32","Confirmed");
INSERT INTO appointments VALUES("11","10","Francis Urna","cisurna@gmail.com","Lennon Bartolome","Denture","Novaliches Branch","rar","2022-05-05","00:00:00","2022-04-01 01:30:38","2022-04-01 01:31:55","2022-04-01 01:33:29","2022-04-01 01:30:15","Completed");
INSERT INTO appointments VALUES("12","2","Owang Malubay","joshua@gmail.com","Lennon Bartolome","Orthodontics","haha","aaa","2022-04-29","08:30:00","","0000-00-00 00:00:00","0000-00-00 00:00:00","2022-04-01 02:24:40","Confirmed");



CREATE TABLE `billing` (
  `bill_id` int(11) NOT NULL AUTO_INCREMENT,
  `branch` varchar(50) NOT NULL,
  `ref_no` int(50) NOT NULL,
  `patient_id` int(50) NOT NULL,
  `patient_name` varchar(50) NOT NULL,
  `doctor` varchar(50) NOT NULL,
  `service` varchar(50) NOT NULL,
  `price` int(50) NOT NULL,
  `amount_paid` int(50) NOT NULL,
  `mode_of_payment` varchar(50) NOT NULL,
  `date` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`bill_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO billing VALUES("1","1","1","1","Francis Urna","Joshua","Cleaning","1000","0","Cash","2022-03-02 00:00:00","Paid");



CREATE TABLE `certification` (
  `id` int(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `doctor` varchar(50) NOT NULL,
  `service` varchar(50) NOT NULL,
  `rest_day` varchar(50) NOT NULL,
  `time_n_date` date NOT NULL,
  `remarks` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO certification VALUES("0","wang wang","Lennon Bartolome","Orthodontics","3 days","2022-03-29","nery");



CREATE TABLE `conditiontbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `con_legend` varchar(50) NOT NULL,
  `t_condition` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

INSERT INTO conditiontbl VALUES("1","P","Present Teeth");
INSERT INTO conditiontbl VALUES("2","D","Decayed (Canes indicated for Filling)");
INSERT INTO conditiontbl VALUES("3","M","Missing due to Canes");
INSERT INTO conditiontbl VALUES("4","MO","Missing due to Other Causes");
INSERT INTO conditiontbl VALUES("5","Im","Impacted Tooth");
INSERT INTO conditiontbl VALUES("6","Sp","Supernumerary Tooth");
INSERT INTO conditiontbl VALUES("7","Rf","Root Fragment");
INSERT INTO conditiontbl VALUES("8","Un","Unerupted");



CREATE TABLE `content` (
  `content_id` int(10) NOT NULL AUTO_INCREMENT,
  `homepage_header` varchar(250) NOT NULL,
  `homepage_description` varchar(250) NOT NULL,
  `header_photo` varchar(250) NOT NULL,
  `service_one` varchar(250) NOT NULL,
  `service_two` varchar(250) NOT NULL,
  `service_three` varchar(250) NOT NULL,
  `about_tech_header` varchar(250) NOT NULL,
  `about_tech_description` varchar(250) NOT NULL,
  `about_tech_headerone` varchar(250) NOT NULL,
  `about_tech_description_one` varchar(250) NOT NULL,
  `about_tech_header_two` varchar(250) NOT NULL,
  `about_tech_description_two` varchar(250) NOT NULL,
  `about_tech_header_three` varchar(250) NOT NULL,
  `about_tech_description_three` varchar(250) NOT NULL,
  `faq_one` varchar(250) NOT NULL,
  `faq_one_answer` varchar(250) NOT NULL,
  `faq_two` varchar(250) NOT NULL,
  `faq_two_answer` varchar(250) NOT NULL,
  `faq_three` varchar(250) NOT NULL,
  `faq_three_answer` varchar(250) NOT NULL,
  `aboutus_header` varchar(250) NOT NULL,
  `aboutus_description` varchar(250) NOT NULL,
  `aboutus_photo` varchar(50) NOT NULL,
  `aboutus_founded` varchar(50) NOT NULL,
  `doctor_one` varchar(250) NOT NULL,
  `doctor_two` varchar(250) NOT NULL,
  `doctor_three` varchar(250) NOT NULL,
  PRIMARY KEY (`content_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO content VALUES("1","A better life starts with a beautiful smile.","It's going to be the best dental care you'll have ever had. The dental professionals here will make your experience easy and hassle-free. Just relax and enjoy the services provided by the dental experts.","yes","Tooth Extraction","Dental Implants","Denture","About our technologies","Learn more about our latest technology.","Healthcare Professionals","The dental procedure will be performed by highly trained dentists and our dentist's assistant who will ensure that you get the best service.","We Provide High-Quality Care","We will make your experience at our Dental office pleasant and easy. From the moment you visit us, we will take the time to make you comfortable.","Ready To Aid","When you are ready, our team is waiting to answer any questions you may have. Please feel free to book an appointment online or call our office at (0999) 123 4321 for more information.","What type of toothbrush and toothpaste should I us","Buy toothbrushes with soft bristles. Medium and firm ones can damage teeth and gums. Use soft pressure, for 2 minutes, two times a day.","Do I really need to floss?","There's no getting around the need to get around your teeth daily with dental floss. It clears food and plaque from between teeth and under the gumline. If you don't, plaque hardens into tartar, which forms wedges and widens the space between teeth a","Does a rinse or mouthwash help?","Mouthwashes for cavity protection, sensitivity, and fresh breath may help when you use them with regular brushing and flossing -- but not instead of daily cleanings. Your dentist can recommend the best type for you.","Excellent Techniques For Healthy Dental Condition","The best dental health begins with a diet and a daily routine. If you can create a healthy routine, you will be able to maintain good dental hygiene.","yes","March 25, 2022","Joshua Malubay","Joshua Malubay","Joshua Malubay");



CREATE TABLE `control_panel` (
  `panel_id` int(10) NOT NULL AUTO_INCREMENT,
  `clinic_name` varchar(50) NOT NULL,
  `clinic_logo` varchar(50) NOT NULL,
  `clinic_contact` varchar(50) NOT NULL,
  `clinic_email` varchar(50) NOT NULL,
  `start_day` varchar(50) NOT NULL,
  `end_day` varchar(50) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `clinic_address` varchar(50) NOT NULL,
  `facebook_link` varchar(50) NOT NULL,
  `twitter_link` varchar(50) NOT NULL,
  PRIMARY KEY (`panel_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO control_panel VALUES("1","YES","logo-new.png","09474957938","dental.clinic@gmail.com","Monday","Saturday","19:00:58","16:00:58","Quirino Hwy, Novaliches, Quezon City, Metro Manila","https://facebook.com/romero.dental/","https://twitter.com/romero.dental/");



CREATE TABLE `dental_duplicate` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `ref_no` int(50) NOT NULL,
  `patient_id` int(50) NOT NULL,
  `patient_name` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




CREATE TABLE `dentalchart` (
  `procedure_id` int(50) NOT NULL AUTO_INCREMENT,
  `ref_no` int(11) NOT NULL,
  `tooth_id` int(50) NOT NULL,
  `patient_id` varchar(50) NOT NULL,
  `patient_name` varchar(50) NOT NULL,
  `t_condition` varchar(50) NOT NULL,
  `t_procedure` varchar(50) NOT NULL,
  `con_legend` varchar(100) NOT NULL,
  `pro_legend` varchar(100) NOT NULL,
  `price` int(50) NOT NULL,
  `dentaldate` date NOT NULL,
  `bottomright` varchar(20) NOT NULL,
  `bottomleft` varchar(20) NOT NULL,
  `leftbottom` varchar(20) NOT NULL,
  `lefttop` varchar(20) NOT NULL,
  `topleft` varchar(20) NOT NULL,
  `topright` varchar(20) NOT NULL,
  `rightbottom` varchar(20) NOT NULL,
  `righttop` varchar(20) NOT NULL,
  `center` varchar(20) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`procedure_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

INSERT INTO dentalchart VALUES("1","1","21","1","Owang Malubay","Missing due to Canes","Jacket Crown","M","JC","1000","2022-03-31"," "," "," ","1","1"," "," "," "," ","Completed");
INSERT INTO dentalchart VALUES("2","1","22","1","Owang Malubay","Missing due to Canes","Attachment","M","Att","1000","2022-03-31"," "," ","1","1"," "," "," "," "," ","Completed");
INSERT INTO dentalchart VALUES("3","1","23","1","Owang Malubay","Decayed (Canes indicated for Filling)","Jacket Crown","D","JC","1000","2022-03-31"," "," "," "," "," ","1"," ","1"," ","Completed");
INSERT INTO dentalchart VALUES("4","1","24","1","Owang Malubay","Missing due to Canes","Jacket Crown","M","JC","1000","2022-04-01"," "," "," ","1","1"," "," "," "," ","In Progress");
INSERT INTO dentalchart VALUES("5","1","25","1","Owang Malubay","Root Fragment","Abutment","Rf","Ab","1000","2022-03-31"," "," "," ","1","1"," "," "," "," ","Planned");
INSERT INTO dentalchart VALUES("6","1","26","1","Owang Malubay","Decayed (Canes indicated for Filling)","Amaigam Filling","D","Am","1000","2022-03-31"," "," "," "," "," ","1"," ","1"," ","Planned");
INSERT INTO dentalchart VALUES("7","1","27","1","Owang Malubay","Supernumerary Tooth","Attachment","Sp","Att","1000","2022-03-31"," "," ","1","1"," "," "," "," "," ","Planned");
INSERT INTO dentalchart VALUES("8","1","28","1","Owang Malubay","Missing due to Other Causes","Attachment","MO","Att","1000","2022-03-31"," ","1","1"," "," "," "," "," "," ","Planned");
INSERT INTO dentalchart VALUES("9","1","48","1","Owang Malubay","Missing due to Other Causes","Pontic","MO","P","1000","2022-03-31"," ","1","1"," "," "," "," "," "," ","Planned");
INSERT INTO dentalchart VALUES("10","2","24","5","Joshua Malubay","Missing due to Canes","Abutment","M","Ab","1000","2022-03-31"," "," ","1","1"," "," "," "," "," ","Planned");



CREATE TABLE `feedback` (
  `id` int(50) NOT NULL,
  `patient_name` varchar(50) NOT NULL,
  `doctor_name` varchar(50) NOT NULL,
  `service_name` varchar(50) NOT NULL,
  `feedback` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO feedback VALUES("0","Francis Urna","Francis Urna","","wwwwwww");
INSERT INTO feedback VALUES("0","Francis Urna","Dr. Francis Urna","Oral Prophylaxis","hahahahahahahahaha");



CREATE TABLE `inventory_equipment` (
  `Equip_Id` int(50) NOT NULL AUTO_INCREMENT,
  `Equip_Name` varchar(250) NOT NULL,
  `Requested_Date` date NOT NULL,
  `Date_Defected` date NOT NULL,
  `Quantity` varchar(50) NOT NULL,
  `status` varchar(55) NOT NULL,
  PRIMARY KEY (`Equip_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO inventory_equipment VALUES("1","Driller","2022-01-06","2022-01-31","5","ACTIVE");
INSERT INTO inventory_equipment VALUES("2","Dental Chair Headrest","2022-01-01","2021-06-30","2","ACTIVE");
INSERT INTO inventory_equipment VALUES("3","Dental Trolley ","2022-01-25","2021-12-24","3","ACTIVE");



CREATE TABLE `inventory_medicine` (
  `Med_Id` int(50) NOT NULL AUTO_INCREMENT,
  `Med_Name` varchar(250) NOT NULL,
  `Quantity` varchar(50) NOT NULL,
  `Available_Qty` varchar(50) NOT NULL,
  `Price` varchar(50) NOT NULL,
  `Expiry_date` date NOT NULL,
  `Requested_date` date NOT NULL,
  `status` varchar(55) NOT NULL,
  PRIMARY KEY (`Med_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO inventory_medicine VALUES("1","Tylenol","30","","100","2022-01-27","2022-01-04","ACTIVE");
INSERT INTO inventory_medicine VALUES("2","Advil","1.0E+29","","50","2022-01-30","2022-01-12","ACTIVE");
INSERT INTO inventory_medicine VALUES("3","Bayer","173","","200","2024-06-19","2022-01-25","ACTIVE");



CREATE TABLE `learners` (
  `fname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `birthdate` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `verification_code` varchar(50) NOT NULL,
  `img` varchar(50) NOT NULL,
  `email_verified_at` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO learners VALUES("francisss","francis.dumas.urna@gmail.com","2000-06-30","1234567890","221514","","2022-03-30 23:41:32");
INSERT INTO learners VALUES("francisss","francis.dumas.urna@gmail.com","2000-06-30","1234567890","182964","","2022-03-30 23:43:28");
INSERT INTO learners VALUES("aaaaaaaaaaaaaaaa","francis.dumas.urna@gmail.com","1999-07-02","1234567890","209173","","2022-03-31 02:10:22");



CREATE TABLE `patient_record` (
  `patient_id` int(50) NOT NULL AUTO_INCREMENT,
  `profile_img` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `birthdate` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `parent_guardian` varchar(50) NOT NULL,
  `age` varchar(50) NOT NULL,
  `doctor_name` varchar(50) NOT NULL,
  `service_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contactno` varchar(15) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `verification_code` int(255) NOT NULL,
  `status` varchar(55) NOT NULL,
  PRIMARY KEY (`patient_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

INSERT INTO patient_record VALUES("1","","Owang Malubay","Owang","Malubay","try","2022-03-09","Quezon City","Mama","0","","","12345678","joshua@gmail.com","0978241582","female","0","ACTIVE");
INSERT INTO patient_record VALUES("2","","Owang Malubay","Owang","Malubay","try","2022-02-28","Quezon City","Owang","0","","","12345678","joshua@gmail.com","0978241582","female","0","ACTIVE");
INSERT INTO patient_record VALUES("3","","Joshua Malubay","Joshua","Malubay","Segador","2022-02-28","285 Riverside Ext Unit 4 Baran","Owang","0","","","12345678","joshua.malubay07111999@gmail.c","912234574","male","0","ACTIVE");
INSERT INTO patient_record VALUES("4","","Joshua Malubay","Joshua","Malubay","Segador","2022-03-07","285 Riverside Ext Unit 4 Baran","Owang","0","","","12345678","joshua.malubay07111999@gmail.c","912234574","male","0","ACTIVE");
INSERT INTO patient_record VALUES("5","MALUBAY,JOSHUA2x2.jpg","Joshua Malubay","Joshua","Malubay","","2000-07-31","Quezon City","Mama","21","","","Qwerty123","francis.dumas.urna@gmail.com","09954418463","Male","316562","2022-03-31 17:59:09");
INSERT INTO patient_record VALUES("6","wendy.jpg","Nery Mhae","Nery","Mhae","","2021-06-30","QC","mama","0","","","Qwerty123","lennonbartolome26@gmail.com","09954418463","Female","753629","2022-03-31 19:49:49");
INSERT INTO patient_record VALUES("7","MALUBAY,JOSHUA2x2.jpg","Francis Urna","Francis","Urna","","2022-03-08","Quezon City","owang","0","","","Qwerty123","cisurna@gmail.com","09954418463","Male","962145","2022-03-31 21:57:58");



CREATE TABLE `pending_appointments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` varchar(50) NOT NULL,
  `patient_name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contactno` varchar(50) NOT NULL,
  `doctor_name` varchar(50) NOT NULL,
  `service_name` varchar(50) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `note` varchar(255) NOT NULL,
  `appointment_datentime` date NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

INSERT INTO pending_appointments VALUES("11","7","Francis Urna","cisurna@gmail.com","09954418463","Francis wang","Teeth Whitening","Riverside Branch","ff","2022-04-29","Unconfirmed");



CREATE TABLE `prescription_list` (
  `prescription_id` int(50) NOT NULL AUTO_INCREMENT,
  `patient_name` varchar(50) NOT NULL,
  `doctor_name` varchar(50) NOT NULL,
  `note` varchar(255) NOT NULL,
  `meds` varchar(50) NOT NULL,
  `frequency` varchar(50) NOT NULL,
  `dosage` varchar(50) NOT NULL,
  `durationunit` varchar(50) NOT NULL,
  PRIMARY KEY (`prescription_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO prescription_list VALUES("1","wang wang","Joshua Malubay","Urgent","Tylenol ","3","3mg","");
INSERT INTO prescription_list VALUES("2","Hermar Garcia","Lennon Bartolome","Important","Tylenol ","3","2mg","");



CREATE TABLE `questions` (
  `patient_id` int(100) NOT NULL AUTO_INCREMENT,
  `question_one` varchar(50) NOT NULL,
  `question_two` varchar(50) NOT NULL,
  `input_two` varchar(50) NOT NULL,
  `question_three` varchar(50) NOT NULL,
  `input_three` varchar(50) NOT NULL,
  `question_four` varchar(50) NOT NULL,
  `input_four` varchar(50) NOT NULL,
  `question_five` varchar(50) NOT NULL,
  `input_five` varchar(50) NOT NULL,
  `question_six` varchar(50) NOT NULL,
  `question_seven` varchar(50) NOT NULL,
  `question_eight` varchar(50) NOT NULL,
  `input_eight` varchar(255) NOT NULL,
  `question_nine` varchar(50) NOT NULL,
  `input_nine` varchar(50) NOT NULL,
  `question_ten` varchar(50) NOT NULL,
  `question_eleven` varchar(50) NOT NULL,
  `question_twelve` varchar(50) NOT NULL,
  `question_thirteen` varchar(50) NOT NULL,
  `question_fourteen` varchar(50) NOT NULL,
  `question_fifteen` varchar(255) NOT NULL,
  `input_fifteen` varchar(50) NOT NULL,
  PRIMARY KEY (`patient_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

INSERT INTO questions VALUES("1","Yes","Yes","","Yes","","Yes","","Yes","","Yes","Yes","Penicillin, Antibiotics,","","Yes","","Yes","Yes","Yes","","","","");
INSERT INTO questions VALUES("2","Yes","Yes","","Yes","","Yes","","Yes","","Yes","Yes","","","Yes","","","","","","","","");
INSERT INTO questions VALUES("3","Yes","No","","Yes","","Yes","","Yes","","Yes","Yes","","","Yes","","","","","","","","");
INSERT INTO questions VALUES("4","Yes","Yes","","Yes","","Yes","","Yes","","Yes","Yes","","","Yes","","","","","","","","");
INSERT INTO questions VALUES("5","Yes","Yes","","Yes","","Yes","","Yes","","Yes","Yes","","","No","","No","No","No","","","","");
INSERT INTO questions VALUES("6"," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," ");
INSERT INTO questions VALUES("7","Yes","Yes","","Yes","","Yes","","Yes","","Yes","Yes","","","Yes","","Yes","Yes","Yes","","","","");
INSERT INTO questions VALUES("8","Yes","Yes","","Yes","","Yes","","Yes","","Yes","Yes","","","Yes","","Yes","Yes","Yes","","","","");
INSERT INTO questions VALUES("9","Yes","Yes","","Yes","","Yes","","Yes","","Yes","Yes","","","Yes","","Yes","Yes","Yes","","","","");
INSERT INTO questions VALUES("10","Yes","Yes","","Yes","","Yes","","Yes","","Yes","Yes","","","Yes","","Yes","Yes","Yes","","","","");
INSERT INTO questions VALUES("11","Yes","Yes","","Yes","","Yes","","Yes","","Yes","Yes","","","Yes","","Yes","Yes","Yes","","","","");
INSERT INTO questions VALUES("12","Yes","Yes","","Yes","","Yes","","Yes","","Yes","Yes","","","Yes","","Yes","Yes","Yes","","","","");
INSERT INTO questions VALUES("13","Yes","Yes","","Yes","","Yes","","Yes","","Yes","Yes","","","Yes","","Yes","Yes","Yes","","","","");
INSERT INTO questions VALUES("14","Yes","Yes","","Yes","","Yes","","Yes","","Yes","Yes","","","Yes","","Yes","Yes","Yes","","","","");
INSERT INTO questions VALUES("15","Yes","Yes","","Yes","","Yes","","Yes","","Yes","Yes","","","Yes","","Yes","Yes","Yes","","","","");
INSERT INTO questions VALUES("16"," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," "," ");



CREATE TABLE `restotbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pro_legend` varchar(50) NOT NULL,
  `t_procedure` varchar(150) NOT NULL,
  `price` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

INSERT INTO restotbl VALUES("1","Am","Amaigam Filling","1000");
INSERT INTO restotbl VALUES("2","Co","Composite Filling","2000");
INSERT INTO restotbl VALUES("3","JC","Jacket Crown","1000");
INSERT INTO restotbl VALUES("4","Ab","Abutment","1000");
INSERT INTO restotbl VALUES("12","Att","Attachment","1000");
INSERT INTO restotbl VALUES("13","P","Pontic","1000");
INSERT INTO restotbl VALUES("14","In","Inlay","1000");
INSERT INTO restotbl VALUES("15","Imp","Implant","1000");
INSERT INTO restotbl VALUES("16","Rm","Removable Dentures","1000");



CREATE TABLE `sales` (
  `sale_id` int(55) NOT NULL AUTO_INCREMENT,
  `sale_name` varchar(55) NOT NULL,
  `sale_quantity` int(55) NOT NULL,
  `sale_price` int(5) NOT NULL,
  PRIMARY KEY (`sale_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

INSERT INTO sales VALUES("1","50 ","1","50");
INSERT INTO sales VALUES("2","50  Advil","1","50");
INSERT INTO sales VALUES("3","200 | Bayer","1","200");
INSERT INTO sales VALUES("4","50 - Advil","60","3000");



CREATE TABLE `services` (
  `service_id` int(50) NOT NULL AUTO_INCREMENT,
  `profile_img` varchar(50) NOT NULL,
  `service_name` varchar(250) NOT NULL,
  `service_des` text NOT NULL,
  `price` int(50) NOT NULL,
  `status` varchar(55) NOT NULL,
  PRIMARY KEY (`service_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

INSERT INTO services VALUES("7","icon.png","sample","sample service","1000","ACTIVE");
INSERT INTO services VALUES("8","ortho.jpg","Orthodontics","that addresses the diagnosis, prevention, and correction of mal-positioned teeth and jaws, and misaligned bite patterns.","50000","ACTIVE");
INSERT INTO services VALUES("9","root-canal-treatment.png","Root Canal Treatment","Is a treatment sequence for the infected pulp of a tooth that is intended to result in the elimination of infection and the protection of the decontaminated tooth from future microbial invasion
","1300","ACTIVE");
INSERT INTO services VALUES("10","dentlimplant.jpeg","Dental Implants","is a prosthesis that interfaces with the bone of the jaw or skull to support a dental prosthesis such as a crown, bridge, denture, or facial prosthesis.
","30000","ACTIVE");
INSERT INTO services VALUES("12","Dentures.jpg","Denture","Are prosthetic devices constructed to replace missing teeth, and are supported by the surrounding soft and hard tissues of the oral cavity.
","12000","ACTIVE");
INSERT INTO services VALUES("13","whitening.jpg","Teeth Whitening","Tooth whitening or tooth bleaching is the process of lightening the color of human teeth.
","2000","ACTIVE");
INSERT INTO services VALUES("14","PedDentist.jpg","Pediatric Dentistry","Is the branch of dentistry dealing with children from birth through adolescence.
","3000","ACTIVE");
INSERT INTO services VALUES("15","CrownAndBridge.jpg","Crowns and Bridges","A crown or a cap fits over an existing tooth. It requires restoration due to deep decay, a fracture, or a crack. At least three units make up a bridge: two crowns (abutments) fused to a pontic, or fake tooth, that replaces a missing tooth.
 ","3000","ACTIVE");
INSERT INTO services VALUES("16","consult.jpg","Consultation","A meeting to discuss, decide, or plan something, as a meeting of several doctors to discuss the diagnosis and treatment of a patient.
","250","ACTIVE");



CREATE TABLE `tbl_branch` (
  `branch_id` int(50) NOT NULL AUTO_INCREMENT,
  `profile_img` varchar(55) NOT NULL,
  `branch_name` varchar(50) NOT NULL,
  `branch_address` varchar(50) NOT NULL,
  `status` varchar(55) NOT NULL,
  PRIMARY KEY (`branch_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_branch VALUES("1","onio.jpg","Novaliches Branch","San Bartolome, Novaliches, Quezon City","INACTIVE");
INSERT INTO tbl_branch VALUES("2","owang.jpg","Riverside Branch","285 Riverside Ext Unit 4 Barangay Commonwealth","ACTIVE");



CREATE TABLE `user_accounts` (
  `user_id` int(50) NOT NULL AUTO_INCREMENT,
  `profile_img` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `birthdate` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `age` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contactno` varchar(15) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `user_type` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO user_accounts VALUES("3","IMG_20201023_071124.jpg","Francis","Urna","Dumas","2000-08-17","QC1","haha","21","123456","urna@gmail.com","09999922","Male","Admin","");
INSERT INTO user_accounts VALUES("4","owang.jpg","Joshua","Malubay","G","1999-07-11","QC","","22","123","joshua@gmail.com","0933333","Male","Doctor","");
INSERT INTO user_accounts VALUES("5","kyle.jpg","Kyle","elyk","G","2006-09-17","QC","","15","12345","kyle@gmail.com","091233321","Female","Assistant","");
INSERT INTO user_accounts VALUES("6","1x1jpg.jpg","Lennon","Bartolome","D.","2000-06-29","Caloocan City","1","21","password","lennon@gmail.com","0995231256","Male","Doctor","");
INSERT INTO user_accounts VALUES("7","MALUBAY,JOSHUA2x2.jpg","Joshua","wang","Dumas","2022-02-28","Quezon City","","0","123456","owangmalibu@gmail.com","091231313","Male","2","ACTIVE");
INSERT INTO user_accounts VALUES("8","MALUBAY,JOSHUA2x2.jpg","Francis","wang","test","2022-02-28","Quezon City","Riverside Branch","0","123456","cisurna@gmail.com","094544124123","Male","Doctor","ACTIVE");



CREATE TABLE `x_ray` (
  `xray_count` int(50) NOT NULL AUTO_INCREMENT,
  `patient_id` int(50) NOT NULL,
  `patient_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `x_ray` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  PRIMARY KEY (`xray_count`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

INSERT INTO x_ray VALUES("4","1","Malubay, Owang try","","xray.jpg","Â  March 31, 2022");
INSERT INTO x_ray VALUES("5","5","Malubay, Joshua ","","xray.jpg","Â  March 31, 2022");
INSERT INTO x_ray VALUES("6","3","Malubay, Joshua Segador","","xray.jpg","Â  March 31, 2022");
INSERT INTO x_ray VALUES("7","6","Mhae, Nery ","","xray.jpg","Â  March 31, 2022");
INSERT INTO x_ray VALUES("8","6","Mhae, Nery ","lennonbartolome26@gmail.com","xray.jpg","Â  March 31, 2022");

