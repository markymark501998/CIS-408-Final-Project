<?php
    $con = mysqli_connect("localhost","admin","AdminPassword$19","School");
    //$con = new mysqli('127.0.0.1', 'admin', 'AdminPassword$19', 'School');
    $createCourse = "CREATE TABLE courses (
        course_id VARCHAR(6) PRIMARY KEY,
    description VARCHAR(255) NOT NULL,
        semester VARCHAR(20) NOT NULL,
        availability BOOLEAN NOT NULL
    );";
    if ($con->query($createCourse) !== TRUE) {
        die("Error creating Courses table");
        echo "Error creating Courses table";
    }
    $createInstructor = "CREATE TABLE instructors (
        instructor_id VARCHAR(20) PRIMARY KEY,
        first_name VARCHAR(60) NOT NULL,
        last_name VARCHAR(60) NOT NULL,
        department VARCHAR(20) NOT NULL
    );";
    if ($con->query($createInstructor) !== TRUE) {
        die("Error creating Instructors table");
    }
    $createDays = "CREATE TABLE days (
        days_id VARCHAR(20) PRIMARY KEY,
        days_offered VARCHAR(255) NOT NULL
    );";
    if ($con->query($createDays) !== TRUE) {
        die("Error creating Days table");
    }
    $createBlocks = "CREATE TABLE blocks (
        block_id INT PRIMARY KEY,
        start_time VARCHAR(20) NOT NULL,
        end_time VARCHAR(20) NOT NULL
    );";
    if ($con->query($createBlocks) !== TRUE) {
        die("Error creating Days table");
    }
    $createClass = "CREATE TABLE classes (
        class_id VARCHAR(20) PRIMARY KEY,
        course_id VARCHAR(6),
        instructor_id VARCHAR(20),
        block_id INT NOT NULL,
        days_id VARCHAR(20) NOT NULL,
        num_students INT NOT NULL,
        FOREIGN KEY (course_id) REFERENCES courses(course_id),
        FOREIGN KEY (instructor_id) REFERENCES instructors(instructor_id),
        FOREIGN KEY (block_id) REFERENCES blocks(block_id),
        FOREIGN KEY (days_id) REFERENCES days(days_id)
    );";
    if ($con->query($createClass) !== TRUE) {
        die("Error creating Classes table");
        echo "Error creating Classes table";
    }
    echo "Success!";
?>