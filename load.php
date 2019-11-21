<?php
    $con = mysqli_connect("localhost","admin","AdminPassword$19","School");
    $createCourse = "CREATE TABLE courses (
        course_id VARCHAR(6) PRIMARY KEY,
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
    $createClass = "CREATE TABLE classes (
        class_id VARCHAR(20) PRIMARY KEY,
        course_id VARCHAR(6),
        instructor_id VARCHAR(20),
        start_time INT NOT NULL,
        end_time INT NOT NULL,
        offered_days INT NOT NULL,
        num_students INT NOT NULL,
        FOREIGN KEY (course_id) REFERENCES courses(course_id),
        FOREIGN KEY (instructor_id) REFERENCES instructors(instructor_id)
    );";
    if ($con->query($createClass) !== TRUE) {
        die("Error creating Classes table");
        echo "Error creating Classes table";
    }
    echo "Success!";
?>