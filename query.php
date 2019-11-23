<?php
    $courseId = $_POST['courseId'];
    $daysId = $_POST['daysId'];
    $instFname = $_POST['instFname'];
    $instLname = $_POST['instLname'];
    $semester = $_POST['semester'];
    $blockId = intval($_POST['blockId']);

    if($semester == "All") {
        $semester = "";
    }

    if($daysId == "All") {
        $daysId = "";
    }

    $con = mysqli_connect("localhost","admin","AdminPassword$19","School");

    $query = "
        SELECT 

        classes.course_id,
        instructors.first_name,
        instructors.last_name,
        courses.description,
        blocks.start_time,
        blocks.end_time,
        days.days_id,
        days.days_offered,
        courses.semester,
        instructors.department,
        courses.availability,
        classes.num_students
        
        FROM
        classes
        LEFT OUTER JOIN courses ON classes.course_id = courses.course_id
        LEFT OUTER JOIN instructors ON classes.instructor_id = instructors.instructor_id
        LEFT OUTER JOIN blocks ON classes.block_id = blocks.block_id
        LEFT OUTER JOIN days ON classes.days_id = days.days_id
        
        WHERE courses.semester LIKE '$semester%'
        AND days.days_id LIKE '$daysId%'
        AND instructors.first_name LIKE '$instFname%'
        AND instructors.last_name LIKE '$instLname%'
        AND classes.course_id LIKE '$courseId%'
    ";
    
    if ($blockId != 0) {
        $query .= "AND blocks.block_id = $blockId";
    }

    $dataset = mysqli_query($con,$query);

    $row_count = mysqli_num_rows($dataset);

    if($row_count == 0) {
        echo "<h5 class=\"text-danger\">No classes matched these search parameters. Please try again!</h6>";
    } else {
        echo "
        <table class=\"table table-bordered table-hover\">
        <thead class=\"table-success\">
                <tr>
                    <th>Course Id</th>
                    <th>Teacher</th>
                    <th>Course Description</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Days Offered</th>
                    <th>Semester</th>
                    <th>Department</th>
                    <th>Availability</th>
                    <th># / Students</th>
                </tr>
            </thead>
        <tbody>";
            
        while($row = mysqli_fetch_array($dataset)) {
            echo "<tr>";
                echo "<td>".$row['course_id']."</td>";
                echo "<td>".$row['first_name']." ".$row['last_name']."</td>";
                echo "<td>".$row['description']."</td>";
                echo "<td>".$row['start_time']."</td>";
                echo "<td>".$row['end_time']."</td>";
                echo "<td>".$row['days_offered']."</td>";
                echo "<td>".$row['semester']."</td>";
                echo "<td>".$row['department']."</td>";

                if($row['availability'] == 1) {
                    echo "<td>Yes</td>";
                } else {
                    echo "<td>No</td>";
                }

                echo "<td>".$row['num_students']."</td>";
            echo "</tr>";
        }
        
        echo "
        </tbody>
        </table>"; 
    }
?>