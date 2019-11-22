<?php
    $courseId = $_POST['courseId'];
    $daysId = $_POST['daysId'];
    $instFname = $_POST['instFname'];
    $instLname = $_POST['instLname'];
    $semester = $_POST['semester'];
    $blockId = intval($_POST['blockId']);

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

    echo "
    <table class=" + '"' + "table table-bordered table-hover" + '"' + ">
        <thead class=" + '"' + "thead-light" + '"' + ">
            <tr>
                <th>Course Id</th>
                <th>Teacher</th>
                <th></th>
                <th>Course Description</th>
                <th></th>Start Time</th>
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
            //echo "Row".$row['course_id']." </br>";

            echo "<tr>";
            echo "  <td>
                        
                    </td>";
            echo "</tr>";
        }
        
        echo "
        </tbody>
    </table>"; 
?>