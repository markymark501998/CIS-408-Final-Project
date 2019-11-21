CREATE DATABASE Final408Project;
USE Final408Project;

CREATE TABLE Test_Table (
	Id INT auto_increment primary key,
    Title VARCHAR(50) NOT NULL,
    Artist VARCHAR(100) NOT NULL,
    Country VARCHAR(100) NOT NULL,
    Company VARCHAR(100) NOT NULL,
    Price FLOAT NOT NULL,
    Year INT NOT NULL
);

Select * from Test_Table;

DROP TABLE classes;
DROP TABLE instructors;
DROP TABLE courses;