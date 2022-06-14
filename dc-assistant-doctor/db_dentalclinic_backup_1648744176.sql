

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
  `cancelled_datentime` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`appointment_refno`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

INSERT INTO appointments VALUES("1","1","wendy Urna","cisurna@gmail.com","Joshua Malubay","Tooth Extraction","","hahaha","2022-03-25","02:54:00","2022-03-17 11:06:59","2022-03-17 11:07:06","2022-03-19 23:19:42","2022-03-25 18:53:04","Completed");
INSERT INTO appointments VALUES("39","2","Francis Urna","francis.dumas.urna@gmail.com","Francis Urna","Dental Implants","","","2022-04-07","06:28:00","2022-03-20 01:22:24","2022-03-20 01:22:27","2022-03-20 01:28:22","2022-03-25 18:53:04","Completed");
INSERT INTO appointments VALUES("40","1","wendy Urna","cisurna@gmail.com","Joshua Malubay","Dental Implants","","www","2022-03-30","06:30:00","2022-03-20 02:46:23","2022-03-20 02:46:29","2022-03-20 02:51:06","2022-03-25 18:53:04","Completed");
INSERT INTO appointments VALUES("41","1","wendy Urna","cisurna@gmail.com","Joshua Malubay","Oral Prophylaxis","","ww","2022-03-31","04:40:00","2022-03-20 01:38:59","2022-03-20 01:39:01","2022-03-20 01:39:03","2022-03-25 18:53:04","Completed");
INSERT INTO appointments VALUES("42","2","Francis Urna","francis.dumas.urna@gmail.com","Francis Urna","Oral Prophylaxis","","s","2022-04-03","05:45:00","2022-03-20 01:40:11","2022-03-20 01:40:13","2022-03-20 01:40:16","2022-03-25 18:53:04","Completed");
INSERT INTO appointments VALUES("43","1","wendy Urna","cisurna@gmail.com","Francis Urna","Orthodontics","","","2022-04-01","06:55:00","2022-03-20 01:49:43","2022-03-20 01:49:46","2022-03-20 01:49:47","2022-03-25 18:53:04","Completed");
INSERT INTO appointments VALUES("44","2","Francis Urna","francis.dumas.urna@gmail.com","Francis Urna","Oral Prophylaxis","","www","2022-04-01","09:10:00","2022-03-20 03:05:40","2022-03-20 03:05:43","2022-03-20 03:05:47","2022-03-25 18:53:04","Cancelled");
INSERT INTO appointments VALUES("46","1","wendy Urna","cisurna@gmail.com","Francis Urna","Oral Prophylaxis","","","2022-04-07","15:40:00","2022-03-20 14:34:37","2022-03-20 14:34:43","2022-03-29 16:56:22","2022-03-25 18:53:04","Completed");
INSERT INTO appointments VALUES("47","18","Lennon Bartolome","lennonbartolome@gmail.com","Joshua Malubay","Tooth Extraction","Main Branch","note","2022-03-18","00:00:00","2022-03-27 23:40:46","2022-03-27 23:57:49","2022-03-29 17:16:53","2022-03-25 22:09:06","Completed");
INSERT INTO appointments VALUES("48","4","Joshua Malubay","owangmalibu@gmail.com","Joshua Malubay","Pediatric Dentistry","","yyyyyyyyyyyyyyy","2022-04-08","01:30:00","","0000-00-00 00:00:00","0000-00-00 00:00:00","2022-03-27 17:39:51","Cancelled");
INSERT INTO appointments VALUES("49","1","wang wang","wang@gmail.com","Joshua Malubay","Tooth Extraction","1","Urgent","2022-04-09","16:40:00","","0000-00-00 00:00:00","0000-00-00 00:00:00","2022-03-29 11:18:21","Cancelled");
INSERT INTO appointments VALUES("50","1","wang wang","wang@gmail.com","Joshua Malubay","Root Canal Treatment","","ww","2022-04-08","08:05:00","2022-03-29 16:51:01","2022-03-29 16:51:39","2022-03-29 17:16:50","2022-03-29 16:02:14","Completed");
INSERT INTO appointments VALUES("51","24","Francis Urna","francis.dumas.urna@gmail.com","Joshua Malubay","Denture","Main Branch","note","2022-03-31","00:00:00","2022-03-29 19:21:46","2022-03-29 19:22:23","2022-03-31 00:05:00","2022-03-29 16:50:52","Completed");
INSERT INTO appointments VALUES("52","3","yeji yeji","fu@gmail.com","Joshua Malubay","Crowns and Bridges","","adawd","2022-03-30","20:42:00","2022-03-31 00:04:19","2022-03-31 00:04:31","0000-00-00 00:00:00","2022-03-30 20:40:10","In-Chair");
INSERT INTO appointments VALUES("53","19","Francis Urna","francis.dumas.urna@gmail.com","Joshua Malubay","Dental Implants","Main Branch","note","2022-03-31","00:00:00","2022-03-31 00:04:24","2022-03-31 00:04:34","2022-03-31 00:04:40","2022-03-31 00:04:05","Completed");
INSERT INTO appointments VALUES("54","20","Francis Urna","francis.dumas.urna@gmail.com","Joshua Malubay","Dental Implants","Main Branch","note","2022-03-31","00:00:00","2022-03-31 00:04:27","0000-00-00 00:00:00","0000-00-00 00:00:00","2022-03-31 00:04:13","Checked-In");
INSERT INTO appointments VALUES("56","1","wang wang","wang@gmail.com","Joshua Malubay","sample","","adwadad","2022-03-31","15:14:00","","0000-00-00 00:00:00","0000-00-00 00:00:00","2022-03-31 03:15:15","Confirmed");
INSERT INTO appointments VALUES("57","2","Hermar Garcia","hermar.garcia@qcu.edu.ph","Joshua Malubay","Orthodontics","","dddad","2022-04-01","15:22:00","","0000-00-00 00:00:00","0000-00-00 00:00:00","2022-03-31 03:20:08","Confirmed");



CREATE TABLE `billing` (
  `bill_id` int(11) NOT NULL AUTO_INCREMENT,
  `branch` varchar(50) NOT NULL,
  `ref_no` int(50) NOT NULL,
  `patient_id` int(50) NOT NULL,
  `patient_name` varchar(50) NOT NULL,
  `doctor` varchar(50) NOT NULL,
  `service` varchar(50) NOT NULL,
  `price` int(50) NOT NULL,
  `mode_of_payment` varchar(50) NOT NULL,
  `date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`bill_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

INSERT INTO billing VALUES("13","1","43","0","wendy Urna","Francis Urna","Orthodontics","50000","","2022-03-20 01:49:47","Unpaid");
INSERT INTO billing VALUES("14","2","44","0","Francis Urna","Francis Urna","Oral Prophylaxis","2000","","2022-03-20 03:05:47","Paid");
INSERT INTO billing VALUES("15","3","45","0","Francis Urna","Francis Urna","Consultation","250","","2022-03-20 02:34:07","Unpaid");
INSERT INTO billing VALUES("16","","50","0","wang wang","Joshua Malubay","Root Canal Treatment","1300","","2022-03-29 05:16:50","Unpaid");
INSERT INTO billing VALUES("17","","47","0","Lennon Bartolome","Joshua Malubay","Tooth Extraction","1500","","2022-03-29 05:16:53","Unpaid");



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
INSERT INTO certification VALUES("0","yeji yeji","Joshua Malubay","Teeth Whitening","3 Days ","2022-03-30","Sample");



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

INSERT INTO control_panel VALUES("1","Dental Clinic","logo-new.png","09474957938","dental.clinic@gmail.com","Monday","Saturday","19:00:58","16:00:58","Quirino Hwy, Novaliches, Quezon City, Metro Manila","https://facebook.com/romero.dental/","https://twitter.com/romero.dental/");



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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

INSERT INTO dentalchart VALUES("1","46","18","","wendy Urna","Missing due to Canes","Composite Filling","M","Co","2000","2022-03-28"," "," "," "," "," ","1"," ","1"," ","Planned");
INSERT INTO dentalchart VALUES("2","46","17","","wendy Urna","Decayed (Canes indicated for Filling)","Jacket Crown","D","JC","1000","2022-03-28"," "," "," "," ","1","1"," "," "," ","Planned");
INSERT INTO dentalchart VALUES("3","46","16","","wendy Urna","Decayed (Canes indicated for Filling)","Implant","D","Imp","1000","2022-03-28"," "," ","1","1"," "," "," "," "," ","Planned");
INSERT INTO dentalchart VALUES("4","46","22","","wendy Urna","Missing due to Canes","Jacket Crown","M","JC","1000","2022-03-28"," "," "," ","1","1"," "," "," "," ","Planned");
INSERT INTO dentalchart VALUES("5","46","16","","wendy Urna","Present Teeth","Amaigam Filling","P","Am","1000","2022-03-28"," "," ","1","1"," "," "," "," "," ","Planned");
INSERT INTO dentalchart VALUES("6","46","16","","wendy Urna","Decayed (Canes indicated for Filling)","Amaigam Filling","D","Am","1000","2022-03-28"," "," "," "," "," "," ","1","1"," ","Planned");
INSERT INTO dentalchart VALUES("7","46","16","","wendy Urna","Missing due to Canes","Jacket Crown","M","JC","1000","2022-03-28","1","1"," "," "," "," "," "," "," ","Planned");
INSERT INTO dentalchart VALUES("8","46","17","","wendy Urna","Unerupted","Jacket Crown","Un","JC","1000","2022-03-28","1","1"," "," "," "," "," "," "," ","Planned");
INSERT INTO dentalchart VALUES("9","46","16","","wendy Urna","Root Fragment","Removable Dentures","Rf","Rm","1000","2022-03-28"," "," "," "," "," ","1"," ","1"," ","Planned");
INSERT INTO dentalchart VALUES("10","46","17","","wendy Urna","Present Teeth","Composite Filling","P","Co","2000","2022-03-28"," "," "," "," "," "," "," "," ","1","Planned");
INSERT INTO dentalchart VALUES("11","46","15","","wendy Urna","Missing due to Canes","Abutment","M","Ab","1000","2022-03-28"," ","1","1"," "," "," "," "," "," ","Planned");
INSERT INTO dentalchart VALUES("12","46","15","","wendy Urna","Supernumerary Tooth","Removable Dentures","Sp","Rm","1000","2022-03-28"," "," "," "," ","1","1"," "," "," ","Planned");
INSERT INTO dentalchart VALUES("13","46","21","","wendy Urna","Missing due to Canes","Jacket Crown","M","JC","1000","2022-03-29"," "," "," "," "," "," ","1","1"," ","Planned");
INSERT INTO dentalchart VALUES("14","47","17","","Lennon Bartolome","Missing due to Other Causes","Abutment","MO","Ab","1000","2022-03-29"," "," "," ","1","1"," "," "," "," ","Planned");
INSERT INTO dentalchart VALUES("15","47","16","","Lennon Bartolome","Missing due to Other Causes","Abutment","MO","Ab","1000","2022-03-29"," "," ","1","1"," "," "," "," "," ","Completed");
INSERT INTO dentalchart VALUES("16","47","11","","Lennon Bartolome","Present Teeth","Pontic","P","P","1000","2022-03-29"," "," "," "," ","1","1"," "," "," ","Planned");
INSERT INTO dentalchart VALUES("17","47","12","","Lennon Bartolome","Missing due to Canes","Removable Dentures","M","Rm","1000","2022-03-29"," "," "," ","1","1"," "," "," "," ","Planned");
INSERT INTO dentalchart VALUES("18","51","11","","Francis Urna","Present Teeth","Inlay","P","In","1000","2022-03-29"," "," "," "," ","1","1"," "," "," ","Completed");



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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO inventory_equipment VALUES("1","Driller","2022-01-06","2022-01-31","50","INACTIVE");
INSERT INTO inventory_equipment VALUES("2","Dental Chair Headrest","2022-01-01","2021-06-30","2","ACTIVE");
INSERT INTO inventory_equipment VALUES("3","Dental Trolley ","2022-01-25","2021-12-24","3","ACTIVE");
INSERT INTO inventory_equipment VALUES("4","test","2022-03-30","2022-03-31","999","INACTIVE");
INSERT INTO inventory_equipment VALUES("5","qqqq","2022-03-31","2022-03-31","999","ACTIVE");



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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

INSERT INTO inventory_medicine VALUES("1","Tylenol","999","","100","2022-01-27","2022-01-04","ACTIVE");
INSERT INTO inventory_medicine VALUES("2","Advil","1.0E+29","","50","2022-01-30","2022-01-12","ACTIVE");
INSERT INTO inventory_medicine VALUES("3","Bayer","173","","200","2024-06-19","2022-01-25","ACTIVE");
INSERT INTO inventory_medicine VALUES("4","test","999","","999","2022-03-30","2022-03-30","ACTIVE");
INSERT INTO inventory_medicine VALUES("5","testtest","888","","999","2022-03-30","2022-03-31","INACTIVE");
INSERT INTO inventory_medicine VALUES("6","wwww","999","","999","2022-03-30","2022-03-31","INACTIVE");
INSERT INTO inventory_medicine VALUES("7","Mefenamic","50","","1500","2022-03-01","2022-03-31","ACTIVE");



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
  `status` varchar(55) NOT NULL,
  PRIMARY KEY (`patient_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO patient_record VALUES("1","","Lennon Bartolome","Lennon","Bartolome","G.","2022-03-01","Sampaloc St","Sample","0","","","12345678","lennonbartolome@gmail.com","0947959795","male","ACTIVE");
INSERT INTO patient_record VALUES("2","","Sample Sample","Sample","Sample","TEST","2022-03-01","Sampaloc St","Sample","0","","","12345678","sample@gmail.com","0959562626","female","ACTIVE");



CREATE TABLE `pending_appointments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` varchar(50) NOT NULL,
  `patient_name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `doctor_name` varchar(50) NOT NULL,
  `service_name` varchar(50) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `note` varchar(255) NOT NULL,
  `appointment_datentime` date NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4;

INSERT INTO pending_appointments VALUES("21","2","Francis Urna","francis.dumas.urna@gmail.com","Joshua Malubay","Root Canal Treatment","","tat","2022-03-31","Unconfirmed");
INSERT INTO pending_appointments VALUES("22","2","Francis Urna","francis.dumas.urna@gmail.com","Joshua Malubay","Crowns and Bridges","","wwww","2022-03-31","Unconfirmed");
INSERT INTO pending_appointments VALUES("23","2","Francis Urna","francis.dumas.urna@gmail.com","Joshua Malubay","Orthodontics","","tt","2022-03-31","Unconfirmed");
INSERT INTO pending_appointments VALUES("25","1","wang wang","wang@gmail.com","Joshua Malubay","Root Canal Treatment","","aa","2022-03-30","Unconfirmed");
INSERT INTO pending_appointments VALUES("26","1","wang wang","wang@gmail.com","Lennon Bartolome","Dental Implants","","ww","2022-04-09","Unconfirmed");
INSERT INTO pending_appointments VALUES("27","1","wang wang","wang@gmail.com","Lennon Bartolome","Crowns and Bridges","","s","2022-04-09","Unconfirmed");
INSERT INTO pending_appointments VALUES("28","1","wang wang","wang@gmail.com","Lennon Bartolome","Crowns and Bridges","1","ss","2022-04-09","Unconfirmed");
INSERT INTO pending_appointments VALUES("29","1","wang wang","wang@gmail.com","Joshua Malubay","Crowns and Bridges","1","sss","2022-04-07","Unconfirmed");
INSERT INTO pending_appointments VALUES("30","1","wang wang","wang@gmail.com","Lennon Bartolome","Denture","1","a","2022-04-09","Unconfirmed");
INSERT INTO pending_appointments VALUES("31","1","wang wang","wang@gmail.com","Joshua Malubay","sample","","dawdwad","2022-03-31","Unconfirmed");
INSERT INTO pending_appointments VALUES("32","1","wang wang","wang@gmail.com","Joshua Malubay","Denture","","adwad","2022-03-31","Unconfirmed");
INSERT INTO pending_appointments VALUES("33","1","wang wang","wang@gmail.com","Joshua Malubay","sample","","adad","2022-04-01","Unconfirmed");



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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

INSERT INTO prescription_list VALUES("1","wang wang","Joshua Malubay","Urgent","Tylenol ","3","3mg","");
INSERT INTO prescription_list VALUES("2","Hermar Garcia","Lennon Bartolome","Important","Tylenol ","3","2mg","");
INSERT INTO prescription_list VALUES("3","yeji yeji","Joshua Malubay","adad","Advil ","25","1mg","");



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
  `question_eight` varchar(255) NOT NULL,
  `input_eight` varchar(50) NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO questions VALUES("1","Yes","No","a","Yes","a","No","a","Yes","a","No","Yes","Local Anesthetic,Penicillin, Antibiotics,Sulfa Drugs,Aspirin,","a","Yes","a","No","Yes","No","AB","150-80","High Blood Pressure,Low Blood Pressure,Epilepsy/Convulsions,AIDS/HIV Infection,Sexually Transmitted disease,","a");
INSERT INTO questions VALUES("2","Yes","Yes","a","Yes","a","Yes","a","Yes","a","Yes","Yes","Local Anesthetic, Penicillin, Antibiotics, ","a","Yes","a","Yes","Yes","Yes","AB","150-80","High Blood Pressure, Low Blood Pressure, ","a");



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
INSERT INTO restotbl VALUES("4","Ab","Abutment","12345");
INSERT INTO restotbl VALUES("12","Att","Attachment","1000");
INSERT INTO restotbl VALUES("13","P","Pontic","1000");
INSERT INTO restotbl VALUES("14","In","Inlay","1000");
INSERT INTO restotbl VALUES("15","Imp","Implant","1000");
INSERT INTO restotbl VALUES("16","Rm","Removable Dentures","1000");



CREATE TABLE `services` (
  `service_id` int(50) NOT NULL AUTO_INCREMENT,
  `profile_img` varchar(50) NOT NULL,
  `service_name` varchar(250) NOT NULL,
  `service_des` text NOT NULL,
  `price` int(50) NOT NULL,
  `status` varchar(55) NOT NULL,
  PRIMARY KEY (`service_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

INSERT INTO services VALUES("7","select.png","Test","ADADADADA","2345","INACTIVE");
INSERT INTO services VALUES("8","ortho.jpg","Orthodontics","that addresses the diagnosis, prevention, and correction of mal-positioned teeth and jaws, and misaligned bite patterns.","50000","INACTIVE");
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
INSERT INTO services VALUES("17","Dentures.jpg","www","www","221","INACTIVE");



CREATE TABLE `tbl_branch` (
  `branch_id` int(50) NOT NULL AUTO_INCREMENT,
  `branch_name` varchar(50) NOT NULL,
  `profile_img` varchar(50) NOT NULL,
  `branch_address` varchar(50) NOT NULL,
  `status` varchar(55) NOT NULL,
  PRIMARY KEY (`branch_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_branch VALUES("2","SB","wp8616010-jisoo-pc-wallpapers.jpg","2 balak putik quezon City","ACTIVE");



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
  `status` varchar(55) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

INSERT INTO user_accounts VALUES("3","IMG_20201023_071124.jpg","Francis","Urna","Dumas","2000-08-17","QC1","","21","123456","urna@gmail.com","09999922","Male","Admin","ACTIVE");
INSERT INTO user_accounts VALUES("4","owang.jpg","Joshua","Malubay","G","1999-07-11","QC","","22","123","joshua@gmail.com","0933333","Male","Doctor","ACTIVE");
INSERT INTO user_accounts VALUES("5","kyle.jpg","Kyle","elyk","G","2006-09-17","QC","","15","12345","kyle@gmail.com","091233321","Female","Assistant","INACTIVE");
INSERT INTO user_accounts VALUES("6","1x1jpg.jpg","Lennon","Bartolome","D.","2000-06-29","Caloocan City","1","21","password","lennon@gmail.com","0995231256","Male","Assistant","ACTIVE");
INSERT INTO user_accounts VALUES("7","7 - angry hasbulla.jpg","wew","wew","S","2022-03-03","Quezon City","","","123456","urna@gmail.com","091213113","Male","1","INACTIVE");
INSERT INTO user_accounts VALUES("8","4 - fbi hasbulla.jpg","test","test","test","1999-07-11","Riverside Quezon City","","22","test123","test@gmail.com","09202297929","Male","Admin","ACTIVE");
INSERT INTO user_accounts VALUES("9","1253-huh.png","www","www","www","2003-07-11","Quezon City","","18","www","www@gmail.com","2142421414124","Female","1","INACTIVE");



CREATE TABLE `x_ray` (
  `xray_count` int(50) NOT NULL AUTO_INCREMENT,
  `patient_id` int(50) NOT NULL,
  `patient_name` varchar(50) NOT NULL,
  `x_ray` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  PRIMARY KEY (`xray_count`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

INSERT INTO x_ray VALUES("9","2","Garcia, Hermar ","xray.jpg","  March 30, 2022");
INSERT INTO x_ray VALUES("10","3","yeji, yeji yeji","xray.jpg","  March 30, 2022");
INSERT INTO x_ray VALUES("11","2","Garcia, Hermar ","xray.jpg","  March 30, 2022");

