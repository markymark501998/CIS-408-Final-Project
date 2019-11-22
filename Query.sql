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

WHERE courses.semester LIKE '%'
AND days.days_id LIKE '%'
