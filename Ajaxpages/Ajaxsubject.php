<?php 
include("../Connection/connection.php");
session_start();
?>
 <option value="">-----Select------</option> 
         <?php
		 				
						
							
						
		 				$sel="select * from  tbl_subject s  inner join tbl_semester sem on sem.semester_id = s.semester_id
						 inner join tbl_course c on c.course_id = s.course_id
						 inner join tbl_student st on st.course_id = c.course_id
						 where st.student_id = '".$_SESSION["uid"]."' AND sem.semester_id = '".$_GET["sid"]."'";
						//echo $sel;
						$row=mysql_query($sel);
						//echo $sel;
						while($data=mysql_fetch_array($row))
						{
						
					
						
		  ?>
           <option value="<?php echo $data['subject_id'];?>"><?php echo $data['subject_name'];?></option>
                    <?php 
						}
					?>