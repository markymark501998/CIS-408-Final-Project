SELECT 
 
cl.course_id,
ir.first_name,
ir.last_name,
co.description,
bl.start_time,
bl.end_time,
dy.days_offered,
co.semester,
ir.department,
co.availability,
cl.num_students

FROM
School.classes, School.classes AS cl, 
School.courses, School.courses AS co,
School.blocks, School.blocks AS bl,
School.days, School.days AS dy,
School.instructors, School.instructors AS ir
WHERE cl.course_id = co.course_id 
AND cl.block_id = bl.block_id
AND cl.days_id = dy.days_id
AND cl.instructor_id = ir.instructor_id