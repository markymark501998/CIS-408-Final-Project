<?php
	//$con = new mysqli('127.0.0.1', 'admin', 'AdminPassword$19', 'School');
	$con = mysqli_connect("localhost","admin","AdminPassword$19","School");
	$insertCourse = "INSERT INTO courses (course_id,description,semester,availability)
		VALUES 	('CIS101','Introduction to Computers','FALL',TRUE),
				('MTH115','Pre-Calculus','FALL',TRUE),
				('EEC130','Engineering Concepts','FALL',FALSE),
				('PHY241','Physics 1: Free Falling','FALL',TRUE),
				('CIS150','Computer Programming','FALL',FALSE),
				('PHY242','Physics 2: Gamma Rays','SPRING',TRUE),
				('MTH201','Calculus 1','SPRING',TRUE),
				('CIS225','Data Structures & Other Types','SPRING',TRUE),
				('EEC250','Super Suits','SPRING',TRUE),
				('BUS230','Identity Management','SPRING',FALSE),
				('MYA150','Introduction to Magic','FALL',FALSE),
				('PHE450','Adamantine Abs','SPRING',TRUE),
				('MYA151','Intro to Magic 2: No Wands Allowed','SPRING', FALSE)
	";
	if ($con->query($insertCourse) !== TRUE) {
		die("Error inserting into Courses table");
	}
	$insertInstructor = "INSERT INTO instructors (instructor_id,first_name,last_name,department)
		VALUES 	('professorx','Charles','Xavier','Computer Science'),
				('hulk','Bruce','Banner','Physics'),
				('ozymandias','Adrian','Veidt','Mathematics'),
				('ironman','Tony','Stark','Comp Engineering'),
				('batman','Bruce','Wayne','Business'),
				('doctor','Stephen','Strange','Mystic Arts'),
				('wolverine','James','Howlett','Physical Ed'),
				('tbd','To Be','Decided','General'),
				('staff','GMU','Staff','General')
	";
	if ($con->query($insertInstructor) !== TRUE) {
		die("Error inserting Instructors into table");
	}
	$insertBlock = "INSERT INTO blocks (block_id,start_time,end_time)
		VALUES	(1,'7:00 AM','8:30 AM'),
				(2,'8:45 AM','10:15 AM'),
				(3,'10:30 AM','12:00 PM'),
				(4,'1:30 PM','3:00 PM'),
				(5,'3:15 PM','4:45 PM'),
				(6,'5:00 PM','6:30 PM'),
				(7,'6:45 PM','8:15 PM'),
				(8,'8:30 PM','10:00 PM'),
				(9, '10:15 PM', '11:45 PM')
	";
	if ($con->query($insertBlock) !== TRUE) {
		die("Error inserting Blocks into table");
	}
	$insertDays = "INSERT INTO days (days_id,days_offered)
		VALUES	('MW','Monday, Wednesday'),
				('TTH','Tuesday, Thursday'),
				('MWF','Monday, Wednesday, Friday'),
				('TS','Tuesday, Saturday'),
				('S','Saturday')
	";
	if ($con->query($insertDays) !== TRUE) {
		die("Error inserting Days into table");
	}
	$insertClasses = "INSERT INTO classes (class_id,course_id,instructor_id,block_id,days_id,num_students)
		VALUES 	('cis101_1_Fall','CIS101','professorx',2,'MW', 17),
				('cis101_2_Fall','CIS101','ironman',2,'TTH', 30),
				('cis150_1_Fall','CIS150','professorx',4,'MWF',45),
				('cis225_1_Spring','CIS225','professorx',2,'MW',5),
				('cis225_2_Spring','CIS225','ironman',2,'TTH',13),
				('mth115_1_Fall','MTH115','ozymandias',7,'MWF',2),
				('mth115_2_Fall','MTH115','ozymandias',4,'TTH',1),
				('mth201_1_Spring','MTH201','ozymandias',7,'MWF',0),
				('mth201_2_Spring','MTH201','ozymandias',4,'TTH',0),
				('eec130_1_Fall','EEC130','ironman',4,'TTH',45),
				('eec250_1_Spring','EEC250','ironman',4,'TTH',37),
				('phy241_1_Fall','PHY241','hulk',3,'TTH',17),
				('phy241_2_Fall','PHY241','ironman',3,'MW',32),
				('phy242_1_Spring','PHY242','hulk',3,'TTH',45),
				('phy242_2_Spring','PHY242','ironman',3,'MW',4),
				('bus230_1_Spring','BUS230','batman',9,'MWF',60),
				('bus230_2_Spring','BUS230','batman',9,'TS',60),
				('mya150_1_Fall','MYA150','doctor',9,'TS',15),
				('phe450_1_Spring','PHE450','wolverine',1,'MWF',6),
				('phe450_2_Spring','PHE450','hulk',2,'MWF',45),
				('mya151_1_Spring','MYA151','doctor',9,'S',15)
	";
	if ($con->query($insertClasses) !== TRUE) {
		die("Error inserting Classes into table");
	}
	echo "Success!";
?>